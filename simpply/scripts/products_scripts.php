<?php

//Getting an array to show products to user
function productsData($connect) {
    $query = "SELECT * FROM products_list";
    $result = mysqli_fetch_all(mysqli_query($connect, $query), MYSQLI_NUM);
    return $result;
}

//Draws products cards
function productsPrint($connect) {
    $productsList = productsData($connect);
    for ($i = 0; $i < count($productsList); $i++) {
        echo "
        <form action=\"\" method=\"post\" class=\"products_item_wrapper\">
            <div id=\"products_img\">
                <p class=\"products_img_name\">Фото:&nbsp;".$productsList[$i][2]."</p>
            </div>

            <h3 class=\"products_name\">".$productsList[$i][2]."</h3>
            <p class=\"products_cost\"><b>Цена:</b>&nbsp;".$productsList[$i][3]."&nbsp;RUB</p>
            <p class=\"products_value\"><b>Осталось:</b>&nbsp;".$productsList[$i][4]."</p>
            <input type=\"hidden\" name=\"products_id\" value=\"".$productsList[$i][0]."\">

            <div class=\"value_of_products\">
                <p>Укажите количество товаров:</p>
                <input type=\"number\" name=\"value_of_products\">
            </div>
        <button type=\"submit\" name=\"buy_products\" value=\"buy_products\">Купить</button>
        </form>";
    }
}

//Allows us to buy a product
function buyProducts($connect) {
    if ((isset($_POST['buy_products'])) && (isset($_POST['products_id'])) && (isset($_POST['value_of_products']))) {
        $balanceQuery = "SELECT * FROM users WHERE user_id = '".$_SESSION['user_data']['user_id']."'";
        $result = mysqli_query($connect, $balanceQuery);
        $result = mysqli_fetch_assoc($result);

        $balance = $result['user_balance'];

        $itemQuery = "SELECT * FROM products_list WHERE products_id = '".$_POST['products_id']."'";
        $result = mysqli_query($connect, $itemQuery);
        $result = mysqli_fetch_assoc($result);

        $itemCost = $result['products_cost'];
        $itemValue = $result['products_value'];
        $itemDate = date("Y-m-d H:i:s");

        if ((isset($_POST['value_of_products']))) {
            $productsVolume = (double)$_POST['value_of_products'];
        } else {
            $productsVolume = 0;
        }
        $tradeCosts = $itemCost * $productsVolume;

        if (($productsVolume <= $itemValue) && ($balance >= $tradeCosts) && ($productsVolume != 0)) {
            $tradeQuery = "INSERT INTO trade_list VALUES (NULL, '".$_SESSION['user_data']['user_id']."', '".$_POST['products_id']."', '".$productsVolume."', '".$tradeCosts."', '".$itemDate."')";
            $tradeResult = mysqli_query($connect, $tradeQuery);

            $newUserBalance = $balance - $tradeCosts;
            $balanceQuery = "UPDATE users SET user_balance = '".$newUserBalance."' WHERE users.user_id = '".$_SESSION['user_data']['user_id']."'";
            $balanceResult = mysqli_query($connect, $balanceQuery);

            $newProductsValue = $itemValue - $productsVolume;
            $productsQuery = "UPDATE products_list SET products_value = '".$newProductsValue."' WHERE products_list.products_id = '".$_POST['products_id']."'";

            $productsResult = mysqli_query($connect, $productsQuery);

            unset($_POST['buy_products']);
            unset($_POST['products_id']);
            unset($_POST['value_of_product']);
        }
    }
}

?>
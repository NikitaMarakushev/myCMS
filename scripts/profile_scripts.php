<?php

function checkBalance($connect) {
    $balanceQuery = "SELECT user_balance FROM users WHERE user_id = '". $_SESSION['user_data']['user_id']."'";
    $result = mysqli_fetch_assoc(mysqli_query($connect, $balanceQuery));
    return $result['user_balance'];
}

function productsList($connect) {
    $productsList = "SELECT * FROM trade_list WHERE user_id = '". $_SESSION['user_data']['user_id']."'";
    $result = mysqli_query($connect, $productsList);
    $resultArray = mysqli_fetch_all($result, MYSQLI_ASSOC);
    $iterator = 1;
    foreach($resultArray as $key => $value) {
        echo "<p class=\"products_list_row\">";
        echo "<b>".$iterator."</b>&nbsp;";
        $iterator++;
        productsCat($resultArray[$key], $connect);
        echo "</p>";
    }
}

function productsCat($array, $connect) {
    foreach($array as $k => $v) {
        if ($k === 'products_id') {
            $query = "SELECT * FROM products_list WHERE products_id = '".$v."'";
            $result = mysqli_fetch_assoc(mysqli_query($connect, $query));
            echo "<b>Наименование товара:</b>&nbsp;{$result['products_name']};&nbsp;";
        } elseif($k === 'products_value') {
			echo "<b>Количество товара:</b>&nbsp;{$v};&nbsp;";
		} elseif($k === 'trade_costs') {
			echo "<b>Стоимость покупки:</b>&nbsp;{$v};&nbsp;";
		} elseif($k === 'trade_date') {
			echo "<b>Дата покупки:</b>&nbsp;".date('d-', strtotime($v)).monthRus(date('F', strtotime($v))).date('-Y в H:i:s', strtotime($v)).";&nbsp;";
		}
    }
}

?>
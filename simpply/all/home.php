<?php
include_once "page_content/header.php";
include_once "page_content/navbar.php";
?>

<section>
    <h1>Наши товары</h1>
    <div class="slider pos">
        <div class="slides">
            <input type="radio" name="rBtn" id="radio_button_1">
            <input type="radio" name="rBtn" id="radio_button_2">
            <input type="radio" name="rBtn" id="radio_button_3">
            <input type="radio" name="rBtn" id="radio_button_4">

            <div class="slide first">
                <img src="/medias/cookies.jpg" alt="Печенья">
                <div class="mask">
                    <div class="content">
                    <h2>Half-chocolate cookies</h2>
                    <p>A cookie is a baked or cooked food that is typically small, flat and sweet.
                        It usually contains flour, sugar and some type of oil or fat. </p>
                        <a href="#" class="info">Read more</a>
                    </div>
                </div>
            </div>
            <div class="slide second">
                <img src="/medias/tea.jpg" alt="Черный чай">
                <div class="mask">
                    <div class="content">
                    <h2>Black Tea</h2>
                    <p>Black tea is a type of tea that is more oxidized than oolong, yellow, white and green teas.
                         Black tea is generally stronger in flavor than other teas.  </p>
                        <a href="#" class="info">Read more</a>
                    </div>
                </div>
            </div>
            <div class="slide third">
                <img src="/medias/milk.jpg" alt="Молоко">
                <div class="mask">
                    <div class="content">
                    <h2>Milk</h2>
                    <p>Milk is a nutrient-rich liquid food produced by the mammary glands of mammals.
                        It is the primary source of nutrition for young mammals.</p>
                        <a href="#" class="info">Read more</a>
                    </div>
                </div>
            </div>
            <div class="slide fourth">
                <img src="/medias/sugar.jpg" alt="Сахар">
                <!--height="300" width="300"-->
                <div class="mask">
                    <div class="content">
                        <h2>Sugar</h2>
                        <p>Sugar is the generic name for sweet-tasting, soluble carbohydrates, many of which are used in food.
                            Table sugar, granulated sugar, or regular sugar.</p>
                            <a href="#" class="info">Read more</a>
                        </div>
                </div>
            </div>
        </div>

        <div class="navigation">
            <label for="radio_button_1" class="bar"></label>
            <label for="radio_button_2" class="bar"></label>
            <label for="radio_button_3" class="bar"></label>
            <label for="radio_button_4" class="bar"></label>
        </div>
    </div>
</section>

<?php
include_once "page_content/footer.php";
?>
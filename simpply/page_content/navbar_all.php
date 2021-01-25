<header>

    <div id="header_wrapper">
        <div id="log_bar">
            <div id="log_bar_wrapper">
                <?php
                    include_once "login_reg_form.php";
                ?>
                <div id="log_bar_choice_wrapper">
                    <form action="" method="post">
                        <input type="hidden" name="log" value="auth">
                        <button type="submit">Авторизация</button>
                    </form>
                    <form action="" method="post">
                        <input type="hidden" name="log" value="reg">
                        <button type="submit">Регистрация</button>
                    </form>
                </div>
            </div>
        </div>

        <div id="nav_bar">
            <form action="" method="post">
                <button type="submit">Главная</button>
                <input type="hidden" name="link" value="home">
            </form>
            <form action="" method="post">
                <button type="submit">Информация</button>
                <input type="hidden" name="link" value="info">
            </form>
            <form action="" method="post">
                <button type="submit">Контакты</button>
                <input type="hidden" name="link" value="contacts">
            </form>
        </div>
    </div>

</header>
<?php

//Moking connection to database of application (In this case: 'mycms_db')
$connect = mysqli_connect('localhost', 'root', 'root', 'mycms_db') or die('Ошибка подключения к базе данных: '.mysqli_error('!!!'));

//Alows us to know certain problem of connection
mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);

function userRegistration($connect) {

    $newLogin = trim(htmlspecialchars($_POST['new_login']));
    $newPassword = password_hash(trim(htmlspecialchars($_POST['new_password'])), PASSWORD_DEFAULT);
    $registrationDate = date('Y-m-d H:i:s');

    //Is registrating user actually new or existing
    if ( (isset($_POST['new_user'])) &&
    (isset($_POST['new_login'])) &&
    (isset($_POST['new_password'])) ) {

        $checkQuery = "SELECT * FROM users WHERE user_login = '". $newLogin . "'";
        $resultArray = mysqli_fetch_assoc(mysqli_query($connect, $checkQuery));

        if (!isset($resultArray['user_login'])) {

            $registrationQuery = "INSERT INTO users VALUES (NULL, '".$newLogin."', '".$newPassword."', '0', '".$registrationDate."', 'user')";
            $result = mysqli_query($connect, $registrationQuery);

        }
    }
}

function userLogin($connect) {

    if ( (isset($_POST['login_user'])) && (isset($_POST['login'])) && (isset($_POST['password']))) {
        $userLogin = trim(htmlspecialchars($_POST['login']));
        $userPassword = trim(htmlspecialchars($_POST['password']));

        $loginQuery = "SELECT * FROM users WHERE user_login = '".$userLogin."' AND user_status = 'user'";
        $resultArray = mysqli_fetch_assoc(mysqli_query($connect, $loginQuery));

        $userLoginDb = $resultArray['user_login'];
        $userPasswordDb = $resultArray['user_password'];

        if (isset($resultArray['user_login'])) {
            if (($userLogin === $userLoginDb) && (password_verify($userPassword, $userPasswordDb))) {

                $_SESSION['user_data']['user_id'] = $resultArray['user_id'];
                $_SESSION['user_data']['user_login'] = $resultArray['user_login'];
                $_SESSION['user_data']['user_status'] = 1;
                $_SESSION['user_data']['user_balance'] = $resultArray['user_balance'];
                $_SESSION['user_data']['user_data_registration'] = $resultArray['user_data_registration'];

                header('Location: /');

            }
        }
    }
}
?>
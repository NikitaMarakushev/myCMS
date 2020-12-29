<?php

//Is user authorized in the system?
function isUserAuthorized($user_data) {

    if (!isset($user_data)) {
        $pathFolder = 'all/';
    } elseif (isset($user_data)) {
        $pathFolder = 'authorized/';
    }
    return $pathFolder;
}

//Path definition
function definePath () {

    if ($_SERVER['REQUEST_URI'] === '/') {
        $pathToDir = '';
    } else {
        $pathToDir = '../';
    }
    return $pathToDir;
}

//Inserting name of the page on title
function pageName() {
    $pName = $_POST['link'];
    if (($pName == '') || ($pName == 'home')) {
        $pName = 'Главная страница';
    } elseif ($pName === 'info') {
        $pName = 'Информация';
    } elseif ($pName === 'contacts') {
        $pName = 'Контакты';
    } elseif ($pName === 'products') {
        $pName = 'Товары';
    } elseif ($pName === 'profile') {
        $pName = 'Профиль пользователя';
    } 
    return $pName;
}

//Site navigation
function getPathOfPage() {

    $folder = isUserAuthorized($_SESSION['user_data']);
    $dir = definePath();
    $link = $_POST['link'];

    if (($link == '') || (!isset($link))) {
        $pathToPage = $folder.'/home.php';
    } elseif ((isset($link)) && ($link !== 'exit')) {
        $pathToPage = $dir.$folder.$link.".php";
    } elseif ((isset($link)) && ($link === 'exit')) {
        $pathToPage = 'all/home.php';
    }

    return $pathToPage;
}

//Cleaning the session after working
function sesDestroy() {

    if ($_POST['link'] === 'exit') {
        $_SESSION = [];
        $_POST['link'] = null;
        $_POST = null;
        unset($_COOKIE[session_name()]);
        session_destroy();
        header('Location: /');
    }
}

//Get name of the month in Russian Language
function monthRus($month) {

    if ( strtolower($month) === 'january') $month = 'Января';
    elseif (strtolower($month) === 'february') $month = 'Февраля';
    elseif (strtolower($month) === 'march') $month = 'Марта';
    elseif (strtolower($month) === 'april') $month = 'Апреля';
    elseif (strtolower($month) === 'may') $month = 'Мая';
    elseif (strtolower($month) === 'juni') $month = 'Июня';
    elseif (strtolower($month) === 'juli') $month = 'Июля';
    elseif (strtolower($month) === 'august') $month = 'Августа';
    elseif (strtolower($month) === 'september') $month = 'Сентября';
    elseif (strtolower($month) === 'october') $month = 'Октября';
    elseif (strtolower($month) === 'november') $month = 'Ноября';
    elseif (strtolower($month) === 'december') $month = 'Декабря';

}
?>
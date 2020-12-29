<?php

if (!isset($_SESSION['user_data'])) {
    include_once "navbar_all.php";
} else {
    include_once "navbar_authorized.php";
}

?>
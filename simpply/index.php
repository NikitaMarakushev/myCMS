<?php

//Includes
include_once "scripts/main_scripts.php";
include_once "scripts/db_scripts.php";
include_once "scripts/profile_scripts.php";
include_once "scripts/products_scripts.php";

session_start();

userRegistration($connect);
userLogin($connect);
sesDestroy();
buyProducts($connect);

include_once getPathOfPage();

?>
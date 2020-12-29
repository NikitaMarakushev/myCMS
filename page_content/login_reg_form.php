<?php

if ((!isset($_POST['log'])) || ($_POST['log'] === 'auth')) {
    include_once "page_content/authorization_form.php";
} elseif ($_POST['log'] === 'reg') {
    include_once "page_content/registration_form.php";
}

?>
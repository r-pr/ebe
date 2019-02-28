<?php
require_once('config.php');

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $pwd = getenv('EBE_ADMIN_PWD');
    if (!$pwd) {
        $pwd = Config::$adminPassword;
    }
    if (!isset($_POST['password'])){
        App::statusCat(400);
    } else if ($_POST['password'] !== $pwd) {
        App::statusCat(401);
    } else {
        $_SESSION['logged_in'] = true;
        header('Location:index.php?action=viewall');
    }
} else {
    App::renderView('login', 'Login', null);
}
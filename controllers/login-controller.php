<?php
require_once('config.php');

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    echo 'POST';
    if (!isset($_POST['password'])){
        App::statusCat(400);
    } else if ($_POST['password'] !== Config::$adminPassword) {
        App::statusCat(401);
    } else {
        $_SESSION['logged_in'] = true;
        header('Location:index.php?action=viewall');
    }
} else {
    App::renderView('login', 'Login', ['foo'=>'bar']);
}
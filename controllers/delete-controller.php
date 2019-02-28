<?php

require_once('config.php');
require_once('db-layer/' . Config::$dbEngine . '-db-layer.php');

$dbLayer = new DbLayer();

if (!isset($_SESSION['logged_in'])) {
    return App::statusCat(403);
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (!isset($_POST['pid'])) {
        return App::statusCat(400);
    }
    $pid = $_POST['pid'];
    $dbLayer->deletePost($pid);
    header('Location: index.php?action=viewall');
} else {
    if (!isset($_GET['pid'])) {
        return App::statusCat(400);
    }
    $pid = $_GET['pid'];
    App::renderView('delete-post', 'Delete post', ['pid' => $pid]);
}


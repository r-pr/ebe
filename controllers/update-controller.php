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
    $title = (isset($_POST['title']) && $_POST['title'] !== '') ? $_POST['title'] : 'no title';
    $body = (isset($_POST['body']) && $_POST['body'] !== '') ? $_POST['body'] : 'no text';
    $dbLayer->updatePost($pid, $title, $body);
    header('Location: index.php?action=view&pid='.$pid);
} else {
    if (!isset($_GET['pid'])) {
        return App::statusCat(400);
    }
    $pid = $_GET['pid'];
    $post = $dbLayer->getPostById($pid);
    if (is_null($post)) {
        return App::statusCat(400);
    }
    App::renderView('update-post', 'Update post', $post);
}


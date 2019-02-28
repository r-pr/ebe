<?php

require_once('config.php');
require_once('db-layer/' . Config::$dbEngine . '-db-layer.php');

$dbLayer = new DbLayer();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $title = (isset($_POST['title']) && $_POST['title'] !== '') 
        ? $_POST['title'] : 'no title';
    $body = (isset($_POST['body']) && $_POST['body'] !== '') 
        ? $_POST['body'] : 'no text';
    $dbLayer->createPost($title, $body);
    header('Location: index.php?action=viewall');
} else {
    App::renderView('create-post', 'Create', null);
}
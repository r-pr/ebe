<?php

require_once('config.php');
require_once('db-layer/' . Config::$dbEngine . '-db-layer.php');

$dbLayer = new DbLayer();

if (!isset($_GET['pid'])) {
    App::statusCat(400);
} else {
    $post = $dbLayer->getPostById($_GET['pid']);
    if (is_null($post)) {
        App::statusCat(404);
    } else {
        App::renderView('view-post', 'View Post', $post);
    }
}

<?php

require_once('config.php');
require_once('db-layer/' . Config::$dbEngine . '-db-layer.php');

$dbLayer = new DbLayer();

App::renderView('view-all-posts', 'All Posts', $dbLayer->getPosts());

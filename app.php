<?php

require_once('./config.php');

class App {
    public static function start() {
        if (!isset($_GET['action'])){
            require_once('./controllers/viewall.php');
            return;
        }
        $controllerPath = 'controllers/' . $_GET['action'] . '-controller.php';
        if (!file_exists($controllerPath)) {
            return self::statusCat(404);
        }
        require_once($controllerPath);
    }

    public static function statusCat($httpCode) {
        echo "<body style=\"background-color: black; text-align: center\">
            <img src=\"https://http.cat/$httpCode\"/>
        </body>";
    }

    public static function renderView(string $viewName, string $pageTitle, 
        $viewBag
    ) {
        echo "<html>
            <head>
                <title>" . Config::$siteTitle . " - " . $pageTitle . "
                </title>
            </head>
        <body>";
        require_once('views/' . $viewName . '.php');
        echo '</body></html>';
    }
}

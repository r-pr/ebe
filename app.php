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
            return self::notFound();
        }
        require_once($controllerPath);
    }

    private static function notFound() {
        echo "<body style=\"background-color: black; text-align: center\">
            <img src=\"https://http.cat/404\"/>
        </body>";
    }

    public static function renderView(string $viewName, string $pageTitle) {
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

<?php

require_once('./config.php');

class App {
    public static function start() {
        if (!isset($_GET['action'])){
            require_once('./controllers/viewall-controller.php');
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

    public static function renderView($viewName, $pageTitle, 
        $viewBag
    ) {
        echo "<html>
            <head>
                <title>" . Config::$siteTitle . " - " . $pageTitle . "
                </title>
                <link rel=\"stylesheet\" href=\"themes/" . Config::$theme . ".css\"
            </head>
        <body>";
        require_once('views/_header.php');
        echo " <div class='ebe-content'>";
        require_once('views/' . $viewName . '.php');
        echo '</div></body></html>';
    }
}

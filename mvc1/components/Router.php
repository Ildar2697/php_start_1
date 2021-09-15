<?php 



class Router {
    private $routes;   // хранит маршруты

    public function __construct() {
        $routesPath = ROOT.'/config/routes.php';   // читает маршруты
        $this->routes = include($routesPath);
    }
    public function run() {   // метод передачи управления контроллеру
        // print_r($this->routes);

        if (!empty($_SERVER['REQUEST_URI'])) {
            $uri = trim($_SERVER['REQUEST_URI'], '/');
            echo 'empty';
        } else {
            echo 'not empty<br>';
            echo $uri;
        }
    }
}



?>
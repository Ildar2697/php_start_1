<?php 



class Router {
    private $routes;   // хранит маршруты

    public function __construct() {
        $routesPath = ROOT.'/config/routes.php';   // читает маршруты
        $this->routes = include($routesPath);
    }

    private function getURI() { // возвращает запрос
        if ($_SERVER['REQUEST_URI'] != '/')
        return trim($_SERVER['REQUEST_URI'], '/');
    }

    public function run() {   // метод передачи управления контроллеру
        $uri = $this->getURI();
        // echo $uri;

        foreach($this->routes as $uriPattern => $path) {  // определяем какой контроллер и action
            // preg_match("~$uriPattern~", $uri)
            // $uriPattern == $uri
            if (preg_match("~$uriPattern~", $uri)) {

                // echo "Users query(uri): $uri<hr>";
                // echo "Want to find(uriPattern): $uriPattern<hr>";
                // echo "Proccess processed by(path) $path<hr>";

                $internalRoute = preg_replace("~$uriPattern~", $path, $uri); // внутренний маршрут

                // echo "Internal route: $internalRoute<hr>";


                // $segments = explode('/', $path);
                $segments = explode('/', $internalRoute); // изменили второй параметр функции explode

                $controllerName = array_shift($segments).'Controller';
                $controllerName = ucfirst($controllerName);

                $actionName = 'action'.ucfirst(array_shift($segments));
                //----------------------------//

                $parameters = $segments;

                // echo "<pre>";
                // print_r($parameters);
                // echo "</pre>";

                $controllerFile = ROOT.'/controllers/'.$controllerName.'.php'; // подключаем файл класса контроллер

                if (file_exists($controllerFile)) {
                    include_once($controllerFile);
                }

                $controllerObject = new $controllerName;

                // $result = $controllerObject->$actionName($parameters);
                $result = call_user_func_array(array($controllerObject, $actionName), $parameters);
                if ($result != null) {
                    break;
                }
            }
        }
    }
}




?>
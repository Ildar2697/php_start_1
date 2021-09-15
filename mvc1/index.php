<?php

    ini_set('display_errors', 1);
    error_reporting(E_ALL);

    define('ROOT', dirname(__FILE__));    
    require_once(ROOT.'/components/Router.php');   // подключение роутера

    // echo dirname(__FILE__);

    $new = new Router();

    $new->run();

    echo '<pre>';
    print_r($_SERVER);
    echo '</pre>';



?>
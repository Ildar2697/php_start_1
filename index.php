<?php


    // $string = 'Today is 21-11-2015';
    // $pattern = '/([0-9]{2})-([0-9]{2})-([0-9]{4})/';
    // $replacement = 'year $3, month $2, day $1';

    // $result = preg_replace($pattern, $replacement, $string);

    // echo $result."<br>";

    







    ini_set('display_errors', 1);
    error_reporting(E_ALL);

    define('ROOT', dirname(__FILE__));    
    require_once(ROOT.'/components/Router.php');   // подключение роутера
    require_once(ROOT.'/components/Db.php');

    $new = new Router();
    $new->run();

    // echo '<pre>';
    // print_r($_SERVER);
    // echo '</pre>';


?>
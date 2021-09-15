<?php

include_once ROOT.'/models/News.php';

class NewsController {

    // public $test1;
    // public $test2;


    // public function __construct() {
    //     $this->test1 = '12345';
    //     $this->test2 = '54321';
    // }


    public function actionIndex() {
        // echo 'News List';
        $newsList = array();
        $newsList = News::getNewsList();

        // echo "<pre>";
        // print_r($newsList);
        // echo "</pre>";

        require_once(ROOT.'/views/news/index.php');

        return true;
    }
    // public function actionArchive() {
    //     echo 'Hello from actionArticle method NewsController class';
    //     return true;
    // }
    public function actionView($id) {

        if ($id) {
            $newsItem = News::getNewsItemByID($id);
            echo "<pre>";
            print_r($newsItem);
            echo "</pre>";
            require_once(ROOT.'/views/news/view.php');
        }

        // echo 'News';
        // echo $category."<br>";
        // echo $id."<br>";


        return true;
    }


}
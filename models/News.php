<?php 


class News {

    public static function getNewsItemByID($id) {
        $id = intval($id);

        if ($id) {
            // $host = 'localhost';
            // $dbname = 'testdb';
            // $user = 'root';
            // $password = '';
            // $db = new PDO("mysql:host=$host;dbname=$dbname", $user, $password);
            $db = Db::getConnection();

            $result = $db->query('SELECT * FROM publications WHERE id = '.$id);
            $result->setFetchMode(PDO::FETCH_ASSOC);

            $newsItem = $result->fetch();
            return $newsItem;
        }
    }

    public static function getNewsList() {

        $db = Db::getConnection();

        $newsList = array();

        $result = $db->query('SELECT * FROM publications ORDER BY date DESC LIMIT 10');
        $result->setFetchMode(PDO::FETCH_ASSOC);

        $i = 0;
        while($row = $result->fetch()) {
            $newsList[$i]['id'] = $row['id'];
            $newsList[$i]['title'] = $row['title'];
            $newsList[$i]['date'] = $row['date'];
            $newsList[$i]['author_name'] = $row['author_name'];
            $newsList[$i]['short_content'] = $row['short_content'];
            $i++;
        }
        return $newsList;



        // $host = 'localhost';
        // $dbname = 'testdb';
        // $user = 'root';
        // $password = '';
        // $db = new PDO("mysql:host=$host;dbname=$dbname", $user, $password);

        // $newsList = array();
        // $result = $db->query('SELECT id, title, date, short_content FROM publications ORDER BY date DESC LIMIT 10');

        // $i = 0;
        // while($row = $result->fetch()) {
        //     $newsList[$i]['id'] = $row['id'];
        //     $newsList[$i]['title'] = $row['title'];
        //     $newsList[$i]['date'] = $row['date'];
        //     $newsList[$i]['short_content'] = $row['short_content'];
        //     $i++;
        // }
        // return $newsList;

    }



}






?>
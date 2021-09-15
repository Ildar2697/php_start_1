<?php

return array(  //  возвращает маршруты
    'products' => 'product/list',
    'article' => 'article/list',
    'news/archive' => 'news/archive',
    // 'news/1997' => 'news/view',
    // 'news/2001' => 'news/view',
    'news/([0-9]+)' => 'news/view/$1',

    // 'news/([0-9]+)' => 'news/view',
    // 'news/([a-z]+)/([0-9]+)' => 'news/view/$1/$2',
    'news' => 'news/index',
);







?>
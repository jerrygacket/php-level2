<?php

class Controller
{
    public $view = 'admin';
    public $title;
    public $description;
    public $longtitle;

    function __construct($pageName = 'index')
    {
        $pageInfo = Page::getPageInfo($pageName);
        $this->title = Config::get('site')['name'].' | '.$pageInfo['title'];
        $this->longtitle = $pageInfo['title'];
        $this->description = $pageInfo['description'];
    }

    public function index($data) {
        return [];
    }

    public function getPageInfo() {
        return [
            'title' => $this->title, // идет в метатэг <title>
            'longtitle' => $this->longtitle, // идет в h1 на странице
            'description' => $this->description,
        ];
    }
}
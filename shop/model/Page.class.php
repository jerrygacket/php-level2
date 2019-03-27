<?php

class Page extends Model {
    protected static $table = 'pages';
    
    protected static function setProperties()
    {
        self::$properties['name'] = [
            'type' => 'varchar',
            'size' => 512
        ];

        self::$properties['url'] = [
            'type' => 'varchar',
            'size' => 512
        ];
    }

    public static function getPageInfo($name = 'index') {
        return db::getInstance()->Select(
            self::$table,
            ['title', 'description'],
            ['name' => $name]);
    }
}
<?php

class Good extends Model {
    protected static $table = 'goods';

    protected static function setProperties()
    {
        self::$properties['name'] = [
            'type' => 'varchar',
            'size' => 512
        ];

        self::$properties['price'] = [
            'type' => 'float'
        ];

        self::$properties['description'] = [
            'type' => 'text'
        ];

        self::$properties['category'] = [
            'type' => 'int'
        ];
    }

    public static function getGoods($categoryId)
    {
        return db::getInstance()->Select(
            'goods',
            ['id', 'id_category', '`name`', 'price'],
            ['status' => Status::Active, 'id_category' => $categoryId]);
    }
}
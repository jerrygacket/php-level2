<?php

class Category extends Model {
    protected static $table = 'categories';

    protected static function setProperties()
    {
        self::$properties['name'] = [
            'type' => 'varchar',
            'size' => 512
        ];

        self::$properties['parent_id'] = [
            'type' => 'int',
        ];
    }

    public static function getCategories($parentId = 0)
    {
        return db::getInstance()->Select(
            self::$table,
            ['id', 'name'],
            ['status' => Status::Active, 'parent_id' => $parentId]
        );

    }
}
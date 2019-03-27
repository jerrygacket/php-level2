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

    public static function getMany($id = 0) {
        $where = $id == 0 ? [] : ['id' => $id , 'status' => Status::Active];
        return db::getInstance()->SelectMany(
            self::$table,
            [],
            $where);
    }

    public static function getOne($id) {
        $sql = 'SELECT goods.*,fabric.name as fabric,paint.name as paint FROM goods join fabric on fabric.id=goods.fabricid join paint on paint.id=goods.paintid WHERE goods.id='.$id;
        $result = db::getInstance()->Query($sql);

        return $result;
    }

    public static function getPrice($id) {
        $sql = 'SELECT price FROM goods WHERE goods.id='.$id;
        $result = db::getInstance()->Query($sql);

        return $result['price'];
    }
}
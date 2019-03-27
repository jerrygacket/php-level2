<?php

class Order extends Model {
    protected static $table = 'orders';

    protected static function setProperties()
    {
        self::$properties['phone'] = [
            'type' => 'varchar',
            'size' => 512
        ];

        self::$properties['address'] = [
            'type' => 'varchar',
            'size' => 512
        ];

        self::$properties['email'] = [
            'type' => 'float'
        ];
    }

    public static function getOrders($userId = 0) {
        $where = ['id_user' => $userId];
        $userId == 0 ?
            $orders = db::getInstance()->Select('orders') :
            $orders = db::getInstance()->Select('orders',[],$where);

        return $orders;
    }

    public static function changeStatus($orderId, $newStatus) {
        return db::getInstance()->Update(
            'orders', ['status' => $newStatus], ['id' => $orderId]);
    }
}
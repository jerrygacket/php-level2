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

    public static function getOrders($orderId = 0) {
        $where = [];
        if ($orderId > 0) {
            $where = ['id' => $orderId];
        }
        $orders = db::getInstance()->Select(
            'orders',[],$where);
        return $orders;
    }

    public static function changeStatus($orderId, $newStatus) {
        return db::getInstance()->Update(
            'orders', ['status' => $newStatus], ['id' => $orderId]);
    }
}
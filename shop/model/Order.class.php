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
        if ($userId == 0) {
            $sql = 'SELECT orders.id as order_id,order_status.status,order_products.*,goods.name FROM orders join order_status on order_status.id=orders.status join order_products on order_products.order_id=orders.id join goods on goods.id=order_products.product_id ORDER BY created_at DESC';
        } else {
            $sql = 'SELECT orders.*,order_status.status,order_products.*,goods.name FROM orders join order_status on order_status.id=orders.status join order_products on order_products.order_id=orders.id join goods on goods.id=order_products.product_id WHERE orders.id_user='.$userId.'  ORDER BY created_at DESC';
        }

        $result = db::getInstance()->QueryAll($sql);
        $orders =[];
        foreach ($result as $item) {
            $orders[$item['order_id']]['goods'][$item['product_id']]['name'] = $item['name'];
            $orders[$item['order_id']]['goods'][$item['product_id']]['count'] = $item['product_count'];
            $orders[$item['order_id']]['goods'][$item['product_id']]['price'] = $item['product_price'];
            $orders[$item['order_id']]['goods'][$item['product_id']]['cost'] = $item['product_count'] * $item['product_price'];
            $orders[$item['order_id']]['cost'] = ($orders[$item['id']]['cost'] ?? 0) + $item['product_count'] * $item['product_price'];
            $orders[$item['order_id']]['status'] = $item['status'];
        }

        return $orders;
    }

    public static function changeStatus($orderId, $newStatus) {
        return db::getInstance()->Update(
            'orders', ['status' => $newStatus], ['id' => $orderId]);
    }

    public static function getStatus($orderId) {
        $sql = 'SELECT order_status.status FROM orders join order_status on order_status.id=orders.status WHERE orders.id='.$orderId;
        $result = db::getInstance()->Query($sql);

        return $result['status'];
    }

    public static function newOrder($userInfo,$comment) {
        $result = [];
        $result['newUser'] = false;

        $where = ['user_email' => $userInfo['user_email']];
        $user = db::getInstance()->Select('shop_users',[],$where);

        if (!$user) {
            $user = User::newUser($userInfo);
            $result['newUser'] = true;
        }
        $result['user'] = $user;

        $orderInfo = [
            'created_at' => date('Y-m-d\TH:i:s'),
            'id_user' => $user['id_user'],
            'status' => 1, // new order status
            'phone' => $userInfo['user_phone'],
            'address' => $userInfo['user_address'],
            'email' => $userInfo['user_email'],
            'comment' => $comment,
        ];
        $newId = db::getInstance()->Insert(
            'orders',
            $orderInfo);
        $result['newOrderId'] = $newId;

        return $result;
    }

    public static function addGoods($orderId, $cart) {
        $cost = 0;
        foreach ($cart as $goodId => $goodCount) {
            $productInfo = [
                'order_id' => $orderId,
                'product_id' => $goodId,
                'product_count' => $goodCount,
                'product_price' => Good::getPrice($goodId),
            ];
            db::getInstance()->Insert('order_products', $productInfo);
            $cost += $productInfo['product_count'] * $productInfo['product_price'];
        }

        return $cost;
    }
}
<?php

class Cart extends Model {
    protected static $table = 'user_cart';

    public static function addToCart($id,$count) {
        $_SESSION['cart'][$id] = ($_SESSION['cart'][$id] ?? 0) + $count;

        return self::getMiniCart();
    }

    public static function getMiniCart() {
        if (!isset($_SESSION['cart'])) {
            return 0;
        }

        return array_sum($_SESSION['cart']);
    }

    public static function getCart() {
        $result = [];
        $totalCount = 0;
        $totalCost = 0;
        if (isset($_SESSION['cart'])) {
            foreach ($_SESSION['cart'] as $goodId => $goodCount) {
                $goodInfo = Good::getOne($goodId);
                $result['goods'][$goodId] = $goodInfo;
                $result['goods'][$goodId]['count'] = $goodCount;
                $result['goods'][$goodId]['cost'] = $goodCount * $goodInfo['price'];
                $totalCount += $goodCount;
                $totalCost += $result['goods'][$goodId]['cost'];
            }
        }

        $result['cost'] = $totalCost;
        $result['count'] = $totalCount;

        return $result;
    }

    public static function removeFromCart($id) {
        if (isset($_SESSION['cart'][$id])) {
            unset($_SESSION['cart'][$id]);
            return true;
        }

        return false;
    }

    public static function clearCart() {
        if (isset($_SESSION['cart'])) {
            unset($_SESSION['cart']);
            return true;
        }

        return false;
    }

    public static function createOrder($data) {
        if (!isset($_SESSION['cart']) || count($_SESSION['cart']) == 0) {
            return false;
        }

        $userInfo['user_name'] = $data['name'];
        $userInfo['user_login'] = $data['email'];
        $userInfo['user_address'] = $data['address'];
        $userInfo['user_email'] = $data['email'];
        $userInfo['user_phone'] = $data['phone'];

        $newOrder = Order::newOrder($userInfo,$data['comment']);
        if (!$newOrder['newOrderId']) {
            return false;
        }

        $newOrder['cost'] = Order::addGoods($newOrder['newOrderId'],$_SESSION['cart']);

        return $newOrder;
    }
}
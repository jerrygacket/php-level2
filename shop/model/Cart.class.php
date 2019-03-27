<?php

class Cart extends Model {
    protected static $table = 'user_cart';

    public static function addToCart($id,$count) {
        $_SESSION['cart'][$id] = ($_SESSION['cart'][$id] ?? 0) + $count;

        return $_SESSION['cart'];
    }

    public static function getMiniCart() {
        if (!isset($_SESSION['cart'])) {
            return 0;
        }
        $result = 0;
        foreach ($_SESSION['cart'] as $goodCount) {
            $result += $goodCount;
        }

        return $result;
    }

    public static function getCart() {
        if (!isset($_SESSION['cart'])) {
            return [];
        }
        $result = [];
        $totalCount = 0;
        $totalCost = 0;
        foreach ($_SESSION['cart'] as $goodId => $goodCount) {
            $goodInfo = Good::getOne($goodId);
            $result['goods'][$goodId] = $goodInfo;
            $result['goods'][$goodId]['count'] = $goodCount;
            $result['goods'][$goodId]['cost'] = $goodCount * $goodInfo['price'];
            $totalCount += $goodCount;
            $totalCost += $result['goods'][$goodId]['cost'];
        }

        $result['cost'] = $totalCost;
        $result['count'] = $totalCount;

        return $result;
    }
}
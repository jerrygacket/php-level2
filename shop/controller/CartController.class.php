<?php
class CartController extends Controller
{

    public $view = 'cart';

    public function index($data) {
        return [
            'cart' => Cart::getCart(),
            'user' => User::getUserInfo(),
        ];
    }

    public function add($data) {
        return [
            'cart_count' => Cart::addToCart($data['id'], $data['count']),
        ];
    }

    public function del($data) {
        Cart::removeFromCart($data['id']);
        return [
            'cart_count' => Cart::getCart()['count'],
            'cart_cost' => Cart::getCart()['cost'],
        ];
    }

    public function set($data) {
        $this->del($data);
        return [
            'cart_count' => Cart::addToCart($data['id'], $data['count']),
            'cart_cost' => Cart::getCart()['cost'],
        ];
    }

    public function newOrder($data) {
        $result = [];
        $result['newView'] = 'index';
        $result['newOrder'] = Cart::createOrder($_POST);
        if (!$result['newOrder']) {
            $result['error'] = 'Ошибка создания заказа';
            return $result;
        }

        Cart::clearCart();

        return $result;
    }
}
?>
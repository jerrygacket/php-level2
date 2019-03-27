<?php
class CartController extends Controller
{

    public $view = 'cart';

    public function index($data)
    {
        $cartGoods = Cart::getCart();

        return ['cart' => $cartGoods];
    }

    public function add($data)
    {
        return Cart::addToCart($data['id'], $data['count']);
    }

    public function del($data)
    {
        if (Order::changeStatus($data['id'], 4)) {
            return Order::getOrders($data['id']);
        }

        return false;
    }
}
?>
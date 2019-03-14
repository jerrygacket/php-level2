<?php
class OrderController extends Controller
{

    public $view = 'categories';

    public function index($data)
    {
        return ['no action'];
    }

    public function pay($data)
    {
        if (Order::changeStatus($data['id'], 2)) {
            return Order::getOrders($data['id']);
        }

        return false;
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
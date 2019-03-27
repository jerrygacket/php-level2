<?php
class GoodsController extends Controller
{

    public $view = 'goods';

    public function index($data)
    {
        $goods = Good::getOne(isset($data['id']) ? $data['id'] : 0);
        return ['oneItem' => $goods];
    }
}
?>
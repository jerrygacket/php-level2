<?php

class IndexController extends Controller
{
    public $view = 'index';

    public function index($data)
    {
        $goods = Good::getMany(isset($data['id']) ? $data['id'] : 0);

        return ['goods' => $goods];
    }
}
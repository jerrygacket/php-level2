<?php
class TestController extends Controller
{
    
    protected $controls = [
        'pages' => 'Page',
        'orders' => 'Order',
        'catalog' => 'Category',
        'goods' => 'Good'
    ];

    public $title = 'test';
    
    public function index($data)
    {
        $id = (User::alreadyLoggedIn()['id'] ?? 0);
        if (User::isAdmin($id)) {
            return TestModel::Run();
        }

        header('Location: /');
    }
}
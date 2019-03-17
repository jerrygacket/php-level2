<?php
class UserController extends Controller
{
    
    protected $controls = [
        'orders' => 'Order',
    ];

    public $title;
    public $view = 'user';

    function __construct()
    {
        parent::__construct();
        $this->title .= ' | Пользователь';
    }
    
    public function index($data) {
        $result = [];
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            if (User::authWithCredentials()) {
                $result = [
                    'controls' => $this->controls,
                    'id' => $_SESSION['user']['id_user'],
                ];
            } else {
                header('Location: /user/?action=login');
            }
        } elseif (User::alreadyLoggedIn()) {
            $result['orders'] = Order::getOrders();
        } else {
            header('Location: /user/?action=login');
        }

        return $result;
    }

    public function logout($data){
        if (User::alreadyLoggedIn()) {
            User::logOut();
        }

        return [];
    }

    public function login($data) {

    }
}
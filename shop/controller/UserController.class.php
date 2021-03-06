<?php
class UserController extends Controller
{
    
    protected $controls = [
        'orders' => 'Order',
    ];

    public $view = 'user';
    
    public function index($data) {
        $result = [];
        if ($id = User::alreadyLoggedIn()['id']) {
            User::isAdmin($id) ?
                $result['orders'] = Order::getOrders() :
                $result['orders'] = Order::getOrders($id);
        } else {
            $result['newView'] = 'login';
        }

        return $result;
    }

    public function logout($data){
        if (User::alreadyLoggedIn()) {
            User::logOut();
        }

        return ['newView' => 'login'];
    }

    public function login($data) {
        $result = [];
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            if (!User::authWithCredentials()) {
                $result['authError'] = 'Неверный логин или пароль';
            }
        }
        if (User::alreadyLoggedIn()) {
            $result['orders'] = Order::getOrders();
            $result['newView'] = 'index';
        }

        return $result;
    }

    public function register($data) {
        $result = [];
        $result['newView'] = 'login';
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            if (!User::register()) {
                $result['regError'] = 'Недопустимое имя пользователя и/или пароль';
            } elseif (User::authWithCredentials($_POST['reglogin'], $_POST['regpassword'])) {
                $result['orders'] = Order::getOrders();
                $result['newView'] = 'index';
            }
        }

        return $result;
    }
}
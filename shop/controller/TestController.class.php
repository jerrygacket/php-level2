<?php
class TestController extends Controller
{

    public $view = 'test';
    
    public function index($data)
    {
        $id = (User::alreadyLoggedIn()['id'] ?? 0);
        if (User::isAdmin($id)) {
            return Tests::Run();
        } else {
            header('Location: /');
        }
    }
}
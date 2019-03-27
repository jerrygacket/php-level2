<?php

class User extends Model {
    protected static $table = 'shop_users';

    protected static function setProperties()
    {
        self::$properties['user_name'] = [
            'type' => 'varchar',
            'size' => 512
        ];

        self::$properties['user_login'] = [
            'type' => 'varchar',
            'size' => 512
        ];

        self::$properties['user_password'] = [
            'type' => 'varchar',
            'size' => 512
        ];
    }

    public static function alreadyLoggedIn() {
        $result = false;
        if (isset($_SESSION['user'])) {
            $result = [
                'id' => $_SESSION['user']['id_user'],
            ];
        }

        return $result;
    }

    public static function logOut() {
        setcookie("id_user", "", time() - 3600 * 24 * 30 * 12, "/");
        setcookie("cookie_hash", "", time() - 3600 * 24 * 30 * 12, "/");
        unset($_SESSION["user"]);
        session_destroy();
        header('Location: /user/?action=login');
    }

    /**
     * валидация пользовательского куки
     * @return bool
     */
    public static function checkAuthWithCookie()
    {
        if (!isset($_COOKIE['id_user']) || !isset($_COOKIE['cookie_hash'])) {
            return false;
        }
        // получаем данные пользователя по id
        $user_data = db::getInstance()->Select(
            'shop_users',
            ['id_user', 'user_name', 'user_password'],
            ['user_id' => $_COOKIE['id_user']]);

        if (($user_data['user_password'] == $_COOKIE['cookie_hash'])
            && ($user_data['id_user'] == $_COOKIE['id_user'])
        ) {
            return true;
        }
        setcookie("id_user", "", time() - 3600 * 24 * 30 * 12, "/");
        setcookie("cookie_hash", "", time() - 3600 * 24 * 30 * 12, "/");
        setcookie("user_name", "", time() - 3600 * 24 * 30 * 12, "/");

        return false;
    }

    /**
     * авторизация через логин и пароль
     */
    public static function authWithCredentials($login = '', $pass = '') {
        $username = $login != '' ? $login : trim($_POST['login']);
        $password = $pass != '' ? $pass : trim($_POST['password']);

        // получаем данные пользователя по логину
        $user_data = db::getInstance()->Select(
            'shop_users',
            ['id_user', 'user_name','user_password'],
            ['user_login' => $username]);
        // проверяем соответствие логина и пароля
        if ($user_data) {
            if (password_verify($password,$user_data['user_password'])) {
//            if ($password == $user_data['user_password']) {
                // если стояла галка, то запоминаем пользователя на сутки
                if (isset($_POST['rememberme']) && $_POST['rememberme'] == 'on') {
                    setcookie("id_user", $user_data['id_user'], time() + 86400);
                    setcookie("cookie_hash", $user_data['user_password'], time() + 86400);
                    setcookie("user_name", "", time() - 3600 * 24 * 30 * 12, "/");
                }

                $_SESSION['user'] = $user_data;
                return true;
            }
        }
        return false;
    }

    public static function getUserInfo() {
        $result = [];
        if (self::alreadyLoggedIn()) {
            $user_data = db::getInstance()->Select(
                'shop_users',
                ['user_name','user_email','user_address','user_phone'],
                ['id_user' => $_SESSION['user']['id_user']]);
            $result = [
                'user_name' => $user_data['user_name'],
                'user_email' => $user_data['user_email'],
                'user_address' => $user_data['user_address'],
                'user_phone' => $user_data['user_phone'],
            ];
        }

        return $result;
    }

    public static function checkLogin() {
        if (self::alreadyLoggedIn()) {
            $result = [
                'login' => true,
                'text' => 'Выход ('.$_SESSION['user']['user_name'].')',
                'link' => 'logout'
            ];
        } else {
            $result = [
                'login' => false,
                'text' => 'Вход',
                'link' => 'login',
            ];
        }

        return $result;
    }

    public static function exists($userLogin = '') {
        // получаем данные пользователя по логину
        $user_data = db::getInstance()->Select(
            'shop_users',
            ['id_user', 'user_name', 'user_password'],
            ['user_login' => $userLogin]);

        return !empty($user_data);
    }

    public static function register() {
        if (self::exists($_POST['reglogin'])) {
            return false;
        }

        $userInfo = [
            'user_login' => trim($_POST['reglogin']),
            'user_name' => trim($_POST['regname']),
            'user_password' => trim($_POST['regpassword'])
        ];

        return self::insertUser($userInfo);
    }

    public static function isAdmin($id) {
        $sql = 'SELECT role.name FROM role join user_role on user_role.id_role=role.id WHERE user_role.id_user='.$id;
        $result = db::getInstance()->Query($sql);

        return $result['name'] == 'admin';
    }

    public static function newUser($userInfo) {
        if (isset($userInfo['user_login']) && !empty($userInfo['user_login']) && self::exists($userInfo['user_login'])) {
            return false;
        }
        if (empty($userInfo['user_password'])) {
            $userInfo['user_password'] = self::generatePassword(6);
        }

        return [
            'id_user' => self::insertUser($userInfo),
            'user_password' => $userInfo['user_password'],
            'user_login' => $userInfo['user_login'],
        ];
    }

    private static function insertUser($userInfo) {
        if (self::exists($userInfo['user_name'])) {
            return false;
        }

        $userInfo['user_password'] = password_hash(trim($userInfo['user_password']), PASSWORD_DEFAULT);
        $newId = db::getInstance()->Insert(
            'shop_users',
            $userInfo);
        if ($newId) {
            db::getInstance()->Insert(
                'user_role',
                ['id_user' => (int) $newId, 'id_role' => 2]);
        }

        return $newId;
    }

    private static function generatePassword($length = 8) {
        $chars = 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789';
        $count = mb_strlen($chars);

        for ($i = 0, $result = ''; $i < $length; $i++) {
            $index = rand(0, $count - 1);
            $result .= mb_substr($chars, $index, 1);
        }

        return $result;
    }
}
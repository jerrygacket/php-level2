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

        return false;
    }

    /**
     * авторизация через логин и пароль
     */
    public static function authWithCredentials() {
        $username = trim($_POST['login']);
        $password = trim($_POST['password']);

        // получаем данные пользователя по логину
        $user_data = db::getInstance()->Select(
            'shop_users',
            ['id_user', 'user_name', 'user_password'],
            ['user_login' => $username]);
        // проверяем соответствие логина и пароля
        if ($user_data) {
//            if (password_verify($password,$user_data['user_password'])) {
            if ($password == $user_data['user_password']) {
                // если стояла галка, то запоминаем пользователя на сутки
                if (isset($_POST['rememberme']) && $_POST['rememberme'] == 'on') {
                    setcookie("id_user", $user_data['id_user'], time() + 86400);
                    setcookie("cookie_hash", $user_data['user_password'], time() + 86400);
                }

                $_SESSION['user'] = $user_data;
                return true;
            }
        }
        return false;
    }
}
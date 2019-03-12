<?php

class App 
{
    public static function Init()
    {
        date_default_timezone_set('Europe/Moscow');
        db::getInstance()->Connect(Config::get('db_user'), Config::get('db_password'), Config::get('db_base'));

        if (php_sapi_name() !== 'cli' && isset($_SERVER) && isset($_GET)) {
            self::web(isset($_GET['path']) ? $_GET['path'] : '');
        }
    }

    protected static function web($url)
    {
        $url = explode("/", $url);
        // заменил isset($url[0]) на !empty($url[0])
        // т.к. explode возвращает Array ( [0] => ) при пустом $url
        // и isset($url[0]) всегда true
        if (!empty($url[0])) {
            $_GET['page'] = $url[0];
            if (isset($url[1])) {
                if (is_numeric($url[1])) {
                    $_GET['id'] = $url[1];
                } else {
                    $_GET['action'] = $url[1];
                }
                if (isset($url[2])) {
                    $_GET['id'] = $url[2];
                }
            }
        }
        else{
            $_GET['page'] = 'Index';
        }
        if (isset($_GET['page'])) {
            self::setNewPage();
            $controllerName = ucfirst($_GET['page']) . 'Controller';
            $methodName = isset($_GET['action']) ? $_GET['action'] : 'index';
            $controller = new $controllerName();
            $data = [
                'content_data' => $controller->$methodName($_GET),
                'title' => $controller->title,
                'categories' => Category::getCategories(0),
                'login' => User::alreadyLoggedIn(),
                'pages' => self::getPages(),
            ];
            $view = $controller->view . '/' . $methodName . '.html';
            if (!isset($_GET['asAjax'])) {
                $loader = new \Twig\Loader\FilesystemLoader(Config::get('path_templates'));
                $twig = new \Twig\Environment($loader);
                $template = $twig->loadTemplate($view);
                echo $template->render($data);
            } else {
                echo json_encode($data);
            }
        }
    }

    private static function setNewPage() {
        if (!isset($_SESSION['user'])) {
            return;
        }
        $pages = $_SESSION['user']['pages'] ?? [];
        if (count($pages) > 5) {
            array_shift($pages);
        }
        $pages[] = $_GET['path'].'/?'.http_build_query($_GET);

        $_SESSION['user']['pages'] = $pages;
    }

    private static function getPages() {
        return $_SESSION['user']['pages'] ?? [];
    }
}
<?php

class App
{
    public static function Init()
    {
        date_default_timezone_set('Europe/Moscow');
        //db::getInstance()->Connect(Config::get('db_user'), Config::get('db_password'), Config::get('db_base'));
        if (isset($_POST['asAjax']) && $_POST['asAjax']) {
            $controllerName = ucfirst($_POST['element']) . 'Controller';
            $methodName = isset($_POST['action']) ? $_POST['action'] : 'index';
            $controller = new $controllerName();
            echo json_encode(['result' => $controller->$methodName($_POST)]);
            return true;
        }

        if (php_sapi_name() !== 'cli' && isset($_SERVER) && isset($_GET)) {
            self::web(isset($_GET['path']) ? $_GET['path'] : '');
        }
    }

    protected static function web($url)
    {
        $url = explode("/", $url);
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
            $controller = new $controllerName(strtolower($_GET['page']));
            $data = [
                'content_data' => $controller->$methodName($_GET),
                'page' => $controller->getPageInfo(),
                'login' => User::checkLogin(),
                'pages' => self::getPages(),
                'site' => Config::get('site'),
                'goods_count' => Cart::getMiniCart(),
            ];
            if (isset($data['content_data']['newView'])) {
                $view = $controller->view . '/' . $data['content_data']['newView'] . '.html';
            } else {
                $view = $controller->view . '/' . $methodName . '.html';
            }
            if (!isset($_GET['asAjax'])) {
                $loader = new \Twig\Loader\FilesystemLoader(Config::get('path_templates'));
                $twig = new \Twig\Environment($loader);
                $template = $twig->loadTemplate($view);
                echo $template->render($data);
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

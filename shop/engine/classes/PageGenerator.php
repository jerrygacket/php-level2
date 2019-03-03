<?php
/**
 * Created by PhpStorm.
 * User: user
 * Date: 02.03.19
 * Time: 23:20
 */
class PageGenerator extends BaseObj
{
    private $twig;

    public function __construct($uri = '') {
        parent::__construct($uri);

        // init twig
        $loader = new \Twig\Loader\FilesystemLoader(TPL_DIR);
        $this->twig = new \Twig\Environment($loader, [
            'cache' => (CACHE_DIR ?? 'cache'),
        ]);
    }

    public function buildPage() {
        if (!isset($this->twig) || empty($this->twig)) {
            $this->writeLog('Не инициализирован шаблонизатор.');
            return false;
        }

        $variables = $this->getPageVariables();
        ob_start();
        try {
            echo $this->twig->render('head.tpl', $variables);
            echo $this->twig->render('menu.tpl', $variables);
            echo $this->twig->render('header.tpl', $variables);
            echo $this->twig->render($variables['page']['name'] . '.tpl', $variables);
            echo $this->twig->render('footer.tpl', $variables);
        } catch (Exception $e) {
            $this->writeLog($e);
        }

        return ob_get_clean();
    }

    private function getPageVariables() {
        $pageName = $this->getPageName();
        $itemId = $this->getItemIndex();

        // задаем основные переменные
        $vars['site'] = [
            'root' => SITE_URL,
            'name' => SITE_NAME,
        ];
        $vars['page'] = [
            'name' => RESOURCES[$pageName]['name'] ?? 'index',
            'title' => RESOURCES[$pageName]['title'] ?? '404',
            'description' => RESOURCES[$pageName]['description'] ?? '',
        ];

        if (empty(RESOURCES[$pageName])) {
            return $vars;
        }

        // если есть подчиненные ресурсы (картинки, товары), собираем все и один по ид если есть
        $itemsTable = RESOURCES[$pageName]['itemsTable'] ?? '';
        $vars['items'] = $this->getItems($itemsTable);
        // разрешаем вывод вормы добавления сущности
//        $vars['form'] = true;

        if (!is_null($itemId)) {
            $vars['items'] = [];
//            $vars['form'] = false;
            $vars['oneItem'] = $this->getItem($itemId,$itemsTable);
        }

        return $vars;
    }

    private function getItem($itemId,$itemsTable) {
        $sql = 'SELECT * FROM ' . $itemsTable . ' WHERE id = '.$itemId;
        $response = $this->queryDb($sql, $itemsTable);

        $result = [];
        if(isset($response[0])) {
            $result = $response[0];

            if (isset($result['views'])) {
                $result['views']++;
                $sql = 'UPDATE ' . $itemsTable . ' SET views = views + 1 WHERE id = '.$itemId;
                $this->writeToDb($sql, $itemsTable);
            }

        }

        return $result;
    }

    private function getItems($itemsTable) {
        $sql = 'SELECT * FROM ' . $itemsTable . ' ORDER BY views DESC';

        return $this->queryDb($sql, $itemsTable);
    }
}
<?php
/**
 * Created by PhpStorm.
 * User: user
 * Date: 05.03.19
 * Time: 22:49
 */

class EventProcessor extends BaseObj
{
    private $twig;

    public function __construct() {
        parent::__construct();

        // init twig
        $this->twig = TplGenerator::getTpl(TPL_DIR, CACHE_DIR);
    }

    private function getMoreGoods($firstIndex, $count = 1) {
        $sql = 'SELECT * FROM products WHERE id > '.$firstIndex . ' LIMIT ' . $count;
        $result = $this->queryDb($sql, 'products');
        if ($result) {
            $outRow = '';
            $page = ['name'=>'catalog'];
            foreach ($result as $good) {
                $outRow .= $this->twig->render('catalog.row.tpl',['item'=>$good, 'page' => $page]);
            }
            return $outRow;
        }

        return false;
    }

    public function doGetAction() {
        $action = $_GET['action'] ?? '';
        if(method_exists($this,$action)) {
            $result = $this->$action($_GET['id_product'], $_GET['quantity']);
            if ($result) {
                $response = ['result' => $result, 'action' => $action, 'lastIndex' => ($_GET['id_product'] + $_GET['quantity'])];
            } else {
                $response = [
                    'result' => 0,
                    'errorMessage' => 'ошибка работы с бд'
                ];
            }
        } else {
            $this->writeLog('нет такой функции ' . $action);
            $response = [
                'result' => 0,
                'errorMessage' => 'нет такой функции ' . $action
            ];
        }

        echo json_encode($response);
    }

//    public function doPostAction() {
//        $action = strtolower($_POST['action'] ?? '');
//        $id = (int) $_POST['id'];
//        $postFunction = $action . ucwords(strtolower($_POST['element'] ?? ''));
//        if (is_callable($postFunction)) {
//            if ($postFunction(sanitizeSQL($id))) {
//                $response = [
//                    'message' => ELEMENTS[strtolower($_POST['element'])] . ACTIONS[$action],
//                    'newstatus' => STATUSES[$action],
//                    'id' => $id,
//                ];
//            } else {
//                $response = [
//                    'errorMessage' => 'ошибка работы с сессионными куками'
//                ];
//            }
//        } else {
//            $response = [
//                'result' => 0,
//                'errorMessage' => 'нет такой функции ' . $action
//            ];
//        }
//        echo json_encode($response);
//    }
}
<?php
/**
 * Created by PhpStorm.
 * User: user
 * Date: 23.02.19
 * Time: 19:27
 */

require_once('../config/common.config.php');

if (isset($_GET['action'])) {
    $event = new EventProcessor;
    $event->doGetAction();
    exit;
}

//if (isset($_POST['action'])) {
//    EventProcessor::doPostAction();
//    exit;
//}

// read uri
$pageGenerator = new PageGenerator($_SERVER['REQUEST_URI']);

//$bo = new BaseObj();
//for ($i=15;$i<=1000;$i++) {
//    $sql = 'INSERT INTO `products` (`name`, `img`, `intro`, `description`, `price`, `article`) VALUES ("prod'.$i.'","img/path","some intro text", "description", 100, "001'.$i.'")';
//    print_r($bo->writeToDb($sql, 'products'));
//}
//exit;


echo $pageGenerator->buildPage();


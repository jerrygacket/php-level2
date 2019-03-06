<?php
/**
 * Created by PhpStorm.
 * User: user
 * Date: 23.02.19
 * Time: 19:27
 */

require_once('../config/common.config.php');

// read uri
$pageGenerator = new PageGenerator($_SERVER['REQUEST_URI']);

echo $pageGenerator->buildPage();


<?php

$ds = DIRECTORY_SEPARATOR;

define('SITE_ROOT', __DIR__  . $ds);
define('WWW_ROOT', SITE_ROOT . 'public');

define('DATA_DIR', SITE_ROOT . 'data');
define('LIB_DIR', SITE_ROOT . 'Classes');
define('TPL_DIR', SITE_ROOT . 'templates');

$classes = scandir(LIB_DIR);
foreach ($classes as $class) {
    strlen($class) > 3 ? require_once(LIB_DIR . $ds . $class) : '';
}
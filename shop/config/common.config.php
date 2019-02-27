<?php

$ds = DIRECTORY_SEPARATOR;

define('SITE_ROOT', '..' . $ds);
define('LIB_DIR', SITE_ROOT . 'engine');

define('WWW_ROOT', SITE_ROOT . 'public');
//define('TPL_DIR', SITE_ROOT . 'templates');
//define('DATA_DIR', SITE_ROOT . 'data');

define('LOG_FILE', SITE_ROOT . 'log' . $ds . 'logfile.log');

require_once ('db.config.php');

$traits = scandir(LIB_DIR . $ds . 'traits');
foreach ($traits as $trait) {
    strlen($trait) > 3 ? require_once(LIB_DIR . $ds . 'traits' . $ds . $trait) : '';
}

$classes = scandir(LIB_DIR . $ds . 'classes');
foreach ($classes as $class) {
    strlen($class) > 3 ? require_once(LIB_DIR . $ds . 'classes' . $ds . $class) : '';
}
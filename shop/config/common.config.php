<?php

$ds = DIRECTORY_SEPARATOR;

// site specific vars
define('SITE_ROOT', '..' . $ds);
define('SITE_URL', 'http://shop' . $ds);
define('SITE_NAME', 'Мягкие подушки');

// dirs
define('ENG_DIR', SITE_ROOT . 'engine');
define('LIB_DIR', SITE_ROOT . 'libs');
define('WWW_ROOT', SITE_ROOT . 'public');
define('TPL_DIR', SITE_ROOT . 'templates');
define('CACHE_DIR', TPL_DIR . $ds . 'cache');
define('LOG_FILE', SITE_ROOT . 'log' . $ds . 'logfile.log');
define('SNIPPET_DIR', ENG_DIR . $ds . 'snippets');
//define('DATA_DIR', SITE_ROOT . 'data');

// include external libs (twig, etc.)
require_once (LIB_DIR . $ds . 'vendor/autoload.php');

// include resources definition
$resources = require_once ('resources.config.php');
define('RESOURCES', $resources);
// include classes, libs, functions
require_once ('db.config.php');

$traits = scandir(ENG_DIR . $ds . 'traits');
foreach ($traits as $trait) {
    strlen($trait) > 3 ? require_once(ENG_DIR . $ds . 'traits' . $ds . $trait) : '';
}

$classes = scandir(ENG_DIR . $ds . 'classes');
foreach ($classes as $class) {
    strlen($class) > 3 ? require_once(ENG_DIR . $ds . 'classes' . $ds . $class) : '';
}

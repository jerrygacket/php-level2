<?php
$config['db_user'] = 'maria';
$config['db_password'] = 'maria';
$config['db_base'] = 'shop2';
$config['db_host'] = 'localhost';
$config['db_charset'] = 'UTF8';
$config['db_port'] = '3306';

$config['path_root'] = __DIR__;
$config['path_public'] = $config['path_root'] . '/../public';
$config['path_model'] = $config['path_root'] . '/../model';
$config['path_controller'] = $config['path_root'] . '/../controller';
$config['path_cache'] = $config['path_root'] . '/../cache';
$config['path_data'] = $config['path_root'] . '/../data';
$config['path_fixtures'] = $config['path_data'] . '/fixtures';
$config['path_migrations'] = $config['path_data'] . '/migrate';
$config['path_commands'] = $config['path_root'] . '/../lib/commands';
$config['path_libs'] = $config['path_root'] . '/../lib';
$config['path_templates'] = $config['path_root'] . '/../templates';

$config['path_logs'] = $config['path_root'] . '/../logs';

$config['sitename'] = 'Интернет-магазин';

$config['salt2'] = 'awOIHO@EN@Oine q2enq2kbkb';

$config['admins'] = ['1'];
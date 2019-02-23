<?php
/**
 * Created by PhpStorm.
 * User: user
 * Date: 23.02.19
 * Time: 19:27
 */

require_once('config.php');

$pillow = new Pillow('45-7889','little soft pillow');
$pillow->setPrice(45.2);
$pillow->setPublished(true);

$curtain = new Curtain('78-8974', 'double wide curtain');
$curtain->setNew(true);
$curtain->setFabric('cotton');

print_r($pillow);
print_r($curtain);
<?php
/**
 * Created by PhpStorm.
 * User: user
 * Date: 23.02.19
 * Time: 19:27
 */

require_once('../config/common.config.php');

Good::setDbGoodsTable(GOODS_TABLE);
$logger = Logger::getLogger(LOG_FILE);

$partial = new PartGood('45-7889','little soft pillow');
$digital = new DigitalGood('43-7559','strings of code');
$weight = new WeightGood('15-7834','big sugar pile');

$partial->setSalePrice(56);
$partial->setBuyPrice(32);
echo $partial->calcSales().'<br>'.PHP_EOL;

$digital->setSalePrice($partial->getSalePrice()/2);
$digital->setSalePrice($partial->getBuyPrice()/2);
echo $digital->calcSales().'<br>'.PHP_EOL;

$weight->setSalePrice(56);
$weight->setBuyPrice(32);
echo $weight->calcSales().'<br>'.PHP_EOL;

print_r($partial->getAllGoods());
$logger->writeLog(print_r($partial->dbConnect->getDBError(), true));

print_r($partial->saveToDB());
$logger->writeLog(print_r($partial->dbConnect->getDBError(), true));






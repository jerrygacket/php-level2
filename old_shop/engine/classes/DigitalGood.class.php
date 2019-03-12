<?php

require_once 'Good.class.php';

class DigitalGood extends Good
{
    use GoodsFuncs;

    public function getSalePrice() {
        return $this->salePrice;
    }

    public function setSalePrice($newPrice) {
        $this->salePrice = $newPrice;
    }

    public function getBuyPrice() {
        return $this->buyPrice;
    }

    public function setBuyPrice($newPrice) {
        $this->buyPrice = $newPrice;
    }
}
<?php

require_once 'Good.class.php';

class WeightGood extends Good
{
    use GoodsFuncs;

    private $weight = 10;

    /**
     * @return int
     */
    public function getWeight(): int
    {
        return $this->weight;
    }

    /**
     * @param int $weight
     */
    public function setWeight(int $weight)
    {
        $this->weight = $weight;
    }

    public function getSalePrice() {
        return $this->salePrice * $this->weight;
    }

    public function setSalePrice($newPrice) {
        $this->salePrice = $newPrice;
    }

    public function getBuyPrice() {
        return $this->buyPrice * $this->weight;
    }

    public function setBuyPrice($newPrice) {
        $this->buyPrice = $newPrice;
    }
}
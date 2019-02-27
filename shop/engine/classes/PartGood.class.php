<?php
/**
 * Created by PhpStorm.
 * User: user
 * Date: 26.02.19
 * Time: 21:43
 */

require_once 'Good.class.php';

class PartGood extends Good
{
    use GoodsFuncs;

    private $width = 0;
    private $height = 0;
    private $long = 0;

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

    /**
     * @return int
     */
    public function getWidth(): int
    {
        return $this->width;
    }

    /**
     * @param int $width
     */
    public function setWidth(int $width)
    {
        $this->width = $width;
    }

    /**
     * @return int
     */
    public function getHeight(): int
    {
        return $this->height;
    }

    /**
     * @param int $height
     */
    public function setHeight(int $height)
    {
        $this->height = $height;
    }

    /**
     * @return int
     */
    public function getLong(): int
    {
        return $this->long;
    }

    /**
     * @param int $long
     */
    public function setLong(int $long)
    {
        $this->long = $long;
    }

}
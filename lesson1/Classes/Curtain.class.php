<?php

require_once 'Good.class.php';

class Curtain extends Good
{
    const FASTENING_METHOD = ['eyelets', 'lace', 'rings'];

    private $windowWidth = 0;
    private $fabric = '';

    /**
     * @return int
     */
    public function getWindowWidth(): int
    {
        return $this->windowWidth;
    }

    /**
     * @param int $windowWidth
     */
    public function setWindowWidth(int $windowWidth)
    {
        $this->windowWidth = $windowWidth;
    }

    /**
     * @return string
     */
    public function getFabric(): string
    {
        return $this->fabric;
    }

    /**
     * @param string $fabric
     */
    public function setFabric(string $fabric)
    {
        $this->fabric = $fabric;
    }


}
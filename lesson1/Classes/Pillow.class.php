<?php

require_once 'Good.class.php';

class Pillow extends Good
{
    private $fabric = '';
    private $filler = '';

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

    /**
     * @return string
     */
    public function getFiller(): string
    {
        return $this->filler;
    }

    /**
     * @param string $filler
     */
    public function setFiller(string $filler)
    {
        $this->filler = $filler;
    }
}
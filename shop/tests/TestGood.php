<?php

require_once "tests/BaseTest.php";
class GoodsTest extends BaseTest
{
    public function testGetMany(){
        $this->assertNotNull(Good::getMany());
    }
    
    public function testGetOne(){
        $this->assertNotNull(Good::getOne());
    }
}

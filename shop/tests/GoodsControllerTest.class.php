<?php
require_once 'BaseTest.class.php';

class GoodsControllerTest extends BaseTest
{
    /**
     * @dataProvider providerGoodsController
     */
    public function testData($a){
        $cc = new GoodsController();
        $cc_result = $cc->index($a);

        $this->assertNotNull($cc_result);
        $this->assertArrayHasKey("oneItem", $cc_result);
    }
    
    public function providerGoodsController(){
        return array (
            array (["id" => 1]),
        );
    }
}

<?php
require 'BaseTest.php';

class GoodsControllerTest extends BaseTest
{
    /**
     * @dataProvider providerGoodsController
     */
    public function testIndex($a){
        $result = [];
        $cc = new GoodsController();
        $cc_result = $cc->index($a);

        $result['notNull'] = $this->assertNotNull($cc_result);
        $result['hasKey'] = $this->assertArrayHasKey("oneItem", $cc_result);
        
        print_r($result);
        return $result;
    }
    
    public function providerGoodsController(){
        return array (
            array (["id" => 1]),
        );
    }
}

<?php
require_once 'BaseTest.class.php';

class GoodViewTest extends BaseTest
{
    /**
     * @dataProvider providerGoodsController
     */
    public function testView($a){
        $cc = new GoodsController();
        $data['content_data'] = $cc->index($a);
        $loader = new \Twig\Loader\FilesystemLoader(Config::get('path_templates'));
        $twig = new \Twig\Environment($loader);
        $template = $twig->loadTemplate('goods/index.html');
        $cc_result = $template->render($data);

        $this->assertStringStartsWith('<!DOCTYPE html>', $cc_result);
    }
    
    public function providerGoodsController(){
        return array (
            array (["id" => 1]),
        );
    }
}

<?php
/**
 * Created by PhpStorm.
 * User: user
 * Date: 27.02.19
 * Time: 20:57
 */

class TplGenerator
{
    private static $tpl;
    private $twig;

    private function __construct($tplDir, $cacheDir = 'cache'){
        $loader = new \Twig\Loader\FilesystemLoader($tplDir);
        $this->twig = new \Twig\Environment($loader, [
            'cache' => ($cacheDir),
        ]);
    }

    public static function getTpl($tplDir, $cacheDir){
        if(TplGenerator::$tpl == null){
            TplGenerator::$tpl = new TplGenerator($tplDir, $cacheDir);
        }

        return TplGenerator::$tpl;
    }

    public function render($template, $variables) {
        return $this->twig->render($template, $variables);
    }

}
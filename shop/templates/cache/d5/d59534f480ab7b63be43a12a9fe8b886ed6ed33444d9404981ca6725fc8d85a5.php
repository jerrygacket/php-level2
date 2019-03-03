<?php

/* head.tpl */
class __TwigTemplate_79e9c7ff0dd405bb2ef8f07e5fd224e5f616ca1b60a70d18acf0ce0fd2835e0a extends Twig_Template
{
    private $source;

    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->source = $this->getSourceContext();

        $this->parent = false;

        $this->blocks = [
        ];
    }

    protected function doDisplay(array $context, array $blocks = [])
    {
        // line 1
        echo "<!DOCTYPE html>
<html lang=\"ru\">
<head>

    <meta charset=\"UTF-8\">
    <title>";
        // line 6
        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, ($context["site"] ?? null), "name", []), "html", null, true);
        echo "</title>
    <base href=\"";
        // line 7
        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, ($context["site"] ?? null), "root", []), "html", null, true);
        echo "\">
    <link rel=\"stylesheet\" href=\"css/style.css\">

    <meta http-equiv=\"x-ua-compatible\" content=\"ie=edge\">

    <!--Favicon-->
    <link rel=\"icon\" href=\"assets/img/favicon/144x144.png\">

    <!--Google fonts-->
    <link href=\"https://fonts.googleapis.com/css?family=Roboto:400,500,600,700%7COpen+Sans:400,600,700\" rel=\"stylesheet\">

    <!--Icon fonts-->
    <link rel=\"stylesheet\" href=\"assets/vendor/strokegap/style.css\">
    <link rel=\"stylesheet\" href=\"assets/vendor/font-awesome/css/font-awesome.min.css\">
    <link rel=\"stylesheet\" href=\"assets/vendor/linearicons/style.css\">

    <!-- Stylesheet-->
    <link rel=\"stylesheet\" href=\"https://use.fontawesome.com/releases/v5.7.1/css/all.css\" integrity=\"sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr\" crossorigin=\"anonymous\">

    <link rel=\"stylesheet\" href=\"assets/css/bundle.css\">
    <link rel=\"stylesheet\" href=\"assets/css/style.css\">
</head>
<body>
";
    }

    public function getTemplateName()
    {
        return "head.tpl";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  34 => 7,  30 => 6,  23 => 1,);
    }

    public function getSourceContext()
    {
        return new Twig_Source("", "head.tpl", "/var/www/shop/templates/head.tpl");
    }
}

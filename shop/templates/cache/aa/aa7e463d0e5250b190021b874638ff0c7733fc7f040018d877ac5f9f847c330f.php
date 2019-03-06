<?php

/* catalog.row.tpl */
class __TwigTemplate_b6023c90e6df032db9d9990a5745b46c0366bdcab3e1f12f56f6831c04bfdd16 extends Twig_Template
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
        echo "<div class=\"catalog-item col-4\">
\t<div class=\"catalog-img\" style=\"margin-top:50px;\">
\t\t<a href=\"/";
        // line 3
        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, ($context["page"] ?? null), "name", []), "html", null, true);
        echo "/";
        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, ($context["item"] ?? null), "id", []), "html", null, true);
        echo "\"><img src=\"";
        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, ($context["item"] ?? null), "imgsmall", []), "html", null, true);
        echo "\" alt=\"";
        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, ($context["item"] ?? null), "name", []), "html", null, true);
        echo "\" style=\"max-width: 100px;\" class=\"product-img\"></a>
\t</div>
\t<div>Название: ";
        // line 5
        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, ($context["item"] ?? null), "name", []), "html", null, true);
        echo "<br>
\tПросмотров: ";
        // line 6
        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, ($context["item"] ?? null), "views", []), "html", null, true);
        echo "
\t</div>
</div>
";
    }

    public function getTemplateName()
    {
        return "catalog.row.tpl";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  42 => 6,  38 => 5,  27 => 3,  23 => 1,);
    }

    public function getSourceContext()
    {
        return new Twig_Source("", "catalog.row.tpl", "/var/www/shop/templates/catalog.row.tpl");
    }
}

<?php

/* gallery.item.tpl */
class __TwigTemplate_b8630a8e5420c0eadbf9a17cb8fac49b33a9e6c3e21414212a404ddab8507ba2 extends Twig_Template
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
        echo "<div class=\"container\">
\t<div class=\"row\">
\t\t<div class=\"col-6\">
\t\t\t<img src=\"";
        // line 4
        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, ($context["oneItem"] ?? null), "filepath", []), "html", null, true);
        echo "\" alt=\"";
        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, ($context["oneItem"] ?? null), "name", []), "html", null, true);
        echo "\">
\t\t</div>
\t\t<div class=\"col-6\">
\t\t\t<h2>";
        // line 7
        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, ($context["oneItem"] ?? null), "name", []), "html", null, true);
        echo "</h2>
\t\t\t<p>Просмотров: ";
        // line 8
        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, ($context["oneItem"] ?? null), "views", []), "html", null, true);
        echo "</p>
\t\t\t<p>Размер файла: ";
        // line 9
        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, ($context["oneItem"] ?? null), "filesize", []), "html", null, true);
        echo "</p>
\t\t\t<div class=\"info-block\">
\t\t\t\t<p>";
        // line 11
        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, ($context["oneItem"] ?? null), "description", []), "html", null, true);
        echo "</p>
\t\t\t</div>
\t\t</div>
\t</div>
</div>
";
    }

    public function getTemplateName()
    {
        return "gallery.item.tpl";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  49 => 11,  44 => 9,  40 => 8,  36 => 7,  28 => 4,  23 => 1,);
    }

    public function getSourceContext()
    {
        return new Twig_Source("", "gallery.item.tpl", "/var/www/shop/templates/gallery.item.tpl");
    }
}

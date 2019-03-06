<?php

/* product.tpl */
class __TwigTemplate_433013383949d6dc5713889366f2098727153e3474902897064f6ce586e2ff3b extends Twig_Template
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
        echo "<section id=\"about\">  
  <div class=\"container\">
   <div class=\"row align-items-center\">
   <div class=\"col-lg-5\">
\t   <a href=\"";
        // line 5
        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, ($context["oneItem"] ?? null), "img", []), "html", null, true);
        echo "\" target=\"_blank\"><img src=\"";
        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, ($context["oneItem"] ?? null), "img", []), "html", null, true);
        echo "\" alt=\"";
        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, ($context["oneItem"] ?? null), "name", []), "html", null, true);
        echo "\" class=\"product-img\"></a>
   </div>
\t\t <div class=\"col-lg-6 ml-auto\">
\t\t\t <h2 class=\"h1\">
\t\t\t\t ";
        // line 9
        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, ($context["oneItem"] ?? null), "name", []), "html", null, true);
        echo "
\t\t\t </h2>
\t\t\t <div class=\"u-h-4 u-w-50 bg-primary rounded mt-4 mb-5\"></div>
\t\t\t <p class=\"my-3\">
\t\t\t\t";
        // line 13
        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, ($context["oneItem"] ?? null), "intro", []), "html", null, true);
        echo "
\t\t\t </p>
\t\t\t <p class=\"my-3\">
\t\t\t\tПросмотров: ";
        // line 16
        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, ($context["oneItem"] ?? null), "views", []), "html", null, true);
        echo "
\t\t\t </p>
\t\t\t <ul class=\"list-unstyled u-fw-600 u-lh-2 mt-4 mb-5\">
\t\t\t\t <li><i class=\"fa fa-check text-primary mr-2\"></i>Размер: ";
        // line 19
        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, ($context["oneItem"] ?? null), "size", []), "html", null, true);
        echo " </li>
\t\t\t\t <li><i class=\"fa fa-check text-primary mr-2\"></i>Ткань: ";
        // line 20
        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, ($context["oneItem"] ?? null), "fabric", []), "html", null, true);
        echo " </li>
\t\t\t\t <li><i class=\"fa fa-check text-primary mr-2\"></i>Краска: ";
        // line 21
        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, ($context["oneItem"] ?? null), "paint", []), "html", null, true);
        echo " </li>
\t\t\t </ul>
\t\t\t <button class=\"btn btn-rounded btn-primary\" onclick=\"ajax_get('add','";
        // line 23
        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, ($context["oneItem"] ?? null), "id", []), "html", null, true);
        echo "','1',getCartResponse)\">
\t\t\t\t\t\tКупить
\t\t\t\t\t</button>
\t\t </div>  <!-- END col-lg-6-->
\t </div><!--END row-->
  </div> <!-- END container-->
</section>
";
    }

    public function getTemplateName()
    {
        return "product.tpl";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  72 => 23,  67 => 21,  63 => 20,  59 => 19,  53 => 16,  47 => 13,  40 => 9,  29 => 5,  23 => 1,);
    }

    public function getSourceContext()
    {
        return new Twig_Source("", "product.tpl", "/var/www/shop/templates/product.tpl");
    }
}

<?php

/* header.tpl */
class __TwigTemplate_ad8071c452a26e0fd2d2922b0083bb144a830613580f0861ba9a4d1a1e2a38cd extends Twig_Template
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
        echo "
<section class=\"u-py-100 u-flex-center\" style=\"
background: #FC5C7D;  /* fallback for old browsers */
background: -webkit-linear-gradient(to right, #6A82FB, #FC5C7D);  /* Chrome 10-25, Safari 5.1-6 */
background: linear-gradient(to right, #6A82FB, #FC5C7D); /* W3C, IE 10+/ Edge, Firefox 16+, Chrome 26+, Opera 12+, Safari 7+ */
\">
  <div class=\"container\">
    <div class=\"row\">
      <div class=\"col-12 u-mt-80 text-center\">
        <h1 class=\"display-4 u-fw-600 text-white u-mb-40\">
          ";
        // line 11
        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, ($context["page"] ?? null), "title", []), "html", null, true);
        echo "
        </h1>
        <p class=\"u-fs-22 text-white u-lh-1_8 u-mb-40\">
          ";
        // line 14
        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, ($context["page"] ?? null), "description", []), "html", null, true);
        echo "
        </p>
      </div> <!-- END col-lg-6-->
    </div> <!-- END row-->
  </div> <!-- END container-->
</section>
";
    }

    public function getTemplateName()
    {
        return "header.tpl";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  41 => 14,  35 => 11,  23 => 1,);
    }

    public function getSourceContext()
    {
        return new Twig_Source("", "header.tpl", "/var/www/shop/templates/header.tpl");
    }
}

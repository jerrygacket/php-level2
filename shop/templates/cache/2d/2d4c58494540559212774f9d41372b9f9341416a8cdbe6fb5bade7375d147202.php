<?php

/* menu.tpl */
class __TwigTemplate_34c81c8a2b3fca24ed08d1bece5af3ef8adf173b48fb28e653ca873748edc906 extends Twig_Template
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
        echo "<header class=\"header header-shrink header-inverse fixed-top\">
  <div class=\"container\">
\t\t<nav class=\"navbar navbar-expand-lg px-md-0\">
\t\t\t<a class=\"navbar-brand\" href=\"";
        // line 4
        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, ($context["site"] ?? null), "root", []), "html", null, true);
        echo "\">
\t\t\t\t<span class=\"logo-default\">
\t\t\t\t\t<img src=\"assets/img/logo-default.png\" alt=\"\">
\t\t\t\t</span>
\t\t\t\t<span class=\"logo-inverse\">
\t\t\t\t\t<img src=\"assets/img/logo-inverse.png\" alt=\"\">
\t\t\t\t</span>
\t\t\t</a>

\t\t\t<button class=\"navbar-toggler p-0\" data-toggle=\"collapse\" data-target=\"#navbarNav\">
              <div class=\"hamburger hamburger--spin js-hamburger\">
                    <div class=\"hamburger-box\">
                      <div class=\"hamburger-inner\"></div>
                    </div>
                </div>
\t\t\t</button>

\t\t\t<div class=\"collapse navbar-collapse\" id=\"navbarNav\">
\t\t\t\t<ul class=\"navbar-nav ml-auto\">
\t\t\t\t\t<li class=\"nav-item active\">
\t\t\t\t\t\t<a class=\"nav-link\" href=\"";
        // line 24
        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, ($context["site"] ?? null), "root", []), "html", null, true);
        echo "\">
\t\t\t\t\t\t\tГлавная
\t\t\t\t\t\t</a>
\t\t\t\t\t</li>
\t\t\t\t\t<li class=\"nav-item\">
\t\t\t\t\t\t<a class=\"nav-link\" href=\"/gallery\">
\t\t\t\t\t\t\tГалерея
\t\t\t\t\t\t</a>
\t\t\t\t\t</li>
\t\t\t\t\t<li class=\"nav-item\">
\t\t\t\t\t\t<a class=\"nav-link\" href=\"/catalog\">
\t\t\t\t\t\t\tКаталог
\t\t\t\t\t\t</a>
\t\t\t\t\t</li>
\t\t\t\t\t<li class=\"nav-item\">
\t\t\t\t\t\t<a class=\"nav-link\" href=\"/contacts\">
\t\t\t\t\t\t\tКонтакты
\t\t\t\t\t\t</a>
\t\t\t\t\t</li>
\t\t\t\t\t";
        // line 43
        if ((twig_length_filter($this->env, twig_get_attribute($this->env, $this->source, ($context["login"] ?? null), "userpage", [])) > 0)) {
            // line 44
            echo "\t\t\t\t\t\t<li class=\"nav-item\">
\t\t\t\t\t\t\t<a class=\"nav-link\" href=\"/cabinet\">
\t\t\t\t\t\t\t\tКабинет
\t\t\t\t\t\t\t</a>
\t\t\t\t\t\t</li>\t\t\t\t\t
\t\t\t\t\t\t<li class=\"nav-item\">
\t\t\t\t\t\t\t<a class=\"nav-link\" href=\"/cart\">
\t\t\t\t\t\t\t\tКорзина
\t\t\t\t\t\t\t</a>
\t\t\t\t\t\t</li>
\t\t\t\t\t";
        }
        // line 55
        echo "\t\t\t\t\t<li class=\"nav-item\">
\t\t\t\t\t\t<a class=\"nav-link\" href=\"/";
        // line 56
        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, ($context["login"] ?? null), "link", []), "html", null, true);
        echo "\">
\t\t\t\t\t\t\t";
        // line 57
        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, ($context["login"] ?? null), "text", []), "html", null, true);
        echo "
\t\t\t\t\t\t</a>
\t\t\t\t\t</li>
\t\t\t\t</ul>
\t\t\t</div>
\t\t</nav>
  </div> <!-- END container-->
</header>
";
    }

    public function getTemplateName()
    {
        return "menu.tpl";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  95 => 57,  91 => 56,  88 => 55,  75 => 44,  73 => 43,  51 => 24,  28 => 4,  23 => 1,);
    }

    public function getSourceContext()
    {
        return new Twig_Source("", "menu.tpl", "/var/www/shop/templates/menu.tpl");
    }
}

<?php

/* footer.tpl */
class __TwigTemplate_a5452b7a4c5f7781b5119f329897091489d5f4e7031eff8c2464078cfe0a34d6 extends Twig_Template
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
        echo "<footer>
\t<section class=\"u-py-40 bg-navy-dark\">
\t\t<div class=\"container\">\t\t\t\t
\t\t\t<p class=\"mb-0 text-center\"> 
\t\t\t\t&copy; 2013 — ";
        // line 5
        echo twig_escape_filter($this->env, twig_date_format_filter($this->env, "now", "Y"), "html", null, true);
        echo " Все права защищены
\t\t\t</p>
\t\t</div>
\t</section>
</footer>
<script src=\"assets/js/bundle.js\"></script>
<script src=\"assets/js/fury.js\"></script>
<script src=\"assets/js/script.js\"></script>
</body>
</html>
";
    }

    public function getTemplateName()
    {
        return "footer.tpl";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  29 => 5,  23 => 1,);
    }

    public function getSourceContext()
    {
        return new Twig_Source("", "footer.tpl", "/var/www/shop/templates/footer.tpl");
    }
}

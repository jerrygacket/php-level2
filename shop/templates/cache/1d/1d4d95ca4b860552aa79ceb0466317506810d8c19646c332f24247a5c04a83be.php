<?php

/* catalog.tpl */
class __TwigTemplate_63e344da3f5179c4c9d316b24f53392ba60107790f30217e2d7a11f38a19e08a extends Twig_Template
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
        echo "<section class=\"pt-0\">
\t<div class=\"container\">
        ";
        // line 3
        if ((twig_length_filter($this->env, ($context["items"] ?? null)) > 0)) {
            // line 4
            echo "\t\t\t<div id=\"catalog\" class=\"catalog-row row\">
\t\t\t\t";
            // line 5
            $context['_parent'] = $context;
            $context['_seq'] = twig_ensure_traversable(($context["items"] ?? null));
            $context['loop'] = [
              'parent' => $context['_parent'],
              'index0' => 0,
              'index'  => 1,
              'first'  => true,
            ];
            if (is_array($context['_seq']) || (is_object($context['_seq']) && $context['_seq'] instanceof Countable)) {
                $length = count($context['_seq']);
                $context['loop']['revindex0'] = $length - 1;
                $context['loop']['revindex'] = $length;
                $context['loop']['length'] = $length;
                $context['loop']['last'] = 1 === $length;
            }
            foreach ($context['_seq'] as $context["_key"] => $context["item"]) {
                // line 6
                echo "\t\t\t\t\t";
                echo twig_include($this->env, $context, "catalog.row.tpl");
                echo "
\t\t\t\t";
                ++$context['loop']['index0'];
                ++$context['loop']['index'];
                $context['loop']['first'] = false;
                if (isset($context['loop']['length'])) {
                    --$context['loop']['revindex0'];
                    --$context['loop']['revindex'];
                    $context['loop']['last'] = 0 === $context['loop']['revindex0'];
                }
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['item'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 8
            echo "\t\t\t\t<div id=\"lastIndex\" style=\"display:none\">3</div>
\t\t\t</div>
\t\t\t<button class=\"btn btn-rounded btn-primary\" onclick=\"ajax_get('getMoreGoods','1','3',getGoodsResponse)\">Ещё</button>
        ";
        }
        // line 12
        echo "        ";
        if ((twig_length_filter($this->env, ($context["oneItem"] ?? null)) > 0)) {
            // line 13
            echo "\t\t\t";
            echo twig_include($this->env, $context, "product.tpl");
            echo "
\t\t";
        }
        // line 15
        echo "    </div>
</section>
";
    }

    public function getTemplateName()
    {
        return "catalog.tpl";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  81 => 15,  75 => 13,  72 => 12,  66 => 8,  49 => 6,  32 => 5,  29 => 4,  27 => 3,  23 => 1,);
    }

    public function getSourceContext()
    {
        return new Twig_Source("", "catalog.tpl", "/var/www/shop/templates/catalog.tpl");
    }
}

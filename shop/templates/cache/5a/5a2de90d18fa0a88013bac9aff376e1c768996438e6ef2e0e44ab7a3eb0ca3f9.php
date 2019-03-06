<?php

/* gallery.tpl */
class __TwigTemplate_d738238c9a32337f2a6e149db811b06ac5ed60fc4bdf081abed76e993d74617a extends Twig_Template
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
        // line 8
        echo "        <div class=\"catalog-row row\">
\t\t\t";
        // line 9
        if ((twig_length_filter($this->env, ($context["items"] ?? null)) > 0)) {
            // line 10
            echo "\t\t\t\t";
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
                // line 11
                echo "\t\t\t\t\t";
                echo twig_include($this->env, $context, "gallery.row.tpl");
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
            // line 13
            echo "\t\t\t";
        }
        // line 14
        echo "        </div>
        ";
        // line 15
        if ((twig_length_filter($this->env, ($context["oneItem"] ?? null)) > 0)) {
            // line 16
            echo "\t\t\t";
            echo twig_include($this->env, $context, "gallery.item.tpl");
            echo "
\t\t";
        }
        // line 18
        echo "    </div>
</section>
";
    }

    public function getTemplateName()
    {
        return "gallery.tpl";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  81 => 18,  75 => 16,  73 => 15,  70 => 14,  67 => 13,  50 => 11,  32 => 10,  30 => 9,  27 => 8,  23 => 1,);
    }

    public function getSourceContext()
    {
        return new Twig_Source("", "gallery.tpl", "/var/www/shop/templates/gallery.tpl");
    }
}

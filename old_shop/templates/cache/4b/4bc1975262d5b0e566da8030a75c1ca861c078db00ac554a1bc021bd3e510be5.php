<?php

/* index.tpl */
class __TwigTemplate_0ddf76e5d768713b88dd654be35348f3dd6f21c42fda179d006063493b46347a extends Twig_Template
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
        echo "<section>
\t<div class=\"container\">
\t\t<div class=\"row align-items-center\">

\t\t\t<div class=\"col-lg-6\">
\t\t\t\t<h2 class=\"h1\">
\t\t\t\t\tHow <span class=\"text-primary\">Hyper</span> Really Works
\t\t\t\t</h2>
\t\t\t\t<div class=\"u-h-4 u-w-50 bg-primary rounded mt-4 mb-5\"></div>
\t\t\t\t<p class=\"mb-5\">
\t\t\t\t\tNam liber tempor cum soluta nobis eleifend option congue is nihil imper iper tem por legere me that doming vulputate velit esse molestie possim wisi enim ad placerat facer possim.
\t\t\t\t</p>
\t\t\t\t<ul class=\"list-unstyled u-fw-600 u-lh-2\">
\t\t\t\t\t<li>
\t\t\t\t\t\t<i class=\"fa fa-check mr-2 color-primary\"></i>
\t\t\t\t\t\tProfessional and easy to use software
\t\t\t\t\t</li>
\t\t\t\t\t<li>
\t\t\t\t\t\t<i class=\"fa fa-check mr-2 color-primary\"></i>
\t\t\t\t\t\tSetup and installations takes 30 seconds
\t\t\t\t\t</li>
\t\t\t\t\t<li>
\t\t\t\t\t\t<i class=\"fa fa-check mr-2 color-primary\"></i>
\t\t\t\t\t\tPerfect for any device with pixel perfect design
\t\t\t\t\t</li>
\t\t\t\t\t<li>
\t\t\t\t\t\t<i class=\"fa fa-check mr-2 color-primary\"></i>
\t\t\t\t\t\tSetup and installations really really fast
\t\t\t\t\t</li>
\t\t\t\t</ul>
\t\t\t</div> <!-- END col-lg-6 ml-auto-->

\t\t\t<div class=\"col-lg-6 pl-lg-5 ml-auto text-center\">
\t\t\t\t<img class=\"wow fadeInRight\" src=\"assets/img/app/s-3_1.png\" alt=\"\">
\t\t\t</div> <!-- END col-lg-4 -->

\t\t</div> <!-- END row-->
\t</div> <!-- END container-->
</section>
";
    }

    public function getTemplateName()
    {
        return "index.tpl";
    }

    public function getDebugInfo()
    {
        return array (  23 => 1,);
    }

    public function getSourceContext()
    {
        return new Twig_Source("", "index.tpl", "/var/www/shop/templates/index.tpl");
    }
}

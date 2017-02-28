<?php

namespace SfCoVoit\FrontOfficeBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function indexAction()
    {
        return $this->render('SfCoVoitFrontOfficeBundle:Default:index.html.twig');
    }
}

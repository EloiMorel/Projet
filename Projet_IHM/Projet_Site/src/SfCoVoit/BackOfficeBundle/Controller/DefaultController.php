<?php

namespace SfCoVoit\BackOfficeBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function indexAction()
    {
        return $this->render('SfCoVoitBackOfficeBundle:Default:index.html.twig');
    }
}

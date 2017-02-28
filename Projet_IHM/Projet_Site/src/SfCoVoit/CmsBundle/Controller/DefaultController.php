<?php

namespace SfCoVoit\CmsBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function indexAction()
    {
        return $this->render('SfCoVoitCmsBundle:Default:index.html.twig');
    }
}

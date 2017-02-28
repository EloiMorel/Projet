<?php

namespace SfCoVoit\MainBundle\Controller;

use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class AdvertController extends Controller
{
    public function homeAction($page){
        // Nbpage inconnu mais page doit être supérieur à 1
        if ($page < 1) {
            // On déclenche une exception NotFoundHttpException, cela va afficher une page d'erreur 404
            throw new NotFoundHttpException('Page "'.$page.'" inexistante.');
        }

        // Notre liste d'annonce en dur
        $listAdverts = array(
            array(
                'title'   => 'Recherche développpeur Symfony2',
                'id'      => 1,
                'author'  => 'Alexandre',
                'content' => 'Nous recherchons un développeur Symfony2 débutant sur Lyon. Blabla…',
                'date'    => new \Datetime()),
            array(
                'title'   => 'Mission de webmaster',
                'id'      => 2,
                'author'  => 'Hugo',
                'content' => 'Nous recherchons un webmaster capable de maintenir notre site internet. Blabla…',
                'date'    => new \Datetime()),
            array(
                'title'   => 'Offre de stage webdesigner',
                'id'      => 3,
                'author'  => 'Mathieu',
                'content' => 'Nous proposons un poste pour webdesigner. Blabla…',
                'date'    => new \Datetime())
        );

        // Ici, on récupére la liste des annonces, puis on la passe au template
        //return $this->render('SfCoVoitMainBundle:Advert:index.html.twig', array('listAdverts' => array()));
        return $this->render('SfCoVoitMainBundle:Advert:index.html.twig', array(
            'listAdverts' => $listAdverts
        ));

    }
    //------------------------------------------------------------------------------------------------------------------
    public function viewAction($id){
        $advert = array(
            'title'   => 'Recherche développpeur Symfony2',
            'id'      => $id,
            'author'  => 'Alexandre',
            'content' => 'Nous recherchons un développeur Symfony2 débutant sur Lyon. Blabla…',
            'date'    => new \Datetime()
        );

        return $this->render('SfCoVoitMainBundle:Advert:view.html.twig', array(
            'advert' => $advert
        ));
        //return $this->render('SfCoVoitMainBundle:Advert:view.html.twig', array('id'  => $id));
    }
    //------------------------------------------------------------------------------------------------------------------
    public function viewSlugAction($slug, $year, $_format){
        return new Response(
            "On pourrait afficher l'annonce correspondant 
            au slug '".$slug."', créée en ".$year." et au format ".$_format.".");
    }
    //------------------------------------------------------------------------------------------------------------------
    public function addAction(Request $request){
        // La gestion d'un formulaire est particulière, mais l'idée est la suivante :

        // Si la requête est en POST, c'est que le visiteur a soumis le formulaire
        if ($request->isMethod('POST')) {
            // Ici, on s'occupera de la création et de la gestion du formulaire

            $request->getSession()->getFlashBag()->add('notice', 'Annonce bien enregistrée.');

            // Puis on redirige vers la page de visualisation de cettte annonce
            return $this->redirectToRoute('sf_covoit_main_view', array('id' => 5));
        }

        // Si on n'est pas en POST, alors on affiche le formulaire
        return $this->render('SfCoVoitMainBundle:Advert:add.html.twig');
    }
    //------------------------------------------------------------------------------------------------------------------
    public function editAction($id, Request $request){
        // Ici, on récupérera l'annonce correspondante à $id

        // Même mécanisme que pour l'ajout
        if ($request->isMethod('POST')) {
            $request->getSession()->getFlashBag()->add('notice', 'Annonce bien modifiée.');

            return $this->redirectToRoute('sf_covoit_main_view', array('id' => 5));
        }

        return $this->render('SfCoVoitMainBundle:Advert:edit.html.twig');
    }
    //------------------------------------------------------------------------------------------------------------------
    public function deleteAction($id){
        // Ici, on récupérera l'annonce correspondant à $id

        // Ici, on gérera la suppression de l'annonce en question

        return $this->render('SfCoVoitMainBundle:Advert:delete.html.twig');
    }
    //------------------------------------------------------------------------------------------------------------------
    public function menuAction($limit)
    {
        // On fixe en dur une liste ici, bien entendu par la suite
        // on la récupérera depuis la BDD !
        $listAdverts = array(
            array('id' => 2, 'title' => 'Recherche développeur Symfony2'),
            array('id' => 5, 'title' => 'Mission de webmaster'),
            array('id' => 9, 'title' => 'Offre de stage webdesigner')
        );

        return $this->render('SfCoVoitMainBundle:Advert:menu.html.twig', array('listAdverts' => $listAdverts));
    }
}
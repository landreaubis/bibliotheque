<?php
namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;

class BlurayController extends Controller
{
    /**
     * @Route("/Bluray/listing/{page}/{maxperpage}")
     * @Template("bluray\listing.html.twig")
     */
    public function listingAction($page = 1, $maxperpage = 4)
    {
        $query = $this->getDoctrine()->getRepository('AppBundle:Bluray')->findAll();

        // Création de la pagination
        $paginator = $this->get('knp_paginator');
        $pagination = $paginator->paginate(
            $query,
            $page,
            $maxperpage
        );

        return ['pagination' => $pagination];
    }

    /**
     * @Route("/Bluray/detail/{id}")
     * @Template("bluray\detail.html.twig")
     */
    public function detailAction($id)
    {
        $bluray = $this->getDoctrine()->getRepository('AppBundle:Bluray')->find($id);
        if (!is_object($bluray)) {
            throw $this->createNotFoundException();
        }

        return ['bluray' => $bluray];
    }
}
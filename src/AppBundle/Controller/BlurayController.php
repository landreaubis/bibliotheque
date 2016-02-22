<?php
namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Doctrine\ORM\Tools\Pagination\Paginator;

class BlurayController extends Controller
{
    /**
     * @Route("/Bluray/listing/{page}/{maxperpage}")
     */
    public function listingAction($page = 1, $maxperpage = 4)
    {
        $listBluray = $this->getDoctrine()->getRepository('AppBundle:Bluray')->findAll();
        $html = $this->container->get('templating')->render(
            'bluray/listing.html.twig',
            array('listBluray' => $listBluray)
        );
        return new Response($html);
    }

    /**
     * @Route("/Bluray/detail/{id}")
     */
    public function detailAction($id)
    {
        $bluray = $this->getDoctrine()->getRepository('AppBundle:Bluray')->find($id);
        if (!is_object($bluray)) {
            throw $this->createNotFoundException();
        }

        $html = $this->container->get('templating')->render(
                'bluray/detail.html.twig',
                array('bluray' => $bluray)
                );
        return new Response($html);
    }
}
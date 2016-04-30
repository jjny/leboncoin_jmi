<?php

namespace LeboncoinBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class LeboncoinController extends Controller
{
    public function indexAction()
    {

        $em = $this->container->get('doctrine')->getEntityManager();

        $regions = $em->getRepository('LeboncoinBundle:Regions')->findAll();
        $annonces = $em->getRepository('AnnoncesBundle:Annonces')->findAll();
        $count_annonces = count($annonces);


        return $this->container->get('templating')->renderResponse('LeboncoinBundle:Leboncoin:index.html.twig',
            array(
                'regions' => $regions,
                'count_annonces' => $count_annonces));

    }

}
<?php

namespace LeboncoinBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use NotificationBundle\Entity\Notification;

class LeboncoinController extends Controller
{
    public function indexAction()
    {
        $em = $this->container->get('doctrine')->getEntityManager();

        $regions = $em->getRepository('LeboncoinBundle:Regions')->findAll();

        return $this->container->get('templating')->renderResponse('LeboncoinBundle:Leboncoin:index.html.twig',
            array(
                'regions' => $regions));

    }
	
	public function ListeRegion(){
		
		
	}
}
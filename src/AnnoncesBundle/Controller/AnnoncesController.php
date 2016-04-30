<?php

namespace AnnoncesBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\IntegerType;
use Symfony\Component\Form\Extension\Core\Type\FormType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use AnnoncesBundle\Entity\Annonces;
use Symfony\Component\HttpFoundation\Request;



class AnnoncesController extends Controller
{
    public function indexAction()
    {

        $em = $this->container->get('doctrine')->getEntityManager();

        $regions = $em->getRepository('LeboncoinBundle:Regions')->findAll();

        return $this->container->get('templating')->renderResponse('LeboncoinBundle:Leboncoin:index.html.twig',
            array(
                'regions' => $regions));
    }


    public function ajouterAction(Request $request){

        $annonce = new Annonces();

        $formBuilder = $this->get('form.factory')->createBuilder(FormType::class, $annonce);

        // On ajoute les champs de l'entité que l'on veut à notre formulaire
        $formBuilder
            ->add('Categorie', ChoiceType::class, array(
                'choices' => array('Emploi' => 'Emploi',
                    'Véhicule' => 'véhicule',
                    'Immobilier' => "Immobilier",
                    'Vacances' => "Vacances",
                    "Maison" => "Maison",
                    "Loisirs" => "Loisirs",
                    'Services'=> 'services'),
                'expanded' => true
            ))
            ->add('Status', ChoiceType::class, array(
                'choices' => array('Particulier' => 'Particulier',
                    'Professionnel' => 'Professionnel'),
                'expanded' => true
            ))
            ->add('Type', ChoiceType::class, array(
                'choices' => array('Offres' => 'Offres',
                    'Demandes' => 'Demandes'),
                'expanded' => true
            ))
            ->add('Titre', TextType::class)
            ->add('Description', TextareaType::class)
            ->add('Prix', IntegerType::class)
            ->add('Valider',    SubmitType::class)

        ;

        $form = $formBuilder->getForm();


        if ($request->isMethod('POST')) {
            $form->handleRequest($request);

            if ($form->isValid()) {
                $em = $this->getDoctrine()->getManager();
                $em->persist($annonce);
                $em->flush();

                $request->getSession()->getFlashBag()->add('annonce', 'Annonce bien enregistrée.');
                return $this->render('AnnoncesBundle:Annonces:ajouter.html.twig', array(
                    'form' => $form->createView(),
                ));
            }
        }


        return $this->render('AnnoncesBundle:Annonces:ajouter.html.twig', array(
            'form' => $form->createView(),
        ));
    }

    public function voirOffresAction(){
        $em = $this->container->get('doctrine')->getEntityManager();

        $offres = $em->getRepository('AnnoncesBundle:Annonces')->findBy(
            array('type' =>'Offres')
        );

        return $this->container->get('templating')->renderResponse('AnnoncesBundle:Annonces:offres.html.twig',
            array(
                'offres' => $offres));

    }

    public function voirDemandesAction(){
        $em = $this->container->get('doctrine')->getEntityManager();

        $demandes = $em->getRepository('AnnoncesBundle:Annonces')->findBy(
            array('type' =>'Demandes')
        );



        return $this->container->get('templating')->renderResponse('AnnoncesBundle:Annonces:demandes.html.twig',
            array(
                'demandes' => $demandes));

    }

}
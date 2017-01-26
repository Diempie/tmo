<?php

namespace AppBundle\Controller;

use AppBundle\Entity\Genus;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\BrowserKit\Response;
use Symfony\Component\HttpFoundation\Request;


class DefaultController extends Controller
{






    /**
     * @Route("/genus")
     */
    public function listAction()
    {
        $em = $this->getDoctrine()->getManager();
        $genuses = $em->getRepository('AppBundle:Genus')->allesophalen();
        return $this->render('default/index.html.twig', [
            'genuses' => $genuses
        ]);
    }


    /**
     * @Route("/show/{genus_name}",name="genus_show")
     */
    public function showAction($genus_name)
    {
        $em = $this->getDoctrine()->getManager();
        $genus = $em->getRepository('AppBundle:Genus')->findOneBy(["id" => $genus_name]);
        return $this->render('default/show.html.twig', [
            'genus' => $genus
        ]);
    }




    /**
     * @Route("/save")
     */
    public function newAction(){

        $genus = new Genus();
        $genus->setName('Dimar'.rand(1,100));

        $em = $this->getDoctrine()->getManager();
        $em->persist($genus);
        $em->flush();

        $genuses = $em->getRepository('AppBundle:Genus')->findAll();
        return $this->render('default/index.html.twig');




    }

    /**
     * @Route("/", name="homepage")
     */
    public function indexAction(Request $request)
    {
        // replace this example code with whatever you need
        return $this->render('default/index.html.twig', [
            'base_dir' => realpath($this->getParameter('kernel.root_dir').'/..').DIRECTORY_SEPARATOR,
        ]);
    }


    /**
     * @Route("/hoi", name="hoi")
     */
    public function hoiAction(Request $request)
    {
        // replace this example code with whatever you need
        return $this->render('default/hoi.html.twig', [
            'base_dir' => 'hoi',
        ]);
    }
}

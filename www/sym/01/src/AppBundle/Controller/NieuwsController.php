<?php

namespace AppBundle\Controller;

use AppBundle\Entity\Nieuws;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\BrowserKit\Response;
use Symfony\Component\HttpFoundation\Request;


class NieuwsController extends Controller
{

    /**
     * @Route("/nieuws")
     */
    public function nieuwAction()
    {
        $em = $this->getDoctrine()->getManager();
        $nieuws = $em->getRepository('AppBundle:Nieuws')->laatste10ophalen();
        return $this->render('default/nieuws.html.twig', [
            'nieuws' => $nieuws
        ]);
    }

    /**
     * @Route("/nieuwsbericht/{url}/{id}", name="nieuwsbericht")
     */
    public function nieuwberichtAction($id,$url)
    {
        $em = $this->getDoctrine()->getManager();
        $bericht = $em->getRepository('AppBundle:Nieuws')->findOneBy(["id" => $id]);
        return $this->render('default/nieuwsbericht.html.twig', [
            'bericht' => $bericht
        ]);

    }


    /**
     * @Route("/nieuwsberichtnaam/{naam}", name="nieuwsberichtnaam")
     */
    public function nieuwberichtNaamAction($naam)
    {
        $em = $this->getDoctrine()->getManager();
        $bericht = $em->getRepository('AppBundle:Nieuws')->findOneBy(["titel" => $naam]);
        dump($bericht);
        return $this->render('default/nieuwsbericht.html.twig', [
            'bericht' => $bericht,
            'seo' => array("titel" => $bericht->titel,"desc" => htmlentities($bericht->titel))
        ]);

    }

}

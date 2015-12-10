<?php

namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Faker\Factory;

class DefaultController extends Controller
{
    /**
     * @Route("/", name="homepage")
     */
    public function indexAction()
    {
        $data = $this->getDoctrine()->getRepository('AppBundle:Team')->findAll();

        // replace this example code with whatever you need
        return $this->render('default/index.html.twig', ['commands' => $data]);
    }
}

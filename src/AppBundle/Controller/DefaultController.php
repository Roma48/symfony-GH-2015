<?php

namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

class DefaultController extends Controller
{
    /**
     * @Route("/", name="homepage")
     * @param Request $request
     * @return Response
     */
    public function indexAction(Request $request)
    {
        $data = $this->getDoctrine()->getRepository('AppBundle:Team')->getPage();

        // replace this example code with whatever you need
        return $this->render('default/index.html.twig', ['teams' => $data]);
    }

    /**
     * @Route("/page", name="Page")
     * @param Request $request
     * @return Response
     */
    public function pageAction(Request $request)
    {
        $page = (int)$request->get('page');

        $data = $this->getDoctrine()->getRepository('AppBundle:Team')->getPage($page);

        return $this->render('default/page.html.twig', ['teams' => $data]);

    }
}

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
        $data = Factory::create();

        $commands = [];

        for ($i = 1; $i < 21; $i++){
            $commands[$i]['id'] = $i;
            $commands[$i]['name'] = $data->company;
            $commands[$i]['total'] = $data->numberBetween(0, 100);
        }
        // replace this example code with whatever you need
        return $this->render('default/index.html.twig', ['commands' => $commands]);
    }
}

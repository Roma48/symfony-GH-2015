<?php

namespace AppBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\HttpFoundation\Response;

class LuckyController extends Controller
{
    /**
     * @Route ("/lucky/number/{count}")
     */
    public function numberAction($count)
    {
        $numbers = [];

        for ($i = 0; $i < $count; $i++){
            $numbers[] = rand(0, 100);
        }

        $output = implode(', ', $numbers);

        return new Response(
            '<html><body>Lucky number: '.$output.'</body></html>'
        );
    }

    /**
     * @Route("/api/lucky/number")
     */
    public function apiNumberAction()
    {
        $data = array(
            'lucky_number' => rand(0, 100),
        );

        return new Response(
            json_encode($data),
            200,
            array('Content-Type' => 'application/json')
        );
    }
}
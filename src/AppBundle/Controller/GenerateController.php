<?php
/**
 * Created by PhpStorm.
 * User: romapaliy
 * Date: 11/20/15
 * Time: 11:17 AM
 */

namespace AppBundle\Controller;


use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

/**
 * Class GenerateController
 * @package AppBundle\Controller
 */
class GenerateController extends Controller
{
    /**
     * @param $entity
     * @return \Symfony\Component\HttpFoundation\Response
     *
     * @Route("generate/{entity}", name="Generate", requirements={"entity" = "\D+"} )
     */
    public function PlayerAction ($entity)
    {
        return $this->render(":player:player-$playerId.html.twig");
    }
}
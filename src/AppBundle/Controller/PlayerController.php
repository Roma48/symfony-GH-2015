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
 * Class PlayerController
 * @package AppBundle\Controller
 */
class PlayerController extends Controller
{
    /**
     * @param $playerId
     * @return \Symfony\Component\HttpFoundation\Response
     *
     * @Route("player/{playerId}", name="Player", requirements={"playerId" = "\d+"} )
     */
    public function PlayerAction ($playerId)
    {
        return $this->render(":player:player-$playerId.html.twig");
    }
}
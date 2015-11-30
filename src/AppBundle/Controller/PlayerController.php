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
use Faker\Factory;

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
        $data = Factory::create();

        $player['name'] = $data->company;
        $player['age'] = $data->numberBetween(18, 30);
        $player['country'] = $data->country;
        $player['goals'] = $data->numberBetween(0, 100);
        $player['photo'] = $data->imageUrl(200, 200, "people");

        return $this->render(":player:index.html.twig", ["player" => $player]);
    }
}
<?php
/**
 * Created by PhpStorm.
 * User: romapaliy
 * Date: 11/20/15
 * Time: 11:17 AM
 */

namespace AppBundle\Controller;

use AppBundle\Entity\Player;
use Faker\Factory;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;

/**
 * Class GenerateController
 * @package AppBundle\Controller
 */
class GenerateController extends Controller
{
    /**
     * @param $entity_name
     * @return \Symfony\Component\HttpFoundation\Response
     *
     * @Route("generate/{entity_name}/{count}", name="Generate", requirements={"entity_name" = "\D+", "count" = "\d+"}, defaults={"count" = 10} )
     */
    public function GenerateAction ($entity_name, $count)
    {
        $em = $this->getDoctrine()->getManager();

        if ($entity_name == "player"){
            $players = $this->generatePlayers($count);

            foreach ($players as $player){
                $em->persist($player);
            }
        }

        $em->flush();

        return new Response('Created ' .$count . ' players!');
    }

    /**
     * @param $count
     * @return array
     */
    public function generatePlayers($count)
    {
        $data = Factory::create();

        $players = [];

        for ($i = 1; $i < $count + 1; $i++){
            $player = new Player();
            $player->setAge($data->numberBetween(18, 30));
            $player->setCountry($data->country);
            $player->setName($data->name);

            $players[$i] = $player;
        }

        return $players;
    }
}
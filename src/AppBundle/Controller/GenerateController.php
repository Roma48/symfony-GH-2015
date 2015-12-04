<?php

namespace AppBundle\Controller;

use AppBundle\Entity\Player;
use AppBundle\Entity\Team;
use AppBundle\Entity\Trainer;
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

        $entity_collection = [];

        if ($entity_name == "player"){
            $entity_collection = $this->generatePlayers($count);
        } else if ($entity_name == "team"){
            $entity_collection = $this->generateTeam($count);
        } else if ($entity_name == "trainer"){
            $entity_collection = $this->generateTrainer($count);
        }

        if ($entity_collection){
            foreach ($entity_collection as $entity){
                $em->persist($entity);
            }

            $em->flush();

            return new Response('Created ' .$count . ' ' . $entity_name . 's!');
        } else {
            return new Response('Not found this entity!');
        }
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

    /**
     * @param $count
     * @return array
     */
    public function generateTrainer($count)
    {
        $data = Factory::create();

        $trainers = [];

        for ($i = 1; $i < $count + 1; $i++){
            $trainer = new Trainer();
            $trainer->setAge($data->numberBetween(40, 60));
            $trainer->setCountry($data->country);
            $trainer->setName($data->name);

            $trainers[$i] = $trainer;
        }

        return $trainers;
    }

    /**
     * @param $count
     * @return array
     */
    public function generateTeam($count)
    {
        $data = Factory::create();

        $teams = [];

        for ($i = 1; $i < $count + 1; $i++){
            $team = new Team();
            $team->setCountry($data->country);
            $team->setName($data->company);

            $teams[$i] = $team;
        }

        return $teams;
    }
}
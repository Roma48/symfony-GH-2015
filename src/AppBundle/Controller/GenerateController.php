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
     * @Route("generate", name="Generate" )
     */
    public function GenerateAction ()
    {
        $count = 10;
        $entity_collection = [];

        for($i = 0; $i < $count; $i++){
            $entity_collection = $this->generateTeam($count);
        }

        if ($entity_collection){
            $em = $this->getDoctrine()->getManager();

            foreach ($entity_collection as $entity){
                $em->persist($entity);
            }

            $em->flush();

            return new Response('Created Teams');
        } else {
            return new Response('Not found this entity!');
        }
    }

    /**
     * @param Team $team
     * @return Player
     */
    public function generatePlayer(Team $team)
    {
        $data = Factory::create();

        $player = new Player();
        $player->setAge($data->numberBetween(18, 30));
        $player->setCountry($data->country);
        $player->setName($data->name);
        $player->setTeam($team);

        return $player;
    }

    /**
     * @param Team $team
     * @return Trainer
     */
    public function generateTrainer(Team $team)
    {
        $data = Factory::create();

        $trainer = new Trainer();
        $trainer->setAge($data->numberBetween(40, 60));
        $trainer->setCountry($data->country);
        $trainer->setName($data->name);
        $trainer->setTeam($team);

        return $trainer;
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

            for ($j = 0; $j < 23; $j++){
                $player = $this->generatePlayer($team);
                $team->addPlayer($player);
            }

            for ($k = 0; $k < 7; $k++){
                $trainer = $this->generateTrainer($team);
                $team->addTrainer($trainer);
            }

            $teams[$i] = $team;
        }

        return $teams;
    }
}
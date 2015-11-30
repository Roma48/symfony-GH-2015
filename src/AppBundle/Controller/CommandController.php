<?php
/**
 * Created by PhpStorm.
 * User: romapaliy
 * Date: 11/18/15
 * Time: 3:15 PM
 */

namespace AppBundle\Controller;

use Faker\Factory;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;


/**
 * Class CommandController
 * @package AppBundle\Controller
 *
 */
class CommandController extends Controller
{
    /**
     * @param $name
     * @return \Symfony\Component\HttpFoundation\Response
     * @Route("command/{name}", name="Command", requirements={"name" = "\D+"})
     */
    public function CommandAction($name)
    {
        $data = Factory::create();

        $team = [];

        for ($i = 1; $i < 11; $i++){
            $team[$i]['id'] = $i;
            $team[$i]['name'] = $data->name;
            $team[$i]['age'] = $data->numberBetween(18, 30);
        }

        return $this->render("command/index.html.twig", ["name" => $name, "team" => $team]);
    }

}
<?php
/**
 * Created by PhpStorm.
 * User: romapaliy
 * Date: 11/18/15
 * Time: 3:39 PM
 */

namespace AppBundle\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

/**
 * Class TrainerController
 * @package AppBundle\Controller
 */
class TrainerController extends Controller
{
    /**
     * @param $name
     * @return \Symfony\Component\HttpFoundation\Response
     *
     * @Route("trainer/{name}", name="Trainer", requirements={"name" = "\D+"})
     */
    public function TrainerController($name)
    {
        return $this->render(":trainer:$name.html.twig");
    }
}
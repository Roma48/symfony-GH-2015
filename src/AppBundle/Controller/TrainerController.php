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
     * @param $id
     * @return \Symfony\Component\HttpFoundation\Response
     *
     * @Route("trainer/{id}", name="Trainer", requirements={"id" = "\d+"})
     */
    public function TrainerController($id)
    {
        $trainer = $this->getDoctrine()->getRepository('AppBundle:Trainer')->findOneById($id);

        return $this->render(":trainer:index.html.twig", ["trainer" => $trainer]);
    }
}
<?php
/**
 * Created by PhpStorm.
 * User: romapaliy
 * Date: 11/18/15
 * Time: 3:15 PM
 */

namespace AppBundle\Controller;

use Doctrine\ORM\EntityNotFoundException;
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
     * @param $id
     * @return \Symfony\Component\HttpFoundation\Response
     * @throws EntityNotFoundException
     *
     * @Route("command/{id}", name="Command", requirements={"id" = "\d+"})
     */
    public function CommandAction($id)
    {
        $data = $this->getDoctrine()->getRepository('AppBundle:Team')->findOneById($id);

        if (!$data) {
            throw new EntityNotFoundException('Team not found');
        }

        return $this->render("command/index.html.twig", ["team" => $data]);
    }

}
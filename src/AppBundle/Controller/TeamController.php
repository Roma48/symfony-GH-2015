<?php
/**
 * Created by PhpStorm.
 * User: romapaliy
 * Date: 11/18/15
 * Time: 3:15 PM
 */

namespace AppBundle\Controller;

use Doctrine\ORM\EntityNotFoundException;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;


/**
 * Class TeamController
 * @package AppBundle\Controller
 *
 */
class TeamController extends Controller
{
    /**
     * @param $id
     * @return Response
     * @throws EntityNotFoundException
     *
     * @Route("team/{id}", name="Team", requirements={"id" = "\d+"})
     */
    public function TeamAction($id)
    {
        $data = $this->getDoctrine()->getRepository('AppBundle:Team')->findOneById($id);

        if (!$data) {
            throw new EntityNotFoundException('Team not found');
        }

        return $this->render("team/index.html.twig", ["team" => $data]);
    }

}
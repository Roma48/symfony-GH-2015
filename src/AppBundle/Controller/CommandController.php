<?php
/**
 * Created by PhpStorm.
 * User: romapaliy
 * Date: 11/18/15
 * Time: 3:15 PM
 */

namespace AppBundle\Controller;

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
     *
     * @Route("command/{name}", name="Command", requirements={"name" = "\D+"})
     */
    public function CommandAction($name)
    {
        return $this->render(":command:$name.html.twig");
    }

}
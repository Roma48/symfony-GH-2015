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
     * @Route("command/{name}")
     */
    public function CommandAction($name)
    {
        return $this->render(":command:command.html.twig");
    }
}
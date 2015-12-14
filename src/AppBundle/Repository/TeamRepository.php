<?php
/**
 * Created by PhpStorm.
 * User: roma
 * Date: 13.12.15
 * Time: 13:27
 */

namespace AppBundle\Entity;

use Doctrine\ORM\EntityRepository;

/**
 * Class TeamRepository
 * @package AppBundle\Entity
 */
class TeamRepository extends EntityRepository
{
    /**
     * @param int $page
     */
    public function getPage($page = 1){
        $query = $this->
    }
}
<?php
/**
 * Created by PhpStorm.
 * User: roma
 * Date: 13.12.15
 * Time: 13:27
 */

namespace AppBundle\Repository;

use Doctrine\ORM\EntityRepository;

/**
 * Class TeamRepository
 * @package AppBundle\Entity
 */
class TeamRepository extends EntityRepository
{
    /**
     * @param int $page
     * @return array
     */
    public function getPage($page = 1){

        return $this->createQueryBuilder('t')
            ->select('t')
            ->where('t.id > :number')
            ->setParameter('number', ($page-1)*20)
            ->orderBy('t.id', 'ASC')
            ->setMaxResults(20)
            ->getQuery()
            ->getResult();
    }
}
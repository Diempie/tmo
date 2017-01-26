<?php
/**
 * Created by PhpStorm.
 * User: Dimar
 * Date: 25/01/2017
 * Time: 22:14
 */

namespace AppBundle\Repository;


use Doctrine\ORM\EntityRepository;

class NieuwsRepository extends EntityRepository
{

    public function laatste10ophalen(){


        return $this->createQueryBuilder('piet')
            ->andWhere('piet.id < :id')
            ->setParameter('id',200)
            ->orderBy('piet.id','DESC')
            ->getQuery()
            ->execute();
    }

}
<?php
/**
 * Created by PhpStorm.
 * User: Dimar
 * Date: 25/01/2017
 * Time: 22:14
 */

namespace AppBundle\Repository;


use Doctrine\ORM\EntityRepository;

class GeniusRepository extends EntityRepository
{

    public function allesophalen(){


        return $this->createQueryBuilder('piet')
            ->andWhere('piet.id > :id')
            ->setParameter('id',30)
            ->orderBy('piet.name','DESC')
            ->getQuery()
            ->execute();
    }

}
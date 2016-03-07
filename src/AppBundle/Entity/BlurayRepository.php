<?php
namespace AppBundle\Entity;

use Doctrine\ORM\EntityRepository;

class BlurayRepository extends EntityRepository
{
    public function findAll ($page, $maxperpage) {
        return $this->createQueryBuilder('b')
                ->setFirstResult(($page-1) * $maxperpage)
                ->setMaxResults($maxperpage)
                ->getQuery()
            ;
    }
}
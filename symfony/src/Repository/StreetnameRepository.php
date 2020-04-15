<?php

namespace App\Repository;

use App\Entity\Streetname;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method Streetname|null find($id, $lockMode = null, $lockVersion = null)
 * @method Streetname|null findOneBy(array $criteria, array $orderBy = null)
 * @method Streetname[]    findAll()
 * @method Streetname[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class StreetnameRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Streetname::class);
    }
}

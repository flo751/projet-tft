<?php

namespace App\Repository;

use App\Entity\Comm;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<Comm>
 *
 * @method Comm|null find($id, $lockMode = null, $lockVersion = null)
 * @method Comm|null findOneBy(array $criteria, array $orderBy = null)
 * @method Comm[]    findAll()
 * @method Comm[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class CommRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Comm::class);
    }

//    /**
//     * @return Comm[] Returns an array of Comm objects
//     */
//    public function findByExampleField($value): array
//    {
//        return $this->createQueryBuilder('c')
//            ->andWhere('c.exampleField = :val')
//            ->setParameter('val', $value)
//            ->orderBy('c.id', 'ASC')
//            ->setMaxResults(10)
//            ->getQuery()
//            ->getResult()
//        ;
//    }

//    public function findOneBySomeField($value): ?Comm
//    {
//        return $this->createQueryBuilder('c')
//            ->andWhere('c.exampleField = :val')
//            ->setParameter('val', $value)
//            ->getQuery()
//            ->getOneOrNullResult()
//        ;
//    }
}

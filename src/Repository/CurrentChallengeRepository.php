<?php

namespace App\Repository;

use App\Entity\CurrentChallenge;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<CurrentChallenge>
 *
 * @method CurrentChallenge|null find($id, $lockMode = null, $lockVersion = null)
 * @method CurrentChallenge|null findOneBy(array $criteria, array $orderBy = null)
 * @method CurrentChallenge[]    findAll()
 * @method CurrentChallenge[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class CurrentChallengeRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, CurrentChallenge::class);
    }

//    /**
//     * @return CurrentChallenge[] Returns an array of CurrentChallenge objects
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

//    public function findOneBySomeField($value): ?CurrentChallenge
//    {
//        return $this->createQueryBuilder('c')
//            ->andWhere('c.exampleField = :val')
//            ->setParameter('val', $value)
//            ->getQuery()
//            ->getOneOrNullResult()
//        ;
//    }
}

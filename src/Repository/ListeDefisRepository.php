<?php

namespace App\Repository;

use App\Entity\ListeDefis;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<ListeDefis>
 *
 * @method ListeDefis|null find($id, $lockMode = null, $lockVersion = null)
 * @method ListeDefis|null findOneBy(array $criteria, array $orderBy = null)
 * @method ListeDefis[]    findAll()
 * @method ListeDefis[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class ListeDefisRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, ListeDefis::class);
    }

//    /**
//     * @return ListeDefis[] Returns an array of ListeDefis objects
//     */
//    public function findByExampleField($value): array
//    {
//        return $this->createQueryBuilder('l')
//            ->andWhere('l.exampleField = :val')
//            ->setParameter('val', $value)
//            ->orderBy('l.id', 'ASC')
//            ->setMaxResults(10)
//            ->getQuery()
//            ->getResult()
//        ;
//    }

//    public function findOneBySomeField($value): ?ListeDefis
//    {
//        return $this->createQueryBuilder('l')
//            ->andWhere('l.exampleField = :val')
//            ->setParameter('val', $value)
//            ->getQuery()
//            ->getOneOrNullResult()
//        ;
//    }
}

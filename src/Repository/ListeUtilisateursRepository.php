<?php

namespace App\Repository;

use App\Entity\ListeUtilisateurs;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<ListeUtilisateurs>
 *
 * @method ListeUtilisateurs|null find($id, $lockMode = null, $lockVersion = null)
 * @method ListeUtilisateurs|null findOneBy(array $criteria, array $orderBy = null)
 * @method ListeUtilisateurs[]    findAll()
 * @method ListeUtilisateurs[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class ListeUtilisateursRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, ListeUtilisateurs::class);
    }

//    /**
//     * @return ListeUtilisateurs[] Returns an array of ListeUtilisateurs objects
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

//    public function findOneBySomeField($value): ?ListeUtilisateurs
//    {
//        return $this->createQueryBuilder('l')
//            ->andWhere('l.exampleField = :val')
//            ->setParameter('val', $value)
//            ->getQuery()
//            ->getOneOrNullResult()
//        ;
//    }
}

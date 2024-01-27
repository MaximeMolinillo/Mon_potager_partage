<?php

namespace App\Repository;

use App\Entity\ArticleTuto;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<ArticleTuto>
 *
 * @method ArticleTuto|null find($id, $lockMode = null, $lockVersion = null)
 * @method ArticleTuto|null findOneBy(array $criteria, array $orderBy = null)
 * @method ArticleTuto[]    findAll()
 * @method ArticleTuto[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class ArticleTutoRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, ArticleTuto::class);
    }

//    /**
//     * @return ArticleTuto[] Returns an array of ArticleTuto objects
//     */
//    public function findByExampleField($value): array
//    {
//        return $this->createQueryBuilder('a')
//            ->andWhere('a.exampleField = :val')
//            ->setParameter('val', $value)
//            ->orderBy('a.id', 'ASC')
//            ->setMaxResults(10)
//            ->getQuery()
//            ->getResult()
//        ;
//    }

//    public function findOneBySomeField($value): ?ArticleTuto
//    {
//        return $this->createQueryBuilder('a')
//            ->andWhere('a.exampleField = :val')
//            ->setParameter('val', $value)
//            ->getQuery()
//            ->getOneOrNullResult()
//        ;
//    }
}

<?php

namespace App\Repository;

use App\Entity\Visualization;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<Visualization>
 *
 * @method Visualization|null find($id, $lockMode = null, $lockVersion = null)
 * @method Visualization|null findOneBy(array $criteria, array $orderBy = null)
 * @method Visualization[]    findAll()
 * @method Visualization[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class VisualizationRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Visualization::class);
    }

//    /**
//     * @return Visualization[] Returns an array of Visualization objects
//     */
//    public function findByExampleField($value): array
//    {
//        return $this->createQueryBuilder('v')
//            ->andWhere('v.exampleField = :val')
//            ->setParameter('val', $value)
//            ->orderBy('v.id', 'ASC')
//            ->setMaxResults(10)
//            ->getQuery()
//            ->getResult()
//        ;
//    }

//    public function findOneBySomeField($value): ?Visualization
//    {
//        return $this->createQueryBuilder('v')
//            ->andWhere('v.exampleField = :val')
//            ->setParameter('val', $value)
//            ->getQuery()
//            ->getOneOrNullResult()
//        ;
//    }
}

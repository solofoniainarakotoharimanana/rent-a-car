<?php

namespace App\Repository;

use App\Entity\BrandOfCar;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<BrandOfCar>
 *
 * @method BrandOfCar|null find($id, $lockMode = null, $lockVersion = null)
 * @method BrandOfCar|null findOneBy(array $criteria, array $orderBy = null)
 * @method BrandOfCar[]    findAll()
 * @method BrandOfCar[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class BrandOfCarRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, BrandOfCar::class);
    }

//    /**
//     * @return BrandOfCar[] Returns an array of BrandOfCar objects
//     */
//    public function findByExampleField($value): array
//    {
//        return $this->createQueryBuilder('b')
//            ->andWhere('b.exampleField = :val')
//            ->setParameter('val', $value)
//            ->orderBy('b.id', 'ASC')
//            ->setMaxResults(10)
//            ->getQuery()
//            ->getResult()
//        ;
//    }

//    public function findOneBySomeField($value): ?BrandOfCar
//    {
//        return $this->createQueryBuilder('b')
//            ->andWhere('b.exampleField = :val')
//            ->setParameter('val', $value)
//            ->getQuery()
//            ->getOneOrNullResult()
//        ;
//    }
}

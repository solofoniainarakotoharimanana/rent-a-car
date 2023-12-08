<?php

namespace App\Repository;

use App\ClassSearch\CarSearch;
use App\Entity\Car;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<Car>
 *
 * @method Car|null find($id, $lockMode = null, $lockVersion = null)
 * @method Car|null findOneBy(array $criteria, array $orderBy = null)
 * @method Car[]    findAll()
 * @method Car[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class CarRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Car::class);
    }

//    /**
//     * @return Car[] Returns an array of Car objects
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

//    public function findOneBySomeField($value): ?Car
//    {
//        return $this->createQueryBuilder('c')
//            ->andWhere('c.exampleField = :val')
//            ->setParameter('val', $value)
//            ->getQuery()
//            ->getOneOrNullResult()
//        ;
//    }

    public function findCars(CarSearch $searchCar)
    {
        $query = $this->createQueryBuilder('c');
        if ($searchCar->getCategories()) {
            $query = $query->andWhere('c.category IN (:categories)')
                         ->setParameter('categories', $searchCar->getCategories());
        }
        if ($searchCar->getBrand()) {
            $query = $query->andWhere('c.brand IN (:brands)')
                            ->setParameter('brands', $searchCar->getBrand());
        }

        if ($searchCar->getMaxPrice()) {
            $query = $query->andWhere('c.price <= :maxPrice')
                    ->setParameter('maxPrice', $searchCar->getMaxPrice());
        }

        return $query->getQuery();
    }
}

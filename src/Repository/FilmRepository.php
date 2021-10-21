<?php

namespace App\Repository;

use App\Entity\Film;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method Film|null find($id, $lockMode = null, $lockVersion = null)
 * @method Film|null findOneBy(array $criteria, array $orderBy = null)
 * @method Film[]    findAll()
 * @method Film[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class FilmRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Film::class);
    }

    public function search($search)
    {

        $qb = $this->createQueryBuilder("f");

        if (key_exists("duree", $search) && $search['duree'] != null) {

            $qb
                ->andWhere('f.duree <= :duree')
                ->setParameter(':duree', $search['duree']);
        }

        if (key_exists("category", $search) && isset($search['category'])) {

            $categoryId = [];

            foreach ($search["category"] as $category) {
                $categoryId[] = $category->getId();
            }

            $qb
                ->leftJoin("f.category", "c")
                ->andWhere("c.id IN (:category)")
                ->setParameter(":category", $categoryId);
        }

        if (key_exists("name", $search) && $search['name'] != null) {

            $nameReal = $search['name'];

            $qb
                ->andWhere('f.realisateur LIKE :searchterm')
                ->setParameter('searchterm', '%' . $nameReal . '%');
        }

        if (key_exists("title", $search) && $search['title'] != null) {

            $title = $search['title'];

            $qb
                ->andWhere('f.name LIKE :searchterm')
                ->setParameter('searchterm', '%' . $title . '%');
        }
  
        return $qb->getQuery()->getResult();
    }

    // /**
    //  * @return Film[] Returns an array of Film objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('f')
            ->andWhere('f.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('f.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?Film
    {
        return $this->createQueryBuilder('f')
            ->andWhere('f.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}

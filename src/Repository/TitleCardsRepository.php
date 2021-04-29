<?php

namespace App\Repository;

use App\Entity\TitleCards;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method TitleCards|null find($id, $lockMode = null, $lockVersion = null)
 * @method TitleCards|null findOneBy(array $criteria, array $orderBy = null)
 * @method TitleCards[]    findAll()
 * @method TitleCards[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class TitleCardsRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, TitleCards::class);
    }

    // /**
    //  * @return TitleCards[] Returns an array of TitleCards objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('t')
            ->andWhere('t.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('t.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?TitleCards
    {
        return $this->createQueryBuilder('t')
            ->andWhere('t.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}

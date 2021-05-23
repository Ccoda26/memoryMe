<?php

namespace App\Repository;

use App\Entity\CardAnswer;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method CardAnswer|null find($id, $lockMode = null, $lockVersion = null)
 * @method CardAnswer|null findOneBy(array $criteria, array $orderBy = null)
 * @method CardAnswer[]    findAll()
 * @method CardAnswer[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class CardAnswerRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, CardAnswer::class);
    }

    // /**
    //  * @return CardAnswer[] Returns an array of CardAnswer objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('c')
            ->andWhere('c.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('c.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?CardAnswer
    {
        return $this->createQueryBuilder('c')
            ->andWhere('c.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}

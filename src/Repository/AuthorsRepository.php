<?php

declare(strict_types=1);

namespace App\Repository;

use App\Entity\Authors;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<Authors>
 *
 * @method Authors|null find($id, $lockMode = null, $lockVersion = null)
 * @method Authors|null findOneBy(array $criteria, array $orderBy = null)
 * @method Authors[]    findAll()
 * @method Authors[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class AuthorsRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Authors::class);
    }

    /**
     * Find Top three authors for last week.
     * @return mixed
     */
    public function findTopAuthorsLastWeek(): array
    {
        return $this->createQueryBuilder('a')
            ->select('a.name', 'COUNT(n.id) AS newsCount')
            ->join('a.news', 'n')
            ->where('n.creation_date >= :weekAgo')
            ->setParameter('weekAgo', new \DateTime('-1 week'))
            ->groupBy('a.id')
            ->setMaxResults(3)
            ->getQuery()
            ->getResult();
    }

}

<?php

namespace App\Repository;

use App\Entity\News;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<News>
 *
 * @method News|null find($id, $lockMode = null, $lockVersion = null)
 * @method News|null findOneBy(array $criteria, array $orderBy = null)
 * @method News[]    findAll()
 * @method News[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class NewsRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, News::class);
    }

    /**
     * Find all news with authors.
     *
     * @return mixed
     */
    public function findAllNewsWithAuthors(): mixed
    {
        return $this->createQueryBuilder('n')
            ->leftJoin('n.authors', 'a')
            ->addSelect('a')
            ->getQuery()
            ->getResult();
    }

    public function findByAuthor($authorId)
    {
        return $this->createQueryBuilder('n')
            ->select('n.title')
            ->join('n.authors', 'a')
            ->where('a.id = :authorId')
            ->setParameter('authorId', $authorId)
            ->getQuery()
            ->getResult();
    }

    public function findByNewsId($newsId) {
        return $this->createQueryBuilder('n')
            ->select('n.title', 'n.creation_date')
            ->where('n.id = :newsId')
            ->setParameter('newsId', $newsId)
            ->getQuery()
            ->getResult();
    }

}

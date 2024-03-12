<?php

declare(strict_types=1);

namespace App\Service;

use App\Entity\News;
use App\Repository\NewsRepository;
use App\Repository\AuthorsRepository;

class ArticleService
{
    private NewsRepository $newsRepository;
    private AuthorsRepository $authorsRepository;

    public function __construct(NewsRepository $newsRepository, AuthorsRepository $authorsRepository)
    {
        $this->newsRepository = $newsRepository;
        $this->authorsRepository = $authorsRepository;
    }

    /**
     * @param int $id
     * @return News|null
     */
    public function getArticleById(int $id): array|null
    {
        return $this->newsRepository->findByNewsId($id) !== null ? $this->newsRepository->findByNewsId($id) : NULL ;
    }

    /**
     * @param int $authorId
     * @return array|null
     */
    public function getArticlesByAuthorId(int $authorId): array|null
    {
        return $this->newsRepository->findByAuthor($authorId) ?? NULL;
    }

    /**
     * @return mixed
     */
    public function getTopAuthorsLastWeek(): mixed
    {
        return $this->authorsRepository->findTopAuthorsLastWeek() ?? NULL;
    }
}

<?php

declare(strict_types=1);

namespace App\Controller;

use App\Service\ArticleService;
use OpenApi\Annotations as OA;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;
use Symfony\Component\Serializer\SerializerInterface;

class NewsApiController extends AbstractController {
    /**
     *  Article service.
     *
     * @var ArticleService $articleService
     *  Article service.
     */
    private ArticleService $articleService;

    /**
     *  AuthorsController construct.
     *
     * @param ArticleService $articleService
     *  Article service.
     */
    public function __construct(ArticleService $articleService) {
        $this->articleService = $articleService;
    }

    /**
     * Get the top authors from last week.
     * This call returns a list of authors who have been most active or popular in the last week.
     *
     * @Route("/api/top-authors-last-week", methods={"GET"})
     * @OA\Response(
     *     response=200,
     *     description="Returns a list of top authors from the last week"
     * )
     * @OA\Tag(name="Authors")
     */
    #[Route('/api/top-authors-last-week', name: 'get_top_authors_last_week', methods: ['GET'])]
    public function getTopAuthorsLastWeek(SerializerInterface $serializer): JsonResponse
    {
        $topAuthors = $this->articleService->getTopAuthorsLastWeek();

        $jsonContent = $serializer->serialize($topAuthors, 'json', [
            'groups' => ['author_read'],
        ]);

        return new JsonResponse($jsonContent, Response::HTTP_OK, [], true);
    }

    /**
     * Get a specific article by its ID.
     * This call returns the details of an article, including title, text, creation date, and associated authors.
     *
     * @Route("/api/news/{id}", methods={"GET"})
     * @OA\Response(
     *     response=200,
     *     description="Returns the details of an article based on the provided ID"
     * )
     * @OA\Parameter(
     *     name="id",
     *     in="path",
     *     required=true,
     *     description="The unique identifier of the article",
     *     @OA\Schema(type="integer")
     * )
     * @OA\Tag(name="Articles")
     */
    #[Route('/api/news/{id}', name: 'get_article_by_id', methods: ['GET'])]
    public function getArticleById(ArticleService $articleService, SerializerInterface $serializer, int $id): JsonResponse
    {
        $article = $articleService->getArticleById($id);

        $jsonContent = json_encode($article);

        return new JsonResponse($jsonContent, Response::HTTP_OK, [], true);
    }

    /**
     * Get all articles by a specific author.
     * This call returns a collection of articles written by a specific author, identified by author ID.
     *
     * @Route("/api/author/{authorId}", methods={"GET"})
     * @OA\Response(
     *     response=200,
     *     description="Returns a collection of articles for a specific author"
     * )
     * @OA\Parameter(
     *     name="authorId",
     *     in="path",
     *     required=true,
     *     description="The unique identifier of the author",
     *     @OA\Schema(type="integer")
     * )
     * @OA\Tag(name="Authors")
     */
    #[Route('/api/author/{authorId}', name: 'get_articles_by_author', methods: ['GET'])]
    public function getArticlesByAuthor(ArticleService $articleService, SerializerInterface $serializer, int $authorId): JsonResponse
    {
        $articles = $articleService->getArticlesByAuthorId($authorId);

        $jsonContent = $serializer->serialize($articles, 'json', [
            'groups' => ['author_read'],
        ]);

        return new JsonResponse($jsonContent, Response::HTTP_OK, [], true);
    }
}
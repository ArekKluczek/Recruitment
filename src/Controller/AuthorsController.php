<?php

declare(strict_types=1);

namespace App\Controller;

use App\Entity\Authors;
use App\Form\AuthorsType;
use App\Repository\AuthorsRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

class AuthorsController extends AbstractController
{
    #[Route('/authors', name: 'app_authors_index', methods: ['GET'])]
    public function index(AuthorsRepository $authorsRepository): Response
    {
        return $this->render('authors/index.html.twig', [
            'authors' => $authorsRepository->findAll(),
        ]);
    }

    #[Route('/admin/authors/new', name: 'app_authors_new', methods: ['GET', 'POST'])]
    public function new(Request $request, EntityManagerInterface $entityManager): Response
    {
        $author = new Authors();
        $form = $this->createForm(AuthorsType::class, $author);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->persist($author);
            $entityManager->flush();

            return $this->redirectToRoute('app_authors_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->render('authors/new.html.twig', [
            'author' => $author,
            'form' => $form,
        ]);
    }

    #[Route('/admin/authors/{id}/edit', name: 'app_authors_edit', methods: ['GET', 'POST'])]
    public function edit(Request $request, Authors $author, EntityManagerInterface $entityManager): Response
    {
        $form = $this->createForm(AuthorsType::class, $author);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->flush();

            return $this->redirectToRoute('app_authors_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->render('authors/edit.html.twig', [
            'author' => $author,
            'form' => $form,
        ]);
    }

    #[Route('/admin/authors/{id}', name: 'app_authors_delete', methods: ['POST'])]
    public function delete(Request $request, Authors $author, EntityManagerInterface $entityManager): Response
    {
        if ($this->isCsrfTokenValid('delete'.$author->getId(), $request->request->get('_token'))) {
            $entityManager->remove($author);
            $entityManager->flush();
        }

        return $this->redirectToRoute('app_authors_index', [], Response::HTTP_SEE_OTHER);
    }
}

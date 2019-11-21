<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use App\Entity\Author;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\Response;
use App\Form\AuthorType;
use Symfony\Component\HttpFoundation\Request;

/**
 * @Route("/authors")
 */
class AuthorController extends AbstractController
{
    /**
     * @Route("/", name="authors")
     */
    public function index()
    {
        $authors = $this->getDoctrine()
        ->getRepository(Author::class)
        ->findAll();
        return $this->render('author/index.html.twig', [
            'authors' => $authors,
        ]);
    }

    /**
     * @Route("/create", name="create_author")
     */
    public function createAuthor(Request $request)
    {
        $author = new Author();
        $form = $this->createForm(AuthorType::class, $author);
        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
            $authorData= $form->getData();
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($authorData);
            $entityManager->flush();
            return $this->redirectToRoute('authors');
        }
        return $this->render('author/create.html.twig', [
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{author}/update", name="update_author")
     */
    public function updateAuthor(Request $request, Author $author)
    {
        $form = $this->createForm(AuthorType::class, $author);
        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
            $authorData= $form->getData();
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($authorData);
            $entityManager->flush();
            return $this->redirectToRoute('authors');
        }
        return $this->render('author/update.html.twig', [
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{author}/books", name="author_book")
     */
    public function getBooks(Author $author)
    {
        return $this->render('author/books.html.twig', [
            'author' => $author,
        ]);
    }
}

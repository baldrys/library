<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use App\Entity\Author;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\Response;

/**
 * @Route("/authors")
 */
class AuthorController extends AbstractController
{
    /**
     * @Route("/", name="author")
     */
    public function index()
    {
        return $this->render('author/index.html.twig', [
            'controller_name' => 'AuthorController',
        ]);
    }

    /**
     * @Route("/create", name="create_author")
     */
    public function createAuthor()
    {
        $entityManager = $this->getDoctrine()->getManager();
        $author = new Author();
        $author->setfirstName('Stiven');
        $author->setlastName('King');
        
        // tell Doctrine you want to (eventually) save the Product (no queries yet)
        $entityManager->persist($author);

        // actually executes the queries (i.e. the INSERT query)
        $entityManager->flush();

        return new Response('Saved new product with id '.$author->getId());
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

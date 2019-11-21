<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use App\Repository\AuthorRepository;
use App\Entity\Book;


/**
 * @Route("/books")
 */
class BookController extends AbstractController
{
    /**
     * @Route("/", name="book")
     */
    public function index(AuthorRepository $authorRepo)
    {
        // $book = new Book();
        // $book->setTitle('Computer Peripherals');
        // $book->setYear(1488);
        $author = $authorRepo->find(1);
        // // relates this product to the category
        // $book->setAuthor($author);

        // $entityManager = $this->getDoctrine()->getManager();
        // $entityManager->persist($author);
        // $entityManager->persist($book);
        // $entityManager->flush();

        $books = $author->getBooks()[0];
        dump($books);die;

        return new Response(
            'Saved new book with id: '.$book->getId()
            .' and new author with id: '.$author->getId()
        );
    }
}

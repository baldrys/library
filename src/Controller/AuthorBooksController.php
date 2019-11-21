<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use App\Entity\Author;
use App\Entity\Book;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\Response;
use App\Form\AuthorType;
use App\Form\BookType;
use Symfony\Component\HttpFoundation\Request;

/**
 * @Route("/authors/{author}/books")
 */
class AuthorBooksController extends AbstractController
{
    /**
     * @Route("/", name="author_books")
     */
    public function index(Author $author)
    {
        $books =  $author->getBooks();
        return $this->render('author_books/index.html.twig', [
            'author' => $author,
            'books' => $books
        ]);
    }

    /**
     * @Route("/create", name="create_book")
     */
    public function createBook(Request $request, Author $author)
    {
        $book = new Book();
        $form = $this->createForm(BookType::class, $book);
        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
            $bookData= $form->getData();
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($bookData);
            $author->addBook($book);
            $entityManager->flush();
            return $this->redirectToRoute('author_books',[
                'author' => $author->getId()
            ]);
        }
        return $this->render('author_books/create.html.twig', [
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{book}/update", name="update_book")
     */
    public function updateBook(Request $request, Author $author, Book $book)
    {
        $form = $this->createForm(BookType::class, $book);
        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
            $bookData= $form->getData();
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($bookData);
            $entityManager->flush();
            return $this->redirectToRoute('author_books',[
                'author' => $author->getId()
            ]);
        }
        return $this->render('author_books/update.html.twig', [
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{book}/delete", name="delete_book")
     */
    public function deleteBook(Author $author, Book $book)
    {
        $entityManager = $this->getDoctrine()->getManager();
        $entityManager->remove($book);
        $entityManager->flush();
        return $this->redirectToRoute('author_books',[
            'author' => $author->getId()
        ]);
    }
}

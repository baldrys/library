<?php

namespace App\Controller\Api;

use Doctrine\ORM\EntityManagerInterface;
use FOS\RestBundle\Controller\Annotations as Rest;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Serializer\Encoder\JsonEncoder;
use Symfony\Component\Serializer\SerializerInterface;
use App\Entity\Author;
use App\Entity\Book;
use App\Form\BookType;

/**
 * @Rest\Route("/api/authors/{author}")
 */
class AuthorBooksController extends AbstractController
{

    /** @var EntityManagerInterface */
    private $em;

    /** @var SerializerInterface */
    private $serializer;

    public function __construct(EntityManagerInterface $em, SerializerInterface $serializer)
    {
        $this->em = $em;
        $this->serializer = $serializer;
    }

    /**
     * @Rest\Get("/books", name="author_books")
     */
    public function getAuthorBooks(Author $author)
    {
        $books =  $author->getBooks();
        $data = $this->serializer->serialize($books, JsonEncoder::FORMAT);
        return new JsonResponse($data, Response::HTTP_OK, [], true);
    }

    /**
     * @Rest\Post("/books", name="create_book")
     */
    public function createBook(Request $request, Author $author)
    {
        $book = new Book();
        $data = json_decode($request->getContent(), true);
        $form = $this->createForm(BookType::class, $book);
        $form->submit($data);
        if (!($form->isSubmitted() && $form->isValid())) {
            return new JsonResponse('Parameters are invalid', Response::HTTP_BAD_REQUEST);
        }
        $author->addBook($book);
        $bookData = $form->getData();
        $this->em->persist($bookData);
        $this->em->flush();
        $data = $this->serializer->serialize($bookData, JsonEncoder::FORMAT);
        return new JsonResponse($data, Response::HTTP_CREATED, [], true);
    }

    /**
     * @Rest\Patch("/books/{book}", name="update_book")
     */
    public function updateBook(Request $request, Book $book)
    {
        $data = json_decode($request->getContent(), true);
        $form = $this->createForm(BookType::class, $book);
        $form->submit($data);
        if (!($form->isSubmitted() && $form->isValid())) {
            return new JsonResponse('Parameters are invalid', Response::HTTP_BAD_REQUEST);
        }
        $bookData = $form->getData();
        $this->em->persist($bookData);
        $this->em->flush();
        $data = $this->serializer->serialize($bookData, JsonEncoder::FORMAT);
        return new JsonResponse($data, Response::HTTP_OK, [], true);
    }

    /**
     * @Rest\Delete("/books/{book}", name="delete_book")
     */
    public function deleteBook(Book $book)
    {
        $this->em->remove($book);
        $this->em->flush();
        return new JsonResponse("Successfully delete", Response::HTTP_OK, [], true);
    }
}

<?php

namespace App\Controller\Api;

use Doctrine\ORM\EntityManagerInterface;
use FOS\RestBundle\Controller\Annotations as Rest;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpKernel\Exception\BadRequestHttpException;
use Symfony\Component\Serializer\Encoder\JsonEncoder;
use Symfony\Component\Serializer\SerializerInterface;
use App\Repository\AuthorRepository;
use App\Form\AuthorType;
use App\Entity\Author;

/**
 * @Rest\Route("/api")
 */
class AuthorController extends AbstractController
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
     * @Rest\Get("/authors", name="get_authors")
     */
    public function getAuthors(AuthorRepository $authorRepository)
    {
        $authors = $authorRepository->findAll();
        $data = $this->serializer->serialize($authors, JsonEncoder::FORMAT);
        return new JsonResponse($data, Response::HTTP_OK, [], true);
    }

    /**
     * @Rest\Post("/authors", name="create_author")
     */
    public function createAuthor(Request $request)
    {
        $data = json_decode($request->getContent(), true);
        $form = $this->createForm(AuthorType::class, new Author());
        $form->submit($data);
        if (!($form->isSubmitted() && $form->isValid())) {
            return new JsonResponse('Parameters are invalid', Response::HTTP_BAD_REQUEST);
        }
        $authorData = $form->getData();
        $this->em->persist($authorData);
        $this->em->flush();
        $data = $this->serializer->serialize($authorData, JsonEncoder::FORMAT);
        return new JsonResponse($data, Response::HTTP_CREATED, [], true);
    }

    /**
     * @Rest\Patch("/authors/{author}",  name="update_author")
     */
    public function updateAuthor(Request $request, Author $author)
    {
        $data = json_decode($request->getContent(), true);
        $form = $this->createForm(AuthorType::class, $author);
        $form->submit($data);
        if (!($form->isSubmitted() && $form->isValid())) {
            return new JsonResponse('Parameters are invalid', Response::HTTP_BAD_REQUEST);
        }
        $authorData = $form->getData();
        $this->em->persist($authorData);
        $this->em->flush();
        $data = $this->serializer->serialize($authorData, JsonEncoder::FORMAT);
        return new JsonResponse($data, Response::HTTP_CREATED, [], true);
    }
    
}

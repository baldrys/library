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
    public function index(AuthorRepository $authorRepository)
    {
        $authors = $authorRepository->findAll();
        $data = $this->serializer->serialize($authors, JsonEncoder::FORMAT);
        return new JsonResponse($data, Response::HTTP_OK, [], true);
    }

    // /**
    //  * @Route("/authors/create", name="create_author")
    //  */
    // public function createAuthor(Request $request)
    // {
    //     $form = $this->createForm(AuthorType::class, new Author());
    //     $form->handleRequest($request);
    //     if ($form->isSubmitted() && $form->isValid()) {
    //         $authorData= $form->getData();
    //         $entityManager = $this->getDoctrine()->getManager();
    //         $entityManager->persist($authorData);
    //         $entityManager->flush();
    //         return $this->redirectToRoute('authors');
    //     }
    //     return $this->render('author/create.html.twig', [
    //         'form' => $form->createView(),
    //     ]);
    // }

    // /**
    //  * @Route("/authors/{author}/update", name="update_author")
    //  */
    // public function updateAuthor(Request $request, Author $author)
    // {
    //     $form = $this->createForm(AuthorType::class, $author);
    //     $form->handleRequest($request);
    //     if ($form->isSubmitted() && $form->isValid()) {
    //         $authorData= $form->getData();
    //         $entityManager = $this->getDoctrine()->getManager();
    //         $entityManager->persist($authorData);
    //         $entityManager->flush();
    //         return $this->redirectToRoute('authors');
    //     }
    //     return $this->render('author/update.html.twig', [
    //         'form' => $form->createView(),
    //     ]);
    // }
    
}

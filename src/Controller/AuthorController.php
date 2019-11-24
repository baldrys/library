<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Request;
use App\Repository\AuthorRepository;
use App\Form\AuthorType;
use App\Entity\Author;


class AuthorController extends AbstractController
{
    // /**
    //  * @Route("/", name="authors")
    //  */
    // public function index(AuthorRepository $authorRepository)
    // {
    //     $authors = $authorRepository->findAll();
    //     return $this->render('author/index.html.twig', [
    //         'authors' => $authors,
    //     ]);
    // }

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

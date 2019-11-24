<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class HomeController extends AbstractController
{
    /**
     * @Route("/{vue?}", name="index")
     * @return Response
     */
    public function index()
    {
        return $this->render('home/index.html.twig');
    }
}

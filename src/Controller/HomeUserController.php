<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class HomeUserController extends AbstractController
{
    /**
     * @Route("/home/user", name="home_user")
     */
    public function index(): Response
    {
        return $this->render('home_user/index.html.twig');
    }
}

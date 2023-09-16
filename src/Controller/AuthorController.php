<?php

namespace App\Controller;

use App\Repository\AuthorRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class AuthorController extends AbstractController
{
    #[Route('/authors', name: 'authors')]
    public function index(AuthorRepository $authorRepository): Response
    {
        return $this->render('author/authors.html.twig', [
            'authors' => $authorRepository->findAll(),
        ]);
    }

}

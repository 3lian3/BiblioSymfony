<?php

namespace App\Controller;

use App\Repository\BookRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class BookController extends AbstractController
{
    #[Route('/', name: 'books')]
    public function index(BookRepository $bookRepository): Response
    {
        return $this->render('book/books.html.twig', [
            'books' => $bookRepository->findAll(),//'books' est la clès utiliser au niveau de twig(dans le fichier index.html.twig)
        ]);
    }
}

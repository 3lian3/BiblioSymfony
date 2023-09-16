<?php

namespace App\Controller;

use App\Form\BookType;
use App\Entity\Book;
use App\Repository\BookRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class AdminBookController extends AbstractController
{
    #[Route('/admin/book', name: 'admin_book')]
    public function index(BookRepository $bookRepository): Response
    {
        return $this->render('admin_book/adminBook.html.twig', [
            'books' => $bookRepository->findAll(),
        ]);
    }

    #[Route('/admin/book/delete/{id<\d+>}', name: 'admin_book_delete')]
    public function delete( Book $book, EntityManagerInterface $entityManagerInterface): Response
    {
            $entityManagerInterface->remove($book);
            $entityManagerInterface->flush();

            return $this->redirectToRoute('admin_book');
    }

    #[Route('/admin/book/modification/{id<\d+>}', name: 'admin_book_modification', methods: ['GET', 'POST'])]
    public function modification(Book $book, Request $request, EntityManagerInterface $entityManagerInterface): Response
    {
        $form = $this->createForm(BookType::class, $book);
        $form->handleRequest($request);

        if($form->isSubmitted() && $form->isValid()){
            $entityManagerInterface->persist($book);
            $entityManagerInterface->flush();

            return $this->redirectToRoute('admin_book');
        }

        return $this->render('admin_book/modificationBook.html.twig', [
            'book' => $book,
            "form" => $form->createView(),
            'isModification' => $book->getId() !== null
        ]);
    }

    #[Route('/admin/book/new', name: 'admin_book_new')]
    public function new(Request $request, EntityManagerInterface $entityManagerInterface): Response
    {
        $book = new Book();
        $form = $this->createForm(BookType::class, $book);
        $form->handleRequest($request);

        if($form->isSubmitted() && $form->isValid()){
            $entityManagerInterface->persist($book);
            $entityManagerInterface->flush();

            return $this->redirectToRoute('admin_book');
        }
        
        return $this->render('admin_book/modificationBook.html.twig', [
            'book' => $book,
            'form' => $form->createView(),
            'isModification' => $book->getId() !== null
        ]);
    }

 
}
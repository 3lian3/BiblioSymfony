<?php

namespace App\Controller;

use App\Entity\Author;
use App\Form\AuthorType;
use App\Repository\AuthorRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class AdminAuthorController extends AbstractController
{
    #[Route('/admin/authors', name: 'admin_authors')]
    public function index(AuthorRepository $authorRepository): Response
    {
        return $this->render('author/authors.html.twig', [
            'authors' => $authorRepository->findAll(),
        ]);
    }

    #[Route('/admin/author/delete/{id<\d+>}', name: 'admin_author_delete')]
    public function delete( Author $author, EntityManagerInterface $entityManagerInterface): Response
    {
            $entityManagerInterface->remove($author);
            $entityManagerInterface->flush();

            return $this->redirectToRoute('admin_authors');
    }

      #[Route('/admin/author/modification/{id<\d+>}', name: 'admin_author_modification', methods: ['GET', 'POST'])]
    public function modification(Author $author, Request $request, EntityManagerInterface $entityManagerInterface): Response
    {
        $form = $this->createForm(AuthorType::class, $author);
        $form->handleRequest($request);

        if($form->isSubmitted() && $form->isValid()){
            $entityManagerInterface->persist($author);
            $entityManagerInterface->flush();

            return $this->redirectToRoute('admin_authors');
        }

        return $this->render('admin_author/modifAuthor.html.twig', [
            'author' => $author,
            "form" => $form->createView(),
            'isModification' => $author->getId() !== null
        ]);
    }

    #[Route('/admin/author/new', name: 'admin_author_new')]
    public function new(Request $request, EntityManagerInterface $entityManagerInterface): Response
    {
        $author = new Author();

        $form = $this->createForm(AuthorType::class, $author);
        $form->handleRequest($request);

        if($form->isSubmitted() && $form->isValid()){
            $entityManagerInterface->persist($author);
            $entityManagerInterface->flush();
            
            return $this->redirectToRoute('admin_authors');
        }
        return $this->render('admin_author/adminAuthor.html.twig', [
            'author' => $author,
            'form' => $form->createView(),
            'isModification' => $author->getId() !== null
        ]);
    }
}

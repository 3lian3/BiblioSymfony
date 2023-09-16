<?php

namespace App\Controller;

use App\Entity\Editor;
use App\Form\EditorType;
use App\Repository\EditorRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class AdminEditorController extends AbstractController
{
    #[Route('/admin/editors', name: 'admin_editors')]
    public function index(EditorRepository $editorRepository): Response
    {
        return $this->render('editor/editor.html.twig', [
            'editors' => $editorRepository->findAll(),
        ]);
    }

    #[Route('/admin/editor/delete/{id<\d+>}', name: 'admin_editor_delete')]
    public function delete( Editor $editor, EntityManagerInterface $entityManagerInterface): Response
    {
            $entityManagerInterface->remove($editor);
            $entityManagerInterface->flush();

            return $this->redirectToRoute('admin_editors');
    }

      #[Route('/admin/editor/modification/{id<\d+>}', name: 'admin_editor_modification', methods: ['GET', 'POST'])]
    public function modification(Editor $editor, Request $request, EntityManagerInterface $entityManagerInterface): Response
    {
        $form = $this->createForm(EditorType::class, $editor);
        $form->handleRequest($request);

        if($form->isSubmitted() && $form->isValid()){
            $entityManagerInterface->persist($editor);
            $entityManagerInterface->flush();

            return $this->redirectToRoute('admin_editors');
        }

        return $this->render('admin_editor/modifEditor.html.twig', [
            'editor' => $editor,
            "form" => $form->createView(),
            'isModification' => $editor->getId() !== null
        ]);
    }

    #[Route('/admin/editor/new', name: 'admin_editor_new')]
    public function new(Request $request, EntityManagerInterface $entityManagerInterface): Response
    {
        $editor = new Editor();
        $form = $this->createForm(EditorType::class, $editor);
        $form->handleRequest($request);

        if($form->isSubmitted() && $form->isValid()){
            $entityManagerInterface->persist($editor);
            $entityManagerInterface->flush();

            return $this->redirectToRoute('admin_editors');
        }
        
        return $this->render('admin_editor/adminEditor.html.twig', [
            'editor' => $editor,
            'form' => $form->createView(),
            'isModification' => $editor->getId() !== null
        ]);
    }
}


<?php

namespace App\Controller;

use App\Entity\Post;
use App\Form\PostType;
use App\Repository\PostRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class PostController extends AbstractController
{
    /**
     * @Route("post/add")
     */
    public function add (Request $request, EntityManagerInterface $em) :Response
    {
        $post = new Post();

        $form = $this->createForm(PostType::class, $post);

        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $post = $form->getData();
            $em->persist($post);
            $em->flush();
            return $this->redirect($request->getUri());
        }

        return $this->renderForm('Post/add.html.twig', [
            'form' => $form
        ]);
    }

    /**
     * @Route("post/list")
     */
    public function list(PostRepository $rep) :Response
    {
        $posts = $rep->findAll();
        return $this->render('Post/list.html.twig', [
            'posts' => $posts
        ]);
    }

    /**
     * @Route("post/delete/{post}")
     */
    public function delete (Post $post, PostRepository $rep) :Response //On récupère notre auteur grâce à la conversion automatique des paramètres
    {
        $rep->remove($post); //on utilise remove pour supprimer un objet
        return $this->redirectToRoute('app_post_list'); //on redirige vers la route de notre liste
    }

    /**
     * @Route("post/edit/{post}")
     */
    public function edit (Post $post, EntityManagerInterface $em, Request $request) :Response
    {
        $form = $this->createForm(PostType::class, $post);

        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $post = $form->getData();
            $em->persist($post);
            $em->flush();
            return $this->redirect($request->getUri());
        }

        return $this->renderForm('Post/edit.html.twig', [
            'form' => $form
        ]);
    }
}
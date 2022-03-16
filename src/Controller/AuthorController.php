<?php

namespace App\Controller;

use App\Entity\Author;
use App\Form\AuthorType;
use App\Repository\AuthorRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class AuthorController extends AbstractController
{
    /**
     * @Route("author/add")
     */
    public function add (Request $request, EntityManagerInterface $em) :Response
    {
        $author = new Author(); //On créé une entité auteur vide

        $form = $this->createForm(AuthorType::class, $author); //on utilise la fonction createForm pour récupérer notre formulaire depuis notre objet AuthorType

        $form->handleRequest($request); //on récupère la requête (paramètres post) et on stocke dans notre formulaire

        if ($form->isSubmitted() && $form->isValid()) { //on vérifie que le formulaire a été soumis et est valide
            $newAuthor = $form->getData(); //on stocke les données dans une variable
            $em->persist($newAuthor); //on utilise la fonction persist (preparation des requêtes) de notre entity manager (ORM)
            $em->flush(); //on utilise flush() pour appliquer les modifications et vider le cache
            return $this->redirect($request->getUri()); // on rafraichit la page pour vider le formulaire (front)
        }

        return $this->renderForm('Author/add.html.twig', [ //on utilise render pour renvoyer un template twig
            'form' => $form //on passe en paramètre une vue du formulaire
        ]);
    }

    /**
     * @Route("author/list")
     */
    public function list(AuthorRepository $rep) :Response //ici on récupère notre AuthorRepository en paramètre automatique
    {
        $auteurs = $rep->findAll(); //on utilise findAll pour récupérer tous les auteurs
        return $this->render('Author/list.html.twig', [
            'auteurs' => $auteurs //on passe nos auteurs en paramètre
        ]);
    }

    /**
     * @Route("author/delete/{author}")
     */
    public function delete (Author $author, EntityManagerInterface $em) :Response //On récupère notre auteur grâce à la conversion automatique des paramètres
    {
        $author->removeAllPosts($em);
        $em->remove($author);
        $em->flush();
        return $this->redirectToRoute('app_author_list'); //on redirige vers la route de notre liste
    }

    /**
     * @Route("author/edit/{author}")
     */
    public function edit (Author $author, EntityManagerInterface $em, Request $request) :Response
    {
        $form = $this->createForm(AuthorType::class, $author);

        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $newAuthor = $form->getData();
            $em->persist($newAuthor);
            $em->flush();
            return $this->redirect($request->getUri());
        }

        return $this->renderForm('Author/edit.html.twig', [
            'form' => $form
        ]);
    }
}
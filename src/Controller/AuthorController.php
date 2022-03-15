<?php

namespace App\Controller;

use App\Entity\Author;
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

        $form = $this->createFormBuilder($author) //on créé un objet formbuilder, en lui passant en paramètre notre objet auteur vide, ainsi qu'un tableau contenant nos champs
            ->add('name', TextType::class) //on ajoute le champ name
            ->add('save', SubmitType::class, ['label' => 'Créer']) //on ajoute le bouton submit
            ->getForm(); //on utilise la fonction get form pour transformer l'objet formbuilder en objet form

        $form->handleRequest($request); //on récupère la requête (paramètres post) et on stocke dans notre formulaire

        if ($form->isSubmitted() && $form->isValid()) { //on vérifie que le formulaire a été soumis et est valide
            $newAuthor = $form->getData(); //on stocke les données dans une variable
            $em->persist($newAuthor); //on utilise la fonction persist (preparation des requêtes) de notre entity manager (ORM)
            $em->flush(); //on sauvegarde les changements et on vide la cache
            return $this->redirect($request->getUri()); // on rafraichit la page pour vider le formulaire (front)
        }

        return $this->render('Author/add.html.twig', [
            'form' => $form->createView()
        ]);
    }

    /**
     * @Route("author/list")
     */
    public function list(AuthorRepository $rep) :Response
    {
        $auteurs = $rep->findAll();
        return $this->render('Author/list.html.twig', [
            'auteurs' => $auteurs
        ]);
    }

    /**
     * @Route("author/delete/{author}")
     */
    public function delete (Author $author)
    {

    }

    /**
     * @Route("author/edit/{author}")
     */
    public function edit ()
    {

    }
}
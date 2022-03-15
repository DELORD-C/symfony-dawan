<?php

namespace App\Controller;

use App\Entity\Author;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class AuthorController extends AbstractController
{
    /**
     * @Route('author/add')
     */
    public function add () :Response
    {
        $author = new Author();

        $form = $this->createFormBuilder($author)
            ->add('name', TextType::class)
            ->getForm();

        return $this->render('author/add.html.twig', [
            'form' => $form->createView()
        ]);
    }
}
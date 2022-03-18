<?php

namespace App\Controller;

use App\Entity\User;
use App\Repository\UserRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class AdminController extends AbstractController
{
    /**
     * @Route("/admin")
     */
    public function list (UserRepository $rep): Response
    {
        $users = $rep->findAll();
        return $this->render('Admin/list.html.twig', [
            'users' => $users
        ]);
    }

    /**
     * @Route("/toggle/{user}")
     */
    public function toggle (User $user, EntityManagerInterface $em): Response
    {
        $roles = $user->getRoles();
        if (in_array("ROLE_ADMIN", $roles)) {
            $key = array_search("ROLE_ADMIN", $roles);
            unset($roles[$key]);
        }
        else {
            array_push($roles, "ROLE_ADMIN");
        }
        $user->setRoles($roles);
        $em->persist($user);
        $em->flush();
        return $this->redirectToRoute('app_admin_list');
    }
}
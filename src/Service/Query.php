<?php

namespace App\Service;

use App\Entity\User;
use Doctrine\ORM\EntityManagerInterface;

class Query
{
    /**
     * @var EntityManagerInterface
     */
    private $em;

    function __construct(EntityManagerInterface $em) {
        $this->em = $em;
    }

    public function getFirstUserEmail ()
    {
        //preparation manuelle de la requète
        $conn = $this->em->getConnection();
        $query = $conn->prepare("SELECT email FROM user WHERE id = :id");
        $result = $query->executeQuery(['id' => 1]);
        return $result->fetchOne();
    }

    public function getFirstUserEmailQB ()
    {
        //utilisation du queryBuilder
        $qb = $this->em->createQueryBuilder()
            ->select('u.email')
            ->from(User::class, 'u')
            ->where("u.id = :id")
            ->setParameter('id', 1);

        $query = $qb->getQuery();
        $email = $query->setMaxResults(1)->getOneOrNullResult()['email'];
        return $email;
    }
}
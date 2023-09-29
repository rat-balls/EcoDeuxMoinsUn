<?php

namespace App\Controller;

use App\Entity\User;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\Routing\Annotation\Route;

class LeaderboardController extends AbstractController
{
    #[Route('/leaderboard', name: 'app_leaderboard')]
    public function leaderboard(EntityManagerInterface $em)
    {   
        $users = $em->getRepository(User::class)->findAll();
        return $this->render('leaderboard.html.twig', [
            'users' => $users
        ]);
    }
}


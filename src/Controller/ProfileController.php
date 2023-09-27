<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Validator\Constraints as Assert;
use Psr\Log\LoggerInterface;
use App\Entity\User;

class ProfileController extends AbstractController
{
    #[Route('/profile', name: 'app_profile')]
    public function profile()
    {   
        if(!$this->getUser()) {
            return $this->render('profile/notfound.html.twig');
        } else {
            $user = $this->getUser();
            return $this->render('profile/profile.html.twig', [
                'name' => $user->getName(),
                'surname' => $user->getSurname(),
                'username' => $user->getUsername(),
                'email' => $user->getEmail(),
                'birth_date' => $user->getDateOfBirth(),
                'role' => $user->getRole(),
                'last_login' => $user->getLastConnection(),
                'created_at' => $user->getCreatedAt(),
                'points' => $user->getPointTotal()
            ]);
        }
    }

}

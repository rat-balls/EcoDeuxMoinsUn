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
use App\Entity\Challenge;

class ProfileController extends AbstractController
{
    #[Route('/profile', name: 'app_profile')]
    public function profile(EntityManagerInterface $em)
    {   
        if(!$this->getUser()) {
            return $this->render('security/login.html.twig');
        } else {
            $user = $this->getUser();
            $cr_challenges = $user->getCurrChallenge();
            $challenges = [];
            $acc_challenges = [];
            foreach($cr_challenges as $curr) {   
                if($curr->getStatus() == 1) {
                    $challenges[$curr->getChallengeId()] = $em->getRepository(Challenge::class)->find($curr->getChallengeId());
                }
                else if($curr->getStatus() == 0) {
                    $acc_challenges[$curr->getChallengeId()] = $em->getRepository(Challenge::class)->find($curr->getChallengeId());
                }
            }
            return $this->render('profile/profile.html.twig', [
                'name' => $user->getName(),
                'surname' => $user->getSurname(),
                'username' => $user->getUsername(),
                'email' => $user->getEmail(),
                'birth_date' => $user->getDateOfBirth(),
                'role' => $user->getRole(),
                'last_login' => $user->getLastConnection(),
                'created_at' => $user->getCreatedAt(),
                'points' => $user->getPointTotal(),
                'challenges' => $challenges,
                'acc_challenges' => $acc_challenges
            ]);
        }
    }
}

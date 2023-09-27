<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Validator\Constraints as Assert;
use App\Entity\Users;

class ProfileController extends AbstractController
{

    #[Route('/profile/{id}', name: 'app_profile')]
    public function profile(EntityManagerInterface $em, $id): Response
    {   
        $user = $em->getRepository(Users::class)->find($id);

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

     
    #[Asset\DateTime]
    #[Route('/makeUser', name: 'app_make_user')]
    public function makeUser(EntityManagerInterface $em): Response
    {   
        $date_of_birth = \DateTime::createFromFormat("Y-m-d", '2004-06-07');
        $last_connection = \DateTime::createFromFormat("Y-m-d H:i:s", '1984-06-05 12:34:10');
        $created_at = \DateTime::createFromFormat("Y-m-d H:i:s", '1984-06-05 12:15:30');

        $user = new Users();
        $user->setName('Delalande');
        $user->setSurname('Ethan');
        $user->setUsername('ratballs');
        $user->setEmail('rat-balls@gmail.com');
        $user->setPassword('rg79oip13');
        $user->setDateOfBirth($date_of_birth);
        $user->setRole(1); //role 1 is admin, role 0 is regular
        $user->setLastConnection($last_connection);
        $user->setCreatedAt($created_at);
        $user->setPointTotal(1500);

        $em->persist($user);
        $em->flush();

        return new Response(
            $user->getSurname().' '.$user->getName()."'s ID is: ".$user->getId().' '.
            $user->getEmail().' '.
            $user->getPassword().' '.
            $user->getRole()
        );
    }


    #[Route('/removeUser', name: 'app_remove_user')]
    public function removeUser(EntityManagerInterface $em): Response
    {   
        $users = $em->getRepository(Users::class)->findAll();
        foreach($users as $user)
        {
            $em->remove($user);
        }
        $em->flush();

        return new Response(
            'DELETION SUCCESSFUL'
        );
    }


}

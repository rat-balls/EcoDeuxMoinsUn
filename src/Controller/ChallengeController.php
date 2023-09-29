<?php

#

namespace App\Controller;

use App\Entity\Challenge;
use App\Entity\CurrentChallenge;
use App\Form\ChallengeType;
use App\Repository\ChallengeRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

#[Route('/challenge')]
class ChallengeController extends AbstractController
{
    #[Route('/', name: 'app_challenge_index', methods: ['GET'])]
    public function index(ChallengeRepository $challengeRepository): Response
    {
        return $this->render('challenge/challenge.html.twig', [
            'challenges' => $challengeRepository->findAll(),
        ]);
    }

    #[Route('/new', name: 'app_challenge_new', methods: ['GET', 'POST'])]
    public function new(Request $request, EntityManagerInterface $entityManager): Response
    {
        $challenge = new Challenge();
        $form = $this->createForm(ChallengeType::class, $challenge);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
           
            $entityManager->persist($challenge);
            $entityManager->flush();

            return $this->redirectToRoute('app_challenge_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('challenge/new.html.twig', [
            'challenge' => $challenge,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_challenge_show', methods: ['GET'])]
    public function show(Challenge $challenge): Response
    {
        return $this->render('challenge/show.html.twig', [
            'challenge' => $challenge,
        ]);
    }

    #[Route('/{id}/edit', name: 'app_challenge_edit', methods: ['GET', 'POST'])]
    public function edit(Request $request, Challenge $challenge, EntityManagerInterface $entityManager): Response
    {
        $form = $this->createForm(ChallengeType::class, $challenge);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->flush();

            return $this->redirectToRoute('app_challenge_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('challenge/edit.html.twig', [
            'challenge' => $challenge,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_challenge_delete', methods: ['POST'])]
    public function delete(Request $request, Challenge $challenge, EntityManagerInterface $entityManager): Response
    {
        if ($this->isCsrfTokenValid('delete'.$challenge->getId(), $request->request->get('_token'))) {
            $entityManager->remove($challenge);
            $entityManager->flush();
        }

        return $this->redirectToRoute('app_challenge_index', [], Response::HTTP_SEE_OTHER);
    }

    #[Route('/{id}/accept', name: 'app_challenge_accept', methods: ['GET', 'POST'])]
    public function accept(Request $request, EntityManagerInterface $em, Challenge $challenge): Response
    {
        $user = $this->getUser();
        $time = new \DateTime($request->get('time'));
        $curr_ch = new CurrentChallenge();
        $curr_ch->setChallengeId($challenge->getId());
        $curr_ch->setUserId($user->getId());
        $curr_ch->setCreatedAt($time);
        $curr_ch->setStatus(0); // 0 = accepté, 1 = complété
        $user->addCurrChallenge($curr_ch);
        $challenge->setCurrentChallenge($curr_ch);

        $em->persist($curr_ch);
        $em->flush();
        return $this->redirectToRoute('app_challenge_index', [], Response::HTTP_SEE_OTHER);
    }

    #[Route('/{id}/validate', name: 'app_challenge_validate', methods: ['GET', 'POST'])]
    public function validate(Request $request, EntityManagerInterface $em, Challenge $challenge): Response
    {
        $user = $this->getUser();
        $cr_challenges = $user->getCurrChallenge();
        $user->setPointTotal($user->getPointTotal() + $challenge->getPoints());
        foreach($cr_challenges as $curr) {   
            if($curr->getChallengeId() == $challenge->getId()) {
                $curr->setStatus(1);
                $em->persist($curr);
            }
        }
        $em->flush();
        return $this->redirectToRoute('app_challenge_index', [], Response::HTTP_SEE_OTHER);
    }

}

<?php

namespace App\Controller;

use App\Entity\Actor;
use App\Repository\ActorRepository;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class ActorController extends AbstractController
{
    #[Route('/actor', name: 'app_actor')]
    public function index(ActorRepository $actorRepository): Response
    {
        $actors = $actorRepository->findAll();

        return $this->render('actor/index.html.twig', [
            'actors' => $actors
        ]);
    }


    #[Route('/actor/{id}', name: 'actor_show')]
    public function show(Actor $actor)
    {
        return $this->render('actor/show.html.twig', [
            'actor' => $actor
        ]);
    }
}
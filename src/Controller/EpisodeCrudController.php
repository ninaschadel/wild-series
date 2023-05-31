<?php

namespace App\Controller;

use App\Entity\Episode;
use App\Form\EpisodeType;
use App\Repository\EpisodeRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

#[Route('/episode/crud')]
class EpisodeCrudController extends AbstractController
{
    #[Route('/', name: 'app_episode_crud_index', methods: ['GET'])]
    public function index(EpisodeRepository $episodeRepository): Response
    {
        return $this->render('episode_crud/index.html.twig', [
            'episodes' => $episodeRepository->findAll(),
        ]);
    }

    #[Route('/new', name: 'app_episode_crud_new', methods: ['GET', 'POST'])]
    public function new(Request $request, EpisodeRepository $episodeRepository): Response
    {
        $episode = new Episode();
        $form = $this->createForm(EpisodeType::class, $episode);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $episodeRepository->save($episode, true);

            return $this->redirectToRoute('app_episode_crud_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('episode_crud/new.html.twig', [
            'episode' => $episode,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_episode_crud_show', methods: ['GET'])]
    public function show(Episode $episode): Response
    {
        return $this->render('episode_crud/show.html.twig', [
            'episode' => $episode,
        ]);
    }

    #[Route('/{id}/edit', name: 'app_episode_crud_edit', methods: ['GET', 'POST'])]
    public function edit(Request $request, Episode $episode, EpisodeRepository $episodeRepository): Response
    {
        $form = $this->createForm(EpisodeType::class, $episode);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $episodeRepository->save($episode, true);

            return $this->redirectToRoute('app_episode_crud_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('episode_crud/edit.html.twig', [
            'episode' => $episode,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_episode_crud_delete', methods: ['POST'])]
    public function delete(Request $request, Episode $episode, EpisodeRepository $episodeRepository): Response
    {
        if ($this->isCsrfTokenValid('delete'.$episode->getId(), $request->request->get('_token'))) {
            $episodeRepository->remove($episode, true);
        }

        return $this->redirectToRoute('app_episode_crud_index', [], Response::HTTP_SEE_OTHER);
    }
}

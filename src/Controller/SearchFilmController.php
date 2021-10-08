<?php

namespace App\Controller;

use App\Repository\FilmRepository;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class SearchFilmController extends AbstractController
{
    /**
     * @Route("/search/film", name="search_film")
     */
    public function index(FilmRepository $filmRepository): Response
    {
        $films = $filmRepository->findAll();
        return $this->render('search_film/index.html.twig', [
          'films' => $films
        ]);
    }
}

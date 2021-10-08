<?php

namespace App\Controller;

use App\Repository\FilmRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class FrontFilmController extends AbstractController
{
    /**
     * @Route("/front/film", name="front_film")
     */
    public function index(FilmRepository $filmRepository): Response
    {
        $films = $filmRepository->findAll();
        return $this->render('front_film/index.html.twig', [
          'films' => $films
        ]);
    }

}

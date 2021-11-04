<?php

namespace App\Controller;

use http\Params;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use App\Repository\FilmRepository;
use function Symfony\Component\DependencyInjection\Loader\Configurator\param;
use App\Form\SearchType;
use App\Repository\CategoryRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\Request;

class FicheFilmController extends AbstractController
{
    /**
     * @Route("/fiche/film", name="fiche_film")
     */
    public function index(
        Request $request,
        FilmRepository $filmRepository
    ): Response {
        $id = $request->query->get('id');
        $film = $filmRepository->find($id);
        return $this->render('fiche_film/index.html.twig', [
            'controller_name' => 'FicheFilmController',
            'film' => $film,
        ]);
    }
}

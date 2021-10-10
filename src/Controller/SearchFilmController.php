<?php

namespace App\Controller;

use App\Form\SearchType;
use App\Repository\CategoryRepository;
use App\Repository\FilmRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class SearchFilmController extends AbstractController
{
    /** @var EntityManagerInterface $em */
    protected $em;

    public function __construct(EntityManagerInterface $em)
    {
        $this->em = $em;
    }

    /**
     * @Route("/rechercher/film", name="search_film")
     */
    public function index(Request $request, FilmRepository $filmRepository): Response
    {
        $searchForm = $this->createForm(SearchType::class);
        $searchForm->handleRequest($request);

        if ($searchForm->isSubmitted() && $searchForm->isValid()) {

            $films = $filmRepository->search($searchForm->getData());

            return $this->render('default/filmotheque-search.html.twig', [
                'films' => $films
            ]);
        }

        return $this->render('default/recherche.html.twig', [
            'searchForm' => $searchForm->createView()
        ]);
    }

    /**
     * @Route("/resultat-recherche", name="print-movies")
     */
    public function list(FilmRepository $filmRepository): Response
    {
        $films = $filmRepository->findAll();

        return $this->render('default/recherche.html.twig', [
            'films' => $films
        ]);
    }
}

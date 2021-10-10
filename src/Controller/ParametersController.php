<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class ParametersController extends AbstractController
{
    /**
     * @Route("/parametres", name="parameters")
     */
    public function index(): Response
    {
        return $this->render('default/parameters/index.html.twig', [
            'controller_name' => 'ParametersController',
        ]);
    }

    /**
     * @Route("/parametres/historique", name="historique")
     */
    public function historique(): Response
    {
        return $this->render('default/parameters/historique.html.twig', [
            'controller_name' => 'ParametersController',
        ]);
    }
}

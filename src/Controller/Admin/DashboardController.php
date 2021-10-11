<?php

namespace App\Controller\Admin;

use App\Entity\Category;
use App\Entity\User;
use App\Entity\Film;
use EasyCorp\Bundle\EasyAdminBundle\Config\Dashboard;
use EasyCorp\Bundle\EasyAdminBundle\Config\MenuItem;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractDashboardController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class DashboardController extends AbstractDashboardController
{
    /**
     * @Route("/admin", name="admin")
     */
    public function index(): Response
    {
        return $this->render('admin/admin-dashboard.html.twig', []);
    }

    public function configureDashboard(): Dashboard
    {

        return Dashboard::new()->setTitle('Projet Annuel : Appli Ciné');
    }

    public function configureMenuItems(): iterable
    {
        return [
            MenuItem::linkToRoute('Front', 'fa fa-home', 'home'),
            MenuItem::linktoDashboard('Espace administrateur', 'fa fa-lock'),
            MenuItem::linkToCrud('Gérer les films', 'fa fa-film', Film::class),
            MenuItem::linkToCrud('Gérer les catégories', 'fa fa-film', Category::class),
            MenuItem::linkToCrud('Gérer les utilisateurs', 'fa fa-users', User::class),
        ];
    }
    
}

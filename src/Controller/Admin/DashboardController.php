<?php

namespace App\Controller\Admin;

use App\Entity\User;
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
        // REstrictions admin
        $this->denyAccessUnlessGranted('ROLE_SUPER_ADMIN');
        // return parent::index();
        return $this->render('admin/admin-dashboard.html.twig', []);
    }

    public function configureDashboard(): Dashboard
    {
        // REstrictions admin
        $this->denyAccessUnlessGranted('ROLE_SUPER_ADMIN');
        return Dashboard::new()
            ->setTitle('Projet Annuel : Appli Ciné');
    }

    public function configureMenuItems(): iterable
    {
        return [
            MenuItem::linktoDashboard('Front', 'fa fa-home'),
            // MenuItem::linkToRoute('Front', 'fa fa-home', '/'),
            MenuItem::linktoDashboard('Espace administrateur', 'fa fa-lock'),
            MenuItem::linktoDashboard('Gérer les films', 'fa fa-film'),
            MenuItem::linkToCrud('Gérer les utilisateurs', 'fa fa-users', User::class),
        ];
        
        // yield MenuItem::linkToCrud('The Label', 'fas fa-list', EntityClass::class);
    }
    
}

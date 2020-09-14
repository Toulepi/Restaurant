<?php

namespace App\Controller;

use App\Service\AppService;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\IsGranted;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * Class CompteController
 * @package App\Controller
 * @Route ("/compte",name="app_")
 * @IsGranted ("ROLE_USER")
 */
class CompteController extends AbstractController
{
    /**
     * @Route("/", name="mon_compte")
     * @param AppService $service
     * @return Response
     */
    public function index(AppService $service)
    {
        return $this->render('compte/index.html.twig', [
            'titre_page' => $service->getTitre("Mon Compte"),
            'lignesCmds' => $service->contenuDuPanier(),
            'total' => $service->getTotalPanier()
        ]);
    }
}

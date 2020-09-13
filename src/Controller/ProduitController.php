<?php

namespace App\Controller;

use App\Service\AppService;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;

/**
 * Class ProduitController
 * @package App\Controller
 * @Route ("/produit",name="produit_")
 */
class ProduitController extends AbstractController
{
    /**
     * @Route("/", name="liste")
     */
    public function liste(AppService $service, Request $request)
    {
        return $this->render(
            'produit/index.html.twig',
            [
                'titre_page'=>$service->getTitre("liste des produits"),
                'produits' => $service->getListeProduits($request),
                'lignesCmds' => $service->contenuDuPanier(),
                'total' => $service->getTotalPanier()
            ]
        );
    }



}

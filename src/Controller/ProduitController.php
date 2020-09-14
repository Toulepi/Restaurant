<?php

namespace App\Controller;

use App\Service\AppService;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\IsGranted;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;

/**
 * Class ProduitController
 * @package App\Controller
 * @Route ("/admin/produit",name="produit_")
 * @IsGranted("ROLE_ADMIN")
 */
class ProduitController extends AbstractController
{
    /**
     * @Route("/", name="liste")
     */
    public function liste(AppService $service, Request $request)
    {
        //$this->denyAccessUnlessGranted("ROLE_ADMIN");
        return $this->render(
            'produit/produit.html.twig',
            [
                'titre_page'=>$service->getTitre("liste des produits"),
                'produits' => $service->getListeProduits($request),
                'lignesCmds' => $service->contenuDuPanier(),
                'total' => $service->getTotalPanier()
            ]
        );
    }



}

<?php

namespace App\Controller;

use App\Repository\CategorieRepository;
use App\Repository\ProduitRepository;
use App\Service\AppService;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;


/**
 * Class NewStylController
 * @package App\Controller
 * @Route ("/",name="newstyl_")
 */
class NewStylController extends AbstractController
{
    /**
     * @Route("/", name="accueil")
     * @param ProduitRepository $produitRepository
     * @param CategorieRepository $categorieRepository
     * @param AppService $service
     * @return Response
     */
    public function accueil(ProduitRepository $produitRepository, CategorieRepository $categorieRepository, AppService $service)
    {
        $produit = $produitRepository->findAll();
        $categorie = $categorieRepository->findAll();

        return $this->render(
            "NewStyl/accueil.html.twig",
            [
                'titre_page' => $service->getTitre("Bar Restaurant"),
                'categorie' => $categorie,
                'produit' => $produit,
                'lignesCmds' => $service->contenuDuPanier(),
                'total' => $service->getTotalPanier()
            ]);
    }

    /**
     *
     * @return Response
     */
    public function login(AppService $service)
    {
        return $this->render(
            "User/login1.html.twig",
            [
                'lignesCmds' => $service->contenuDuPanier(),
                'total' => $service->getTotalPanier()
            ]);
    }

    /**
     * @return Response
     */
    public function register(AppService $service)
    {
        return $this->render(
            "User/register1.html.twig",
            [
                'lignesCmds' => $service->contenuDuPanier(),
                'total' => $service->getTotalPanier()
            ]);
    }

    /**
     * @return Response
     * @Route ("/panier", name="panier")
     */
    public function panier(AppService $service)
    {
        return $this->render(
            "Panier/panier.html.twig",
            [
                'lignesCmds' => $service->contenuDuPanier(),
                'total' => $service->getTotalPanier()
            ]);
    }
}

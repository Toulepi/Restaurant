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
    public function accueil(ProduitRepository $produitRepository,CategorieRepository $categorieRepository, AppService $service)
    {
        $produit = $produitRepository->findAll();
        $categorie = $categorieRepository->findAll();

        return $this->render(
            "NewStyl/accueil.html.twig",
            [
                'categorie'=>$categorie,
                'produit' => $produit,
                'lignesCmds' => $service->contenuDuPanier(),
                'total' => $service->getTotalPanier()
            ]);
    }

    /**
     * @return Response
     * @Route ("/login", name="login")
     */
    public function login()
    {
        return $this->render("NewStyl/login.html.twig");
    }

    /**
     * @return Response
     * @Route ("/register", name="register")
     */
    public function register()
    {
        return $this->render("NewStyl/register.html.twig");
    }

    /**
     * @return Response
     * @Route ("/panier", name="panier")
     */
    public function panier()
    {
        return $this->render("NewStyl/panier.html.twig");
    }
}

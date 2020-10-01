<?php

namespace App\Controller;

use App\Entity\Categorie;
use App\Entity\Produit;
use App\Repository\CategorieRepository;
use App\Repository\ProduitRepository;
use App\Service\AppService;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
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
     * @Route("/produit/{id}", name="produit_show")
     * @param Produit $produit
     * @return Response
     */
    public function show(Produit $produit, AppService $service)
    {
        return $this->render('show.html.twig',
            [
                'produit' => $produit,
                'lignesCmds' => $service->contenuDuPanier(),
                'total' => $service->getTotalPanier()
            ]);
    }

    /**
     * @param Request $request
     * @param ProduitRepository $produitRepository
     * @param CategorieRepository $categorieRepository
     * @param AppService $service
     * @return Response
     * @Route ("/",name="accueil")
     */
    public function accueil(Request $request, ProduitRepository $produitRepository, CategorieRepository $categorieRepository, AppService $service): Response
    {

        $produit = $produitRepository->findAll();
        $categories = $categorieRepository->findAll();

        return $this->render(
            "NewStyl/accueil.html.twig",
            [
                'titre_page' => $service->getTitre("Bar Restaurant"),
                'categorie' => $categories,
                'produit' => $produit,
                'lignesCmds' => $service->contenuDuPanier(),
                'total' => $service->getTotalPanier()
            ]);
    }

    /**
     * @Route("/search", name="search", methods={"GET","POST"})
     * @param AppService $service
     * @param Request $request
     * @param CategorieRepository $categorieRepository
     * @return Response
     */
    public function search(AppService $service, Request $request, CategorieRepository $categorieRepository): Response
    {
        $produit = new Produit();
        $categorie = new Categorie();
        $mot = $request->get('search');
        $em = $this->getDoctrine()->getManager();
        if (!empty($mot)) {
            $produit = $em->getRepository(Produit::class)->findByWord($mot);
            $produitCat = $em->getRepository(Produit::class)->findByCat($mot);
            $product = array_merge($produit,$produitCat);
            $categorie = $em->getRepository(Categorie::class)->findByWord($mot);
            if ($mot == "all"){
                $allProducts = $em->getRepository(Produit::class)->findAll();
                $product = array_merge($product, $allProducts);
            }

        } else {
            $product = $em->getRepository(Produit::class)->findAll();
            $categorie = $em->getRepository(Categorie::class)->findAll();
        }

        return $this->render("search/search.html.twig", [
            'titre_page' => $service->getTitre("Résultats"),
            'categorie' => $categorie,
            'product' => $product,
//            'allProducts' => $allProducts,
            'lignesCmds' => $service->contenuDuPanier(),
            'total' => $service->getTotalPanier(),
            'mot' => $mot
        ]);
    }

    /**
     * @param AppService $service
     * @return Response
     * @Route ("/panier",name="panier")
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

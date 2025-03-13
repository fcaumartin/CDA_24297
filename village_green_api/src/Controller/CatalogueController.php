<?php

namespace App\Controller;

use App\Entity\Categorie;
use App\Entity\Produit;
use App\Entity\SousCategorie;
use App\Repository\CategorieRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

final class CatalogueController extends AbstractController
{
    #[Route('/', name: 'app_catalogue')]
    public function index(CategorieRepository $repo): Response
    {

        $categories = $repo->findAll();

        return $this->render('catalogue/index.html.twig', [
            'categories' => $categories
        ]);
    }

    #[Route('/categorie/{categorie}', name: 'app_catalogue_categorie')]
    public function categorie(Categorie $categorie): Response
    {

        dump($categorie);

        return $this->render('catalogue/categorie.html.twig', [
            'categorie' => $categorie
        ]);
    }

    #[Route('/souscategorie/{sousCategorie}', name: 'app_catalogue_souscategorie')]
    public function sousCategorie(SousCategorie $sousCategorie): Response
    {

        dump($sousCategorie);

        return $this->render('catalogue/souscategorie.html.twig', [
            'sousCategorie' => $sousCategorie
        ]);
    }

    #[Route('/produit/{produit}', name: 'app_catalogue_produit')]
    public function produit(Produit $produit): Response
    {

        dump($produit);

        return $this->render('catalogue/produit.html.twig', [
            'produit' => $produit
        ]);
    }
}

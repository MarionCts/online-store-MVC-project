<?php

class ProduitController
{
    private ProduitRepository $produitRepository;
    public function __construct()
    {
        $this->produitRepository = new ProduitRepository();
    }
    public function index()
    {
        // Récupérer la liste des produits depuis le modèle
        $produits = $this->produitRepository->getAllProduits();

        // Inclure la vue et lui passer les données
        // require __DIR__ . '/../view/admin_produits.php';
        require __DIR__ . '/../view/accueil.php';
    }
    public function panier()
    {
        // Récupérer la liste des produits depuis le modèle

        $produits = $this->produitRepository->getAllProduits();
        // Inclure la vue et lui passer les données
        // require __DIR__ . '/../view/admin_produits.php';
        require __DIR__ . '/../view/panier.php';
    }
}

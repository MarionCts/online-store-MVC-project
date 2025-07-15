<?php

class AdminController
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
        require __DIR__ . '/../view/admin_produits.php';
    }

    public function addProduct()
    {
        // Vérification CSRF
        if (!isset($_POST['csrf_token']) || !verifierTokenCSRF($_POST['csrf_token'])) {
            setFlash('danger', 'Erreur de sécurité');
            header('Location: index.php');
        }

        if (!empty($_POST['addButton']) && !empty($_POST['nom']) && !empty($_POST['description']) && !empty($_POST['prix']) && !empty($_POST['categorie']) && !empty($_POST['stock'])) {
            $produits = $this->produitRepository->ajouterProduit($_POST['nom'], $_POST['description'], $_POST['prix'], $_POST['categorie'], $_POST['stock']);

            header('Location: index.php?page=admin_produits');
        }

        // Inclure la vue et lui passer les données
        require __DIR__ . '/../view/admin_produits.php';
    }


    public function modifyProduct()
    {
        // Vérification CSRF
        if (!isset($_POST['csrf_token']) || !verifierTokenCSRF($_POST['csrf_token'])) {
            setFlash('danger', 'Erreur de sécurité');
            header('Location: index.php');
        }

        if (isset($_GET['id'])) {
            $id = $_GET['id'];
        }

        $produit = $this->produitRepository->getProduit($id);
        $produits = $this->produitRepository->getAllProduits();

        if (!empty($_POST['modifyButton']) && !empty($_POST['nom']) && !empty($_POST['description']) && !empty($_POST['prix']) && !empty($_POST['categorie']) && !empty($_POST['stock'])) {
            $produits = $this->produitRepository->modifierProduit($id, $_POST['nom'], $_POST['description'], $_POST['prix'], $_POST['categorie'], $_POST['stock']);
            header('Location: index.php?page=admin_produits');
        }

        // Inclure la vue et lui passer les données
        require __DIR__ . '/../view/modifier_produit.php';
    }

    public function deleteProduct()
    {
        if (isset($_GET['id'])) {
            $produits = $this->produitRepository->supprimerProduit($_GET['id']);

            // Inclure la vue et lui passer les données
            header('Location: index.php?page=admin_produits');
        }
    }

    public function allUtilisateur()
    {
        // Récupérer la liste des produits depuis le modèle
        $utilisateurs = $this->produitRepository->getAllUtilisateurs();
        // Inclure la vue et lui passer les données
        require __DIR__ . '/../view/liste_utilisateur.php';
    }
}

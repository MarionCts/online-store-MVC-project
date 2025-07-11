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

        if (!empty($_POST['addButton'])) {
            $produits = $this->produitRepository->ajouterProduit($_POST['nom'], $_POST['description'], $_POST['prix'], $_POST['categorie'], $_POST['stock']);

            header('Location: index.php?page=admin_produits');
        }

        // Inclure la vue et lui passer les données
        require __DIR__ . '/../view/admin_produits.php';
    }

    public function modifyProduct()
    {

        if (isset($_GET['id'])) {
            $id = $_GET['id'];
        }

        $produit = $this->produitRepository->getProduit($id);
        $produits = $this->produitRepository->getAllProduits();

        if (!empty($_POST['modifyButton'])) {
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
}

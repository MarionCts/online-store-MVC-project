<?php
// require_once __DIR__ . '/../repository/CommandeRepository.php';
class CommandeController
{
    private CommandeRepository $commandeRepository;
    public function __construct()
    {
        $this->commandeRepository = new CommandeRepository();
    }
    public function index()
    {
        // Récupérer la liste des produits depuis le modèle
        $commandes = $this->commandeRepository->getAllCommandes();
        // Inclure la vue et lui passer les données
        // require __DIR__ . '/../view/admin_produits.php';
        require __DIR__ . '/../view/historique.php';
    }
    /**
     * Affiche le contenu du panier.
     */
    public function panier()
    {
        // Assurez-vous que le tableau 'panier' de la session existe
        if (!isset($_SESSION['panier'])) {
            $_SESSION['panier'] = [];
        }
        // Les articles du panier sont directement dans la session
        // $cartItems = $_SESSION['panier'];
        // Inclure la vue et lui passer les données du panier
        require __DIR__ . '/../view/panier.php';
    }
    /**
     * Ajoute un produit au panier.
     */
    public function addToPanier()
    {
        if (isset($_GET['id'])) {
            $productId = (int)$_GET['id'];
            // Récupérer les détails du produit depuis la base de données
            $produit = $this->commandeRepository->addProduitPanier($productId);
            if ($produit) {
                // Assurez-vous que le tableau 'panier' de la session existe
                if (!isset($_SESSION['panier'])) {
                    $_SESSION['panier'] = [];
                }
                $found = false;
                // Vérifier si le produit existe déjà dans le panier, puis incrémenter la quantité
                foreach ($_SESSION['panier'] as $key => $item) {
                    $item = unserialize($item);
                    if ($item->getId() == $productId) {
                        $product =  unserialize($_SESSION['panier'][$key]);
                        $product->setQuantity($item->getQuantity() + 1);
                        $_SESSION['panier'][$key] = serialize($product);
                        $found = true;
                        break;
                    }
                }
                // Si le produit n'est pas trouvé dans le panier, l'ajouter avec la quantité 1
                if (!$found) {
                    $produit->setQuantity(1);
                    $_SESSION['panier'][] = serialize($produit);
                }
                header('Location: index.php?page=panier');
                exit();
            } else {
                // Gérer le cas où le produit n'est pas trouvé
                echo "Produit non trouvé.";
            }
        } else {
            // Gérer le cas où aucun ID n'est fourni
            echo "L'ID du produit est manquant.";
        }
    }
    /**
     * Supprime un produit du panier.
     */
    public function removeFromPanier()
    {
        if (isset($_GET['id'])) {
            $productIdToRemove = (int)$_GET['id'];
            if (isset($_SESSION['panier']) && !empty($_SESSION['panier'])) {
                // Parcourir le panier pour trouver et supprimer l'article
                foreach ($_SESSION['panier'] as $key => $produit) {
                    $produit = unserialize($produit);
                    if ($produit->getId() == $productIdToRemove) {
                        // Décrémenter la quantité
                        if ($produit->getQuantity() > 1) {
                            $product =  unserialize($_SESSION['panier'][$key]);
                            $product->setQuantity($produit->getQuantity() - 1);
                            $_SESSION['panier'][$key] = serialize($product);
                        } else {
                            // Supprimer l'article si la quantité est de 1
                            unset($_SESSION['panier'][$key]);
                        }
                        break;
                    }
                }
                // Ré-indexer le tableau après la suppression pour éviter les problèmes avec les boucles foreach
                $_SESSION['panier'] = array_values($_SESSION['panier']);
            }
        }
        header('Location: index.php?page=panier');
        exit();
    }

    public function addCommande()
    {

        if ($_GET['totalPrice']) {
            $totalPrice = $_GET['totalPrice'];
            $this->commandeRepository->ajouterCommande(date('Y-m-d'), $totalPrice);
            unset($_SESSION['panier']);
            header('Location: index.php?page=panier');
        }

        // Inclure la vue et lui passer les données
        require __DIR__ . '/../view/panier.php';
    }

}

<?php
class CommandeRepository
{
    private $pdo;
    public function __construct()
    {
        $this->pdo = Database::connect();
    }
    // //-----------------------------------------------------------
    // Méthode Ajouter commande
    // //-----------------------------------------------------------
    public function ajouterCommande($dateCommande, $prixTotal)
    {
        $sql = "INSERT INTO commandes (
            date_commande, prix_total
            )VALUES(
            :dateCommande,
            :prixTotal)";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute([
            'dateCommande' => $dateCommande,
            'prixTotal' => $prixTotal,
        ]);
    }
    // //-----------------------------------------------------------
    // Méthode
    // //-----------------------------------------------------------
    public function getAllCommandes()
    {
        $sql = "SELECT *
                FROM commandes";
        $stmt = $this->pdo->query($sql);
        $commandes = $stmt->fetchAll(PDO::FETCH_ASSOC);
        $result = [];
        foreach ($commandes as $value) {
            $result[] = new Commande(
                $value['id'],
                $value['date_commande'],
                $value['prix_total'],
            );
        }
        return $result;
    }
    // //-----------------------------------------------------------
    // Méthode ajout produit au panier
    // //-----------------------------------------------------------
    public function addProduitPanier(int $id) : ?Produit
    {
        $sql = "SELECT *
                    FROM produits
                    WHERE id = :id";
        $stmt = $this->pdo->prepare($sql);
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        $stmt->execute();
        $produitSelect = $stmt->fetch();
        if ($produitSelect) {
          return new Produit(
               $produitSelect['id'],
                $produitSelect['nom'],
                 $produitSelect['description'],
                  $produitSelect['prix'],
                   $produitSelect['categorie'],
                   $produitSelect['stock'],
                   $produitSelect['quantity']
            );
        } return null;
    }
 
}
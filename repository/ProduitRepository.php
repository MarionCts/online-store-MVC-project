<?php

require_once __DIR__ . '/../model/Produit.php';

class ProduitRepository
{
    private $pdo;
    public function __construct()
    {
        $this->pdo = Database::connect();
    }

    // //-----------------------------------------------------------
    // Méthode Selectionner Produit
    // //-----------------------------------------------------------
    public function getAllProduits()
    {
        $sql = "SELECT *
                FROM produits";
        $stmt = $this->pdo->query($sql);
        $produits = $stmt->fetchAll(PDO::FETCH_ASSOC);
        $result = [];

        foreach ($produits as $value) {
            $result[] = new Produit(
                $value['id'],
                $value['nom'],
                $value['description'],
                $value['prix'],
                $value['categorie'],
                $value['stock']
            );
        }
        return $result;
    }

    // //-----------------------------------------------------------
    // Méthode Ajouter Produit
    // //-----------------------------------------------------------
    public function ajouterProduit($nom, $description, $prix, $categorie, $stock)
    {
        $sql = "INSERT INTO produits (
            nom,
            description,
            prix,
            categorie,
            stock
        ) VALUES (
            :nom,
            :description,
            :prix,
            :categorie,
            :stock
        );";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute([
            'nom' => $nom,
            'description' => $description,
            'prix' => $prix,
            'categorie' => $categorie,
            'stock' => $stock
        ]);
        $produit = $stmt->fetchAll(PDO::FETCH_ASSOC);
        // header('Location: index.php');
    }
    // // ------------------------------------------------------
    // Modification des produits
    // // ------------------------------------------------------
    public function modifierProduit($id, $nom, $description, $prix, $categorie, $stock)
    {
        $sql = 'UPDATE produits
            SET
            nom = :nom,
            description = :description,
            prix = :prix,
            categorie = :categorie,
            stock = :stock
            WHERE id = :id';
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute([
            'nom' => $nom,
            'desciption' => $description,
            'prix' => $prix,
            'categorie' => $categorie,
            'stock' => $stock,
            'id' => $id
        ]);
        $produit = $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
    // // ------------------------------------------------------
    // Supprimer des produits
    // // ------------------------------------------------------
    public function supprimerProduit($id, $nom, $description, $prix, $categorie, $stock)
    {
        $sql = 'DELETE FROM produits
        WHERE id = :id';
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute([
            'id' => $_POST['id']
        ]);
    }
}

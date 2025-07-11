<?php

class DetailCommandeRepository 
{

    private PDO $pdo;

    public function __construct()
    {
        $this->pdo = Database::connect();
    }

    public function BuildDetailCommande(array $row): DetailCommande
    {
        return new DetailCommande (
            (int)$row['id'],
            (int)$row['id_commande'],
            (int)$row['id_utilisateur'],
            (int)$row['id_produit']
        );
    }
}

?>
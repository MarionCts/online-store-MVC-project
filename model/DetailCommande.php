<?php

class DetailCommande {

    private int $id;
    private string $id_commande;
    private string $id_utilisateur;
    private int $id_produit;

    // CONSTRUCTOR

    public function __construct(int $id, int $id_commande, int $id_utilisateur, int $id_produit)
    {
        $this->id = $id;
        $this->id_commande = $id_commande;
        $this->id_utilisateur = $id_utilisateur;
        $this->id_produit = $id_produit;

    }

    // GETTERS

    public function getId(): int 
    {
        return $this->id;
    }

    public function getIdCommande(): int 
    {
        return $this->id_commande;
    }

    public function getIdUtilisateur(): int 
    {
        return $this->id_utilisateur;
    }

    public function getIdProduit(): int 
    {
        return $this->id_produit;
    }

    // SETTERS

    public function setId($id) 
    {
        $this->id = $id;
    }

    public function setIdCommande($id_commande)
    {
        $this->id_commande = $id_commande;
    }

    public function setIdUtilisateur($id_utilisateur)
    {
        $this->id_utilisateur = $id_utilisateur;
    }

    public function setIdProduit($id_produit)
    {
        $this->id_produit = $id_produit;
    }

}

?>
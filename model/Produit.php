<?php 

class Produit 
{
    private int $id;
    private string $nom;
    private string $description;
    private int $prix;
    private string $categorie;
    private int $stock;

    // CONSTRUCTOR

    public function __construct(int $id, string $nom, string $description, int $prix, string $categorie, int $stock)
    {
        $this->id = $id;
        $this->nom = $nom;
        $this->description = $description;
        $this->prix = $prix;
        $this->categorie = $categorie;
        $this->stock = $stock;
    }

    // GETTERS

    public function getId(): int 
    {
        return $this->id;
    }

    public function getNom(): string 
    {
        return $this->nom;
    }

    public function getDescription(): string 
    {
        return $this->description;
    }

    public function getPrix(): int 
    {
        return $this->prix;
    }

    public function getCategorie(): string 
    {
        return $this->categorie;
    }

    public function getStock(): int 
    {
        return $this->stock;
    }

    // SETTERS

    public function setId($id) 
    {
        $this->id = $id;
    }

    public function setNom($nom)
    {
        $this->nom = $nom;
    }

    public function setDescription($description)
    {
        $this->description = $description;
    }

    public function setPrix($prix)
    {
        $this->prix = $prix;
    }

    public function setCategorie($categorie)
    {
        $this->categorie = $categorie;
    }

    public function setStock($stock)
    {
        $this->stock = $stock;
    }

}

?>
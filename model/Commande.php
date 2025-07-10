<?php

class Commande {

    private int $id;
    private string $dateCommande;
    private string $prixTotal;




    public function __construct(int $id, string $dateCommande, string $prixTotal) {

        $this->id = $id;
        $this->dateCommande = $dateCommande;
        $this->prixTotal = $prixTotal;
    }

    public function getId()
    {
        return $this->id;
    }

    /**
     * Set the value of id
     *
     * @return  self
     */ 
    public function setId($id)
    {
        $this->id = $id;

        return $this;
    }

    /**
     * Get the value of dateCommande
     */ 
    public function getDateCommande()
    {
        return $this->dateCommande;
    }

    /**
     * Set the value of dateCommande
     *
     * @return  self
     */ 
    public function setDateCommande($dateCommande)
    {
        $this->dateCommande = $dateCommande;

        return $this;
    }

    /**
     * Get the value of prixTotal
     */ 
    public function getPrixTotal()
    {
        return $this->prixTotal;
    }

    /**
     * Set the value of prixTotal
     *
     * @return  self
     */ 
    public function setPrixTotal($prixTotal)
    {
        $this->prixTotal = $prixTotal;

        return $this;
    }
}

?>
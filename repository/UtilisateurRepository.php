<?php

require_once __DIR__ . '/../model/Utilisateur.php';

class UtilisateurRepository
{
    private $pdo;
    public function __construct()
    {
        $this->pdo = Database::connect();
    }

    // //-----------------------------------------------------------
    // Méthode Selectionner tous les utilisateurs
    // //-----------------------------------------------------------
    public function getAllUtilisateurs()
    {
        $sql = "SELECT *
                FROM utilisateurs";
        $stmt = $this->pdo->query($sql);
        $utilisateurs = $stmt->fetchAll(PDO::FETCH_ASSOC);
        $result = [];

        foreach ($utilisateurs as $value) {
            $result[] = new Utilisateur(
                $value['id'],
                $value['nom'],
                $value['prenom'],
                $value['email'],
                $value['password'],
                $value['isAdmin']
            );
        }
        return $result;
    }
}

?>
<?php

class UtilisateurRepository
{
    private $pdo;

    public function __construct()
    {
        $this->pdo = Database::connect();
    }

    // //-----------------------------------------------------------
    // Méthode Selectionner tous les Utilisateurs
    // //-----------------------------------------------------------

        public function getAllUtilisateurs()
    {
        $sql = "SELECT *
                    FROM utilisateurs";
        $stmt = $this->pdo->query($sql);
        $utilisateurs = $stmt->fetchAll(PDO::FETCH_ASSOC);
        $result = [];
        foreach ($utilisateurs as $utilisateur) {
            $result[] = new Utilisateur($utilisateur["id"], $utilisateur["nom"], $utilisateur["prenom"], $utilisateur["email"], $utilisateur["password"], $utilisateur["isAdmin"]);
        }
        return $result;
    }

    // //-----------------------------------------------------------
    // Méthode Selectionner un Utilisateur
    // //-----------------------------------------------------------

    public function findUtilisateur($password, $email)
    {
        $sql = "SELECT * FROM utilisateurs WHERE password = :password AND email = :email;";
        $stmt = $this->pdo->prepare($sql);
        $utilisateurs = $stmt->execute(['password' => $password, 'email' => $email]);
    }

    // //-----------------------------------------------------------
    // Méthode Ajouter Utilisateur
    // //-----------------------------------------------------------

    public function ajouterUtilisateur($nom, $prenom, $email, $password)
    {
        $sql = "INSERT INTO utilisateurs (
            nom,
            prenom,
            email,
            password
        ) VALUES (
            :nom,
            :prenom,
            :email,
            :password
        );";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute([
            'nom' => $nom,
            'prenom' => $prenom,
            'email' => $email,
            'password' => $password
        ]);
        $utilisateurs = $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
}

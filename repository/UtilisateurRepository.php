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
        if (!empty($_POST['nom']) && !empty($_POST['prenom']) && !empty($_POST['email']) && !empty($_POST['password'])) {

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
                'password' => password_hash($_POST['password'], PASSWORD_ARGON2I)
            ]);
            $utilisateurs = $stmt->fetchAll(PDO::FETCH_ASSOC);
            setFlash('success', 'Vous avez bien été inscrit !');
            header('Location: index.php');
        } else {
            // Inclure la vue et lui passer les données
            setFlash('danger', 'Vous devez remplir tous les champs.');
        }
    }

    // //-----------------------------------------------------------
    // Méthode de gestion de session
    // //-----------------------------------------------------------

    public function sessionLogin()
    {

        $sql = "SELECT * FROM utilisateurs WHERE email = :email";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute(['email' => $_POST['email']]);
        $utilisateur = $stmt->fetch();

        if ($utilisateur && password_verify($_POST['password'], $utilisateur['password'])) {
            $_SESSION['email'] = $utilisateur['email'];
            $_SESSION['prenom'] = $utilisateur['prenom'];
            $_SESSION['isAdmin'] = $utilisateur['isAdmin'];

            header('Location: index.php?page=accueil');
            exit();

        } else {
            setFlash('danger', "Il y a un problème au niveau de l'adresse mail ou du mot de passe");
            header('Location: index.php?page=login');
        }
    }
}

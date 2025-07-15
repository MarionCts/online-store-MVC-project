<?php

class UtilisateurController
{
    private UtilisateurRepository $utilisateurRepository;
    public function __construct()
    {
        $this->utilisateurRepository = new UtilisateurRepository();
    }
    public function findUtilisateur()
    {
        // Récupérer la liste des produits depuis le modèle
        $utilisateurs = $this->utilisateurRepository->getAllUtilisateurs();
        // Inclure la vue et lui passer les données
        require __DIR__ . '/../view/login.php';
    }

    public function register()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $utilisateurs = $this->utilisateurRepository->ajouterUtilisateur($_POST['nom'], $_POST['prenom'], $_POST['email'], $_POST['password']);
        } else {
            require __DIR__ . '/../view/register.php';
        }
    }

    public function login()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            // Vérification CSRF
            if (!isset($_POST['csrf_token']) || !verifierTokenCSRF($_POST['csrf_token'])) {
                setFlash('danger', 'Erreur de sécurité');
                header('Location: index.php');
                exit();
            }
            $utilisateurs = $this->utilisateurRepository->sessionLogin();
        } else {
            // Inclure la vue et lui passer les données
            require __DIR__ . '/../view/login.php';
        }
    }

    public function logout()
    {
        if (isset($_POST["logout"])) {
            session_destroy();
            header("Location: index.php?page=login");
            exit();
        };
    }
}

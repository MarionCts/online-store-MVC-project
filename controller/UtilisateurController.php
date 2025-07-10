<?php

require_once __DIR__ . '/../repository/UtilisateurRepository.php';

class UtilisateurController {
    private UtilisateurRepository $utilisateurRepository;

    public function __construct() {
        $this->utilisateurRepository = new UtilisateurRepository();
    }

    public function index() {
        // Récupérer la liste des produits depuis le modèle
        $utilisateurs = $this->utilisateurRepository->getAllUtilisateurs();

        // Inclure la vue et lui passer les données
        require __DIR__ . '/../view/admin_produits.php';
    }
}

?>
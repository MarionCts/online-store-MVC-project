<?php



class CommandeController {
    private CommandeRepository $commandeRepository;

    public function __construct() {
        $this->commandeRepository = new CommandeRepository();
    }

    public function index() {
        // Récupérer la liste des commandes depuis le modèle
        $commandes = $this->commandeRepository->getAllCommandes();

        // Inclure la vue et lui passer les données
        require __DIR__ . '/../view/historique.php';
    }
}
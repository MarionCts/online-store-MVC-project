<?php
require_once __DIR__ . '/../controller/ProduitController.php';
require_once __DIR__ . '/../controller/AdminController.php';
require_once __DIR__ . '/../controller/CommandeController.php';
require_once __DIR__ . '/../controller/UtilisateurController.php';
class Router
{
    public static function redirect()
    {
        if (isset($_GET['page'])) {
            switch ($_GET['page']) {
                ////////////////////////
                // EXEMPLES DE ROUTES //
                ////////////////////////
                case 'accueil':
                    $controller = new ProduitController();
                    $controller->index();
                    break;
                case 'historique':
                    $controller = new CommandeController();
                    $controller->index();
                    break;
                case 'login':
                    $controller = new UtilisateurController();
                    $controller->login();
                    break;
                case 'panier':
                    $controller = new ProduitController();
                    $controller->panier();
                    break;
                case 'admin_produits':
                    $controller = new UtilisateurController();
                    $controller->index();
                    break;
                default:
                    echo 'Page not found';
                    break;
            }
        } else {
            echo 'accueil';
        }
    }
}
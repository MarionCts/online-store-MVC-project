<?php

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
                case 'liste_utilisateur':
                    $controller = new adminController();
                    $controller->allUtilisateur();
                    break;
                case 'historique':
                    $controller = new CommandeController();
                    $controller->index();
                    break;
                case 'login':
                    $controller = new UtilisateurController();
                    $controller->login();
                    break;
                case 'logout':
                    $controller = new UtilisateurController();
                    $controller->logout();
                    break;
                case 'panier':
                    $controller = new CommandeController();
                    $controller->panier();
                    break;
                case 'addToPanier':
                     $controller = new CommandeController();
                    $controller->addToPanier();
                    break;
                case 'removeFromPanier':
                    $controller = new CommandeController();
                    $controller->removeFromPanier();
                    break;
                case 'admin_produits':
                    $controller = new AdminController();
                    $controller->index();
                    break;
                case 'add_product':
                    $controller = new AdminController();
                    $controller->addProduct();
                    break;
                case 'modify_product':
                    $controller = new AdminController();
                    $controller->modifyProduct();
                    break;
                case 'delete_product':
                    $controller = new AdminController();
                    $controller->deleteProduct();
                    break;
                case 'register':
                    $controller = new UtilisateurController();
                    $controller->register();
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
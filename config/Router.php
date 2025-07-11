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
                case 'historique':
                    $controller = new CommandeController();
                    $controller->index();
                    break;
                case 'login':
                    $controller = new UtilisateurController();
                    $controller->findUtilisateur();
                    break;
                case 'panier':
                    $controller = new ProduitController();
                    $controller->panier();
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
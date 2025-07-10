<?php

define('BASE_URL', 'http://localhost/Arinfo/PHP_MVC_TP-boutique');
require_once('config/Database.php');

// /////////////////////////////////////////////////// //
// REQUIRE DE TOUS LES MODELS/CONTROLLERS/REPOSITORIES //
// /////////////////////////////////////////////////// //

require_once('config/Router.php');

?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Boutique MPS</title>
    <link rel="stylesheet" href="./public/css/style.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Afacad:ital,wght@0,400..700;1,400..700&family=Inter:ital,opsz@0,14..32;1,14..32&display=swap" rel="stylesheet">
</head>
<body>

<?php include './view/layout/header.php' ?>

<?php Router::redirect(); ?>

<?php include './view/layout/footer.php' ?>

</body>
</html>
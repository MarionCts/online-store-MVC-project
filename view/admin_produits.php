<?php

require_once __DIR__ . '/../config/Database.php';
require_once __DIR__ . '/../config/Router.php';
require_once __DIR__ . '/../model/Utilisateur.php';
require_once __DIR__ . '/../repository/UtilisateurRepository.php';
require_once __DIR__ . '/../controller/UtilisateurController.php';

?>

<main>
    <h1 class="primary-title">Liste des utilisateurs</h1>
    <table class="table-template">
        <thead>
            <th>Nom</th>
            <th>Prénom</th>
            <th>Email</th>
            <th>isAdmin</th>
        </thead>
        <tbody>
            <?php foreach ($utilisateurs as $utilisateur): ?>
                <tr>
                    <td><?= htmlspecialchars($utilisateur->getNom()) ?></td>
                    <td><?= htmlspecialchars($utilisateur->getPrenom()) ?></td>
                    <td><?= htmlspecialchars($utilisateur->getEmail()) ?></td>
                    <td><?= htmlspecialchars($utilisateur->getIsAdmin()) ?></td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</main>
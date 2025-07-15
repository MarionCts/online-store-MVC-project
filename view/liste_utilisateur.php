
<main>
    <h2 class="primary-title">Liste des utilisateurs</h2>

    <table class="table-template">
        <tr>
            <th>Nom</th>
            <th>Prenom</th>
            <th>email</th>
            <th>isAdmin</th>
        </tr>
        <?php
        foreach ($utilisateurs as $utilisateur):
        ?>
            <tr>
                <td><?=
                    htmlspecialchars($utilisateur->getNom())
                    ?></td>
                <td><?= htmlspecialchars($utilisateur->getPrenom()) ?></td>
                <td><?= htmlspecialchars($utilisateur->getEmail()) ?></td>
                <td><?= htmlspecialchars($utilisateur->getIsAdmin()) ?></td>
            </tr>
        <?php endforeach; ?>
    </table>

</main>
<?php $token = genererTokenCSRF(); ?>

<main>
    <h2 class="primary-title">S'inscrire</h2>

    <form action="index.php?page=register" method="POST">
        <input type="hidden" name="csrf_token" value="<?= htmlspecialchars($token) ?>">

        <label for="nom">Nom</label>
        <input type="text" name="nom">
        <label for="prenom">Prenom</label>
        <input type="text" name="prenom">
        <label for="email">Email</label>
        <input type="email" name="email">
        <label for="password">Password</label>
        <input type="password" name="password">
        <input class="primary-button" type="submit" value="S'inscrire" name="register">
    </form>
</main>
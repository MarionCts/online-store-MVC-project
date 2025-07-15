<main>

    <h2 class="primary-title">Se connecter</h2>

    <form action="index.php?page=login" method="POST">
        <label for="email">Email</label>
        <input type="email" name="email">
        <label for="password">Password</label>
        <input type="password" name="password">
        <?php if (isset($passwordError)): ?>
            <p><?= htmlspecialchars($passwordError) ?></p>
        <?php endif; ?>
        <!-- <label for="isAdmin">Admin</label>
    <input type="text" name="isAdmin"> -->
        <input class="primary-button" type="submit" value="Se connecter" name="connect">
    </form>

</main>
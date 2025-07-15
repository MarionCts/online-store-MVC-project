<header class="header__bar">
    <img class="logo" src="./public/images/logo.png" alt="Logo de MPS Boutique">
    <nav class="header__bar__menu">
        <ul>
            <li><a class="menu-link" href="index.php?page=accueil">Accueil</a></li>
            <li><a class="menu-link" href="index.php?page=historique">Historique des commandes</a></li>
            <li><a class="menu-link" href="index.php?page=panier">Voir le panier</a></li>
            <?php if (!isset($_SESSION['email'])): ?>
                <li><a class="menu-link" href="index.php?page=login">Se connecter</a></li>
                <li><a class="menu-link" href="index.php?page=register">S'inscrire</a></li>
            <?php endif; ?>
            <?php if (isset($_SESSION['isAdmin']) && $_SESSION['isAdmin'] === 1): ?>
                <li><a class="menu-link" href="index.php?page=admin_produits">Tableau de bord</a></li>
            <?php endif; ?>
            <?php
            if (isset($_SESSION['email'])): ?>
                <h3 class="fourth-title">Bienvenue, <span class=""><?= htmlspecialchars($_SESSION['prenom']) ?></span></h3>
                <form class="logout__form" action="index.php?page=logout" method="POST">
                    <input class="secondary-button logout__form__button" type="submit" name="logout" value="Se déconnecter">
                </form>
            <?php elseif (isset($_COOKIE['email'])): ?>
                <h3 class="fourth-title">Bienvenue, <span class=""><?= htmlspecialchars($_SESSION['prenom']) . ". Veuillez vous reconnecter." ?></span></h3>
            <?php endif; ?>
        </ul>
    </nav>
</header>
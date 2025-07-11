<?php

if (!empty($_POST)) {
    $produitRepository = new ProduitRepository();
    $produitsTest = $produitRepository->ajouterProduit($_POST['nom'], $_POST['description'], $_POST['prix'], $_POST['categorie'], $_POST['stock']);
    $produits = new ProduitRepository();
    header('location: ../index.php');
    exit();
};

?>

<section class="hero__section">
    <div class="hero__section__text">
        <h1 class="hero-title">Tout pour vous, <span class="line-jump">en un seul endroit.</span></h1>
        <p>Découvrez une sélection unique de produits du quotidien et coups de cœur, <span class="line-jump-ls"> soigneusement choisis pour simplifier votre vie.</span></p>
    </div>
</section>

<main>
    <section class="products">
        <h2 class="primary-title">Liste des produits</h2>
        <div class="products-grid">
            <?php foreach ($produits as $produit): ?>
                <div class="product__card">
                    <div class="product__card__image">
                        <img src="./public/images/placeholder.png" alt="placeholder d'un produit">
                    </div>
                    <div class="product__card__text">
                        <div class="product__card__text__titres">
                            <h3 class="third-title"><?= htmlspecialchars($produit->getNom()) ?></h3>
                            <h4 class="category"><?= htmlspecialchars($produit->getCategorie()) ?></h4>
                        </div>
                        <p><?= htmlspecialchars($produit->getDescription()) ?></p>
                        <p class="fourth-title"><?= htmlspecialchars($produit->getPrix()) ?> €</p>
                        <div class="product__card__text__buttons">
                            <input class="primary-button" type="submit" value="Ajouter au panier">
                            <input class="secondary-button" type="submit" value="Voir le produit">
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    </section>

</main>
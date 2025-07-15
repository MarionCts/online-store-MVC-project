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
            <?php
            // Assurez-vous que $produits est bien défini par le contrôleur
            if (isset($produits) && !empty($produits)) :
                foreach ($produits as $produit) : ?>
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
                            <p class="fourth-title"><?= htmlspecialchars(number_format($produit->getPrix(), 2, ',', ' ')) ?> €</p>
                            <div class="product__card__text__buttons">
                                <a class="primary-button" href="index.php?page=addToPanier&id=<?= $produit->getId() ?>">Ajouter au panier</a>
                                </div>
                        </div>
                    </div>
                <?php endforeach;
            else : ?>
                <p>Aucun produit disponible pour le moment.</p>
            <?php endif; ?>
        </div>
    </section>
</main>
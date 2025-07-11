<main>
    <section class="form__product">
        <h2 class="primary-title">Modifier un produit</h2>
        <form action="index.php?page=modify_product&id=<?= htmlspecialchars($id) ?>" method="POST">
            <p>Vous êtes en train de modifier le produit :</p> 
            <h3 class="fourth-title"><?= htmlspecialchars($produit->getNom()) ?></h3>

            <label for="description">Modifier le nom</label>
            <input type="text" name="nom">

            <label for="description">Modifier la description</label>
            <input type="text" name="description">

            <label for="prix">Modifier le prix</label>
            <input type="text" name="prix">

            <label for="categorie">Modifier la catégorie</label>
            <select name="categorie">
                <?php foreach ($produits as $produit): ?>
                    <option value="<?= htmlspecialchars($produit->getCategorie()) ?>"><?= htmlspecialchars($produit->getCategorie()) ?></option>
                <?php endforeach; ?>
            </select>

            <label for="stock">Modifier le stock</label>
            <input type="number" name="stock">

            <input class="primary-button" type="submit" value="Modifier" name="modifyButton">
        </form>
    </section>
</main>
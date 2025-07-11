<main>
    <h1 class="primary-title">Liste des produits</h1>
    <table class="table-template">
        <thead>
            <th>Nom</th>
            <th>Prix</th>
            <th>Catégorie</th>
            <th>Action</th>
        </thead>
        <tbody>
            <?php foreach ($produits as $produit): ?>
                <tr>
                    <td><?= htmlspecialchars($produit->getNom()) ?></td>
                    <td><?= htmlspecialchars($produit->getPrix()) ?> €</td>
                    <td><?= htmlspecialchars($produit->getCategorie()) ?></td>
                    <td><a class="primary-button" href="index.php?page=modify_product&id=<?= $produit->getId()?>">Modifier</a> <a class="secondary-button" href="index.php?page=delete_product&id=<?= $produit->getId()?>" onclick="return confirm('Supprimer ce produit ?')">Supprimer</a></td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>

    <section class="form__product">
        <h2 class="primary-title">Ajouter un produit</h2>
        <form action="index.php?page=add_product" method="POST">

            <label for="nom">Nom</label>
            <input type="text" name="nom">

            <label for="description">Description</label>
            <input type="text" name="description">

            <label for="prix">Prix</label>
            <input type="text" name="prix">

            <label for="categorie">Catégorie</label>
            <input type="text" name="categorie">

            <label for="stock">Stock</label>
            <input type="text" name="stock">

            <input class="primary-button" type="submit" value="Ajouter" name="addButton">
        </form>

    </section>
</main>
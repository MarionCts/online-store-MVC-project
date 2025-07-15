<main>

    <section class="basket">
        <h1 class="primary-title">Panier</h1>
        <table class="table-template">
            <thead>
                <th>Article</th>
                <th>Prix</th>
                <th>Quantité</th>
                <th>Action</th>
            </thead>
            <tbody>
                <?php
                $totalPrice = 0;
                if (isset($_SESSION['panier']) && !empty($_SESSION['panier'])): ?>
                    <?php foreach ($_SESSION['panier'] as $index => $produit):
                        $produit = unserialize($produit);
                        $itemTotalPrice = $produit->getPrix() * $produit->getQuantity();
                        $totalPrice += $itemTotalPrice; ?>
                        <tr>
                            <td><?= htmlspecialchars($produit->getNom()) ?></td>
                            <td><?= htmlspecialchars(number_format($produit->getPrix(), 2, ',', ' ')) ?>€</td>
                            <td><?= htmlspecialchars($produit->getQuantity()) ?></td>
                            <td>
                                <a class="secondary-button" href="index.php?page=removeFromPanier&id=<?= htmlspecialchars($produit->getId()) ?>" onclick="return confirm('Diminuer la quantité ou supprimer l\'article ?')">Retirer un article</a>
                            </td>
                        </tr>
                    <?php
                    endforeach; ?>
                <?php else : ?>
                    <tr>
                        <td colspan="4">Votre panier est vide.</td>
                    </tr>
                <?php endif; ?>
            </tbody>
            <tfoot>
                <tr>
                    <td colspan="3"><strong>Total</strong></td>
                    <td name="totalPrice"><strong><?= htmlspecialchars(number_format($totalPrice, 2, ',', ' ')) ?>€</strong></td>
                </tr>
            </tfoot>
        </table>
        <div>
            <a class="primary-button" href="index.php?page=addCommande&totalPrice=<?= htmlspecialchars($totalPrice) ?>">Valider la commande</a>
            <a class="secondary-button" href="index.php">Continuer les achats</a>
            <a class="secondary-button" href="index.php?page=emptyPanier" onclick="return confirm('Êtes-vous sûr de vouloir supprimer le panier ?')">Vider le panier</a>
        </div>
    </section>
</main>
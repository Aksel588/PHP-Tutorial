<?php

// Inclure le fichier "products-server.php" qui contient la fonction pour afficher les produits
include "./products/products-server.php";
$products = showProducts(); // Appeler la fonction pour obtenir la liste des produits
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>

    <?php foreach ($products as $product) : ?> <!-- Boucle pour afficher chaque produit -->
        <p>
            <?php
            // Afficher l'ID du produit
            echo $product['id'];
            ?>
        </p>
        <p>
            <?php
            // Afficher le nom du produit
            echo $product['name'];
            ?>
        </p>

        <p>
            <?php
            // Afficher la description du produit
            echo $product['description'];
            ?>
        </p>
        <form action="./products/basket-server.php" method="POST">
            <!-- Champ caché pour l'ID du produit -->
            <input type="hidden" name="product_id" value="<?php echo $product['id']; ?>">

            <!-- Bouton de soumission pour acheter le produit -->
            <button type="submit" class="sendBasket">
                Acheter
            </button>
        </form>


    <?php endforeach ?> <!-- Fin de la boucle -->

</body>

</html>

<?php
session_start(); // Démarrer la session

// echo "<pre>";
// var_dump($_SESSION);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <?php
    // Vérifier si le panier existe et n'est pas vide
    if (isset($_SESSION['basket']) && !empty($_SESSION['basket'])) {
        // Parcourir chaque produit dans le panier
        foreach ($_SESSION['basket'] as $product) {
            // Afficher les détails du produit
            echo "ID: " . $product['id'] . "<br>";
            echo "Nom: " . $product['name'] . "<br>";
            echo "Description: " . $product['description'] . "<br>";
            echo "Prix: " . $product['price'] . "<br><br>";
        }
    } else {
        // Message affiché si le panier est vide
        echo "Votre panier est vide.";
    }
    ?>
</body>

</html>

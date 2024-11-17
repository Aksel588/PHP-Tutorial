<?php
// include "./users.php";  // Inclure le fichier users.php qui contient des fonctions utilisateur.
// $users = showUsers();   // Appeler la fonction showUsers pour afficher les utilisateurs.
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title> <!-- Titre de la page -->
</head>

<body>
    <a href="./products.php">Products</a>
    <a href="./basket.php">Basket</a>
    <form action="./products/products-server.php" method="POST"> <!-- Formulaire qui envoie les données via la méthode POST -->
        
        <!-- Champ pour le nom du produit -->
        <label for="name">Nom du produit</label>
        <input type="text" id="name" name="name">

        <!-- Champ pour la description du produit -->
        <label for="description">Description du produit</label>
        <textarea name="description" id="description"></textarea>

        <!-- Champ pour le prix du produit -->
        <label for="price">Prix du produit</label>
        <input type="number" id="price" name="price">

        <!-- Bouton pour soumettre le formulaire -->
        <button type="submit" name="submit">
            Enregistrer le produit
        </button>
    </form>
</body>

</html>

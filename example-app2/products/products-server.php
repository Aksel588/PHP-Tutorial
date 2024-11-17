<?php
$serverName = "localhost";
$userName = "root";
$password = "root";
$dbname = "example-db";

// Créer une connexion
$conn = new mysqli($serverName, $userName, $password, $dbname);

// Vérifier la connexion
if ($conn->connect_error) {
    die("La connexion a échoué :" . $conn->connect_error);
}



if (isset($_POST['submit'])) { // Vérifier si le formulaire est soumis
    $name = $_POST['name']; // Récupérer le nom du produit
    $description = $_POST['description']; // Récupérer la description du produit
    $price = $_POST['price']; // Récupérer le prix du produit

    // Requête SQL pour insérer un nouveau produit dans la base de données
    $mysql = "INSERT INTO `products`( `name`, `description`, `price`) VALUES ('$name','$description','$price')";

    // Exécuter la requête et vérifier si l'insertion est réussie
    if ($conn->query($mysql) === TRUE) {
        echo "Nouveau produit enregistré avec succès";
    } else {
        echo "Erreur :" . $mysql . "<br>" . $conn->error;
    }
}



function showProducts()
{ // Fonction pour afficher les produits
    $serverName = "localhost";
    $userName = "root";
    $password = "root";
    $dbname = "example-db";

    // Créer une connexion
    $connection = new mysqli($serverName, $userName, $password, $dbname);

    // Vérifier la connexion
    if ($connection->connect_error) {
        die("La connexion a échoué :" . $connection->connect_error);
    };


    $query = "SELECT * FROM products"; // Requête SQL pour récupérer tous les produits
    $result = $connection->query($query);

    $products = array(); // Initialiser un tableau vide pour stocker les produits

    if ($result) {
        while ($product = $result->fetch_assoc()) {
            $products[] = $product; // Ajouter chaque produit au tableau
        }
        $result->free(); // Libérer le jeu de résultats
    }

    // Fermer la connexion
    $connection->close();

    return $products; // Retourner le tableau des produits
}

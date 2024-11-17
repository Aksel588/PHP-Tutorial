<?php
session_start(); // Démarrer la session

if (isset($_POST['product_id'])) {
    $productId = intval($_POST['product_id']); // Récupérer et convertir l'ID du produit

    // Détails de connexion à la base de données
    $serverName = "localhost";
    $userName = "root";
    $password = "root";
    $dbname = "example-db";

    // Créer une connexion à la base de données
    $conn = new mysqli($serverName, $userName, $password, $dbname);

    // Vérifier la connexion
    if ($conn->connect_error) {
        die("Échec de la connexion : " . $conn->connect_error);
    }

    // Requête pour récupérer le produit avec l'ID spécifié
    $query = "SELECT * FROM products WHERE id = $productId";
    $result = $conn->query($query);

    if ($result && $result->num_rows > 0) {
        $product = $result->fetch_assoc(); // Récupérer le produit sous forme de tableau associatif

        // Initialiser le panier si nécessaire
        if (!isset($_SESSION['basket'])) {
            $_SESSION['basket'] = [];
        }

        // Ajouter le produit au panier
        $_SESSION['basket'][] = [
            'id' => $product['id'],
            'name' => $product['name'],
            'description' => $product['description'],
            'price' => $product['price']
        ];
    } else {
        // Message si le produit n'est pas trouvé
        echo "Produit non trouvé.";
    }

    $conn->close(); // Fermer la connexion à la base de données

    // Rediriger vers la page du panier
    header("Location: ../basket.php");
    exit;
} else {
    // Message d'erreur si l'ID du produit n'est pas fourni
    echo "Erreur : aucun ID de produit fourni.";
    exit;
}
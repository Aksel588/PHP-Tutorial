<?php

// function showUsers() {
$serverName = "localhost";
$userName = "root";
$password = "root";
$dbname = "example-db";

// Créer une connexion
$connection = new mysqli($serverName, $userName, $password, $dbname);

// Vérifier la connexion
if ($connection->connect_error) {
    die("La connexion a échoué : " . $connection->connect_error);
}

    $query = "SELECT * FROM users";
    $result = $connection->query($query);

    $users = array(); // Initialiser un tableau vide pour stocker les utilisateurs

    if ($result) {
        while ($user = $result->fetch_assoc()) {
            $users[] = $user; // Ajouter chaque ligne au tableau des utilisateurs
        }
        $result->free(); // Libérer le jeu de résultats
    }

    // Fermer la connexion
    $connection->close();

    return $users;

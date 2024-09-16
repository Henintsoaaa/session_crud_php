<?php

// Démarrer la session
session_start();

// Simuler une vérification des informations d'identification
// Remplace ceci par une vérification réelle avec une base de données
$valid_username = 'henintsoa';
$valid_pass = 'azert';

// Récupérer les données du formulaire
$username = $_POST['username'];
$pass = $_POST['pass'];

// Vérifier les informations d'identification
if ($username === $valid_username && $pass === $valid_pass) {
    // Stocker des informations dans la session
    $_SESSION['username'] = $username;

    // Rediriger vers une autre page (par exemple, dashboard.php)
    header('Location: ../display.php');
    exit(); // Important pour arrêter l'exécution du script après la redirection
} else {
    // Rediriger vers une page d'erreur ou de connexion avec un message d'erreur
    header('Location: ../index.html');
    exit();
}
?>

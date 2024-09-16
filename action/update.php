<?php
    include "../config.php";
    session_start();

    ini_set('display_errors', 1);
    ini_set('display_startup_errors', 1);
    error_reporting(E_ALL);

     // Vérifier si l'utilisateur est connecté
     if (!isset($_SESSION['username'])) {
        // Rediriger vers la page de connexion si non authentifié
        header('Location: ../session/login.php');
        exit();
    }

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        // Récupérer l'identifiant du formulaire
        $id = $_POST['id'];
        $nom = $_POST['nom'];
        $prenom = $_POST['prenom'];
        $parcours = $_POST['parcours'];
        $sexe = $_POST['sexe'];
        $date_naissance = $_POST['date_naissance'];
        $adresse = $_POST['adresse'];


        try{
            // Préparer la requête SQL en spécifiant la table
            $student = $pdo->prepare("UPDATE students SET nom = :nom, prenom = :prenom, parcours = :parcours, sexe = :sexe, date_naissance = :date_naissance, adresse = :adresse WHERE id = :id");
            $student->execute([':id' => $id,':nom' => $nom, ':prenom' => $prenom, ':parcours' => $parcours, ':sexe' => $sexe, ':date_naissance' => $date_naissance, ':adresse' => $adresse]);
            $resulats = $student->fetch(PDO::FETCH_ASSOC);

             // Redirection après la suppression
            header('Location: ../display.php');
            exit(); // Assurez-vous d'arrêter l'exécution du script après la redirection

        }
        catch (PDOException $e) {
            echo 'Erreur : ' . $e->getMessage();
        }
    }
    else {
        echo "Méthode non autorisée";
    }
?>

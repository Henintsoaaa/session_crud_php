<?php
    include "../config.php";

    ini_set('display_errors', 1);
    ini_set('display_startup_errors', 1);
    error_reporting(E_ALL);
    session_start();

     // Vérifier si l'utilisateur est connecté
     if (!isset($_SESSION['username'])) {
        // Rediriger vers la page de connexion si non authentifié
        header('Location: ../session/login.php');
        exit();
    }

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        // Récupérer l'identifiant du formulaire
        $id = $_POST['id'];
    
        try {
            // Préparer la requête de suppression
            $stmt = $pdo->prepare("DELETE FROM students WHERE id = :id");
    
            // Exécuter la requête avec le paramètre
            $stmt->execute([':id' => $id]);
    
            // Vérifier si la suppression a été effectuée
            if ($stmt->rowCount() > 0) {
                echo "La ligne avec l'identifiant $id a été supprimée avec succès !";
            } else {
                echo "Aucune ligne trouvée avec l'identifiant $id.";
            }


        // Redirection après la suppression
        header('Location: display.php');
        exit(); // Assurez-vous d'arrêter l'exécution du script après la redirection

    
        } catch (PDOException $e) {
            echo 'Erreur : ' . $e->getMessage();
        }
    } else {
        echo "Méthode non autorisée";
    }
?>
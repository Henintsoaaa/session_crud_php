<?php
    include "config.php";

    ini_set('display_errors', 1);
    ini_set('display_startup_errors', 1);
    error_reporting(E_ALL);

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $token = $_POST['token'];
        $newPassword = $_POST['pass'];

        try{
            // Vérifiez si le jeton est valide et non expiré
            $stmt = $pdo->prepare('SELECT email FROM password_resets WHERE token = :token AND expires_at > NOW()');
            $stmt->execute(['token' => $token]);

            if ($stmt->rowCount() > 0) {
                $email = $stmt->fetchColumn();

                // Mettre à jour le mot de passe dans la base de données
                $hashedPassword = password_hash($newPassword, PASSWORD_DEFAULT);
                $stmt = $pdo->prepare('UPDATE users SET password = :password WHERE email = :email');
                $stmt->execute(['password' => $hashedPassword, 'email' => $email]);

                // Supprimer le jeton utilisé
                $stmt = $pdo->prepare('DELETE FROM password_resets WHERE token = :token');
                $stmt->execute(['token' => $token]);

                echo "Votre mot de passe a été réinitialisé avec succès.";
            }
            else{
                echo "Jeton invalide ou expiré.";
            }

        }
        catch (PDOException $e) {
            echo "Erreur de connexion : " . $e->getMessage();
        }
    }
    else{}
?>
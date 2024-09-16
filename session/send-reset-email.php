<?php
   include "config.php";

    ini_set('display_errors', 1);   
    ini_set('display_startup_errors', 1);
    error_reporting(E_ALL);

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        // Récupérer l'identifiant du formulaire
        $email = filter_var($_POST['email'], FILTER_SANITIZE_EMAIL);

        // Validation de l'email
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            echo "Adresse email invalide.";
            exit;
        }

        try{
            // Vérifiez si l'email existe dans la base de données
            $stmt = $pdo->prepare('SELECT id FROM users WHERE email = :email');
            $stmt->execute(['email' => $email]);

            if ($stmt->rowCount() > 0) {
                 // Générer un jeton unique pour la réinitialisation
                $token = bin2hex(random_bytes(50));
                $expiry = date('Y-m-d H:i:s', strtotime('+1 hour')); // Expire dans 1 heure

                // Stocker le jeton et l'expiration dans la base de données
                $stmt = $pdo->prepare('INSERT INTO password_resets (email, token, expires_at) VALUES (:email, :token, :expires_at)');
                $stmt->execute(['email' => $email, 'token' => $token, 'expires_at' => $expiry]);

                // Envoyer l'email
                $resetLink = "localhost/reset-password.php?token=$token";
                $subject = "Réinitialisation du mot de passe";
                $message = "
                Bonjour,

                    Nous avons reçu une demande de réinitialisation du mot de passe pour votre compte. Pour réinitialiser votre mot de passe, veuillez cliquer sur le lien suivant :

                    $resetLink

                    Ce lien est valable pendant 1 heure. Si vous n'avez pas demandé de réinitialisation du mot de passe, vous pouvez ignorer cet email en toute sécurité.

                    Si vous avez des questions ou rencontrez des problèmes, n'hésitez pas à nous contacter.

                    Cordialement,

                    L'équipe de support
                    Votre Site Web";
                $headers = "From: no-reply@site1.com";
                $headers .= "Reply-To: no-reply@site1.com\r\n";
                $headers .= "Content-Type: text/plain; charset=UTF-8\r\n";

                if (mail($email, $subject, $message, $headers)) {
                    echo "Un email de réinitialisation a été envoyé.";
                } else {
                    echo "Erreur lors de l'envoi de l'email.";
                }
            }
            else{
                echo "Cet email n'existe pas dans notre base de données.";
            }
        }
        catch (PDOException $e) {
            echo "Erreur de connexion : " . $e->getMessage();
        }
    }   
?>
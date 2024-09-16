<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Réinitialiser le mot de passe</title>
</head>
<body>
    <?php
    if (isset($_GET['token'])) {
        $token = $_GET['token'];
    ?>
    <form action="update-password.php" method="POST">
        <input type="hidden" name="token" value="<?php echo $token; ?>">
        <label for="pass">Nouveau mot de passe :</label>
        <input type="password" id="pass" name="pass" required><br><br>
        
        <input type="submit" value="Réinitialiser le mot de passe">
    </form>
    <?php
    } else {
        echo "Jeton de réinitialisation invalide.";
    }
    ?>
</body>
</html>

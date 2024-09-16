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

    try{
        // Préparer la requête SQL en spécifiant la table parcours
        $parcours = $pdo->prepare("SELECT * FROM parcours");
        $parcours->execute();

    } 
    catch (PDOException $e) {
        echo "Erreur : " . $e->getMessage();
    }

?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulaire d'inscription</title>
    <link href="output.css" rel="stylesheet">
</head>
<body class="bg-gray-100 min-h-screen p-8 w-screen h-screen">
<div class="bg-white shadow-md rounded-lg overflow-hidden max-w-sm w-3/5 h-full">
        <h1 class="text-xl font-bold mb-4 text-center">Ajouter un étudiant</h1>
        <form action="add.php" method="POST" class="space-y-4">
            <div>
                <label for="nom" class="block text-sm font-medium text-gray-700 mb-1">Nom :</label>
                <input type="text" id="nom" name="nom" required class="w-full px-3 py-2 border rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500">
            </div>

            <div>
                <label for="prenom" class="block text-sm font-medium text-gray-700 mb-1">Prénom :</label>
                <input type="text" id="prenom" name="prenom" required class="w-full px-3 py-2 border rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500">
            </div>

            <div>
                <label for="date_naissance" class="block text-sm font-medium text-gray-700 mb-1">Date de Naissance :</label>
                <input type="date" id="date_naissance" name="date_naissance" required class="w-full h-6 px-3 py-2 border rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500 text-xs">
            </div>

            <div class=" py-2">
                <label for="parcours" class="pt-2 block text-sm font-medium text-gray-700 mb-1">Parcours :</label>
                <select id="parcours" name="parcours" class="w-full h-6 px-3 py-2 border rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500 text-xs">
                    <?php
                    while ($row = $parcours->fetch()) {
                        echo "<option value='" . htmlspecialchars($row['parcours']) . "'class=' text-xs'>" . htmlspecialchars($row['parcours']) . "</option>";
                    }
                    ?>
                </select>
            </div>

            <div class=" py-2">
                <label for="sexe" class="block text-sm font-medium text-gray-700 mb-1">Sexe :</label>
                <select id="sexe" name="sexe" class="w-full h-6 px-3 py-2 border rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500 text-xs">
                    <option value="Homme" class=' text-xs'>Homme</option>
                    <option value="Femme" class=' text-xs'>Femme</option>
                </select>
            </div>

            <div>
                <label for="adresse" class="block text-sm font-medium text-gray-700 mb-1">Adresse :</label>
                <input type="text" id="adresse" name="adresse" required class="w-full px-3 py-2 border rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500 text-xs">
            </div>

            <button type="submit" class=" bg-secondary w-14 h-3px-4 hover:bg-blue-600  font-bold py-2 rounded text-white mt-3">
                Ajouter
            </button>
        </form>
    </div>
</body>
</html>

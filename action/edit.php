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

        try{
            // Préparer la requête SQL en spécifiant la table
            $student = $pdo->prepare("SELECT id, nom, prenom, parcours, sexe, date_naissance, adresse FROM students where id = :id");
            $student->execute([':id' => $id]);
            $resulats = $student->fetch(PDO::FETCH_ASSOC);

            $listParcours = $pdo->prepare("SELECT * FROM parcours");
            $listParcours->execute();
            

            $nom = $resulats['nom'];
            $prenom = $resulats['prenom'];
            $parcours = $resulats['parcours'];
            $sexe = $resulats['sexe'];
            $date_naissance = $resulats['date_naissance'];
            $adresse = $resulats['adresse'];

        }
        catch (PDOException $e) {
            echo 'Erreur : ' . $e->getMessage();
        }
    }
    else {
        echo "Méthode non autorisée";
    }
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Modifier un étudiant</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 min-h-screen flex justify-center items-center">
    <div class="bg-white shadow-md rounded-lg p-8 max-w-md w-full">
        <h1 class="text-2xl font-bold mb-6 text-center">Modifier un étudiant</h1>
        <form action="update.php" method="POST" class="space-y-6">
            <input type="hidden" name="id" value="<?php echo $id; ?>" class="hidden">
            
            <div>
                <label for="nom" class="block mb-2 text-sm font-medium text-gray-700">Nom :</label>
                <input type="text" name="nom" id="nom" value="<?php echo $nom; ?>" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5">
            </div>

            <div>
                <label for="prenom" class="block mb-2 text-sm font-medium text-gray-700">Prénom :</label>
                <input type="text" name="prenom" id="prenom" value="<?php echo $prenom; ?>" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5">
            </div>

            <div>
                <label for="parcours" class="block mb-2 text-sm font-medium text-gray-700">Parcours :</label>
                <select name="parcours" id="" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5">
                    <?php 
                    while ($row = $listParcours->fetch()) {
                        echo "<option value='". htmlspecialchars($row['parcours']) . "' " .( htmlspecialchars($row['parcours'])== $parcours ? 'selected' : "") ."> " . htmlspecialchars($row['parcours']) . "</option>";
                    }
                    ?>
                </select>
            </div>

            <div>
                <label for="sexe" class="block mb-2 text-sm font-medium text-gray-700">Sexe :</label>
                <input type="text" name="sexe" id="sexe" value="<?php echo $sexe; ?>" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5">
            </div>

            <div>
                <label for="date_naissance" class="block mb-2 text-sm font-medium text-gray-700">Date de naissance :</label>
                <input type="date" name="date_naissance" id="date_naissance" value="<?php echo $date_naissance; ?>" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5">
            </div>

            <div>
                <label for="adresse" class="block mb-2 text-sm font-medium text-gray-700">Adresse :</label>
                <input type="text" name="adresse" id="adresse" value="<?php echo $adresse; ?>" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5">
            </div>

            <button type="submit" class="w-full bg-secondary text-black font-bold py-2 px-4 rounded">
                Modifier
            </button>
        </form>
    </div>
</body>
</html>

<!-- <?php
  include 'config.php';

  ini_set('display_errors', 1);
  ini_set('display_startup_errors', 1);
  error_reporting(E_ALL);

  
  $stmt = $pdo->prepare("SELECT * FROM parcours");
  $stmt->execute();


?> -->


<?php
// Inclure le fichier de configuration pour se connecter à la base de données
include 'config.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    // // Récupérer l'identifiant du formulaire
    // $student = $pdo->prepare("SELECT id, nom, prenom, parcours, sexe, date_naissance, adresse FROM students");
    // $student->execute();
    // $resulats = $student->fetch(PDO::FETCH_ASSOC);

    // Récupérer les valeurs du formulaire
    $nom = $_POST['nom'];
    $prenom = $_POST['prenom'];
    $parcours = $_POST['parcours'];
    $sexe = $_POST['sexe'];
    $date_naissance = $_POST['date_naissance'];
    $adresse = $_POST['adresse'];

    try {

        // Vérifier si les données existent déjà
        $stmt = $pdo->prepare("SELECT COUNT(*) FROM students WHERE nom = :nom AND prenom = :prenom AND date_naissance = :date_naissance AND parcours = :parcours AND sexe = :sexe AND  adresse = :adresse");
        $stmt->execute([
            ':nom' => $nom,
            ':prenom' => $prenom,
            ':date_naissance' => $date_naissance,
            ':parcours' => $parcours,
            ':sexe' => $sexe,
            ':adresse' => $adresse,
        ]);

        $exist = $stmt->fetchColumn();

        if($exist){
          echo "Les données existent déjà dans la base de données.";
        }
        else{
          // Préparer la requête d'insertion dans la base de données
          $stmt = $pdo->prepare("INSERT INTO students (nom, prenom, parcours, sexe, date_naissance, adresse) 
                                 VALUES (:nom, :prenom, :parcours, :sexe, :date_naissance, :adresse)");
  
          // Exécuter la requête avec les valeurs du formulaire
          $stmt->execute([
              ':nom' => $nom,
              ':prenom' => $prenom,
              ':parcours' => $parcours,
              ':sexe' => $sexe,
              ':date_naissance' => $date_naissance,
              ':adresse' => $adresse,
          ]);

          echo "Les données ont été insérées avec succès !";

          // Redirection vers la page d'affichage des données après l'insertion
          header('Location: display.php');
          exit(); // Assurez-vous d'arrêter l'exécution du script après la redirection
        }


    } catch (PDOException $e) {
        echo 'Erreur : ' . $e->getMessage();
    }

    
} else {
    echo "Méthode non autorisée";
}
?>




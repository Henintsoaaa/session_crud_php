<?php
   include "config.php";

    ini_set('display_errors', 1);
    ini_set('display_startup_errors', 1);
    error_reporting(E_ALL);

    session_start();

    // Vérifier si l'utilisateur est connecté
    if (!isset($_SESSION['username'])) {
        // Rediriger vers la page de connexion si non authentifié
        header('Location: ./session/login.php');
        exit();
    }

    try{
       // Préparer la requête SQL en spécifiant la table
        $student = $pdo->prepare("SELECT id, nom, prenom, parcours, sexe, date_naissance, adresse FROM students");
        $student->execute();
        
        echo"<div class='bg-tertiary w-screen h-screen'>";
        // Ajouter un titre 
        echo "<h1 class=' text-center w-full font-semibold text-xl'>Listes des étudiants</h1>";
        
         // Démarrer le tableau HTML
         echo "<table border='1' class='text-center px-3'>
         <thead>
             <tr class=' bg-secondary text-white text-sm'>
                 <th class=' px-3'>Nom</th>
                 <th class=' px-6'>Prénom</th>
                 <th class=' px-6'>Parcours</th>
                 <th class=' px-6'>Sexe</th>
                 <th class=' px-9'>Date de naissance</th>
                 <th class=' px-6'>Adresse</th>
                 <th class=' px-9'>Action</th>
             </tr>
         </thead>
         <tbody>";
    
         // Afficher les données dans le tableau
        while ($row = $student->fetch()) {
            echo "<tr class=' text-sm'>
                    <td class=' w-full'>" . htmlspecialchars($row['nom']) . "</td>
                    <td class=' w-full'>" . htmlspecialchars($row['prenom']) . "</td>
                    <td class=' w-full'>" . htmlspecialchars($row['parcours']) . "</td>
                    <td class=' w-full'>" . htmlspecialchars($row['sexe']) . "</td>
                    <td class=' w-full'>" . htmlspecialchars($row['date_naissance']) . "</td>
                    <td class=' w-full'>" . htmlspecialchars($row['adresse']) . "</td>";
                    
                    // Affichage des actions 
                    echo " 
                      <td>
                        <form action='./action/edit.php' method='POST' style='display:inline;'>
                            <input type='hidden' name='id' value='" . htmlspecialchars($row['id']) . "'>
                            <button type='submit' class=' bg-green-800'><img src='./assets/svg/pen-to-square-regular.svg' alt='edit' class='w-5 h-5 p-1' ></button>
                        </form>
                        <form action='./action/delete.php' method='POST' style='display:inline;'>
                            <input type='hidden' name='id' value='" . htmlspecialchars($row['id']) . "'>
                            <button type='submit' class='bg-red-700'><img src='./assets/svg/xmark-solid.svg ' alt='edit' class='w-5 h-5 p-1'></button>
                        </form>
                    </td>
                    </tr>
                    </thead>
                    <tbody>";
                }
    
         // Fin du tableau HTML
        echo "</tbody></table>";

        
        // Lien pour ajouter un nouvel étudiant et se deconnecter
        echo "<div class='flex gap-3 justify-center items-center pt-7'><a href='./action/formulaire.php' class='border-2 border-secondary rounded-lg px-2'>Ajouter</a>";
        echo "<a href='./session/logOut.php' class='border-2 border-secondary rounded-lg px-2'>Se deconnecter</a></div>";

        echo "</div>";
    }
    catch (PDOException $e) {
        echo 'Erreur : ' . $e->getMessage();
    }


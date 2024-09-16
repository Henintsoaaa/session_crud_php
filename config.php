<?php
    $userName = 'henintsoa';
    $userPass = 'rahents';
    $dsn = "mysql:host=localhost;dbname=ecole";

    try{
        $pdo = new PDO($dsn, $userName, $userPass);
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        echo "<link rel='stylesheet' href='output.css'>";
    }
    catch(PDOException $e){
        echo "ERREUR:" . $e->getMessage();
    }
?>
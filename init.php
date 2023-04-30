<?php

    // init.php : votre fichier d'initialisation

    session_start(); // on ouvre une nouvelle session si ce n'est pas déjà fait

    try { // On essaye une action
        // Objet PDO : nous permet de communiquer avec une base de données
        $pdo = new PDO('mysql:host=localhost;dbname=mini_reseau;charset=utf8', 'root', '');
                                                                                // '' sur windows
    }   catch(Exception $e) { // en cas d'erreur
        // On arrête l'écriture du script
        // On affiche une erreur à l'utilisateur
        die('Erreur : '.$e->getMessage());
    }

    $contenuRequete = "SELECT * FROM publication";

    $requete = $pdo->prepare($contenuRequete);

    $requete->execute();

    $publications = $requete->fetchAll(PDO::FETCH_ASSOC);




    $contenuRequete2 = "SELECT * FROM users";

    $requete2 = $pdo->prepare($contenuRequete2);

    $requete2->execute();

    $users = $requete2->fetchAll(PDO::FETCH_ASSOC);
?>


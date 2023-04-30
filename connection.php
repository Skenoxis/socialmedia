<?php
require 'init.php';

if (isset($_POST['form2'])) {
    /* Si on est ici, le formulaire a été envoyé */

    if (!empty($_POST['pseudo']) && !empty($_POST['email']) && !empty($_POST['password'])) {
        /* Si on est ici, les informations demandées ne sont pas vides */



        $pseudo = $_POST['pseudo'];
        $mdp = password_hash($_POST["password"], PASSWORD_DEFAULT);      
        $email = $_POST['email'];
        $sql = "INSERT INTO users (pseudo, email, password) VALUES ('$pseudo', '$email', '$mdp')";
        $requete = $pdo->prepare($sql);

        /* Notre requête a été préparée, on doit maintenant l'exécuter */
        if ($requete->execute()) {
            $requeteOK = true;
            echo "Compte créé"; 
        } else {
            $requeteOK = false;
        }
    }

}
?>

<!DOCTYPE html>
<html lang="fr">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">

        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
        <link rel="stylesheet" href="css/style.css">

        <title>Créer un compte</title>
    </head>

    <body>

        <div class="bouton_sidebar">
                <button id="btn_sidebar"><img src="assets/images/menu.png" alt="Icone du menu"></button>
            </div>

            <div class="sidebar">

                <div class="btn_flex">

                    <button class="btn btn-primary btn_connexion">Connexion</button>
                    <a href="connection.php"><button class="btn btn-primary btn_inscription">Inscription</button></a>

                </div>

            </div>

        <h1 class="titre">Social Media</h1>
        
        <div class="d-flex">
            <form action="connection.php" method = "POST">

            
                <input type="hidden" name="form2">

                <div class="form-group">

                    <label for="pseudo">Nom d'utilisateur</label>
                    <input type="text" class="form-control" name="pseudo" id="pseudo" placeholder="Entrez un pseudo">

                </div>

                <div class="form-group">

                    <label for="email">E-Mail</label>
                    <input type="email" class="form-control" name="email" id="email" placeholder="Entrez une adresse mail">
                
                </div>

                <div class="form-group">

                    <label for="password">Mot de passe</label>
                    <input type="password" class="form-control" name="password" id="password" placeholder="Mot de passe">

                </div>

                <button type="submit" class="btn btn-primary btn_envoyer_inscription">Envoyer</button>
                <a class="btn btn-primary retour" href="index.php">Retour</a>

            </form>
        </div>

        <div class="bouton_footer">
            <a href="#myfooter"><button id="button_footer">Contacts</button></a>
        </div>

        <footer id="myfooter">

            <div class="footer_flex">

                <div class="icones_social">
                    <a target="_blank" href="https://www.instagram.com/maxi.vdml/"><img src="assets/images/instagram.png" alt="logo Instagram"></a>
                    <a target="_blank" href="https://www.linkedin.com/in/maxime-vandemal-36a588180/"><img src="assets/images/linkedin.png" alt="logo LinkedIn"></a>
                    <a href="mailto:maxime.vandemal@gmail.com"><img src="assets/images/mail.png" alt="logo Mail"></a>
                </div>


                <p class="copyrights">Copyright © Maxime VANDEMAL. Tous droits réservés.</p>
            </div>

        </footer>   

        <script src="script.js"></script>

        <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.7/dist/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>

    </body>
</html>
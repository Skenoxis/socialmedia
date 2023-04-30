<?php
require 'init.php';

    if (isset($_GET['form'])) {
        /* Si on est ici, le formulaire a été envoyé */


        if (!empty($_GET['contenu_publication'])) {
            /* Si on est ici, les informations demandées ne sont pas vides */
            

            $contenu_publication = $_GET['contenu_publication'];
            $tag = $_GET['tag'];


            if ($tag != "Choisir un tag") {

                $sql = "INSERT INTO publication (contenu_publication, tag) VALUES ('$contenu_publication', '$tag')";
                $requete = $pdo->prepare($sql);


                /* Notre requête a été préparée, on doit maintenant l'exécuter */
                if ($requete->execute()) {
                    $requeteOK = true;
                    
                    

                } else {
                    $requeteOK = false;
                }
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
        
        <title>Réseau social</title>
        
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

        <button id="bouton_publier"><img class="img_btn_publier" src="assets/images/stylo.png" alt="Icone publication"></button>


        <div class="pop_up">

            <form class="envoi_publication" method = "GET">

                <input type="hidden" name="form">

                <label for="contenu_publication">Publiez un commentaire</label> 
                <textarea name="contenu_publication" id="contenu_publication" cols="30" rows="5"></textarea>

                <select name="tag" id="liste_tags">

                    <option value="Choisir un tag">Choisir un tag</option>
                    <option value="#Cuisine">#Cuisine</option>
                    <option value="#Art">#Art</option>
                    <option value="#Voyage">#Voyage</option>
                    <option value="#Musique">#Musique</option>
                    <option value="#Animaux">#Animaux</option>
                    <option value="#Sport">#Sport</option>
                    <option value="#Cinéma">#Cinéma</option>
                    <option value="#JeuxVidéo">#JeuxVidéo</option>
                    <option value="#Histoire">#Histoire</option>
                    <option value="#Science">#Science</option>

                </select>

                <button type="submit" values= "Publier" class="btn_envoi_publication">Envoyer</button>


            </form>

        </div>
        

        <div class="posts">
            
            <div class="publications">

                <h1>Posts</h1>

                <?php foreach ($publications as $publication) {?>

                    <div class="publication">

                        <div class="delete">

                            <button type='submit' class="bouton_sup" onclick="AfficherConfirmationSuppression()"><img class="img_btn_sup" src="assets/images/poubelle.png" alt="Image d'une poubelle"></button>

                        </div>
                        

                        <div class="content">
                            <p class="contenu"><?php echo $publication['contenu_publication'] ?></p>
                            <p class="tag"><?php echo $publication['tag'] ?></p>
                            <p class="date"><?php echo $publication['date_publication'] ?></p>
                        </div>  


                            

                    </div>
                <?php } ?>
            </div>
        </div>


        <div id="pop_up_suppression">

            <div class="form-group">

                <p for="confirmation">Êtes-vous sûr de vouloir supprimer cette publication ?</p>

                <button class="btn btn-primary btn_annuler_suppression" onclick="CacherConfirmationSuppression()">Annuler</button>

                <form action='delete.php' method='POST'>
                                        
                    <input type='hidden' name='supprimer' value="<?php echo $publication['publication_id'] ?>" />
                    <button type='submit' class="btn btn-primary btn_suppression">Supprimer</button>
                    
                </form>

            </div>

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
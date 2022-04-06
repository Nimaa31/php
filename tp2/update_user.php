

<?php
     /*---------------------------------------
                    IMPORT
    -----------------------------------------*/
    //importer la connexion à la bdd
    include './utils/connectBdd.php';
    //importer le model
    include './model/model_user.php';
    //importer la vue(interface)
    include './view/view_update_user.php';
        //test si l'id existe
        if(isset($_GET['id']) AND $_GET['id'] != ''){
            $value = $_GET['id'];
            //test si les champs du formulaire sont remplis
            if(isset($_POST['nom_util']) AND isset($_POST['prenom_util']) AND
            isset($_POST['mail_util']) AND isset($_POST['mdp_util']) AND 
            $_POST['nom_util'] !='' AND $_POST['prenom_util'] !='' AND
            $_POST['mail_util'] !='' AND $_POST['mdp_util'] !='' ){
                //variables qui vont stocker les super Globales POST
                $nom = $_POST['nom_util'];
                $prenom = $_POST['prenom_util'];
                $mail = $_POST['mail_util'];
                $mdp = $_POST['mdp_util'];
                $mdp = md5($_POST['mdp_util']);
               
                updateUser($bdd,$nom,$prenom,$mail,$mdp,$value);
                echo 'l\'utilisateur '.$nom.' à été modifier en BDD';        
            }
            else{
                echo "Veuillez remplir les champs du formulaire";
            }
        }
        else{
            header('Location: showUser.php?error');
        }
    ?>

<?php
     /*---------------------------------------
                    IMPORT
    -----------------------------------------*/
    //importer la connexion à la bdd
    include './utils/connectBdd.php';
    //importer le model
    include './model/model_user.php';
    //importer la vue(interface)
    include './view/view_all_user.php';
    include 'menu.php';
    /*---------------------------------------
                    LOGIQUE
    -----------------------------------------*/
    //version 1
    showAllUser($bdd);

    //version 2 (conseillé)
    //on stocke le tableau dans une variable
    // $list =  showAllUser($bdd);
    // //on parcours le tableau
    // foreach ($list as $value){
    //     //on affiche à chaque tour un paragraphe avec les valeurs du tableau
    //     echo '<p><a href="update_user.php?id='.$value['id_util'].'">le prenom est égal à : '.$value['prenom_util'].' le mdp est est égal à :
    //     '.$value['mdp_util'].'</a></p>';
    // }
    ?>
    <input type="submit" value="Supprimer">
</form>
<?php
    if(isset($_POST['check'])){
        //boucle pour parcourir chaque case cochés ($value équivaut à value en HTML)
        foreach($_POST['check'] as $value){
            deleteUser($bdd, $value);
            echo "<p>Suppression de l'article $value</p>";
        }
        echo '<script>
        setTimeout(()=>{
        document.location.href="show_all_user.php"; 
        }, 1000);</script>';
    }
    else{
    echo "<p>Veuillez cocher un ou plusieurs produit à supprimer</p>";
    }
?>
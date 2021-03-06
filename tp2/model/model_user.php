<?php
    //fonction qui ajoute un utilisateur en BDD(utilisateur)
    function adduser($bdd, $nom, $prenom, $mail,$mdp){
        try{
            $req = $bdd->prepare('INSERT INTO utilisateur(nom_util, prenom_util,
            mail_util, mdp_util) 
            VALUES(:nom_util, :prenom_util, :mail_util, :mdp_util)');
            $req->execute(array(
                'nom_util' => $nom,
                'prenom_util' =>$prenom,
                'mail_util' =>$mail,
                'mdp_util' =>$mdp
                ));
        }
        catch(Exception $e)
        {
            //affichage d'une exception en cas d’erreur
            die('Erreur : '.$e->getMessage());
        }
    }
    function showAllUser($bdd){
        try{
            $req = $bdd->prepare('SELECT * FROM utilisateur');
            $req->execute();
            while($data = $req->fetch()){
                echo '<p> <input type="checkbox" 
                name="check[]" value="'.$data['id_util'].'"><a href="update_user.php?id='.$data['id_util'].'">Nom : '.$data['nom_util'].' prenom : '.$data['prenom_util'].' 
                mail: '.$data['mail_util'].'</a></p>';
            }
        }
        catch(Exception $e)
        {
            //affichage d'une exception en cas d’erreur
            die('Erreur : '.$e->getMessage());
        }
    }
    function updateUser($bdd,$nom,$prenom,$mail,$mdp,$value){
        try{
            $req = $bdd->prepare('UPDATE utilisateur SET nom_util = :nom_util, 
            prenom_util= :prenom_util, mail_util=:mail_util, mdp_util=:mdp_util 
            WHERE id_util=:id_util');
            $req->execute(array(
                'nom_util' => $nom,
                'prenom_util' =>$prenom,
                'mail_util' =>$mail,
                'mdp_util' =>$mdp,
                'id_util' =>$value
                ));
        }
        catch(Exception $e)
        {
            //affichage d'une exception en cas d’erreur
            die('Erreur : '.$e->getMessage());
        }
    }
    function deleteUser($bdd, $value){
        try{
            $req = $bdd->prepare('DELETE FROM utilisateur WHERE id_util = :id_util');
            $req->execute(array(
                'id_util' => $value
                ));
        }
        catch(Exception $e)
        {
        //affichage d'une exception en cas d’erreur
        die('Erreur : '.$e->getMessage());
        }
    }

?>
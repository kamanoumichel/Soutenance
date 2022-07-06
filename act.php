<?php
    //On verifie si le formulaire à été envoyé    
    if(!empty($_GET)){
        session_start();
        /*echo "<pre>";
        var_dump($_GET);
        echo "</pre>";*/
        require_once "connection.php";
        //echo $use["id_u"];
        //$sql1=UPDATE 'users' SET 'status'='0' WHERE 'id_u'=$use["id_u"];
        $id=$_GET["id"];
        $sql1="UPDATE `users` SET `status`= '1' WHERE `id_u`='$id'";
        $requete= $db->query($sql1);
        $requete->execute();
        echo "Votre utilisateur a bien été activé";
    }
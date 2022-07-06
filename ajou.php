<?php
session_start();
    require_once "connection.php";
    if(isset($_GET) && !empty($_GET["do"])){
        $domaine=strip_tags($_GET["do"]);
        $sql="INSERT INTO `domaine`(`nom_du_domaine`) VALUES ('$domaine')";
        $requete=$db->query($sql);
         $requete->execute();
         echo "<script>alert('Le domaine a bien été ajouter');</script>";
    }
    else{
        echo "Vous avez commit une erreur";
    }
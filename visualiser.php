<?php
    include "connection.php";
    if(isset($_GET['id'])){
        $id=$_GET['id'];
        //echo $id;
        $sql= "SELECT `chemin`,`nom`FROM `fichiers` WHERE `id_f`='$id'";

        $requete= $db->query($sql);
        $fic= $requete->fetch();
        //$fic->execute();
        $f = $fic['chemin'];
        //echo $f;
        ob_get_level();
        readfile($f);
        //fopen($f,"r");
    }
?>
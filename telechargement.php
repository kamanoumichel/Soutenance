<?php
    include "connection.php";

    if(isset($_GET['id'])){
        $id=(int)$_GET['id'];
        $sql= "SELECT `chemin`,`nom`FROM `fichiers` WHERE `id_f`='$id'";

        $requete= $db->query($sql);
        $fic= $requete->fetch();
        //$fic->execute();
        header("Content-description: File transfer");
        header("Content-type: application/octet-stream");
        header("Content-Disposition: attachment; filename=".$fic["nom"]);
        header("Content-length:".filesize($fic['chemin']));
        ob_clean();
        readfile($fic['chemin']);
    }
    
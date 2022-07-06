<?php
    session_start();
    $titre="Liste des fichiers";
   include "header.php";
   
   include_once "navbar.php";   
   if(isset($_GET['dodo'])){
        $d=strip_tags((string)$_GET['dodo']);      
        require_once "connection.php";
        $sql= "SELECT *FROM `fichiers` WHERE `domai`='$d'";//-- WHERE `fichiers.id_u`=`users.id_u`";
        //on execute la requete
        $requete= $db->query($sql);
        //On recupére les données
        $fiche= $requete->fetchAll();
   }
   
?>
    <div>
    <div class="row">
    <?php foreach($fiche as $fch): ?>
              
                   <div class="col-md fim">
                   <p>
                   <img src="img/index.png" alt="fichier" class="rounded-circle"><br>
                   <a href="telechargement.php?id=<?= $fch["id_f"]?>">fichier: <?= strip_tags($fch["nom"]);?></a><br>
                   Publié le :<?= strip_tags($fch["date"]);?> </p>
                   <!--a href="visualiser.php?id=<?= $fch["id_f"]?>">fichier: <?= strip_tags($fch["nom"]);?></!--a-->
                   </div>
              
           
   <?php endforeach; ?>
   </div>
   </div>
   
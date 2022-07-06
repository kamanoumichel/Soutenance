<?php
    session_start();
    $titre= "Choix du Domaine";
    include "header.php";
    include "navbar.php";

    require_once "connection.php";
    $sql="SELECT * FROM `domaine`";
    $query=$db->query($sql);
    $dom1=$query->fetchAll();
?>
<h1>Veuillez Choisir le domaine de votre fichier</h1>
<div class="row-md d-flex">
    <?php foreach ($dom1 as $doma):?>
        <a href="fichdo.php?dodo=<?= $doma["nom_du_domaine"];?>"  class="btn btn-outline-info py-5 m-5 rounded">
            <?= $doma["id_c"];?> <span>--</span> <?= $doma["nom_du_domaine"];?>
        </a>  
    <?php endforeach;?>

</div>

<?php
    include "footer.php";
<?php
    session_start();
    if(isset($_POST)){
    if(isset($_FILES["fichier"]) && $_FILES["fichier"]["error"]===0){
        //echo "ok fichier";
        //On a recu l'image
        //On procède aux vérifications
        //on verifie toujours l'extension et le type mime
        //var_dump($_FILES);
        /*$allowed=[
            "pdf" => "application/pdf",
            "doc" => "application/msword",
            "jpg" => "image/jpeg",
            "jpeg" => "image/jpeg",
            "png" => "image/png",
            "rar" => "application/x-rar-compressed"
        ];*/

        $filename= $_FILES["fichier"]["name"];
        $filetype= $_FILES["fichier"]["type"];
        $filesize= $_FILES["fichier"]["size"];

        $extension= pathinfo($filename, PATHINFO_EXTENSION);
       // echo $extension;
        //On verifie l'absene de l'extension dans les clés de $allowed ou l'absence du type mime dans les valeurs
        /*if(!array_key_exists($extension, $allowed) || !in_array($filetype,$allowed)){
            //Ici soit l'extension soit le type est incorrect
            //NB:on ne stocke pas le fichier dans une bd mais dans un dossier
            //et on stocke plus tot son nom pas son chemin
            die("Erreur: le format de fichier est non autorriser essayer: .pdf,.doc,.jpeg,.jpg,.png,.rar");

        }*/
        //Ici, le type est correct
        //On limite à 7Mo
        if($filesize > 7168* 7168){
            die("Le Fichier est trop volumineux");
        }
        //On génére un nom unique
        $newname= md5(uniqid());
        //On génére le chemin complet
        $newfilename = __DIR__ ."/uploads/$newname.$extension";
        //echo $newfilename;

        if(!move_uploaded_file($_FILES["fichier"]["tmp_name"],$newfilename)){
            die("L'uploads a échoué");
        }
        $descr = $_POST["des"];
        $doma = $_POST["sel"];

        chmod($newfilename, 0644);
        require_once "connection.php";
        $sql="INSERT INTO `fichiers`(`chemin`,`nom`,`id_u`,`description`,`domai`) VALUES (:chemin,:nom,:id_u,:descri,:dodo)";

        $query = $db->prepare($sql);
        $query->bindvalue(":chemin",$newfilename,PDO::PARAM_STR);
        $query->bindvalue(":nom",$_FILES["fichier"]["name"],PDO::PARAM_STR);
        $query->bindvalue(":id_u",$_SESSION["user"]["id"] ,PDO::PARAM_INT);
        $query->bindvalue(":descri",$descr,PDO::PARAM_STR);
        $query->bindvalue(":dodo",$doma,PDO::PARAM_STR);
        $query->execute();
        echo "Votre fichier a bien été sauvegarder";
    }
    else{
        echo "Vueillez choisir un fichier";
    }}
    /*echo "<pre>";
    var_dump($_FILES);
    echo "</pre>";
    die;*/
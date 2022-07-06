<?php
    session_start();
    $titre="modifier";
    include "header.php";
?>

<h1 class="text-center">Modifier les informations de mon compte</h1>
<form method="post" class="container bg-secondary rounded">
    <div class="mb-3 mt-3">
        <label for="no" class="form-label">Nom:</label>
        <input type="text" class="form-control" id="no" name="no" value="<?=$_SESSION["user"]["nom"] ?>">
    </div>
    <div class="mb-3 mt-3">
        <label for="eml" class="form-label">Email:</label>
        <input type="email" class="form-control" id="eml" name="eml" value="<?=$_SESSION["user"]["email"] ?>">
    </div>
    <div class="mb-3 mt-3">
        <label for="tel" class="form-label">Tel:</label>
        <input type="number" class="form-control" id="tel" name="tel" value="<?=$_SESSION["user"]["tel"] ?>">
    </div>
    <div class="mb-3 mt-3">
        <label for="pseudo" class="form-label">Pseudo:</label>
        <input type="text" class="form-control" id="psdo" name="psdo" value="<?=$_SESSION["user"]["pseudo"] ?>">
    </div>
    <div class="mb-3">
        <label for="pwd" class="form-label">Mot de passe:</label>
        <input type="password" class="form-control" id="pwd" name="pwd">
    </div>
    
    <button type="submit" class="btn btn-primary">Modifier</button>
    <button type="reset" class="btn btn-danger">Annuler</button>
</form>
<?php
    include "footer.php";
    

    if(!empty($_POST)){
        //Le formulaire a bien été envoyé
        //On verifie que tout les champs requis son remplis
        //isset($_POST["no"],$_POST["eml"], $_POST["psdo"],$_POST["tel"]) && 
        
        if(!empty($_POST["no"]) && !empty($_POST["eml"]) && !empty($_POST["tel"]) && !empty($_POST["psdo"])&& !empty($_POST["pwd"])){
            //Le formulaire est complet
            //on récupére les données
            //echo "ok Ok Ok";
            $nom=strip_tags($_POST["no"]);
            $email=strip_tags($_POST["eml"]);
            $tel=strip_tags($_POST["tel"]);
            $pseudo=strip_tags($_POST["psdo"]);
            //$pwd=strip_tags($_POST["pwd"]);
           //var_dump($_POST);
           $pwd= password_hash($_POST["pwd"], PASSWORD_ARGON2ID);
        if(!filter_var($_POST["eml"],FILTER_VALIDATE_EMAIL)){
            echo "<script>alert('l adresse email est incorrect');</script>";
        }
        //$pwd= password_hash($_POST["pwd"], PASSWORD_ARGON2ID);
        //die($pwd);
        $idi=$_SESSION["user"]["id"];
        //var_dump($idi);
         //var_dump($_POST);
        //On Enregistre en BD
        require_once "connection.php";

        $sql="UPDATE `users` SET `nom`='$nom',`email`='$email',`num_telephone`='$tel',`login`='$pseudo', `password`='$pwd' WHERE `id_u`='$idi'";
        $query = $db->query($sql);
        $query->execute();
       echo "les modifications ont été faite";
       header("location:deconnexion.php");

       // $query->execute();
        //echo $requete->rowcount();
    }
    }
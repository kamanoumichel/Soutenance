<?php
    //on démarre la session PHP
    //session_start();
    /*if(isset($_SESSION["user"])){
        header("Location: accueil.php");
        exit;
    }*/
    $titre="Inscription";
    include_once "header.php";
?>
    <h1 class="text-center">Inscription sur la plateforme</h1>
    <form method="post" class="container rounded border" style="background-color: transparent;">
        <div class="mb-3 mt-3">
            <label for="nom" class="form-label">Nom:</label>
            <input type="text" class="form-control" id="nom" placeholder="Entrez votre nom" name="nom" autofocus required>
        </div>
        <div class="mb-3 mt-3">
            <label for="email" class="form-label">Email:</label>
            <input type="email" class="form-control" id="email" placeholder="Entrez l'email" name="email" required>
        </div>
        <div class="mb-3 mt-3">
            <label for="tel" class="form-label">Tel:</label>
            <input type="number" class="form-control" id="tel" placeholder="Entrez votre numero de telephone" name="tel" required>
        </div>
        <div class="mb-3 mt-3">
            <label for="pseudo" class="form-label">Pseudo:</label>
            <input type="text" class="form-control" id="pseudo" placeholder="Entrez votre pseudo" name="pseudo" required>
        </div>
        <div class="mb-3">
            <label for="pwd" class="form-label">Mot de passe:</label>
            <input type="password" class="form-control" id="pwd" placeholder="Entrez votre mot de passe" name="pwd" required>
        </div>
        <!--div class="form-check mb-3">
            <label class="form-check-label">
            <input class="form-check-input" type="checkbox" name="remember"> Remember me
            </label>
        </div-->
        <button type="submit" class="btn btn-primary">S'inscrire</button>
        <button type="reset" class="btn btn-danger">Annuler</button>
        <p class="text-center">Déjà inscrit? <a href="login.php">Se connecter!</a></p>
    </form>
    
 <?php   

    //On verifie si le formulaire à été envoyé    
    if(!empty($_POST)){
        //Le formulaire a bien été envoyé
        //On verifie que tout les champs requis son remplis
        if(isset($_POST["nom"],$_POST["email"], $_POST["pseudo"],$_POST["tel"], $_POST["pwd"]) && !empty($_POST["nom"]) && !empty($_POST["email"]) && !empty($_POST["tel"]) && !empty($_POST["pseudo"]) && !empty($_POST["pwd"])){
            //Le formulaire est complet
            //on récupére les données
            //echo "ok Ok Ok";
            $nom=strip_tags($_POST["nom"]);
            $email=strip_tags($_POST["email"]);
            $tel=strip_tags($_POST["tel"]);
            $pseudo=strip_tags($_POST["pseudo"]);
            $pwd=strip_tags($_POST["pwd"]);

        if(!filter_var($_POST["email"],FILTER_VALIDATE_EMAIL)){
            echo "<script>alert('l adresse email est incorrect');</script>";
        }
        $pwd= password_hash($_POST["pwd"], PASSWORD_ARGON2ID);
        //die($pwd);
        //On Enregistre en BD
        require_once "connection.php";
        $sql="INSERT INTO `users`(`nom`,`email`,`num_telephone`,`login`,`password`,`role`) VALUES(:nom,:email, :num_tel,:logi,'$pwd','[\"ROLE_USER\"]')";
        $query = $db->prepare($sql);

        $query->bindvalue(":nom",$nom,PDO::PARAM_STR);
        $query->bindvalue(":email",$email,PDO::PARAM_STR);
        $query->bindvalue(":num_tel",$tel,PDO::PARAM_INT);
        $query->bindvalue(":logi",$pseudo,PDO::PARAM_STR);

        $query->execute();
        //On récupére l'id
       // $id= $db->lastInsertId();

        //On connectera l'utilisateur

        //Ici l'utilisateur et le mot de passe sont corrects
                //On va pouvoir connecter l'utilisateur
                //session_start();
                //On va stocker dans $_SESSION les infos des utilisateurs
              /*  $_SESSION["user"] =[
                    "id" => $id,
                    "nom" => $nom,
                    "email" => $email,
                    "tel" => $tel,
                    "pseudo" => $pseudo,
                    "role" =>["ROLE_USER"]
                ];*/
                //var_dump($_SESSION);
                //header("location: login.php");
                echo "<script>alert('Vous êtes bien inscrit contactez ou entendez que l administrateur vous active');</script>";

    }else{
            echo "<script>alert('Le formulaire est incomplet');</script>";
            //header("location: inscription.php");
        }
    }

    include_once "footer.php";
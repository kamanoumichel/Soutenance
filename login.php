<?php

    $titre="Connexion";
    include_once "header.php";
?>
    
    <form method="POST" class="text-center container border mt-5 rounded" style="background-color: transparent;">
        <div class="text-center"><h1>Se Connecter!</h1></div> 
    
        <div class="input-group mb-3">
            <input type="email" name="psd" id="psd" class="form-control" placeholder="Votre Email" autofocus required>
            <span class="input-group-text"><img src="img/index5.jpg" alt="utilisateur" style="height:30px ;width:30px;"></span>
        </div>
        <div class="input-group mb-3">  
            <input type="password" name="pwd" id="pwd" class="form-control" placeholder="Votre Mot de passe" required>
            <span class="input-group-text"><img src="img/images3.png" alt="lock" style="height:30px ;width:30px;"></span>
        </div>
        <p>
            <input type="submit" name="btn" id="btn" value="Se Connecter!" class="btn-success">
            <a href="inscription.php">S'inscrire ?</a>
        </p>
    </form>

<?php
    include_once "footer.php";


    if(isset($_POST["btn"])){
        if(isset($_POST["psd"],$_POST["pwd"]) && !empty($_POST["psd"]) && !empty($_POST["pwd"])
        ){
            require_once "connection.php";
            $psd= $_POST["psd"];
            $pwd= $_POST["pwd"];
            //On evite les injection sql
            $psd = strip_tags($psd);
            $pwd = strip_tags($pwd);
            $sql="SELECT * FROM `users` WHERE `email`=:psd";

            $query= $db->prepare($sql);
            $query->bindvalue(":psd",$psd,PDO::PARAM_STR);

            $query->execute();

            $user= $query->fetch();
            //var_dump($user);die;
            if(!$user){
                echo "<script>alert('utilisateur ou le mot de passe est incorrect');</script>";
                die();
            } 
            //Ici on a un user existant, on peut vérifier le mot de passe
            if(!password_verify($_POST["pwd"], $user["password"])){
                echo "<script>alert('utilisateur ou le mot de passe est incorrect');</script>";
                die();
            }
             //Ici l'utilisateur et le mot de passe sont corrects
                //On va pouvoir connecter l'utilisateur
                session_start();
                //On va stocker dans $_SESSION les infos des utilisateurs
                $_SESSION["user"] =[
                    "id" => $user["id_u"],
                    "nom" => $user["nom"],
                    "email" => $user["email"],
                    "tel" => $user["num_telephone"],
                    "pseudo" => $user["login"],
                    "role" =>$user["role"],
                    "status"=> $user["status"]
                ];
                //var_dump($_SESSION);
                if($_SESSION["user"]["status"]==1){
                    if($_SESSION["user"]["role"]=="[\"ROLE_USER\"]"){
                    header("location: fin.php");
                }
                else{
                    header("location: admin.php");
                }
                }
                else{
                    echo "<script>alert('Veuillez vous inscrire ou contactez l administrateur pour qu il vous active');</script>";
                }
        }         
         
     }
<?php
    session_start();
    /*if(isset($_SESSION["user"])){
        header("Location: login.php");
        exit;
    }*/

//Supprime une variable
unset($_SESSION["user"]);
header("location: login.php");
<?php
        //Ont va définir des contantes d'environnement
        define("DBHOST","localhost");
        define("DBUSER","root");
        define("DBPASS","");
        define("DBNAME","soutenance");
        //pour PDO on va avoir besoin d'un DSN data source name de connexion
        $dsn = "mysql:dbname=".DBNAME.";host=".DBHOST;
        try{
            //ON va instancie PDO
            $db= new PDO($dsn,DBUSER,DBPASS);
            //On s'assure d'envoyer les données en utf8 pour les ascents...
            $db->exec("SET NAMES utf8");
            $db->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE,PDO::FETCH_ASSOC);           
        }
        catch(PDOException $e){
            die("Erreur: ".$e->getMessage());
        }
        
       
    ?>
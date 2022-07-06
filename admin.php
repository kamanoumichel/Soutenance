<?php
    session_start();
?>

<!DOCTYPE html>
<html lang="fr">


<!-- invoices23:24-->
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0">
    <link rel="shortcut icon" type="image/png" href="téléchargement (3).png">
    <title>Accueil</title>
    <link rel="stylesheet" type="text/css" href="assets/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="assets/css/dataTables.bootstrap4.min.css">
    <link rel="stylesheet" type="text/css" href="assets/css/select2.min.css">
    <link rel="stylesheet" type="text/css" href="assets/css/font-awesome.min.css">
    <link rel="stylesheet" type="text/css" href="assets/css/bootstrap-datetimepicker.min.css">
    <link rel="stylesheet" type="text/css" href="assets/css/style.css">
    <!--[if lt IE 9]>
		<script src="assets/js/html5shiv.min.js"></script>
		<script src="assets/js/respond.min.js"></script>
	<![endif]-->
</head>

<body>

<?php

        $titre= "Interface Administrateur";
        include "header.php";
        include "navbar.php";
        require "connection.php";
        $sql="SELECT `nom_du_domaine` FROM `domaine`";
        $req=$db->query($sql);
        $domain= $req->fetchAll();
 ?>

<body>

<div class="header">
    <div class="main-wrapper">
		<div class="header-left">
			<p class="logo">
				<img src="téléchargement (3).png" width="35" height="35" alt="" class="rounded-circle"> <span>HintelDriver</span>
			</p>
		</div>
			<a id="toggle_btn" href="javascript:void(0);"><i class="fa fa-bars"></i></a>
            <a id="mobile_btn" class="mobile_btn float-left" href="#sidebar"><i class="fa fa-bars"></i></a>
            <ul class="nav user-menu float-right">
                <li class="nav-item dropdown has-arrow">
                    <a href="#" class="nav-link user-link" data-toggle="dropdown">
                        <span class="user-img"><img class="rounded-circle" src="assets/img/user.jpg" width="40" alt="Admin">
							<span class="status online"></span></span>
                        <span><?=$_SESSION["user"]["nom"] ?></span>
                    </a>
                    <div class="dropdown-menu">
                    <a class="nav-link" href="deconnexion.php">
                            <img src="img/téléchargement (6).jpeg" alt="logout"style="heigth:50px;width: 50px;" class="rounded-circle"> 
                            Déconnexion
                        </a>
						
					</div>
                </li>
            </ul>
            <div class="dropdown mobile-user-menu float-right">
                <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown" aria-expanded="false"><i class="fa fa-ellipsis-v"></i></a>
            </div>
        </div>
        <div class="sidebar" id="sidebar">
            <div class="sidebar-inner slimscroll">
                <div id="sidebar-menu" class="sidebar-menu">
                    <ul>
                        <li class="menu-title">Menu</li>
                        <li>
                            <a href="admin.php"><i class="fa fa-dashboard"></i> <span>Tableau de Bord</span></a>
                        </li>
                        <li>
                            <a href="traitefichier.php"><i class="fa fa-hospital-o"></i> <span>Consulter des fichiers</span></a>
                        </li>	
                        <li>
                            <a href="compteg.php"><i class="fa fa-cog"></i> <span>Gerer mon compte</span></a>
                        </li>
                        <li>
                             <a href="utilisateur.php"><i class="fa fa-user"></i> <span> Liste des utilisateurs </span></a>
                        </li> 
                        <li>
                        <a href="domaine.php"><i class="fa fa-book"></i> <span> Liste des domaines</a>
                        </li>                    
                    </ul>
                </div>
            </div>
        </div>
        
		
    </div>





<div class="row">
    <div class="page-wrapper">
        <div class="content"> 
            <div class="row">
                <div class="col-md-3">
                        <p>Utilisateur n°: <?=$_SESSION["user"]["id"] ?></p>
                        <p>Pseudo: <?=$_SESSION["user"]["pseudo"] ?></p>
                        <p>e-mail: <?=$_SESSION["user"]["email"] ?></p>
                        <p>numero: <?=$_SESSION["user"]["tel"] ?></p>
                </div>
                <div class="col-md-3 mt-5">
                    <a href="traitefichier.php" title="Consultez les fichiers du sytème">
                        <button class="btn btn-outline-info"><img src="img/index2.png" alt="fichiers" style="height:60px;width:100px;"> <br>
                        Liste des fichiers
                        </button>
                    </a>
                    <a href="#" title="Ajoutez une catégorie de fichier">
                        <button class="btn btn-outline-info" onclick="vilible();">
                            <img src="img/images (2).png" alt="fichiers" style="height:60px;width:100px;"> <br>
                        Ajouter un domaine
                        </button>
                    </a>
                    <form class="mt-5" id="dom" name="dom" style="visibility: hidden;" method="get" action="ajou.php?do=$_GET['do']">
                        <div class="input-group mb-3">  
                            <input type="text" name="do" id="do" class="form-control" placeholder="Ajouter un domaine" required>
                            <span class="input-group-text">Domaine</span>
                        </div>
                        <p>
                            <input type="submit" name="" id="" value="Ajouter" class="btn-success">
                        </p>
                    </form>
                </div>
                <div class="col-md-6">
                    <form action="acctraite.php" method="post" enctype="multipart/form-data">
                            <h4>Ajoutez un Fichier</h4>
                            <div class="row">
                                <div class="col">
                                    <div class="input-group">
                                        <input type="file" class="form-control" name="fichier" id="fichier">
                                    </div>
                                </div>
                                <div class="col">
                                    <div class="input-group">
                                        <select class="form-select" name="sel" id="sel">
                                            <?php foreach($domain as $d): ?>
                                                <option><?= $d["nom_du_domaine"] ?></option>
                                            <?php endforeach; ?>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col">
                                    <h4>Description</h4>
                                    <textarea class="form-control" id="des" name="des">
                                        Description
                                    </textarea>
                                </div>
                                <div class="col">
                                <div class="input-group mb-3 mt-5">
                                    <input type="text" name="nm" id="nm" class="form-control" placeholder="Nom du fichier" disabled>
                                    <span class="input-group-text">Nom</span>
                                </div>
                                </div>
                            </div>
                            <div class="text-center">
                                <button type="submit" class="btn btn-outline-info rounded-5 mt-3">Sauvegarder</button>
                            </div>
                        </form>
                        <form action="int.php" method="post" enctype="multipart/form-data">
                            <h4>Consultez mes fichiers</h4>
                            <div class="text-center">
                                <button type="submit" class="btn btn-outline-info rounded-5 mt-3">Consulter</button>
                            </div>
                        </form>
                </div>

            </div>
        </div>
    </div>
</div>






    

<script type="text/javascript">
    function vilible(){
        document.getElementById("dom").style.visibility="visible";
    }
</script>

 
    

    <div class="sidebar-overlay" data-reff=""></div>
    <script src="assets/js/jquery-3.2.1.min.js"></script>
	<script src="assets/js/popper.min.js"></script>
    <script src="assets/js/bootstrap.min.js"></script>
    <script src="assets/js/jquery.dataTables.min.js"></script>
    <script src="assets/js/dataTables.bootstrap4.min.js"></script>
    <script src="assets/js/select2.min.js"></script>
    <script src="assets/js/jquery.slimscroll.js"></script>
    <script src="assets/js/moment.min.js"></script>
    <script src="assets/js/bootstrap-datetimepicker.min.js"></script>
    <script src="assets/js/app.js"></script>
<?php
    include_once "footer.php";
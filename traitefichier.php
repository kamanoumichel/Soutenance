<?php
     session_start();
     $titre="Liste des fichiers";
    include "header.php";
    
    include_once "navbar.php";         
    require_once "connection.php";
    $sql= "SELECT *FROM `fichiers`";//-- WHERE `fichiers.id_u`=`users.id_u`";
     //on execute la requete
     $requete= $db->query($sql);
     //On recupére les données
     $fiche= $requete->fetchAll();
?>

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
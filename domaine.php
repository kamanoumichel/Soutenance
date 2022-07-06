<?php
     session_start();
     $titre= "Liste des Domaines";
     include "header.php";
     include "navbar.php";

     require_once "connection.php";
     $sql="SELECT * FROM `domaine`";
     $query=$db->query($sql);
     $dom1=$query->fetchAll();
     //$query->execute();?>

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



     <table class="container table table-secondary table-bordered mt-5">
        <thead class="table-dark" style="color: white;">
            <th>ID</th>
            <th>Domaine</th>
            <th>Action</th>
        </thead>
        <tbody>
        <?php foreach ($dom1 as $doma):?>
            <tr>
                <td name="id"><?= $doma["id_c"];?></td>
                <td>
                <?= $doma["nom_du_domaine"];?> 
                </td>
                <td>
                <a href="?id=<?= strip_tags($doma["id_c"])?>" class="text-center">
                    <button class="btn btn-outline-info rounded" type="submit">
                        <img src="img/téléchargement (1).png" alt="supp" style="height: 20px;width:30px;" class="rounded-circle"> Supprimer
                    </button>
                </a>    
                </td>
            </tr>
            <?php endforeach;?>
        </tbody>
     </table>

<?php


if(isset($_GET["id"]) && !empty($_GET["id"])){
    $idio=strip_tags($_GET["id"]);
    $sql2="DELETE FROM `domaine` WHERE id_c='$idio'";
    $req= $db->query($sql2);
    $req->execute();
    echo "<script>alert('Le domaine a bien été supprimer');</script>";
}
?>

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
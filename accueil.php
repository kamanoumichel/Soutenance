<?php
    session_start();
    $titre="Accueil";
    include_once "header.php";
    include "navbar.php";
            require "connection.php";
            $sql="SELECT `nom_du_domaine` FROM `domaine`";
            $req=$db->query($sql);
            $domain= $req->fetchAll();
                            
?> 
    <div class="row">
        <div class="col-3">
            <p>Utilisateur n°: <?=$_SESSION["user"]["id"] ?></p>
            <p>Pseudo: <?=$_SESSION["user"]["pseudo"] ?></p>
            <p>e-mail: <?=$_SESSION["user"]["email"] ?></p>
            <p>numero: <?=$_SESSION["user"]["tel"] ?></p>
            <form>
                <button type="submit" class="btn btn-outline-info rounded-5 mt-3"><a href="compteg.php" style="color:black; outline-style: none;">Gerer mon compte</a></button>
            </form>
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
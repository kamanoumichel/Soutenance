<nav class="navbar navbar-expand-sm navbar-dark bg-dark container">
        <div class="container col-sm">
                <a class="navbar-brand" href="javascript:void(0)">
                    <img src="img/images (1).png" alt="logo" style="height: 50px;" class="rounded-circle">
                </a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#mynavbar">
                <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="mynavbar">
                    <ul class="navbar-nav me-auto">
                        <?php //if(!isset(!$_SESSION["user"])):?>
                        <!--li class="nav-item">
                        <a class="nav-link" href="connection.php">Connection</a>
                        </li-->
                        
                        
                        
                        <li class="nav-item">
                        <h3 class="text-center" style="color:white;"><?= $titre ?></h3>
                        </li>
                    </ul>
                    
                    <?php //else: ?>
                    <div class="d-flex">
                        <a class="nav-link" href="deconnexion.php">
                            <img src="img/téléchargement (6).jpeg" alt="logout"style="heigth:50px;width: 50px;" class="rounded-circle"> 
                            Déconnexion
                        </a>
                    </div>
                    <?php //endif; ?>
                </div>
        </div>
</nav>
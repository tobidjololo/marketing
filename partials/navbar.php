<header class="header fixed-top">
    <div class="header-main love-sticky">
        <div class="container">
            <div class="row align-items-center position-relative">
                <div class="col-lg-2 col-sm-3 col-5">
                    <div class="logo">
                        <a href="index.php">
                            <img src="assets/img/logo.png" class="main-logo" alt="">
                            <img src="assets/img/sticky-logo.png" class="sticky-logo" alt="">
                        </a>
                    </div>
                </div>
                <div class="col-lg-10 col-sm-9 col-7 d-flex align-items-center justify-content-end position-static">
                    <div class="nav-wrapper">
                        <ul class="nav">
                            <li><a class="btn btn-secondary" href="inscription.php">Essayer</a></li>
                            <li><a class="current-menu-parent" href="index.php">Acceuil</a></li>
                            <li><a href="service.php">Service</a></li>
                            <li><a href="contact.php">Contact</a></li>
                            <?php
                                include('class/session.php');	
                                if(Session::checkSession())
                                {
                            ?>
                                <li class="dropdown">
                                    <a href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Mon compte<i class="fas fa-caret-down"></i></a>
                                    <ul class="dropdown-menu dropdown-menu-right client-links " aria-labelledby="dropdownMenuLink">
                                        <li><a href="dashboard.php">Tableau de bord</a></li>
                                        <li><a href="inscription.php">Déconnexion</a></li>
                                    </ul>
                                </li>
                            <?php       
                                }
                            ?>
                            <li class="dropdown">
                                <a href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Mon compte<i class="fas fa-caret-down"></i></a>
                                <ul class="dropdown-menu dropdown-menu-right client-links " aria-labelledby="dropdownMenuLink">
                                    <li><a href="connexion.php">Connexion</a></li>
                                    <li><a href="inscription.php">Inscription</a></li>
                                </ul>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</header>
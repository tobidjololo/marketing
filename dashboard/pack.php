<?php
    include('../class/session.php');
    include('../class/User.php');
	if(Session::checkSession())
    {
        include('partials/header.php');    
        include('partials/sidebar.php');
    } else {
        header("Location: ../connexion.php");
    }
    
?>

<main id="main" class="main">
    <div class="pagetitle">
        <h1>Liste de nos packs  </h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="/home">Accueil</a></li>
                <li class="breadcrumb-item">Nos Packs</li>
                <li class="breadcrumb-item active">Liste de nos packs disponibles</li>
            </ol>
        </nav>
    </div><!-- End Page Title -->

    <section class="section">
        

        <div class="row">
            <?php
                $user = new User();
                $donnes = $user->selectAll("Pack");
                foreach($donnes as $element) {
            ?>
            <div class="col-lg-4">
                <!-- Card with header and footer -->
                <div class="card" style="color:aqua">
                    <div class="card-header">
                        <h2 class="text-center"><?php echo($element["libellé"]) ?></h2>
                    </div>
                        <div class="card-body">
                            <h5 style="text-align:left" class="card-title"><?php echo($element["montant"]) ?> francs CFA</h5>
                            <h5  style="text-align:right"><?php echo($element["nb_credit"]) ?>crédits</h5>
                        </div>
                    <div class="text-center card-footer">
                        <button type=""><a href="">Souscrire à ce pack</a></button>
                    </div>
                </div><!-- End Card with header and footer -->
            </div>
            <?php
                }
            ?>
        </div>
    </section>
</main><!-- End #main -->

<?php
    include('partials/footer.php');
?>
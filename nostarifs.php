<?php
    include('partials/header.php');    
    include('partials/navbar.php');
?>
<div class="page-title-wrap" data-bg-img="assets/img/media/images-barner.jpg">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="page-title text-center text-white">
                        <h2>Nos Tarifs</h2>
                        <ul class="nav justify-content-center">
                            <li><a href="index.php">Acceuil</a></li>
                            <li class="active">Nos Tarifs</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <section class="pricing gradient-bg position-relative pt-120 pb-90"><img src="assets/img/media/price-bg.png" alt=""
            class="section-pattern-img">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="section-title text-white title-shape title-shape-c2 title-shape-style-two text-center">
                        <h2 class="text-white">Forfait tarifaire</h2>
                        <p>Communiquez efficacement avec vos contacts grâce à l'envoi de SMS professionnels. <br> vous
                            pouvez choisir d'envoyer en gros, a plusieurs personnes ou en détails.</p>
                    </div>
                </div>
            </div>
            <div class="row justify-content-center">
                <?php
                    include('class/User.php');
                    $user = new User();
                    $donnes = $user->selectAll("Pack");
                    foreach($donnes as $element) {
                ?>
                <div class="col-lg-3 col-md-6">
                    <div class="single-price ">
                        <div class="price-head">
                            <h4><?php echo($element["libellé"]) ?></h4>
                            <div class="price">
                                <span class="currency"><?php echo($element["montant"]) ?> XOF/€ </span>
                            </div>
                        </div>
                        <div class="price-body">
                            <ul>
                                <li><strong>&nbsp; &nbsp;<?php echo($element["nb_credit"]) ?> SMS</strong></li>
                            </ul>
                            <div class="btn-wrap"><span></span>
                                <a href="connexion.php" class="btn btn-sm">Acheter</a>
                            </div>
                        </div>
                    </div>
                </div>
                <?php
                    }
                ?>
            </div>
        </div>
    </section>
    
<?php
    include('partials/footer.php');
?>
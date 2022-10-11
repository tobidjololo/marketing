<?php
    //require_once "vendor/autoload.php";
    include('partials/header.php');    
    include('partials/navbar.php');
?>
<div class="owl-carousel owl-theme hero-slider" background-color:#eeee>
        <div class="slide slide1">
            <div class="container">
                <div class="row">
                    <div class="col-12 text-center text-white">
                        <h6 class="text-white text-uppercase">Communiquez facilement</h6>
                        <h6 class="text-white text-uppercase">avec l'envoi de sms par internet</h6>
                        <h1 class="display-3 my-4">Profitez de notre plateforme pour développer votre stratégie de <br> communication avec vos clients sur téléphone mobile.</h1>
                        <a href="inscription.php" class="btn btn-brand">Commencez</a>
                    </div>
                </div>
            </div>
        </div>
        <div class="slide slide2">
            <div class="container">
                <div class="row">
                    <div class="col-12 col-lg-10 offset-lg-1 text-white">
                        <h6 class="text-white text-uppercase"> Utilisez le marketing par SMS pour</h6>
                        <h1 class="display-3 my-4">Augmenter vos ventes <br /> conquérir de nouveaux marchés.</h1>
                        <a href="dashboard/pack.php" class="btn btn-brand">Choisir un pack</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
    <section class="service pt-120 pb-90" data-bg-img="assets/img/media/service-bg.png">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="col-12 section-title title-shape title-shape-c2 text-center">
                        <h2>Envoyez un sms en ligne partout dans le monde avec notre plateforme sur numéro mobile</h2>
                        <p>Envoyez des milliers de messages texte sur le téléphone de vos clients. Accédez à la plateforme d'envoi de SMS avec une connexion internet et le tour est joué.  Compatible tous supports et responives, notre plateforme SMS est une application web qui vous assure d'envoyer vos sms en ligne sans installation requise. </p>        
                    </div>
                    <div class="section-title title-shape title-shape-c2 text-center">
                        <h2>SMS Marketing</h2>
                        <p class="text-align-justify">Le marketing par SMS permet aux entreprises de diffuser des messages texte promotionnels basés sur l'autorisation (Opt-in). Exemples de marketing par SMS : un restaurant fait la promotion d'une réduction de 50 % sur les plats principaux un soir spécifique. Une boutique de mode vous invite à une soirée VIP, une salle de sport vous informe qu'un nouveau cours est disponible. La majorité du marketing par SMS se fait via un tableau de bord sous forme de SMS massif. Tous les messages de marketing par SMS doivent comporter une fonctionnalité de désinscription à la fin du message, généralement sous la forme d'une réponse « STOP ».  </p>
                    </div>
                </div>
            </div>
            
        </div>
    </section>


    <section class="pricing gradient-bg2 position-relative pt-120 pb-90">
        <img src="assets/img/media/price-bg.png" alt="" class="section-pattern-img">
        <div class="container" id="packs">
            <div class="row">
                <div class="col-12">
                    <div class="section-title text-white title-shape title-shape-c2 title-shape-style-two text-center">
                        <h2 class="text-white">Packs prépayés</h2>
                        <p>L'envoi d'sms professionnel au meilleur prix sans installation.</p>
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
                                    <span class="currency"><?php echo($element["montant"]) ?> XOF / <?php echo($element["montantE"]) ?> € </span>
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
    </section>
    
<?php
    include('partials/footer.php');
?>
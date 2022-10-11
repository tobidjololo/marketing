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
                <li class="breadcrumb-item active">Les packs disponibles</li>
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
                <div class="card" style="color:blue">
                    <div class="card-header" >
                        <h2 class="text-center"><?php echo($element["libellé"]) ?></h2>
                    </div>
                        <div class="card-body">
                            <h5 style="text-align:center" class="card-title"><?php echo($element["montant"]) ?> XOF /  <?php echo($element["montantE"]) ?> € </h5>
                            <h5  style="text-align:center"><?php echo($element["nb_credit"]) ?> SMS</h5>
                        </div>
                    <div class="text-center card-footer">
                        <kkiapay-widget amount="<?php echo($element["montant"]) ?>"
                                    key="0b12af70103011eaa1d639db8721ba5b"
                                    url=""
                                    position="center"
                                    sandbox="false"
                                    data=""
                                    theme="blue"
                                    name="aa"
                                    callback="http://localhost/Falcon/Sms_php/dashboard/souscription.php?idPack=<?php echo($element["id"]) ?>">
                        </kkiapay-widget>
                    </div>
                </div><!-- End Card with header and footer -->
            </div>
            <?php
                }
            ?>
        </div>
    </section>
</main><!-- End #main 
<script src="https://cdn.kkiapay.me/k.js"></script>-->
<script src="assets/kk.js"></script>
<?php
    include('partials/footer.php');
?>

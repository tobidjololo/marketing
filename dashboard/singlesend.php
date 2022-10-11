<?php
    include('../class/session.php');
    include('../class/Messages.php');
    require_once('../vendor/autoload.php');

	if(Session::checkSession())
    {
        include('partials/header.php');    
        include('partials/sidebar.php');
    } else {
        header("Location: ../connexion.php");
    }
    if($_SERVER['REQUEST_METHOD'] == "POST") {
        $user = new Messages();
        $nbr = $user->nbrPack('User',Session::get('user')[0]["id"],'id');
        
//strlen  ceil

        $a = ceil(strlen($_POST['contenu']) / 144);
        if($nbr['credits_restants'] >= $a) {
            
            //die("ee");
            // //Appeler la méthode de connexion à la BD
            $db = Database::connect();
            
            //Créer une instance de la classe Messages
            $msg = new Messages();
            /**
             * 
             * Start Vonage intégration
             */

            $basic = new \Vonage\Client\Credentials\Basic("bdfb375c", "FR9uAKO3df7amHmo");
            $client = new \Vonage\Client($basic);

            
            $response = $client->sms()->send(
                new \Vonage\SMS\Message\SMS($_POST['recepteur'], $_POST['expediteur'], $_POST['contenu'])
            );

            $message = $response->current();
            
            //Appele de la méthode pour enregistrer le message en BD
            $data = $msg->insertMessages($_POST['recepteur'],$_POST['expediteur'],$_POST['contenu'],Session::get("user")[0]['id']);
            $n = Session::get("user")[0]['credits_restants'] - $a;
            $user->updateCredits("User", $n , "credits_total", "credits_restants",  Session::get("user")[0]['id'], "id");
    
            if ($message->getStatus() == 0) {
                $message="Ajout effectuer avec succès";
                header('Location: singlesend.php?message="Ajout non réalisé"');
            } else {
                echo "The message failed with status: " . $message->getStatus() . "\n";
                $message="Ajout non n'effectuer avec succès";
                header('Location: singlesend.php?message="Ajout non réalisé"');
            }
            /**
            * 
            * End Vonage intégration
            */
            //Redirection vers la meme page
            header('Location: index.php');
        } else {
            //Redirection vers la meme page
            header('Location: singlesend.php?message="Ajout non réalisé"');
        }
    }
?>

<main id="main" class="main">
        <div class="pagetitle">
          <h1>Envoyer un message</h1>
          <nav>
            <ol class="breadcrumb">
              <li class="breadcrumb-item"><a href="/home">Accueil</a></li>
              <li class="breadcrumb-item">Messages</li>
              <li class="breadcrumb-item active">Envoyer un message</li>
            </ol>
          </nav>
        </div><!-- End Page Title -->

        <section class="section">
          <div class="row">
            <div class="col-lg-12">
                <a href="showMessages.php" class="btn btn-block btn-primary float-right" style="margin-bottom: 5px;float: right">Voir les messages envoyés</a>
            </div>
          </div>

          <div class="row m-5">
            <div class="col-lg-12">
                <span class=" h2 d-flex justify-content-center text-decoration-underline align-items-center">Envoi rapide d'un message</span>
                <!-- Multi Columns Form -->
                    <?php
						if(isset($message) and $message == "Ajout effectuer avec succès")
						{	?>
								<h4 class="text-success text-center">***Votre message est envoyé avec succès***</h4>
							<?php
						}
                        if(isset($message) and $message != "Ajout effectuer avec succès")
						{	?>
								<h4 class="text-success text-center">***Votre message ne peut être envoyé car vos fonds sont insuffisants***</h4>
							<?php
						}
					?>
                <form class="row g-3"  action="singlesend.php" method="POST">
                    <div class="col-md-6">
                        <label for="expediteur" class="form-label">Nom de l'expediteur</label>
                        <input type="text" required class="form-control" id="expediteur" name="expediteur" >
                    </div>
                    
                    <div class="col-md-6">
                        <label for="recepteur" class="form-label">Telephone du recepteur(<span style="color: red;">Mettez l'indicatif du pays</span>)</label>
                        <input minlength="3" type="tel" required class="form-control" id="recepteur" name="recepteur" placeholder="22997925015">
                    </div>

                    <div class="col-md-12">
                        <label for="contenu" class="form-label">Message</label>
                        <textarea type="text" required class="form-control" id="contenu" name="contenu"></textarea>
                    </div>

                    <div class="text-center">
                        <button type="submit" class="btn btn-primary">Envoyer un message</button>
                    </div>
                </form><!-- End Multi Columns Form -->
            </div>
          </div>
        </section>
    </main><!-- End #main -->
<?php
    include('partials/footer.php');
?>
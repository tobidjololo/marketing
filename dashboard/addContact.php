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
    if($_SERVER['REQUEST_METHOD'] == "POST") {

        //Appeler la méthode de connexion à la BD
        $db = Database::connect();
        
        //Créer une instance de la classe MesContacts
        $contact = new User();
       
        //Appele de la méthode pour enregistrer le contact en BD
        $data = $contact->insertContact($_POST['nom'],$_POST['prenom'],$_POST['telephone'],Session::get("user")[0]['id']);
		
        $message="Ajout effectuer avec succès";
        
        //Redirection vers la liste des contacts
        header('Location: showContacts.php?message="Ajout effectuer avec succès"');	
    }
?>

<main id="main" class="main">
        <div class="pagetitle">
          <h1>Ajouter un contact</h1>
          <nav>
            <ol class="breadcrumb">
              <li class="breadcrumb-item"><a href="/home">Accueil</a></li>
              <li class="breadcrumb-item">Mes contacts</li>
              <li class="breadcrumb-item active">Ajouter un contact</li>
            </ol>
          </nav>
        </div><!-- End Page Title -->

        <section class="section">
          <div class="row">
            <div class="col-lg-12">
                <a href="showContacts.php" class="btn btn-block btn-primary float-right" style="margin-bottom: 5px;float: right">Liste de mes contacts</a>
            </div>
          </div>

          <div class="row">
            <div class="col-lg-12">
                <span class=" h2 d-flex justify-content-center text-decoration-underline align-items-center">Formulaire d'enregistrement d'un nouveau contact</span>
                <!-- Multi Columns Form -->
                    <?php
						if(isset($message))
						{	?>
								<h4 class="text-success text-center">***Ajout effectuer avec succès***</h4>
							<?php
						}
					?>
                <form class="row g-3"  action="addContact.php" method="POST">
                    <div class="col-md-6">
                        <label for="inputName5" class="form-label">Nom du contact</label>
                        <input type="text" required class="form-control" id="nom" name="nom" >
                    </div>

                    <div class="col-md-6">
                        <label for="inputName5" class="form-label">Prénom du contact</label>
                        <input minlength="3" type="text" required class="form-control" id="prenom" name="prenom">
                    </div>
                    
                    <div class="col-md-6">
                        <label for="inputPassword5" class="form-label">Telephone du contact</label>
                        <input minlength="3" type="tel" required pattern="[5-9]{2}[0-9]{6}" class="form-control" id="telephone" name="telephone">
                    </div>
                    <div class="text-center">
                        <button type="submit" class="btn btn-primary">Ajouter un contact</button>
                    </div>
                </form><!-- End Multi Columns Form -->
            </div>
          </div>
        </section>
    </main><!-- End #main -->
<?php
    include('partials/footer.php');
?>
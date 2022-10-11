<?php
    include('../class/session.php');
    include('../class/User.php');
	if(Session::checkSession())
    {
        echo $_GET['transaction_id'];
        var_dump($_GET);
        if(isset($_GET['transaction_id'])) {
            //Appeler la méthode de connexion à la BD
            $db = Database::connect();
            //Créer une instance de la classe MesContacts
            $souscription = new User();
            
            //Appele de la méthode pour enregistrer la souscription en BD
            $data = $souscription->insertSouscription($_GET['idPack'],$_GET['transaction_id'],Session::get("user")[0]['id']);
            $nbrCredits = $souscription->nbrPack("Pack", $_GET['idPack'], 'id');
            $n = Session::get("user")[0]['credits_restants'] + $nbrCredits['nb_credit'];
            $souscription->updateCredits("User", $n , "credits_total", "credits_restants",  Session::get("user")[0]['id'], "id");
    
            //Redirection vers la page d'acceuil
            header('Location: index.php');
        }
    } else {
        header("Location: ../connexion.php");
    }
    
    
?>

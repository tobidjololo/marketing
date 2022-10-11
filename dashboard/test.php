<?php
    include('../class/session.php');
        include('../class/User.php');
        //Appeler la méthode de connexion à la BD
        $db = Database::connect();
        
        //Créer une instance de la classe MesContacts
        $souscription = new User();

        $nbrCredits = $souscription->nbrPack("Pack", 7, 'id');

        if(Session::checkSession())
        {
            echo "ee";
        } else {
            echo  "zz";
        }
        var_dump(Session::get("email"));
        if(Session::get('email'))
        {
            echo "er";
        }
        $n = Session::get("user")[0]['credits_restants'] + $nbrCredits['nb_credit'];
        $souscription->updateCredits("User", $n, "credits_total", "credits_restants", Session::get('user')[0]["id"] , "id");
?>

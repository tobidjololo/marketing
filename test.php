<?php
    //Importez les fichiers de classes
    include('class/session.php');
    include('class/User.php');

    if($_SERVER['REQUEST_METHOD'] == "POST") {
        //Appeler la méthode statique de la classe session qui lance les sessions
        Session::init();

        //Appeler la méthode de connexion à la BD
        $db = Database::connect();
        
        //Créer une instance de la classe utilisateur
        $user = new User();
       
        //Appele de la méthode pour rechercher l'utilisateur en BD
        $data = $user->findByTwo('email',$_POST['email'],'password',sha1($_POST['password']),'User');

        //Vérifier si il a pu trouver un utilisateur avec ces données
        if($data['nbr'] == 1)
        {
            $data2 = $user->selectAllByElement('email',$_POST['email'],'User');
            Session::set('connect', True);
            $_SESSION["id"] = $data2['id'];
            Session::set('email', $_POST['email']);
            if(Session::get('email'))
            {
                header('Location: dashboard.php');
            }
        }
        else
        {
            header('Location: connexion.php?error=erreur');
            echo "Failed";
        }
    }
?>
<?php
	//session_start();
    include('../class/session.php');
	include('../class/User.php');

    if (isset($_GET['id'])){
        $id=$_GET['id'];
        
        $db = Database::connect();
        
        //Créer une instance de la classe utilisateur
        $user = new User();
        $user->delete("Pack", "id",  $id);
        header('Location:pack.php');
    }
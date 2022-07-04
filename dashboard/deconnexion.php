<?php
    include('../class/session.php');
	if(Session::checkSession())
    {
        Session::destroy();
        header("Location: ../connexion.php");
    } else {
        header("Location: ../connexion.php");
    }
    
?>
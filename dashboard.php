<?php
    include('class/session.php');
	if(Session::checkSession())
    {
		echo "ee";
	} else {
        header("Location: connexion.php");
    }
?>
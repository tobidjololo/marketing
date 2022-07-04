<?php
    include('class/session.php');
	include('class/User.php');
	if(Session::checkSession())
    {
		header("Location: dashboard/");
	}

	if($_SERVER['REQUEST_METHOD'] == "POST") {
        //Appeler la méthode statique de la classe session qui lance les sessions
        Session::init();
        //Appeler la méthode de connexion à la BD
        $db = Database::connect();
        //Créer une instance de la classe utilisateur
        $user = new User();
		//Voir si email déjà utilisé
		$data = $user->findByOne('email',$_POST['email'],'User');
		if($data['nbr'] == 0)
		{
			$data = $user->insert($_POST['username'],$_POST['email'],$_POST['password'],$_POST['code']);
            $data = $user->findByOne('email',$_POST['email'],'User');
			if($data['nbr'] == 1)
			{
				$data2 = $user->selectAllByElement('email',$_POST['email'],'User');
				Session::set('connect', True);
				$_SESSION["id"] = $data2['id'];
				Session::set('email', $_POST['email']);
				if(Session::get('email'))
				{
					header('Location: dashboard/');
				}
			}
			else
			{
				header('Location: inscription.php?error2=erreur2');
			}
		}
		else
		{
			header('Location: inscription.php?error1=erreur1');
		}
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<title>Smsflash</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="icon" type="image/png" href="assets/img/icons/favicon.ico"/>
	<link rel="stylesheet" type="text/css" href="assets/vendor/bootstrap/css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="assets/fonts/font-awesome-4.7.0/css/font-awesome.min.css">
	<link rel="stylesheet" type="text/css" href="assets/fonts/Linearicons-Free-v1.0.0/icon-font.min.css">
	<link rel="stylesheet" type="text/css" href="assets/vendor/animate/animate.css">
	<link rel="stylesheet" type="text/css" href="assets/vendor/css-hamburgers/hamburgers.min.css">
	<link rel="stylesheet" type="text/css" href="assets/vendor/animsition/css/animsition.min.css">
	<link rel="stylesheet" type="text/css" href="assets/vendor/select2/select2.min.css">
	<link rel="stylesheet" type="text/css" href="assets/vendor/daterangepicker/daterangepicker.css">
	<link rel="stylesheet" type="text/css" href="assets/css/util.css">
	<link rel="stylesheet" type="text/css" href="assets/css/main.css">
</head>
<body>
	<div class="limiter">
		<div class="container-login100">
			<div class="wrap-login100">
				<div class="login100-form-title" style="background-image: url(assets/img/bg-01.jpg);">
					<span class="login100-form-title-1">
						Inscription
					</span>
				</div>

				<form class="login100-form validate-form" method="POST" action="inscription.php">
					<?php
						//definition des constantes pour le travail
						if(isset($_GET['error1']))
						{	?>
								<span class="text-danger">Email déjà utilisé.Veuillez changer d'email</span>
							<?php
						}
					?>
					<?php
						//definition des constantes pour le travail
						if(isset($_GET['error2']))
						{	?>
								<span class="text-danger">Votre compte semble ne pas avoir été créé.</span>
							<?php
						}
					?>
					<div class="wrap-input100 validate-input m-b-26" data-validate="Le nom est obligatoire">
						<span class="label-input100">Nom Prénoms</span>
						<input class="input100" type="text" name="username" placeholder="Nom d'utilisateur">
						<span class="focus-input100"></span>
					</div>
					<div class="wrap-input100 validate-input m-b-26" data-validate="L'email est obligatoire">
						<span class="label-input100">Email</span>
						<input class="input100" type="email" name="email" placeholder="Entrez votre Email">
						<span class="focus-input100"></span>
					</div>

					<div class="wrap-input100 validate-input m-b-18" data-validate = "Le mot de passe est obligatoire">
						<span class="label-input100">Mot de passe</span>
						<input class="input100" type="password" name="password" placeholder="Entrez un mot de passe">
						<span class="focus-input100"></span>
					</div>
					<div class="wrap-input100 validate-input m-b-18" data-validate = "La confirmation est obligatoire">
						<span class="label-input100">Confirmer mot de passe</span>
						<input class="input100" type="password" name="password1" placeholder="Confirmez votre mot de passe">
						<span class="focus-input100"></span>
					</div>

					<div class="wrap-input100 m-b-26">
						<span class="label-input100">Code parrain
							(facultatif)</span>
						<input class="input100" type="text" value="00000000" name="code" placeholder="Entrez le code parrain(facultatif)">
						<span class="focus-input100"></span>
					</div>
					
					<div class="container-login100-form-btn">
						<button class="login100-form-btn">
							Inscription
						</button>
                        <span>
                            Vous avez déjà de compte.
                            <br>
                            <a href="connexion.php">Alors connectez vous.</a>
                        </span>
					</div>
				</form>
			</div>
		</div>
	</div>
	

	<script src="assets/vendor/jquery/jquery-3.2.1.min.js"></script>

	<script src="assets/vendor/animsition/js/animsition.min.js"></script>

	<script src="assets/vendor/bootstrap/js/popper.js"></script>
	<script src="assets/vendor/bootstrap/js/bootstrap.min.js"></script>

	<script src="assets/vendor/select2/select2.min.js"></script>

	<script src="assets/vendor/daterangepicker/moment.min.js"></script>
	<script src="assets/vendor/daterangepicker/daterangepicker.js"></script>

	<script src="assets/vendor/countdowntime/countdowntime.js"></script>

	<script src="assets/js/main1.js"></script>

</body>
</html>
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
       
        //Appele de la méthode pour rechercher l'utilisateur en BD
        $data = $user->findByTwo('email',$_POST['email'],'password',$_POST['password'],'User');

        //Vérifier si il a pu trouver un utilisateur avec ces données
        if($data['nbr'] == 1)
        {
			echo('ee');
            $data2 = $user->selectAllByElement('email',$_POST['email'],'User');
            Session::set('connect', True);
            $_SESSION["id"] = $data2['id'];
            Session::set('email', $_POST['email']);
			Session::set('user', $data2);
            if(Session::get('email'))
            {
                header('Location: dashboard/');
            }
        }
        else
        {
            header('Location: connexion.php?error=erreur');
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
						Connexion
					</span>
				</div>

				<form class="login100-form validate-form" action="connexion.php" method="POST">
					<?php
						//definition des constantes pour le travail
						if(isset($_GET['error']))
						{	?>
								<span class="text-danger">Email/Mot de passe incorrect</span>
							<?php
						}
					?>
					<div class="wrap-input100 validate-input m-b-26" data-validate="L'email est obligatoire">
						<span class="label-input100">Email</span>
						<input class="input100" type="text" name="email" placeholder=" Entrez votre email">
						<span class="focus-input100"></span>
					</div>

					<div class="wrap-input100 validate-input m-b-18" data-validate = "Le mot de passe est obligatoire">
						<span class="label-input100">Mot de passe</span>
						<input class="input100" type="password" name="password" placeholder="Mot de passe">
						<span class="focus-input100"></span>
					</div>

					<div class="flex-sb-m w-full p-b-30">
						<div class="contact100-form-checkbox">
							<input class="input-checkbox100" id="ckb1" type="checkbox" name="remember-me">
							<label class="label-checkbox100" for="ckb1">
								se souvenir de moi 
							</label>
						</div>

						<div>
							<a href="#" class="txt1">
								Mot de passe oublié?
							</a>
						</div>
					</div>

					<div class="container-login100-form-btn">
						<button class="login100-form-btn">
							connexion
						</button>
                        <span>
                            Vous n'avez pas de compte.
                            <br>
                            <a href="inscription.php">Alors inscrivez-vous.</a>
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
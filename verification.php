<?php
	//session_start();
    include('class/session.php');
	Session::init();
	include('class/User.php');
	if(Session::get('user')[0]["status"] == 1){
        if(Session::get('user')[0]["type"] == "user") {
            header('Location: dashboard/');
        } else {
            header('Location: admin/');	
        }
    } 

    if($_SERVER['REQUEST_METHOD'] == "POST") {
        Session::init();
        $db = Database::connect();
        $user = new User();
        $data = $user->findByTwoCode('email',Session::get('user')[0]["email"],'code',$_POST['code'],'User');
        if($data['nbr'] == 1)
        {
            $user->verification('User',1,'status',Session::get('user')[0]["email"],"email");    
            if(Session::get('user')[0]["type"] == "user") {
                header('Location: dashboard/');
            } else {
                header('Location: admin/');	
            }
        }
        else
        {
            header('Location: verification.php?error=erreur');
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
						Vérification
					</span>
				</div>

				<form class="login100-form validate-form" action="verification.php" method="POST">
					<?php
						//definition des constantes pour le travail
						if(isset($_GET['error']))
						{	?>
								<span class="text-danger">Code incorrect</span>
							<?php
						}
					?>
					<div class="wrap-input100 validate-input m-b-18" data-validate = "Le code est obligatoire">
						<span class="label-input100">Code</span>
						<input class="input100" type="text" name="code" placeholder="Code">
						<span class="focus-input100"></span>
					</div>

					<div class="container-login100-form-btn m-4">
						<button class="login100-form-btn text-center">
							Vérifier
						</button>
					</div>
				</form>
				
			</div>
		</div>
	</div>
	

    <script src="assets/vendor/jquery/jquery-3.2.1.min.js"></script>

	<script src="assets/vendor/animsition/js/animsition.min.js"></script>

	{# <script src="assets/vendor/bootstrap/js/popper.js"></script> #}
	<script src="assets/vendor/bootstrap/js/bootstrap.min.js"></script>

	<script src="assets/vendor/select2/select2.min.js"></script>

	<script src="assets/vendor/daterangepicker/moment.min.js"></script>
	<script src="assets/vendor/daterangepicker/daterangepicker.js"></script>

	<script src="assets/vendor/countdowntime/countdowntime.js"></script>

	<script src="assets/js/main1.js"></script>
	<script type="text/javascript">
        var Tawk_API=Tawk_API||{}, Tawk_LoadStart=new Date();
        (function(){
            var s1=document.createElement("script"),s0=document.getElementsByTagName("script")[0];
            s1.async=true;
            s1.src='https://embed.tawk.to/633303e454f06e12d897243f/1gdvkednq';
            s1.charset='UTF-8';
            s1.setAttribute('crossorigin','*');
            s0.parentNode.insertBefore(s1,s0);
        })();
    </script>

</body>
</html>

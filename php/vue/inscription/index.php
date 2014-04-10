<!DOCTYPE html>
<html lang="fr">
	<head>
		<meta charset="UTF-8" />
		<title>Private Photos</title>
		<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
		<link rel="stylesheet" type="text/css" href="./../../../css/index.css" />
	</head>
	
	<body>
		<h1><strong>INSCRI</strong>PTION</h1>
		<div class="pt-main">
			<h2>Inscrivez-vous :</h2>
			<center>
				<form name="login_form" method="POST" action="./../../inc/inscription.php">
					<input type="text" class="saisie-lg" placeholder="Pseudo" style="border-style:none;" name="user" required> <br/>
					<input type="password" class="saisie-lg" placeholder="Mot de passe" style="border-style:none;" name="pass" required> <br/>
					<input type="email" class="saisie-lg" placeholder="Email" style="border-style:none;" name="email" required> <br/>
					<input type="submit" class="button" style="border-style:none;" value="Terminer"> <br/>
				</form>
    			<a href="./../../../index.html">Retour</a>
			</center>
		</div>
	</body>
</html>
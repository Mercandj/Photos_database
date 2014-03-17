<?php
// On démarre la session AVANT d'écrire du code HTML
session_start();
 
// On s'amuse à créer quelques variables de session dans $_SESSION
$_SESSION['prenom'] = 'Jean';
$_SESSION['nom'] = 'Dupont';
$_SESSION['age'] = 24;
?>

<!DOCTYPE html>
<html lang="fr">
	<head>
		<meta charset="UTF-8" />
		<title>Private Photos</title>
		<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
		<link rel="stylesheet" type="text/css" href="css.css" />
	</head>
	

	<header>
		<div class="header_texte">
			home 
		</div>
	    
	</header>

	<body>	
		<div class="pt-main">
			
			<div class="pt">

				

				<?php
					include("../../php/affiche_base_image.php");
					echo affiche_base_image();
					
				?>

			</div>

		</div>
	</body>

	<footer>
		<center>
			<form name="login_form" method="POST" action="/projects/photos_database/php/add.php">
				<input type="text" class="saisie" placeholder="URL" style="border-style:none;" name="url" required> 
				<input type="text" class="saisie" placeholder="Description" style="border-style:none;" name="description" required>
				<input type="text" class="saisie" placeholder="Titre" style="border-style:none;" name="titre" required>
				<input type="submit" class="button" style="border-style:none;" value="Submit">
			</form>
		</center>
	    
	</footer>


</html>

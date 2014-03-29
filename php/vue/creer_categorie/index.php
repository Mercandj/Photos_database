<?php
	// On démarre la session AVANT d'écrire du code HTML
	session_start();
	
	// On vérifie si l'utilisateur est connecté
	if($_SESSION['user']==null) {
		echo 'Session non activée';
		header("Location: ./../../index.html");
	}
?>

<!DOCTYPE html>
<html lang="fr">
	<head>
		<meta charset="UTF-8" />
		<title>Photos Base</title>
		<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
		<link rel="stylesheet" type="text/css" href="./../../../css/home.css" />
		<link rel="stylesheet" type="text/css" href="./../../../css/table.css" />
	</head>

	<?php include './../header.php'; ?>

	<body>	

		<!-- Menu de gauche -->
		<div class="left">
			<?php include './../menu.php'; ?>
		</div>
			
		<div class="right">
			<div class="affichage">
				<h2>Nouvelle Catégorie :</h2>
				<form name="login_form" method="POST" action="./../../modele/creer_categorie.php">
					<input type="text" class="saisie-lg" placeholder="Nom" style="border-style:none;" name="nom" required> <br/>
					<input type="text" class="saisie-lg" placeholder="Description" style="border-style:none;" name="description"> <br/>
					<input type="submit" class="button-lg" style="border-style:none;" value="Créer"> <br/>
				</form>
			</div>
		</div>
	</body>
		
	<?php include './../footer.php'; ?>

</html>
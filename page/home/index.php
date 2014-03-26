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
		<link rel="stylesheet" type="text/css" href="./../../css/home.css" />
		<link rel="stylesheet" type="text/css" href="./../../css/table.css" />
		<!-- Carousel -->
		<link rel="stylesheet" type="text/css" href="./../../carousel/jcarousel.css">
	</head>

	<header>
		<div class="header_texte">
			photos-base
		</div>
	</header>

	<body>	

		<!-- Menu de gauche -->
		<div class="left">
			<div id='cssmenu'>
				<a><?php echo $_SESSION['user']; ?></a>
				<a1>
					<form name="login_form" method="POST" action="./../../php/controleur/IndexControleur.php" enctype="multipart/form-data">
						<input type="hidden" name="action" value="Créer catégorie">
						<input type="submit" class="cssmenu_input" style="border-style:none;" value="Créer catégorie">
					</form>
				</a1>
				<a1>
					<form name="login_form" method="POST" action="./../../php/controleur/IndexControleur.php">
						<input type="hidden" name="action" value="Supprimer tout">
						<input type="submit" class="cssmenu_input" style="border-style:none;" value="Supprimer tout">
					</form>
				</a1>
				<a1>
					<form name="login_form" method="POST" action="./../../php/controleur/IndexControleur.php" enctype="multipart/form-data">
						<input type="hidden" name="action" value="Quitter">
						<input type="submit" class="cssmenu_input" style="border-style:none;" value="Quitter">
					</form>
				</a1>

			</div>
		</div>
			
		<div class="right">
				
			<!-- Carousel -->
			<?php
				include './../../php/classe/Image.php';
				include './../../php/controleur/ImageControleur.php';
				include './../../php/modele/ImageModele.php';
				include './../../php/vue/ImageVue.php';
				$ic = new ImageControleur();
				echo $ic->getHTML_carousel();
			?>

			<div class="affichage">
				<h2>Voici vos photos !</h2>
				<?php
					$ic = new ImageControleur();
					echo $ic->getHTML_table();
				?>


				<h3>Information</h3>
				<p>Poster au moins 6 photos pour débloquer la galerie.</p>
			</div>

		</div>
	</body>

	<footer>
		<center>
			<form name="login_form" method="POST" action="./../../php/add.php" enctype="multipart/form-data">
				<input type="text" class="saisie" placeholder="Description" style="border-style:none;" name="description">
				<input type="text" class="saisie" placeholder="Titre" style="border-style:none;" name="titre">
				<input type="file" class="saisie-lg" style="border-style:none;" name="image" required/>
     			<input type="hidden" name="MAX_FILE_SIZE" value="1048576" />
				<input type="submit" class="button" style="border-style:none;" value="Envoyer">
			</form>
		</center>
	    
	</footer>

	<script type="text/javascript" src="./../../carousel/jquery.js"></script>
	<script type="text/javascript" src="./../../carousel/jquery_002.js"></script>
	<script type="text/javascript" src="./../../carousel/jcarousel.js"></script>

</html>
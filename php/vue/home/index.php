<?php
	// On démarre la session AVANT d'écrire du code HTML
	session_start();
	
	// On vérifie si l'utilisateur est connecté
	if($_SESSION['user']==null) {
		echo 'Session non activée';
		header("Location: ./../../../index.html");
	}

	include_once './../../controleur/MainControleur.php';
	$mc = new MainControleur();
?>

<!DOCTYPE html>
<html lang="fr">
	<head>
		<meta charset="UTF-8" />
		<title>Photos Base</title>
		<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
		<link rel="stylesheet" type="text/css" href="./../../../css/home.css" />
		<link rel="stylesheet" type="text/css" href="./../../../css/table.css" />
		<!-- Carousel -->
		<link rel="stylesheet" type="text/css" href="./../../../carousel/jcarousel.css">
	</head>

	<?php
		include_once './../header.php';
	?>

	<body>	

		<!-- Menu de gauche -->
		<div class="left">
			<?php
				include_once './../menu.php';
			?>
		</div>
			
		<div class="right">
				
			<!-- Carousel -->
			<?php
			echo $mc->getHTML_carousel();
			?>

			<!-- Categorie -->
			<?php
				echo $mc->getHTML_categorie();
			?>

			<div class="affichage">
				<h2>Voici vos photos !</h2>
				<?php
					echo $mc->getHTML_table();
				?>


				<h3>Information</h3>
				<p>Poster au moins 6 photos pour débloquer la galerie.</p>
			</div>

		</div>
	</body>
	<?php
		include_once './../footer.php';
	?>

	<script type="text/javascript" src="./../../../carousel/jquery.js"></script>
	<script type="text/javascript" src="./../../../carousel/jquery_002.js"></script>
	<script type="text/javascript" src="./../../../carousel/jcarousel.js"></script>

</html>
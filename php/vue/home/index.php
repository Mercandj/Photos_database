<?php
	// On démarre la session AVANT d'écrire du code HTML
	session_start();
	
	// On vérifie si l'utilisateur est connecté
	if($_SESSION['user']==null) {
		echo 'Session non activée';
		header("Location: ./../../../index.html");
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
		<!-- Carousel -->
		<link rel="stylesheet" type="text/css" href="./../../../carousel/jcarousel.css">
	</head>

	<?php
		include './../header.php';
	?>

	<body>	

		<!-- Menu de gauche -->
		<div class="left">
			<?php
				include './../menu.php';
			?>
		</div>
			
		<div class="right">
				
			<!-- Carousel -->
			<?php
				include './../../classe/Image.php';
				include './../../controleur/ImageControleur.php';
				include './../../modele/ImageModele.php';
				include './../ImageVue.php';
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
	<?php
		include './../footer.php';
	?>
	

	<script type="text/javascript" src="./../../../carousel/jquery.js"></script>
	<script type="text/javascript" src="./../../../carousel/jquery_002.js"></script>
	<script type="text/javascript" src="./../../../carousel/jcarousel.js"></script>

</html>
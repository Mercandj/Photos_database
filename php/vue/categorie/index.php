<?php
	// On démarre la session AVANT d'écrire du code HTML
	session_start();
	
	// On vérifie si l'utilisateur est connecté
	if($_SESSION['user']==null) {
		echo 'Session non activée';
		header("Location: ./../../../index.html");
	}

	$listeImages = '';

	include_once './../../controleur/MainControleur.php';
		
	include_once './../../classe/Image.php';
	include_once './../../modele/ImageModele.php';
	include_once './../ImageVueIndex.php';

	include_once './../../classe/Categorie.php';
	include_once './../../modele/CategorieModele.php';
	include_once './../CategorieVueIndex.php';

	include_once './../CategorieVue.php';

	$categorie_nom = $_GET['categorie'];
	$im = new ImageModele();
	$listeImages = $im->getImageListe_Categorie($categorie_nom);
	$cv = new CategorieVue($listeImages);

	$listeImages = $cv->genererHTML_table();
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

	<?php include_once './../header.php'; ?>

	<body>	

		<!-- Menu de gauche -->
		<div class="left">
			<?php include_once './../menu.php'; ?>
		</div>
			
		<div class="right">
				
			<!-- Carousel -->
			<?php
			$mc = new MainControleur();
			echo $mc->getHTML_carousel();
			?>

			<div class="affichage">
				<h2>Catégorie <?php echo $categorie_nom ?> :</h2>

				<!-- Liste d'image -->
				<?php echo $listeImages; ?>

				<h3>Information</h3>
				<p>Poster au moins 6 photos pour débloquer la galerie.</p>
			</div>

		</div>
	</body>
	<?php include './../footer.php'; ?>

	<script type="text/javascript" src="./../../../carousel/jquery.js"></script>
	<script type="text/javascript" src="./../../../carousel/jquery_002.js"></script>
	<script type="text/javascript" src="./../../../carousel/jcarousel.js"></script>

</html>
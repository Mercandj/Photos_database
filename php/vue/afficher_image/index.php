<?php
	// On démarre la session AVANT d'écrire du code HTML
	session_start();
	
	// On vérifie si l'utilisateur est connecté
	if($_SESSION['user']==null) {
		echo 'Session non activée';
		header("Location: ./../../../index.html");
	}

	/*$listeImages = '';*/

	include_once './../controleur/MainControleur.php';
		
	include_once './../classe/Image.php';
	include_once './../modele/ImageModele.php';
	include_once './../vue/ImageVueIndex.php';

	include_once './../classe/Categorie.php';
	include_once './../modele/CategorieModele.php';
	include_once './../vue/CategorieVueIndex.php';

	include_once './../vue/CategorieVue.php';
/*
	$image_url = $_GET['image'];
	$im = new ImageModele();
	$image = $im->getImage($image_url);
	*/
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

	<?php
		include './../vue/header.php';
	?>

	<body>	

		<!-- Menu de gauche -->
		<div class="left">
			<?php
				include './../vue/menu_image.php';
			?>
		</div>
			
		<div class="right">

			<div class="affichage">
				<h2>Photo !</h2>
				
				<img class="image_url" width="600" height="400" src=<?php echo './../'.$url_image;?> ></img>

				<h3>Information</h3>
				<p>Description : <?php echo $description_image; ?></p>
			</div>

		</div>
	</body>
	<?php
		include './../vue/footer.php';
	?>

	<script type="text/javascript" src="./../../carousel/jquery.js"></script>
	<script type="text/javascript" src="./../../carousel/jquery_002.js"></script>
	<script type="text/javascript" src="./../../carousel/jcarousel.js"></script>

</html>
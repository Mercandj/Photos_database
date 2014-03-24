<?php
	// On démarre la session AVANT d'écrire du code HTML
	session_start();
	
	// On s'amuse à créer quelques variables de session dans $_SESSION
	if($_SESSION['user']==null) {
		echo 'Session non activée';
		header("Location: ./../../index.html");
	}
?>

<!DOCTYPE html>
<html lang="fr">
	<head>
		<meta charset="UTF-8" />
		<title>Private Photos</title>
		<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
		<link rel="stylesheet" type="text/css" href="./../../css/home.css" />
		<link rel="stylesheet" type="text/css" href="./../../css/table.css" />
		<link rel="stylesheet" type="text/css" href="./../../css/left_menu.css" />
	</head>
	

	<header>
		<div class="header_texte">
			photos-base
		</div>
	    
	</header>

	<body>	

		<div class="left">

			<div id='cssmenu'>
				<a><?php echo $_SESSION['user']; ?></a>
				<a1 >
					<form name="login_form" method="POST" action="./../../php/logout.php" enctype="multipart/form-data">
						<input type="submit" class="cssmenu_input" style="border-style:none;" value="Logout">
					</form>
				</a1>

			</div>
		</div>
		<div class="right">
				
			<div class="pt">

				<h2>Voici vos photos !</h2>

				<?php
					include './../../php/classe/Image.php';
					include './../../php/controleur/ImageControleur.php';
					include './../../php/modele/ImageModele.php';
					include './../../php/vue/ImageVue.php';
					$ic = new ImageControleur();
					echo $ic->getHTML();
					
				?>

			</div>
		</div>
	</body>

	<footer>
		<center>
			<form name="login_form" method="POST" action="./../../php/add.php" enctype="multipart/form-data">
				<input type="text" class="saisie" placeholder="Description" style="border-style:none;" name="description" required>
				<input type="text" class="saisie" placeholder="Titre" style="border-style:none;" name="titre" required>
				<input type="file" class="saisie-lg" style="border-style:none;" name="image" required/>
     			<input type="hidden" name="MAX_FILE_SIZE" value="1048576" />
				<input type="submit" class="button" style="border-style:none;" value="Submit">
			</form>
		</center>
	    
	</footer>


</html>

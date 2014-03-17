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
					// Connexion à la base de données
					try
					{
						$bdd = new PDO('mysql:host=localhost;dbname=mydb', 'root', '');
					}
					catch(Exception $e)
					{
						die('Erreur : '.$e->getMessage());
					}

					// On récupère tt
					$req = $bdd->query('SELECT * FROM `image` WHERE 1');

					while ($donnees = $req->fetch())
					{
						?>
						<div>
						    
						    <a href=<?php echo $donnees['url']; ?>>
								<img src=<?php echo $donnees['url']; ?> width="200" height="200" alt="im" />
							</a>

							<br/>
							<h3>
								<strong>Titre</strong>
							    <?php echo htmlspecialchars($donnees['titre']); ?><br />
							    <strong>Description</strong>
							    <?php echo $donnees['description']; ?>
						    </h3>
						    <p>
						</div>
						<?php
					} // Fin de la boucle
					$req->closeCursor();
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


<?php
function changer_image_categorie($url, $Categorie_nom) {
	try {
		$bdd = new PDO('mysql:host=localhost;dbname=mydb', 'root', '');
	}
	catch(Exception $e) {
		die('Erreur : '.$e->getMessage());
	}

	$req = $bdd->prepare('UPDATE `image` SET `Categorie_nom` = ? WHERE `url` = ?');
	$req->execute(array($Categorie_nom, $url));
}

function changer_image_visibilire($url, $visivilite) {
	try {
		$bdd = new PDO('mysql:host=localhost;dbname=mydb', 'root', '');
	}
	catch(Exception $e) {
		die('Erreur : '.$e->getMessage());
	}

	$req = $bdd->prepare('UPDATE `image` SET `visivilite` = ? WHERE `url` = ?');
	$req->execute(array($visivilite, $url));
}
?>
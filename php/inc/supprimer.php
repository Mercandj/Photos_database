
<?php 
function supprimer_fichier($url) {
	try {
		$bdd = new PDO('mysql:host=localhost;dbname=mydb', 'root', '');
	}
	catch(Exception $e) {
		die('Erreur : '.$e->getMessage());
	}

	$req = $bdd->prepare('SELECT * FROM `image` WHERE `url` = ?');
	$req->execute(array($url));
	if($donnees = $req->fetch()) {
		unlink('./.'.$donnees['url']);
		unlink('./.'.$donnees['url_icone']);
		$sql = 'DELETE FROM image WHERE url=\''.$url.'\'';
  		$count = $bdd->exec($sql);
		return true;
	}
	else {
		return false;
	}
	$req = null;
}

function supprimer_tout() {
	try {
		$bdd = new PDO('mysql:host=localhost;dbname=mydb', 'root', '');
	}
	catch(Exception $e) {
		die('Erreur : '.$e->getMessage());
	}

	$req = $bdd->prepare('SELECT * FROM `image`');
	$req->execute();
	while($donnees = $req->fetch()) {
		unlink('./.'.$donnees['url']);
		unlink('./.'.$donnees['url_icone']);
		$sql = 'DELETE FROM image WHERE url=\''.$donnees['url'].'\'';
  		$count = $bdd->exec($sql);
	}
	$req = null;
}
?>
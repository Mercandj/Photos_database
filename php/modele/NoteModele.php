<?php 
include '../classe/Note.php';
include_once 'ImageModele.php';
	function __construct() {

	}

	function ajouter_note($url, $valeur) {
		try {
	      $bdd = new PDO('mysql:host=localhost;dbname=mydb', 'root', '');
	    } catch(Exception $e) {
	      die('Erreur : '.$e->getMessage());
	    }
		
		$date = date("Y-d-m");
		session_start();
		
		$image_modele = new ImageModele();
		$image = $image_modele->getImage($url)[0];
		
		$note = new Note(
			$valeur, 
			$date, 
			$image, 
			$_SESSION['user']);
		
		$req = $bdd->prepare($note->getinsert());
		$req->execute($note->getarray());
		$req = null;
		
		updateNoteImage($url, $note->getValeur());
		
	}
	
	function updateNoteImage($urlImage, $note)
	{
		try {
	      $bdd = new PDO('mysql:host=localhost;dbname=mydb', 'root', '');
	    } catch(Exception $e) {
	      die('Erreur : '.$e->getMessage());
	    }

	    // On récupère tt
		session_start();
	    $req = $bdd->prepare('SELECT `valeur` FROM `note` WHERE `Image_url`=? and not `Utilisateur_nom`=?');
		$req->execute(array($urlImage, $_SESSION['user']));

		$somme = $note;
		$counter = 1;

	    while ($donnees = $req->fetch()) { 
	    	$somme += $donnees['valeur'];
			$counter++;
	    }
		
		$req = $bdd->prepare('UPDATE `image` SET `note` = ? WHERE `url` = ?');
		$req->execute(array($somme/$counter, $urlImage));
		
	    $req = null;
		return $table;
	}

?>

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
		$note = new Note(
			$valeur, 
			$date, 
			$image_modele->getImage($url), 
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
	    $req = $bdd->prepare('SELECT `valeur` FROM `note` WHERE `Image_url`=?');
		$req->execute(array($urlImage));

		$somme = $note;
		$counter = 1;

	    while ($donnees = $req->fetch()) { 
	    	$somme += $donnees['valeur'];
			$counter++;
	    }
		
		$req = $bdd->prepare('UPDATE `note` SET `valeur` = ? WHERE `Image_url` = ?');
		$req->execute(array(arrondi($somme, $counter), $urlImage));
		
	    $req = null;
		return $table;
	}
	
	function arrondi($numerateur, $denominateur)
	{
		if(($numerateur%$denominateur)/$denominateur<0.5)
		{
			return ($numerateur - $numerateur%$denominateur)/$denominateur;
		}
		else
		{
			return ($numerateur - $numerateur%$denominateur)/$denominateur +1;
		}
	}

?>

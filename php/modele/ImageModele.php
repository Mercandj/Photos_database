
<?php 
class ImageModele {

	public __constructor() {


	}

	function getImageListe() {
		try {
	      $bdd = new PDO('mysql:host=localhost;dbname=mydb', 'root', '');
	    } catch(Exception $e) {
	      die('Erreur : '.$e->getMessage());
	    }

	    // On récupère tt

	    $req = $bdd->prepare('SELECT * FROM `image` WHERE `Utilisateur_nom`=?');
		$req->execute(array($_SESSION['user']));

	    while ($donnees = $req->fetch()) { }

		return $donnees;
	}
}

?>

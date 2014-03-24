
<?php 
class ImageModele {

	function __construct() {


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

		$table = array();

	    while ($donnees = $req->fetch()) { 
	    	array_push($table, new Image(
	    	$donnees['url'],
	    	$donnees['url_icone'],
	    	$donnees['description'],
	    	$donnees['titre'],
	    	$donnees['taille'],
	    	$donnees['taille_icone'],
	    	$donnees['note'],
	    	$donnees['commentaire'],
	    	$donnees['date'],
	    	$donnees['Utilisateur_nom'],
	    	$donnees['Categorie_nom']
	    	));
	    }

		return $table;
	}
}

?>
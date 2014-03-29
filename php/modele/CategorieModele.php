
<?php 
class CategorieModele {

	function __construct() {

	}

	function getCategorieListe() {
		try {
	      $bdd = new PDO('mysql:host=localhost;dbname=mydb', 'root', '');
	    } catch(Exception $e) {
	      die('Erreur : '.$e->getMessage());
	    }

	    // On récupère tt
	    $req = $bdd->prepare('SELECT * FROM `categorie` WHERE `Utilisateur_nom`=?');
		$req->execute(array($_SESSION['user']));

		$table = array();

	    while ($donnees = $req->fetch()) { 
	    	array_push($table, new Categorie(
	    	$donnees['nom'],
	    	$donnees['description'],
	    	$donnees['date'],
	    	$donnees['Utilisateur_nom']
	    	));
	    }
	    $req = null;
		return $table;
	}
}

?>

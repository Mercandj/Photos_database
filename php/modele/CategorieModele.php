
<?php 
class CategorieModele {

	private $bdd;

	function __construct($pbdd) {
		$this->bdd = $pbdd;
	}

	function getCategorieListe() {

	    // On récupère tt
	    $req = $this->bdd->prepare('SELECT * FROM `categorie` WHERE `Utilisateur_nom`=?');
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

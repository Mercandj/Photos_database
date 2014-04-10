
<?php 
class ImageModele {

	private $bdd;

	function __construct($pbdd) {
		$this->bdd = $pbdd;
	}

	function getImageListe() {
		
	    // On récupère tt
	    $req = $this->bdd->prepare('SELECT * FROM `image` WHERE `Utilisateur_nom`=? OR `visibilite`=\'public\'');
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
	    	$donnees['visibilite'],
	    	$donnees['Utilisateur_nom'],
	    	$donnees['Categorie_nom']
	    	));
	    }
	    $req = null;
		return $table;
	}

	function getImageListe_Categorie($categorie) {
		
	    // On récupère tt
	    $req = $this->bdd->prepare('SELECT * FROM `image` WHERE `Utilisateur_nom`=? AND `Categorie_nom`=?');
		$req->execute(array($_SESSION['user'],$categorie));

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
	    	$donnees['visibilite'],
	    	$donnees['Utilisateur_nom'],
	    	$donnees['Categorie_nom']
	    	));
	    }
	    $req = null;
		return $table;
	}

	function getImage($image_url) {
	    
	    // On récupère tt
	    $req = $this->bdd->prepare('SELECT * FROM `image` WHERE `url`=?');
		$req->execute(array($image_url));

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
	    	$donnees['visibilite'],
	    	$donnees['Utilisateur_nom'],
	    	$donnees['Categorie_nom']
	    	));
	    }
	    $req = null;
		return $table;
	}
}

?>

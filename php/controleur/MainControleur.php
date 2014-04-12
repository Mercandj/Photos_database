<?php 

/* Controleur principale. */

include_once './../../classe/Image.php';
include_once './../../modele/ImageModele.php';
include_once './../../vue/ImageVueIndex.php';

include_once './../../classe/Categorie.php';
include_once './../../modele/CategorieModele.php';
include_once './../../vue/CategorieVueIndex.php';

include_once './../../vue/CategorieVue.php';
include_once './../../vue/Carousel.php';

class MainControleur {

	private $im;
	private $iv;

	private $cm;
	private $cv;
	
	function __construct() {

		try {
	      $bdd = new PDO('mysql:host=localhost;dbname=mydb', 'root', '');
	    } catch(Exception $e) {
	      die('Erreur : '.$e->getMessage());
	    }

		$this->cm = new CategorieModele($bdd);
		$this->cv = new CategorieVueIndex($this->cm->getCategorieListe());

		$this->im = new ImageModele($bdd);
		$this->iv = new ImageVueIndex($this->im->getImageListe(), $this->cm->getCategorieListe());
	}
	
	function getHTML_table()
	{
		return $this->iv->genererHTML_table();
	}

	function getHTML_categorie()
	{
		return $this->cv->genererHTML_categorie();
	}

	function getHTML_carousel()
	{
		return $this->iv->getHTML_carousel();
	}

	function get_categorie($categorie_nom) {
		$listeImages = $this->im->getImageListe_Categorie($categorie_nom);
		$cv = new CategorieVue($listeImages);
		return $cv->genererHTML_table();
	}
}
?>

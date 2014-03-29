<?php 
class MainControleur {

	private $im;
	private $iv;

	private $cm;
	private $cv;
	
	function __construct() {
		$this->im = new ImageModele();
		$this->iv = new ImageVue($this->im->getImageListe());
		$this->cm = new CategorieModele();
		$this->cv = new CategorieVue($this->cm->getCategorieListe());
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
}

?>

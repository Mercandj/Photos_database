<?php 
class ImageControleur {

	private $im;
	private $iv;
	
	function __construct() {
		$this->im = new ImageModele();
		$this->iv = new ImageVue($this->im->getImageListe());
	}
	
	function getHTML_table()
	{
		return $this->iv->genererHTML_table();
	}

	function getHTML_carousel()
	{
		return $this->iv->getHTML_carousel();
	}
}

?>

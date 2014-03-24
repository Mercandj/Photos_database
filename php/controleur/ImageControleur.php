<?php 
class ImageControleur {

	private $im;
	private $iv;
	
	function __construct() {
		$this->im = new ImageModele();
		$this->iv = new ImageVue($this->im->getImageListe());
	}
	
	function getHTML()
	{
		return $this->iv->genererHTML();
	}
}

?>

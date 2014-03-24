<?php 
class ImageControleur {

	ImageModele $im;
	ImageVue $iv;
	
	public __constructor() {
		$im = new ImageModele();
		$iv = new ImageVue($im->getImageListe());
	}
	
	function getHTML()
	{
		return $iv->genererHTML();
	}
}

?>

<?php 
class ImageControleur {

	public __constructor() {
		ImageModele $im = new ImageModele();
		ImageVue $iv = new ImageVue($im->getImageListe());
		echo $iv->genererHTML();
	}
	
	
}

?>

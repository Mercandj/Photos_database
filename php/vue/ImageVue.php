
<?php 
class ImageVue {

	private $liste_images;

	function __construct($pliste_images) {
		$this->liste_images = $pliste_images;
	}

	function genererHTML() {
    $res = '<table class="table_fichiers">';
    foreach($this->liste_images as $image) {
        
      $res = $res.'
      <tr>
        <td class="table_image">
          <img class="imade_url" width="32" height="32" src="'.$image->geturl().'"></img>
        </td>
        <td class="table_titre">
          <a class="table_titre" title="'.$image->getTitre().'" href="'.$image->geturl().'">'.$image->getTitre().'</a>
        </td>
        <td class="table_description">
          <a class="table_description" title="'.$image->getDescription().'" href="'.$image->geturl().'">'.$image->getDescription().'</a>
        </td>
        <td class="table_taille">
          <a class="table_description" title="'.$image->getTaille().'" href="'.$image->geturl().'">'.$image->getTaille().' px</a>
        </td>
      </tr>
      ';
      
    }
    $res = $res.'</table>';
    return $res;
  }
}
?>

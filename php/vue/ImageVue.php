
<?php 
class ImageVue {

	private $liste_images;

	function __construct($pliste_images) {
		$this->liste_images = $pliste_images;
	}

	function genererHTML_table() {
    $res = '<table class="table_fichiers">';
    foreach($this->liste_images as $image) {
        
      $res = $res.'
      <tr>
        <td class="table_image">
          <img class="imade_url" width="32" height="32" src="./.'.$image->getUrl().'"></img>
        </td>
        <td class="table_titre">
          <a class="table_titre" title="'.$image->getTitre().'" href="./.'.$image->getUrl().'">'.$image->getTitre().'</a>
        </td>
        <td class="table_description">
          <a class="table_description" title="'.$image->getDescription().'" href="./.'.$image->getUrl().'">'.$image->getDescription().'</a>
        </td>
        <td class="table_taille">
          <a class="table_description" title="'.$image->getTaille().'" href="./.'.$image->getUrl().'">'.$image->getTaille().' px</a>
        </td>
      </tr>
      ';
      
    }
    $res = $res.'</table>';
    return $res;
  }

  function getHTML_carousel() {
    $res = '';
    $i = 1;
    foreach($this->liste_images as $image) {
      $res .= '<li style="height: 200px; width: 200px;"><img src="./.'.$image->getUrlIcone().'" alt="Image '.$i.'"></li>';
      $i++;
    }
    return $res;
  }
}
?>

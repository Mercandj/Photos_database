
<?php 
class ImageVue {

	private $liste_images;

	function __construct($pliste_images) {
		$this->liste_images = $pliste_images;
	}

	function genererHTML() {
    $res = "";
    foreach($this->liste_images as $image) {
      $res = $res.'<div><a href="'.$image->geturl().'"> <img src="'.$image->geturl().'" width="200" height="200" alt="im" /></a>
          <br/>
            <h3>
              <strong>Titre </strong>'.$image->getTitre().'<br />
                <strong>Description </strong>'.$image->getDescription().'
            </h3>
            <p>
        </div>';
        
      /*$res .= '
      <tr>
          <td class="image_url">
            <img class="imade_url" width="16" height="16" src="'.$image['url'].'"></img>
          </td>
          <td class="image_titre">
            <a class="image_titre" title="'.$image['titre'].'" href="'.$image['url'].'"></a>
          </td>
          <td class="image_description">
            <a class="image_description" title="'.$image['description'].'" href="'.$image['url'].'"></a>
          </td>

      </tr>
      ';
      */
    }
    return $res;
  }
}
?>

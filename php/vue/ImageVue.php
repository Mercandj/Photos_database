
<?php 
class ImageVue {


	var $liste_images;

	public __constructor($pliste_images) {
		$this->$liste_images = $pliste_images;
	}

	function genererHTML() {
    foreach($liste_images as $value) {
      $res = $res.'<div><a href="'.$donnees['url'].'"> <img src="'.$donnees['url'].'" width="200" height="200" alt="im" /></a>
          <br/>
            <h3>
              <strong>Titre </strong>'.$donnees['titre'].'<br />
                <strong>Description </strong>'.$donnees['description'].'
            </h3>
            <p>
        </div>';
        
        /*$res .= '
        <tr>
            <td class="image_url">
              <img class="imade_url" width="16" height="16" src="'.$donnees['url'].'"></img>
            </td>
            <td class="image_titre">
              <a class="image_titre" title="'.$donnees['titre'].'" href="'.$donnees['url'].'"></a>
            </td>
            <td class="image_description">
              <a class="image_description" title="'.$donnees['description'].'" href="'.$donnees['url'].'"></a>
            </td>

        </tr>
        ';
        */
    }
    return $res;
  }
}
?>

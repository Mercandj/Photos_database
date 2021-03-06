
<?php 
class CategorieVue {

	private $liste_images;

	function __construct($pliste_images) {
		$this->liste_images = $pliste_images;
	}

  function genererHTML_table() {
    $res = '<table class="table_fichiers">';

    /* 1ère ligne de la table */
    if(count($this->liste_images)!=0) {
      $res = $res.'<tr>
      <td class="table_image"><a>Icône</a></td>
      <td class="table_titre"><a>Titre</a></td>
      <td class="table_description"><a>Description</a></td>
      <td class="table_taille"><a>Taille</a></td>
      <td class="table_action_1"><a>Supprimer</a></td>
      </tr>
      ';
    }

    foreach($this->liste_images as $image) {
      $res = $res.'
      <tr>
        <td class="table_image">
          <img class="image_url" width="60" height="40" src="./../../'.$image->getUrlIcone().'"></img>
        </td>
        <td class="table_titre">
          <a>
            <form name="login_form" method="POST" action="./../../controleur/IndexControleur.php">
              <input type="hidden" name="action" value="Afficher image">
              <input type="hidden" name="url" value="'.$image->getUrl().'">
              <input type="hidden" name="description" value="'.$image->getDescription().'">
              <input type="submit" class="cssmenu_input" style="border-style:none;" value="'.$image->getTitre().'">
            </form>
          </a>
        </td>
        <td class="table_description">
          <a>
            <form name="login_form" method="POST" action="./../../controleur/IndexControleur.php">
              <input type="hidden" name="action" value="Afficher image">
              <input type="hidden" name="url" value="'.$image->getUrl().'">
              <input type="hidden" name="description" value="'.$image->getDescription().'">
              <input type="submit" class="cssmenu_input" style="border-style:none;" value="'.$image->getDescription().'">
            </form>
          </a>
        </td>

        <td class="table_taille">
          <a>
            <form name="login_form" method="POST" action="./../../controleur/IndexControleur.php">
              <input type="hidden" name="action" value="Afficher image">
              <input type="hidden" name="url" value="'.$image->getUrl().'">
              <input type="hidden" name="description" value="'.$image->getDescription().'">
              <input type="submit" class="cssmenu_input" style="border-style:none;" value="'.$image->getTaille().'">
            </form>
          </a>
        </td>

        <td class="table_taille">
          <a class="table_description" title="'.$image->getTaille().'" href="./../../'.$image->getUrl().'">'.$image->getTaille().' px</a>
        </td>
        <td class="table_action_1">
          <a>
            <form name="login_form" method="POST" action="./../../controleur/IndexControleur.php">
              <input type="hidden" name="action" value="Supprimer fichier">
              <input type="hidden" name="url" value="'.$image->getUrl().'">
              <input type="submit" class="cssmenu_input" style="border-style:none;" value="Supprimer">
            </form>
          </a>
        </td>
      </tr>';
    }
    $res = $res.'</table>';
    return $res;
  }

  function getHTML_carousel() {
    $var = new Carousel($this->liste_images);
    return $var->getHTML_carousel();
  }
}
?>


<?php 
include 'Carousel.php';
class ImageVueIndex {

	private $liste_images;
  private $liste_categories;

	function __construct($pliste_images, $pliste_categories) {
		$this->liste_images = $pliste_images;
    $this->liste_categories = $pliste_categories;
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
      <td class="table_action_0"><a>Visibilité</a></td>
      <td class="table_action_1"><a>Supprimer</a></td>
      <td class="table_action_2"><a>Categorie</a></td>
      <td class="table_action_3"><a>Ma Note</a></td>
      <td class="table_action_4"><a>Note</a></td>
      </tr>
      ';
    }

    foreach($this->liste_images as $image) {
      $res = $res.'
      <tr>
        <td class="table_image">
          <img class="imade_url" width="60" height="40" src="./../../'.$image->getUrlIcone().'"></img>
        </td>
        <td class="table_titre">
          <a class="table_titre" title="'.$image->getTitre().'" href="./../../'.$image->getUrl().'">'.$image->getTitre().'</a>
        </td>
        <td class="table_description">
          <a class="table_description" title="'.$image->getDescription().'" href="./../../'.$image->getUrl().'">'.$image->getDescription().'</a>
        </td>

        <td class="table_taille">
          <a>
            <form name="login_form" method="POST" action="./../../controleur/IndexControleur.php">
              <input type="hidden" name="action" value="Afficher image">
              <input type="hidden" name="url" value="'.$image->getUrl().'">
              <input type="submit" class="cssmenu_input" style="border-style:none;" value="'.$image->getTaille().'">
            </form>
          </a>
        </td>

        <td class="table_action_0">
          <a>
            <form name="login_form" method="POST" action="./../../controleur/IndexControleur.php">
              <input type="hidden" name="action" value="Changer visibilite">
              <input type="hidden" name="url" value="'.$image->getUrl().'">
              <SELECT name="visibilite" size="1" onChange="this.location=this.form.submit();">';
                  if($image->getVisibilite()==="public") {
                    $res .='<OPTION value="public" selected>Public<OPTION value="private">Private';
                  }
                  else {
                    $res .='<OPTION value="public">Public<OPTION value="private" selected>Private';
                  }
                  $res .='
              </SELECT>
              <noscript><input type="submit" value="Changer" /></noscript>
            </form>
          </a>
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

        <td class="table_action_2">
          <a>
            <form name="login_form" method="POST" action="./../../controleur/IndexControleur.php">
              <input type="hidden" name="action" value="Changer categorie">
              <input type="hidden" name="url" value="'.$image->getUrl().'">
              <SELECT name="categorie" size="1" onChange="this.location=this.form.submit();">';
                  foreach($this->liste_categories as $categorie) {
                    if($categorie->getNom()!="null" && $categorie->getNom()==$image->getCategorie_nom())
                      $res .='<OPTION value="'.$categorie->getNom().'" selected>'.$categorie->getNom();
                    else
                      $res .='<OPTION value="'.$categorie->getNom().'">'.$categorie->getNom();
                  }
                  if($image->getCategorie_nom()=='null') $res .='<OPTION value="null" selected>null';
                  else  $res .='<OPTION value="null">null';
                  $res .='
              </SELECT>
              <noscript><input type="submit" value="Changer" /></noscript>
            </form>
          </a>
        </td>

        <td class="table_action_3">
          <a>
            <form name="login_form" method="POST" action="./../../controleur/IndexControleur.php">
              <input type="hidden" name="action" value="Donner note">
              <input type="hidden" name="url" value="'.$image->getUrl().'">
              <SELECT name="note" size="1" onChange="this.location=this.form.submit();">';

                for($i=0;$i<6;$i++) {
                  if($image->getNote()===$i) {
                    $res .='<OPTION value="'.$i.'" selected>'.$i;
                  }
                  else {
                    $res .='<OPTION value="'.$i.'">'.$i;
                  }
                }
                
                $res .='
              </SELECT>
              <noscript><input type="submit" value="Changer" /></noscript>
            </form>
          </a>
        </td>

        <td class="table_action_4">
          <a>';
            $res .=''.$image->getNote().'/5';
            $res .='
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

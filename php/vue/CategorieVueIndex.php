
<?php 
class CategorieVueIndex {

	private $liste_categorie;

	function __construct($pliste_categorie) {
		$this->liste_categorie = $pliste_categorie;
	}

  function genererHTML_categorie() {
    if(count($this->liste_categorie)==0) return '';
    $res = '<div class="affichage"><h2>Voici vos catégories !</h2><table class="table_categories"><tr>';
    $i = 0;
    foreach($this->liste_categorie as $categorie) {
      
      if($i%4==3)  $res = $res.'</tr><tr>';
      $res = $res.'
        <td>
          <figure>
            <img width="90" height="70" src="./../../../image/dossier.png" alt="dossier">
            <a>
            <form name="login_form" method="POST" action="./../../controleur/IndexControleur.php">
              <input type="hidden" name="action" value="Afficher categorie">
              <input type="hidden" name="categorie" value="'.$categorie->getNom().'">
              <input type="submit" class="categorie_nom" style="border-style:none;" value="'.$categorie->getNom().'">
            </form>
          </a>
          </figure>
        </td>
      ';
      $i++;
    }
    $res = $res.'</tr></table></div><br />';
    return $res;
  }
}
?>

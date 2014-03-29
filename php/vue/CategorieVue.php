
<?php 

class categorieVue {

	private $liste_categorie;

	function __construct($pliste_categorie) {
		$this->liste_categorie = $pliste_categorie;
	}

	function genererHTML_categorie() {
    if(count($this->liste_categorie)==0)return '';
    $res = '<div class="affichage"><h2>Voici vos catégories !</h2>';
    foreach($this->liste_categorie as $categorie) {
      $res = $res.'<h3>'.$categorie->getNom().'</h3>';
      
    }
    $res .= '</div><br />';
    return $res;
  }
}
?>

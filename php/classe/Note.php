
<?php 

  include "Image.php";

  class Note {

    private $valeur;
    private $date;
    private $Image_url;
    private $Image_Utilisateur_nom;
    private $Image_Categorie_nom;
    private $Utilisateur_nom;

    public function __construct($pvaleur, $pdate, $pimage, $putilisateur) {
      $this->valeur = $pvaleur;
      $this->date = $pdate;

	  
      $this->Image_url = $pimage->getUrl();
      $this->Image_Utilisateur_nom = $pimage->getUtilisateur_nom();
      $this->Image_Categorie_nom = $pimage->getCategorie_nom();
      $this->Utilisateur_nom = $putilisateur;
    }
	
	function getvaleur(){return $this->valeur;}

    public function getarray() {
      return array(
        'valeur' => $this->valeur,
        'date' => $this->date,
        'Image_url' => $this->Image_url,
        'Image_Utilisateur_nom' => $this->Image_Utilisateur_nom,
        'Image_Categorie_nom' => $this->Image_Categorie_nom,
        'Utilisateur_nom' => $this->Utilisateur_nom
      );
    }

    public function getinsert() {
      return 
        'INSERT INTO note(
          valeur,
          date,
          Image_url,
          Image_Utilisateur_nom,
          Image_Categorie_nom,
          Utilisateur_nom
        ) VALUES(
          :valeur,
          :date,
          :Image_url,
          :Image_Utilisateur_nom,
          :Image_Categorie_nom,
          :Utilisateur_nom
        )';
    }
	
	
  }
?>


<?php 

  include "Image.php";

  class Commentaire {

    private $id;
    private $contenu;
    private $date;
    private $Image_url;
    private $Image_Utilisateur_nom;
    private $Image_Categorie_nom;
    private $Utilisateur_nom;

    public function __construct($pid, $pcontenu, $pdate, $pimage, $putilisateur) {
      $this->id = $pid;
      $this->contenu = $pcontenu;
      $this->date = $pdate;

      $this->Image_url = $pimage->geturl();
      $this->Image_Utilisateur_nom = $pimage->getUtilisateur_nom();
      $this->Image_Categorie_nom = $pimage->getCategorie_nom();
      $this->Utilisateur_nom = $putilisateur->getnom();
    }

    public function getarray() {
      return array(
        'id' => $this->id,
        'contenu' => $this->contenu,
        'date' => $this->date,
        'Image_url' => $this->Image_url,
        'Image_Utilisateur_nom' => $this->Image_Utilisateur_nom,
        'Image_Categorie_nom' => $this->Image_Categorie_nom,
        'Utilisateur_nom' => $this->Utilisateur_nom

      );
    }

    public function getinsert() {
      return 
        'INSERT INTO commentaire(
          id,
          contenu,
          date,
          Image_url,
          Image_Utilisateur_nom,
          Image_Categorie_nom,
          Utilisateur_nom
        ) VALUES(
          :id,
          :contenu,
          :date,
          :Image_url,
          :Image_Utilisateur_nom,
          :Image_Categorie_nom,
          :Utilisateur_nom
        )';
    }
  }
?>

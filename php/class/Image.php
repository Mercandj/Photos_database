
<?php 

  class Image {

    private $url;
    private $url_icone = "rien";
    private $description;
    private $titre;
    private $taille = "rien";
    private $taille_icone = "rien";
    private $note = 0;
    private $commeantaire = "rien";
    private $date;
    private $Utilisateur_nom = "rien";
    private $Categorie_nom = "rien";

    public function __construct($purl, $pdescription, $ptitre, $pdate) {
      $this->url = $purl;
      $this->description = $pdescription;
      $this->titre = $ptitre;
      $this->date = $pdate;
    }

    public function getarray() {
      return array(
        'url' => $this->url,
        'url_icone' => $this->url_icone,
        'description' => $this->description,
        'titre' => $this->titre,
        'taille' => $this->url,
        'taille_icone' => $this->url,
        'note' => $this->note,
        'commentaire' => $this->url,
        'date' => $this->date,
        'Utilisateur_nom' => $this->url,
        'Categorie_nom' => $this->url,
      );
    }

    public function getinsert() {
      return 
        'INSERT INTO image(
          url,
          url_icone,
          description,
          titre,
          taille,
          taille_icone,
          note,
          commentaire,
          date,
          Utilisateur_nom,
          Categorie_nom
        ) VALUES(
          :url,
          :url_icone,
          :description,
          :titre,
          :taille,
          :taille_icone,
          :note,
          :commentaire,
          :date,
          :Utilisateur_nom,
          :Categorie_nom
        )';
    }

    public function getUtilisateur_nom() {
      return $this->Utilisateur_nom;
    }
    public function geturl() {
      return $this->url;
    }
    public function getCategorie_nom() {
      return $this->Categorie_nom;
    }

  }
?>

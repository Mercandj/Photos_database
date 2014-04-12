<?php 
  /* Classe relative à la table "Categorie". Une catégorie joue le rôle d'album. */
  class Categorie {

    private $nom;
    private $description;
    private $date;
    private $Utilisateur_nom;

    public function __construct($pnom, $pdescription, $pUtilisateur_nom) {
      $this->nom = $pnom;
      $this->description = $pdescription;
      $this->date = "NULL";
      $this->Utilisateur_nom = $pUtilisateur_nom;
    }

    public function getarray() {
      return array(
        'nom' => $this->nom,
        'description' => $this->description,
        'date' => $this->date,
        'Utilisateur_nom' => $this->Utilisateur_nom
      );
    }

    public function getinsert() {
      return 
        'INSERT INTO categorie(
          nom,
          description,
          date,
          Utilisateur_nom
        ) VALUES(
          :nom,
          :description,
          :date,
          :Utilisateur_nom
        )';
    }

    public function getNom() {
      return $this->nom;
    }
  }
?>

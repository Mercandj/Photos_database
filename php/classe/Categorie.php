
<?php 

  include "Image.php";

  class Categorie {

    private $nom;
    private $description;
    private $date;

    public function __construct($pnom, $pdescription, $pdate) {
      $this->nom = $pnom;
      $this->description = $pdescription;
      $this->date = $pdate;
    }

    public function getarray() {
      return array(
        'nom' => $this->nom,
        'description' => $this->description,
        'date' => $this->date

      );
    }

    public function getinsert() {
      return 
        'INSERT INTO commentaire(
          nom,
          description,
          date
        ) VALUES(
          :nom,
          :description,
          :date
        )';
    }
  }
?>

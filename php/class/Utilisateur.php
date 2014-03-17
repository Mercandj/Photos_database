
<?php 

  class Utilisateur {

    private $nom;
    private $pass;
    private $email;
    private $rang = 0;

    public function __construct($pnom, $ppass, $pemail) {
      $this->nom = $pnom;
      $this->pass = $ppass;
      $this->email = $pemail;
    }

    public function getarray() {
      return array(
        'nom' => $this->nom,
        'pass' => $this->pass,
        'email' => $this->email,
        'rang' => $this->rang
      );
    }

    public function getinsert() {
      return 
        'INSERT INTO utilisateur(
          nom,
          pass,
          email,
          rang
        ) VALUES(
          :nom,
          :pass,
          :email,
          :rang
        )';
    }

    public function getnom() {
      return $this->nom;
    }
  }
?>

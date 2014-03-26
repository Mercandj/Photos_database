
<?php 

  class Image {

    private $url;
    private $url_icone;
    private $description;
    private $titre;
    private $taille;
    private $taille_icone;
    private $note = 0;
    private $commentaire;
    private $date;
    private $Utilisateur_nom;
    private $Categorie_nom;

    public function __construct( $purl,
      $purl_icone,
      $pdescription,
      $ptitre,
      $ptaille,
      $ptaille_icone,
      $pnote,
      $pcommentaire,
      $pdate,
      $pUtilisateur_nom,
      $pCategorie_nom) {

      $this->url = $purl;
      $this->url_icone = $purl_icone;
      $this->description = $pdescription;
      $this->titre = $ptitre;
      $this->taille = $ptaille;
      $this->taille_icone = $ptaille_icone;
      $this->note = $pnote;
      $this->commentaire = $pcommentaire;
      $this->date = $pdate;
      $this->Utilisateur_nom = $pUtilisateur_nom;
      $this->Categorie_nom = $pCategorie_nom;
    }

    public function getarray() {
      return array(
        'url' => $this->url,
        'url_icone' => $this->url_icone,
        'description' => $this->description,
        'titre' => $this->titre,
        'taille' => $this->taille,
        'taille_icone' => $this->taille_icone,
        'note' => $this->note,
        'commentaire' => $this->commentaire,
        'date' => $this->date,
        'Utilisateur_nom' => $this->Utilisateur_nom,
        'Categorie_nom' => $this->Categorie_nom,
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


    public function getTitre() {
      return $this->titre;
    }
    public function getTaille() {
      return $this->taille;
    }
    public function getDescription() {
      return $this->description;
    }
    public function getUtilisateur_nom() {
      return $this->Utilisateur_nom;
    }
    public function getUrl() {
      return $this->url;
    }
    public function getUrlIcone() {
      return $this->url_icone;
    }
    public function getCategorie_nom() {
      return $this->Categorie_nom;
    }

    var $image; var $image_type; var $filename;

    function load($filename) {   
      $this->filename = $filename;
      $image_info = getimagesize($filename); 
      $this->image_type = $image_info[2]; 
      if( $this->image_type == IMAGETYPE_JPEG ) {   
        $this->image = imagecreatefromjpeg($filename); 
      } 
      elseif( $this->image_type == IMAGETYPE_GIF ) {   
        $this->image = imagecreatefromgif($filename); 
      } 
      elseif( $this->image_type == IMAGETYPE_PNG ) {   
        $this->image = imagecreatefrompng($filename); 
      }
    } 

    function save($filename, $image_type=IMAGETYPE_JPEG, $compression=75, $permissions=null) {   
      if( $image_type == IMAGETYPE_JPEG ) { 
        imagejpeg($this->image,$filename,$compression); 
      } 
      elseif( $image_type == IMAGETYPE_GIF ) {   
        imagegif($this->image,$filename); 
      } 
      elseif( $image_type == IMAGETYPE_PNG ) {   
        imagepng($this->image,$filename); 
      } 
      if( $permissions != null) {   
        chmod($filename,$permissions); 
      } 
    } 

    function getWidth() {   
      return imagesx($this->image); 
    } 
    function getHeight() {   
      return imagesy($this->image); 
    } 
    function resize($width,$height) {
      $new_image = imagecreatetruecolor($width, $height); 
      imagecopyresampled($new_image, $this->image, 0, 0, 0, 0, $width, $height, $this->getWidth(), $this->getHeight()); 
      $this->image = $new_image; 
    }
  }
?>

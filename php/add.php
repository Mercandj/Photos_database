
<?php 

include 'classe/Image.php';

  $maxwidth = 200000;
  $maxheight = 200000;

  if ($_FILES['image']['error'] > 0) {
    $erreur = "Erreur lors du transfert";
    echo $erreur;
    return;
  }
  if ($_FILES['image']['size'] > 1048576) $erreur = "Le fichier est trop gros";
  $extensions_valides = array( 'jpg' , 'jpeg' , 'gif' , 'png' );
  $extension_upload = strtolower(  substr(  strrchr($_FILES['image']['name'], '.')  ,1)  );

  // Vérification de l'extension
  if ( in_array($extension_upload,$extensions_valides) ) {
    $image_sizes = getimagesize($_FILES['image']['tmp_name']);

    // Vérification de la taille de l'image
    if ( !($image_sizes[0] > $maxwidth OR $image_sizes[1] > $maxheight) ) {

      if(!isset($_SESSION))
        session_start();
      
      // Créer un dossier
      @mkdir('./../bdd_images/'.$_SESSION['user'].'/', 0777, true);
     
      $date_heure = date("Y-d-m_h-i-s");

      // Enregistre le fichier image
      $url = "./../bdd_images/".$_SESSION['user'].'/'.$date_heure.'_'.$_FILES['image']['name']/*.".{$extension_upload}"*/;
      $resultat = move_uploaded_file($_FILES['image']['tmp_name'], $url);

      // Création de l'icone
      $icone_url = "./../bdd_images/".$_SESSION['user'].'/icone_'.$date_heure.'_'.$_FILES['image']['name'];
      $icone = new Image(null,null,null,null,null,null,null,null,null,null,null); 
      $icone->load($url); 
      $icone->resize(600,400); 
      $icone->save($icone_url);

      // Création des attributs de l'image
      $date = date("Y-d-m");
      $titre = $_POST['titre'];
      $description = $_POST['description'];
      $note = 0;

      // Connexion à la base de données
      try {
        $bdd = new PDO('mysql:host=localhost;dbname=mydb', 'root', '');
      }
      catch(Exception $e) {
        die('Erreur : '.$e->getMessage());
      }

      // Création d'une image
      $im = new Image(
        $url, 
        $icone_url,
        $description, 
        $titre, 
        $image_sizes[0].'x'.$image_sizes[1],
        "null",
        "null",
        "null",
        "null",
        $_SESSION['user'],
        "null"
        );

      // INSERT de l'image dans la base de données
      $req = $bdd->prepare($im->getinsert());
      $req->execute($im->getarray());

      header("Location: ./../page/home/index.php");
    }
    else {
      echo "Image trop grande";
    }
  } 
  else {
     echo "Extension incorrecte";
  }
?>
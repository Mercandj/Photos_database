
<?php 

include 'classe/Image.php';

  $maxwidth = 200000;
  $maxheight = 200000;

  if ($_FILES['image']['error'] > 0) $erreur = "Erreur lors du transfert";
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
     
      // Créer un identifiant difficile à deviner
      $nom = md5(uniqid(rand(), true));

      $nom = "./../bdd_images/".$_SESSION['user'].'/'.$_FILES['image']['name']/*.".{$extension_upload}"*/;
      $resultat = move_uploaded_file($_FILES['image']['tmp_name'],$nom);
      if ($resultat) echo "Transfert réussi";


      $date = date("Y-d-m");
      $titre = $_POST['titre'];
      $url = "./../../bdd_images/".$_SESSION['user'].'/'.$_FILES['image']['name']/*.".{$extension_upload}"*/;//$_POST['url'];
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
        "null",
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

      echo 'L\'image a bien été ajoutée !';
    }
    else {
      echo "Image trop grande";
    }
  } 
  else {
     echo "Extension incorrecte";
  }
?>

<?php 

include 'inc/log.php';
include 'class/Image.php';
  
  function w_log($titre, $url, $description) {
    $date = date("d-m-Y");
    $heure = date("H:i");

    $filename = 'log.txt';
    $somecontent = $date." ".$heure."  TITRE:".$titre."  URL:".$url."  DESCRIPTION:".$description."\n";

    ecrire_fichier($filename, $somecontent);
  }

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
      $im = new Image($url, $description, $titre, $url, $_SESSION['user']);

      // INSERT de l'image dans la base de données
      $req = $bdd->prepare($im->getinsert());
      $req->execute($im->getarray());

      // Ecriture de logs
      w_log($titre, $url, $description);

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
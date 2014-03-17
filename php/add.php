
<?php 

include 'inc/log.php';
include 'Image.php';

  function w_log($titre, $url, $description) {
    $date = date("d-m-Y");
    $heure = date("H:i");

    $filename = 'log.txt';
    $somecontent = $date." ".$heure."  TITRE:".$titre."  URL:".$url."  DESCRIPTION:".$description."\n";

    ecrire_fichier($filename, $somecontent);
  }

  $date = date("Y-d-m");
  $titre = $_POST['titre'];
  $url = $_POST['url'];
  $description = $_POST['description'];

  $note = 0;
  
  // Connexion à la base de données
  try
  {
    $bdd = new PDO('mysql:host=localhost;dbname=mydb', 'root', '');
  }
  catch(Exception $e)
  {
    die('Erreur : '.$e->getMessage());
  }


  $im = new Image($url, $description, $titre, $url);

  $req = $bdd->prepare($im->getinsert());
  $req->execute($im->getarray());

  w_log($titre, $url, $description);

  echo 'L\'image a bien été ajoutée !';


  
?>

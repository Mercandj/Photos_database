
<?php include 'inc/log.php';


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
  


  // Connexion à la base de données
  try
  {
    $bdd = new PDO('mysql:host=localhost;dbname=base_1', 'root', '');
  }
  catch(Exception $e)
  {
    die('Erreur : '.$e->getMessage());
  }



  $req = $bdd->prepare('INSERT INTO images(url, description, date, titre) VALUES(:url, :description, :date, :titre)');
  $req->execute(array(
    'url' => $url,
    'description' => $description,
    'date' => $date,
    'titre' => $titre,
    ));

  w_log($titre, $url, $description);

  echo 'Le jeu a bien été ajouté !';


  
?>

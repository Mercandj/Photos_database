
<?php 

include 'class/Utilisateur.php';

  // Connexion à la base de données
  try
  {
    $bdd = new PDO('mysql:host=localhost;dbname=mydb', 'root', '');
  }
  catch(Exception $e)
  {
    die('Erreur : '.$e->getMessage());
  }

  $nom = $_POST['nom'];
  $pass = $_POST['pass'];
  $email = $_POST['email'];

  $us = new Utilisateur($nom, $pass, $email);

  $req = $bdd->prepare($us->getinsert());
  $req->execute($us->getarray());


  echo 'Felicitations, vous avez bien ete enregistre';


  
?>

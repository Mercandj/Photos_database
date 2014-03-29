
<?php 

include 'classe/Utilisateur.php';
include 'inc/check_utilisateur_db.php';
include 'inc/message.php';

  // Connexion à la base de données
  try
  {
    $bdd = new PDO('mysql:host=localhost;dbname=mydb', 'root', '');
  }
  catch(Exception $e)
  {
    die('Erreur : '.$e->getMessage());
  }

  $nom = $_POST['user'];
  $pass = $_POST['pass'];
  $email = $_POST['email'];

  if(utilisateur_existant($nom))
  {
	affiche_message('Ce nom d\'utilisateur est deja pris','./vue/inscription');
  }
  else
  {
	  $us = new Utilisateur($nom, $pass, $email);

	  $req = $bdd->prepare($us->getinsert());
	  $req->execute($us->getarray());
	  affiche_message('Felicitations, vous avez bien ete enregistre: vous pouvez desormais vous connecter avec votre username et votre password','./../');

	}


  
?>
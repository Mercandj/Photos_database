
<?php
  function affiche_base_image() {
    // Connexion à la base de données
    $res = "";
    try
    {
      $bdd = new PDO('mysql:host=localhost;dbname=mydb', 'root', '');
    }
    catch(Exception $e)
    {
      die('Erreur : '.$e->getMessage());
    }

    // On récupère tt

    $req = $bdd->prepare('SELECT * FROM `image` WHERE `Utilisateur_nom`=?');
	$req->execute(array($_SESSION['user']));

    while ($donnees = $req->fetch())
    {
      if($donnees['Utilisateur_nom']===$_SESSION['user'])
        $res = $res.'<div><a href="'.$donnees['url'].'"> <img src="'.$donnees['url'].'" width="200" height="200" alt="im" /></a>
          <br/>
            <h3>
              <strong>Titre </strong>'.$donnees['titre'].'<br />
                <strong>Description </strong>'.$donnees['description'].'
            </h3>
            <p>
        </div>';
    } // Fin de la boucle
    $req->closeCursor();

    return $res;
  }
?>
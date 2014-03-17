
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
    $req = $bdd->query('SELECT * FROM `image` WHERE 1');

    while ($donnees = $req->fetch())
    {
      
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

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

    //<table class="fichier_table">

    while ($donnees = $req->fetch())
    {
      if($donnees['Utilisateur_nom']===$_SESSION['user']) {


        
        $res = $res.'<div><a href="'.$donnees['url'].'"> <img src="'.$donnees['url'].'" width="200" height="200" alt="im" /></a>
          <br/>
            <h3>
              <strong>Titre </strong>'.$donnees['titre'].'<br />
                <strong>Description </strong>'.$donnees['description'].'
            </h3>
            <p>
        </div>';
        
        /*$res .= '
        <tr>
            <td class="image_url">
              <img class="imade_url" width="16" height="16" src="'.$donnees['url'].'"></img>
            </td>
            <td class="image_titre">
              <a class="image_titre" title="'.$donnees['titre'].'" href="'.$donnees['url'].'"></a>
            </td>
            <td class="image_description">
              <a class="image_description" title="'.$donnees['description'].'" href="'.$donnees['url'].'"></a>
            </td>

        </tr>
        ';
*/

      }
    //</table>



    } // Fin de la boucle
    $req->closeCursor();

    return $res;
  }
?>
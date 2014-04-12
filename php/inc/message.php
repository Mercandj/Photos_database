
<?php

  function affiche_message($message, $lien_retour) {
  	echo '<!DOCTYPE html> <html lang="fr">';
    echo '<head><meta http-equiv="Content-type" content="text/html; charset=utf-8" /> </head><body>';
	echo $message;
	echo '</br> <a href='.$lien_retour.'>Retour</a></body></html>';
  }
?>

<?php
  function ecrire_fichier($filename, $somecontent) {
    if (is_writable($filename)) {

      if (!$handle = fopen($filename, 'a')) {
        echo "Impossible d'ouvrir le fichier ($filename)";
        exit;
      }

      if (fwrite($handle, $somecontent) === FALSE) {
        echo "Impossible d'écrire dans le fichier ($filename)";
        exit;
      }
      fclose($handle);
    } 
    else {
      echo "Le fichier $filename n'est pas accessible en écriture.";
    }
  }
?>

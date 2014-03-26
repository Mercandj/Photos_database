<?php 

include "./../inc/logout.php";
include "./../inc/supprimer.php";


$action = $_POST['action'];

switch($action) {
	case "Créer catégorie" :
		echo "Créer catégorie";
	break;
	case "Supprimer tout" :
		supprimer_tout();
		header("Location: ./../../page/home/index.php");
	break;
	case "Quitter" :
		logout();
	break;
	case "Supprimer fichier" :
		supprimer_fichier($_POST['url']);
		header("Location: ./../../page/home/index.php");
	break;
}

?>
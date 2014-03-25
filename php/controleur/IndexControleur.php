<?php 

include "./../inc/logout.php";


$action = $_POST['action'];

switch($action) {
	case "Créer catégorie" :
		echo "Créer catégorie";
	break;
	case "Supprimer tout" :
		echo "Supprimer tout";
	break;
	case "Quitter" :
		logout();
	break;
}

?>
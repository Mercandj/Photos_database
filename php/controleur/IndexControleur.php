<?php 

include "./../inc/logout.php";


$action = $_POST['action'];

switch($action) {
	case "Créer catégorie" :
		echo "cool";
	break;
	case "Supprimer tout" :
		echo "cool";
	break;
	case "Quitter" :
		logout();
	break;
}

?>
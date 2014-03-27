<?php 

include "./../inc/logout.php";
include "./../inc/supprimer.php";


$action = $_POST['action'];

switch($action) {
	case "Accueil" :
		header("Location: ./../vue/home/index.php");
	break;
	case "Créer catégorie" :
		header("Location: ./../vue/creer_categorie");
	break;
	case "Supprimer tout" :
		supprimer_tout();
		header("Location: ./../vue/home/index.php");
	break;
	case "Quitter" :
		logout();
	break;
	case "Supprimer fichier" :
		supprimer_fichier($_POST['url']);
		header("Location: ./../vue/home/index.php");
	break;
}

?>
<?php 

include "./../inc/logout.php";
include "./../inc/supprimer.php";
include "./../inc/changer_image.php";

$action = $_POST['action'];
switch($action) {
	case "Accueil" :
		header("Location: ./../vue/home/index.php");
	break;
	case "Créer catégorie" :
		header("Location: ./../vue/creer_categorie");
	break;
	case "Supprimer tout" :
		supprimer_tout('user');
		header("Location: ./../vue/home/index.php");
	break;
	case "Quitter" :
		logout();
	break;
	case "Supprimer fichier" :
		supprimer_fichier($_POST['url']);
		header("Location: ./../vue/home/index.php");
	break;
	case "Changer categorie" :
		changer_image_categorie($_POST['url'],$_POST['categorie']);
		header("Location: ./../vue/home/index.php");
	break;
}

?>
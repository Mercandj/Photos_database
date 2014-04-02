<?php 

include "./../inc/logout.php";
include "./../inc/supprimer.php";
include "./../inc/changer_image.php";
include "./../modele/ImageModele.php";
include "./../modele/NoteModele.php";

include_once "./../vue/CategorieVue.php";

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
	case "Afficher categorie" :
		/*$im = new ImageModele();
		$cv = new CategorieVue($im->getImageListe_Categorie($_POST['categorie']));

		listeImagesCat($cv->genererHTML_table());*/

		header("Location: ./../vue/categorie/index.php?categorie=".$_POST['categorie']);
	break;
	case "Donner note" :
		ajouter_note($_POST['url'],$_POST['note']);
		header("Location: ./../vue/home/index.php");
	break;
	case "Afficher image" :
		$url_image = $_POST['url'];
		include("./../vue/afficher_image/index.php");
	break;
	case "Changer visibilite" :
		changer_image_visibilire($_POST['url'],$_POST['visibilite']);
		header("Location: ./../vue/home/index.php");
	break;
}

?>
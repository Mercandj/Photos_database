<?php 

include_once "./../inc/logout.php";
include_once "./../inc/supprimer.php";
include_once "./../inc/changer_image.php";
include_once "./../modele/ImageModele.php";
include_once "./../modele/NoteModele.php";

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
		$description_image = $_POST['description'];
		include("./../vue/afficher_image/index.php");
	break;
	case "Changer visibilite" :
		changer_image_visibilire($_POST['url'],$_POST['visibilite']);
		header("Location: ./../vue/home/index.php");
	break;
}

?>
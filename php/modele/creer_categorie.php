
<?php 
include '../classe/Categorie.php';
include '../inc/check_categorie_db.php';
include '../inc/message.php';

// Connexion à la base de données
try {
	$bdd = new PDO('mysql:host=localhost;dbname=mydb', 'root', '');
}
catch(Exception $e) {
	die('Erreur : '.$e->getMessage());
}

$nom = $_POST['nom'];
$description = $_POST['description'];

if(categorie_existante($nom)) {
	affiche_message('Ce nom dde categorie est deja pris','./../vue/creer_categorie');
}
else {
	
	if(!isset($_SESSION))
        session_start();


	$us = new Categorie($nom, $description, $_SESSION['user']);

	$req = $bdd->prepare($us->getinsert());
	$req->execute($us->getarray());
	affiche_message('Felicitations, vous avez bien créé une nouvelle categorie','./../vue/home');

}

?>

<?php include 'inc/log.php'; 
 
 	function w_log($user, $pass, $string) {
		$date = date("d-m-Y");
		$heure = date("H:i"); 

		$filename = 'log.txt';
		$somecontent = $date." ".$heure."  LOGIN:".$string."  USER:".$user."  PASS:".$pass."\n";

		ecrire_fichier($filename, $somecontent);
	}

	try
	{
		$bdd = new PDO('mysql:host=localhost;dbname=mydb', 'root', '');
	}
	catch(Exception $e)
	{
		die('Erreur : '.$e->getMessage());
	}

	$user = $_POST['user'];
	$pass = $_POST['pass'];

	$req = $bdd->prepare('SELECT * FROM `utilisateur` WHERE `nom` = ? AND `pass` = ?');
	$req->execute(array($user, $pass));
	if($donnees = $req->fetch())
	{
		w_log($user, $pass, "OK");
		session_start();
		$_SESSION['user'] = $user;
		header("Location: ./vue/home/index.php");
	}
	else
	{
		w_log($user, $pass, "KO");
		echo 'Mauvais username ou password';
		header("Location: ./../index.html");
	}
?>
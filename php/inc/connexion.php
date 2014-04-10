<?php
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
		session_start();
		$_SESSION['user'] = $user;
		header("Location: ./../vue/home/index.php");
	}
	else
	{
		echo 'Mauvais username ou password';
		header("Location: ./../../index.html");
	}
?>
<div id='cssmenu'>
	<a><?php echo $_SESSION['user']; ?></a>
	<a1>
		<form name="login_form" method="POST" action="./../../controleur/IndexControleur.php" enctype="multipart/form-data">
			<input type="hidden" name="action" value="Accueil">
			<input type="submit" class="cssmenu_input" style="border-style:none;" value="Accueil">
		</form>
	</a1>
	<a1>
		<form name="login_form" method="POST" action="./../../controleur/IndexControleur.php" enctype="multipart/form-data">
			<input type="hidden" name="action" value="Créer catégorie">
			<input type="submit" class="cssmenu_input" style="border-style:none;" value="Créer catégorie">
		</form>
	</a1>
	<a1>
		<form name="login_form" method="POST" action="./../../controleur/IndexControleur.php">
			<input type="hidden" name="action" value="Supprimer tout">
			<input type="submit" class="cssmenu_input" style="border-style:none;" value="Supprimer tout">
		</form>
	</a1>
	<a1>
		<form name="login_form" method="POST" action="./../../controleur/IndexControleur.php" enctype="multipart/form-data">
			<input type="hidden" name="action" value="Quitter">
			<input type="submit" class="cssmenu_input" style="border-style:none;" value="Quitter">
		</form>
	</a1>

</div>
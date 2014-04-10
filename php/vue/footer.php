<footer>
	<center>
		<form name="login_form" method="POST" action="./../../inc/add.php" enctype="multipart/form-data">
			<input type="text" class="saisie" placeholder="Description" style="border-style:none;" name="description">
			<input type="text" class="saisie" placeholder="Titre" style="border-style:none;" name="titre">
			<input type="file" class="input-file" style="border-style:none;" name="image" required/>
 			<input type="hidden" name="MAX_FILE_SIZE" value="1048576" />
			<input type="submit" class="button" style="border-style:none;" value="Envoyer">
		</form>
	</center>
    
</footer>
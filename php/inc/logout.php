
<?php 
function logout() {
	session_start();
	unset($_SESSION["user"]); 
	header("Location: ./../../index.html");
}
?>
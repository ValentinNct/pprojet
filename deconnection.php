<?php
	include 'header.php';
	require_once 'menu.php';
	if(isset($_SESSION['nomCli'])){
		echo '<meta http-equiv="refresh" content="3; URL=connexion.php">';
		echo'<main class="page">';
		echo '<br><h3>Vous êtes déconnecté</h3>';
		echo '</main>';
		session_destroy();
	}
	else{
		hearder("Location: index.php");
	}
	include 'piedpage.php';
	?>
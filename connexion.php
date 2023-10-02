<?php
	include 'header.php';
	require_once 'menu.php';
?>

 <link rel="stylesheet" href="form.css">
<form class="page" action="connexion.php" method="post">
    <h1> Connexion </h1>
	<h3> Se connecter :</h3>
	
	<!-------------Connexion du client------------->
	<!--Adresse mail de la personne-->
	<label for="emailCli"><p> Votre adresse mail :</p></label>
	<input type="email" id="emailCli" name="emailCli" required>
	
	<!--Mot de passe de la personne-->
	<label for="mdpCli"><p> Votre mot de passe :</p></label>
	<input type="password" id="mdpCli" name="mdpCli" required>
	
	<!--Envoyer la connexion-->
	<br>
	<input type ="submit" value=" Se Connecter " />
	<br>
	
	
	<!-------------Donnée à envoyer à la base de donnée------------->
	<?php
		
		if ($_SERVER["REQUEST_METHOD"]=="POST"){
		
			//$_SESSION['emailCli'] = $_POST['emailCli'];
			//$_SESSION['mdpCli'] = password_hash($_POST['mdpCli'], PASSWORD_BCRYPT);
			
			if (empty($_POST['emailCli']) | empty($_POST['mdpCli'])){
				echo "c'est vide";
			}
			
			else{
				$resultat=getConnexion($_POST['emailCli'], $_POST['mdpCli']);
				if($resultat == null){
					echo "<br>";
					echo "Vous avez sans doute mal écrit votre mail ou votre mot de passe.";
					echo "<br>";
					echo "Ou bien vous n'êtes pas inscrit sur lalfeur.com";
				}
				
				else{
					$_SESSION['nomCli'] = $resultat['nomCli'];
					echo "<br>";
					echo "Bonjour ".$_SESSION['nomCli'].", vous êtes connecté·e.";
					echo '<meta http-equiv="refresh" content="1; URL="index.php">';
				}
				
			}  
			
		}
	?>
</form>

<?php
	include 'piedpage.php';
?>
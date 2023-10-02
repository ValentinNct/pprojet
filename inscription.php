<?php
	include 'header.php';
	require_once 'menu.php';
?>

<form class="page" method="post">
    <h1> Inscription </h1>
	<h3> Créez votre compte :</h3>
	
	<!-------------Création du client------------->
	<!--Nom du client-->
	<label for="nom"><p> Votre nom :</p></label>
	<input type="text" id="nom" name="nom" required>
	
	<!--Prénom du client-->
	<label for="prenom"><p> Votre prénom :</p></label>
	<input type="text" id="prenom" name="prenom" required>
	
	<!--Adresse du client-->
	<label for="adreCli"><p> Votre adresse :</p></label>
	<input type="text" id="adreCli" name="adreCli" required>
	
	<!--Adresse mail du client-->
	<label for="emailCli"><p> Votre adresse mail :</p></label>
	<input type="email" id="emailCli" name="emailCli" required>
	
	<!--Mot de passe du client-->
	<label for="mdp"><p> Votre mot de passe :</p></label>
	<input type="password" id="mdp" name="mdp" required>
	
	<!--Envoyer l'inscription-->
	<br>
	<input type ="submit" value=" Envoyez ">
	
	<!-------------Donnée à envoyer à la base de donnée------------->
	<?php
		if ($_SERVER["REQUEST_METHOD"]=="POST"){
			$nomCli = $_POST['nom'];
			$prenomCli = $_POST['prenom'];
			$adreCli = $_POST['adreCli'];
			$emailCli = $_POST['emailCli'];
			$mdpCli = $_POST['mdp'];
			//$ok=pregmatch('#^\?=.*[a-z])(?=.*[A-Z])(?=.*[0-9])(?=.*\W).{10,}$#',$mdpCli);
				if (empty($nomCli) |empty($prenomCli) | empty($adreCli) | empty($emailCli) | empty($mdpCli)){
					echo "Raté !";
				}
				else{
					setInscription($nomCli, $prenomCli, $adreCli, $emailCli, $mdpCli);
				} 
		}                                 
	?>
</form>

<?php
	include 'piedpage.php';
?>
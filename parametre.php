<?php
	include 'header.php';
	require_once 'menu.php';
?>

<link rel="stylesheet" href="form.css">
<form class="page" action="parametre.php" method="post">
	<h1> Paramètre </h1>
	<h3> Modification de votre compte </h3>
	
	<!-------------Modification du client------------->
	<!--Prénom du client-->
	<label for="prenom"><p>Modifier votre prénom :</p></label>
	<input type="text" id="prenom" name="prenom">
	
	<!--Adresse du client-->
	<label for="adreCli"><p>Modifier votre adresse :</p></label>
	<input type="text" id="adreCli" name="adreCli">
	
	<!--Adresse mail du client-->
	<label for="emailCli"><p>Modifier votre adresse mail :</p></label>
	<input type="email" id="emailCli" name="emailCli">
	
	<!--Mot de passe du client-->
	<label for="mdp"><p>Modifier votre mot de passe :</p></label>
	<input type="password" id="mdp" name="mdp">
	
	<!--Valider les modifications-->
	<br>
	<input type ="submit" value=" Valider " />

	<?php
		$resultat=getParametre();
		
		if(empty($_POST['prenom'])){
			;
		}
		if(empty($_POST['adreCli'])){
			;
		}
		if(empty($_POST['emailCli'])){
			;
		}
		if(empty($_POST['mdp'])){
			;
		}
	
	?>

</form>

<?php
	include 'piedpage.php';
?>
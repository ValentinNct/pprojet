
<?php
	session_start();
    require_once 'models/gestionBdd.php' ;
    $categories=getCategories();
?>
    <body>
    <div class="conteneur">
    <header>
        <h1> La Fleur</h1>
        <h3>Fleurs d'ornements pour jardins</h3>
    </header>
    <nav class="menu">
        <ul>
            <li><a href="index.php">Accueil</a></li>
        </ul>
        <hr>
        <p> <strong> Nos produits </strong> </p>
        <ul>
        <?php

            foreach ($categories as $categorie) {
                $lib = $categorie['cat_libelle'];
                $lien = "lesproduits.php?cat=".$categorie['cat_code']."&lib=".$lib;
        ?>
            <li><a href="<?php echo $lien ; ?>"><?php echo $lib; ?></a></li>
        <?php }  ?>
		<hr>
		
		<?php
			/*-----------Affiche le nom de l'utilisateur dans la session-----------*/
			if (isset($_SESSION	['nomCli'])){
				echo "<p> <strong> Profil </strong> </p>";
				echo $_SESSION['nomCli']."<br>";
				echo '<a href="parametre.php"> Modifier le compte </a><br>';
				echo '<a href="deconnection.php"> Se Déconnecter </a><br>';
			}
			else{
				echo '<a href="inscription.php"> Inscription </a><br>';
				echo '<a href="connexion.php"> Connexion </a>';
			}
			?>
        </ul>
    </nav>

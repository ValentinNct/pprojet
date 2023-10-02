<?php
            function getConnection() {
                try {
                    $connexion = new PDO("mysql:host=localhost;dbname=lafleur;charset=utf8", 'utilfleur', 'secret');
                }
                catch(PDOException $e)
                    {
                    die($e->getMessage());
                    }
                return $connexion ;
            }

			/*-------------Fonction pour les catégories--------------*/
			function getCategories() {
             $connexion = getConnection();
             $stm = $connexion->query("SELECT cat_code, cat_libelle FROM categorie");
             $categories=$stm->fetchAll();
             return $categories ;
            }

			/*-------------Fonction pour les produits--------------*/
            function getProduits($cat) {
                $connexion = getConnection();
                $stm = $connexion->prepare("SELECT pdt_ref, pdt_designation, pdt_prix, pdt_image
                                            FROM produit where pdt_categorie = :cat");
                $stm->bindParam(':cat', $cat, PDO::PARAM_INT);
                $stm->execute();
                $produits=$stm->fetchAll();
                return $produits ;
            }

			/*-------------Fonction pour l'entièreté des produits--------------*/
            function getTousProduits() {
                $connexion = getConnection();
                $stm = $connexion->query("SELECT pdt_ref, pdt_designation, pdt_prix, pdt_image FROM produit");
                $produits=$stm->fetchAll();
                return $produits ;

            }
			
			/*-------------Fonction pour l'inscription--------------*/
			function setInscription($nomCli, $prenomCli, $adreCli, $emailCli, $mdpCli){
				$connexion = getConnection();
				$_SESSION['mdpCli']=password_hash ($mdpCli, PASSWORD_BCRYPT);
				$mdpCli= $_SESSION['mdpCli'];
				
				$stm = $connexion->prepare("INSERT INTO client (nomCli, prenomCli, adreCli, emailCli, mdpCli) 
											Value (:nomCli, :prenomCli, :adreCli, :emailCli, :mdpCli)");
											
				$stm->bindParam(':nomCli', $nomCli, PDO::PARAM_STR);
				$stm->bindParam(':prenomCli', $prenomCli, PDO::PARAM_STR);
				$stm->bindParam(':adreCli', $adreCli, PDO::PARAM_STR);
				$stm->bindParam(':emailCli', $emailCli, PDO::PARAM_STR);
				$stm->bindParam(':mdpCli', $mdpCli, PDO::PARAM_STR);
				
				$resultat = $stm->execute();
				return $resultat;
			}
			
			/*-------------Fonction pour la connexion--------------*/
			function getConnexion($emailCli, $mdpCli){
				$connexion = getConnection();
				
				$sql = "SELECT nomCli, emailCli, mdpCli FROM client WHERE emailCli=:emailCli";
				$stm= $connexion->prepare($sql);
				// AND mdpCli=:mdpCli
				
				$stm->bindParam(':emailCli', $emailCli, PDO::PARAM_STR);
				//$stm->bindParam(':mdpCli', $mdpCli, PDO::PARAM_STR);
				
				$stm->execute();
				$resultat=$stm->fetch();
				
				if (password_verify($mdpCli, $resultat['mdpCli'])){
					return $resultat;
				}
				else{
					echo "c'est raté";
				}
				return null;
			}
			
			/*-------------Fonction pour la déconnection--------------*/
			function getDeconnection(){
				session_destroy();
			}
			
			/*-------------Fonction pour la modification du compte--------------*/
			function getParametre($base, $modif){
				$connexion = getConnection();
				
				if ($base == $SESSION['prenom']){
					$sql="UPDATE client SET prenomCli= :modif WHERE prenomCli=:base";
				}
				
				if ($base == $SESSION['adreCli']){
					$sql="UPDATE client SET adreCli= :modif WHERE adreCli=:base";
				}
				
				if ($base == $SESSION['emailCli']){
					$sql="UPDATE client SET emailCli= :modif WHERE emailCli=:base";
				}
				
				if ($base == $SESSION['mdpCli']){
					$_SESSION['mdpCli']=password_hash ($mdpCli, PASSWORD_BCRYPT);
					if (password_verify($mdpCli, $resultat['mdpCli'])){
						$sql="UPDATE client SET mdpCli= :modif WHERE mdpCli=:base";
					}
					else{
						echo "c'est raté";
					}
					return null;
				}
			}
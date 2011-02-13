<body class="fr-fr homepage">
	<div id="wrapper">
		<?php include_once('includes/html/header/accueil.html'); ?>
		<div id="content">
			<div class="content-top">
				<div class="content-bot">	
					<div id="homepage">
						<div id="left">
							<?php include_once('includes/html/slideshow.html'); ?>
								<?php include_once('includes/html/featured-news.html'); ?>
									<div id="news-updates">
										<div class="news-article first-child">
											<h3>
												<a>Ajouter un objet dans la boutique</a>
											</h3>
										</div>

										<div class="news-article ">
											<form action="#submit" method="post">

											<label>ID de l'objet : </label><input type="text" name="id" id="id" size="4"/><br/>

											<label>Nombre de points pour l'achat : </label><input tyep="text" name="pts" id="nom" /><br/>

											<label>Nom de l'objet : </label><input tyep="text" name="nom" id="nom" /><br/>

											<label for="cat">Catégorie : </label>
											<select name="cat" id="cat">
												<option value="Armes">Armes</option>
												<option value="Armures">Armures</option>
												<option value="Bijoux">Bijoux</option>
												<option value="Boucliers">Boucliers</option>
												<option value="Compagnons">Compagnons</option>
												<option value="Compos">Compos</option>
												<option value="Héritage">Héritage</option>
												<option value="Monture">Monture</option>
												<option value="Sacs">Sacs</option>
											</select><br/>

											<input type="submit" value="Ajouter" name="connexion" />
											</form>
<?php
if(isset($_POST['cat'])) {
	if(empty($_POST['pts']) OR empty($_POST['id']) OR empty($_POST['nom'])) {
		 echo'<p><strong style="color: red;">Veuillez remplir tous les champs !</strong></p>';
	}

	else {
		$categorie_boutique = array("Armes" => 1,"Armures"=> 2,"Bijoux"=> 3,"Boucliers"=> 4,"Compagnons"=> 5,"Compos"=> 6,"Monnaies"=> 7,"Héritage"=> 8,"Monture"=> 9,"Sacs"=> 10);
		$cat = $categorie_boutique[$_POST['cat']];

		$db = mysql_select_db ($array_db['db_site'],$cxn);
		if (!$db) {
			die ('Erreur : ' . mysql_error());
		}

		$id = $_POST['id'];
		$nom = $_POST['nom'];
		$pts = $_POST['pts'];

		$nbr_req = mysql_query('SELECT * FROM boutique WHERE id=\''.$id.'\'');
		$nbr_req_ft = mysql_num_rows($nbr_req);

		if($nbr_req_ft != 0) {
			echo '<p><strong style="color: red;">Objet deja enregistre !</strong></p>';
		}
	
		else {

			mysql_query("INSERT INTO `boutique` (`id`, `prix`, `nom`, `cat`) VALUES ('".$id."', '".$pts."', '".$nom."', '".$cat."')");

			echo '	<script language="javascript"> 
				alert("Objet ajouté avec succès !");
				document.location.href="index.php?page=AjoutObjet" 
				</script>';
		}
	}
}
?>
										</div>											
									</div>
						</div>
						<?php include_once('includes/html/right.html'); ?>
					</div>
				</div>
			</div>
		</div>
		<?php include_once('includes/html/footer.html'); ?>
		<?php include_once('includes/html/service.html'); ?>
	</div>
</body>

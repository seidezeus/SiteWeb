<div class="post2"> 
	<div class="post_header2" align="left">Boutique</div> 
	<div class="post_body2" align="left">	

<?php
	if(isset($_SESSION['id'])) {
		$db = mysql_select_db ($array_db['db_site'],$cxn);
		if (!$db) {
			die ('Erreur : ' . mysql_error());
		}

		$nbr_points = mysql_query('SELECT id, points FROM voting_points WHERE id=\''.$_SESSION['id'].'\'');
		$nbr_points_ft = mysql_fetch_array($nbr_points);

		if($nbr_points_ft == 0) {
			$nbr_points_ft['points'] = "Aucun";
		}

		echo "	<center><p><br/><br/>Vous avez actuellement '".$nbr_points_ft['points']." point(s) !<br/><br/><br/></p></center>";
		
		if(isset($_GET['cat']) AND $_GET['cat'] != NULL) {
			if($_GET['cat'] == '5') {
				?>
					<div class="news-article" align="center">
					<table class="table" border="0" cellspacing="0" cellpadding="3" width="100%">
						<thead>
							<tr>
								<th><a href="javascript:;" >Nombres de PO</a></th>
								<th><a href="javascript:;" class="sort-link numeric">Prix</a></th>
								<th ><a href="javascript:;" class="sort-link numeric">Acheter</a></th>
							</tr>
						</thead>
				<?php

				$boutique_cat = mysql_query("SELECT * FROM `boutique` WHERE `cat` = '".$_GET['cat']."'");

				if (mysql_num_rows($boutique_cat) > 0) {
					for($i = 0; $i < mysql_num_rows($boutique_cat); $i++) {
						$row_boutique_cat = mysql_fetch_array($boutique_cat);

						?>																												
							<tbody>
								<tr >
									<td><a href="http://fr.wowhead.com/item=<?php echo $row_boutique_cat['id']; ?>"><font color="darkgreen"><b><?php echo $row_boutique_cat['nom'].' PO'; ?></font></a></td>
									<td><font color="darkred"><?php echo $row_boutique_cat['prix']; ?> points</font></td>
									<td ><a href="index.php?page=Boutique&amp;id=<?php echo $row_boutique_cat['id']; ?>#SELECTION"><img src="styles/default/images/icons/admin/acheter.png"/></a></td>
								</tr>
							</tbody>
						<?php
					}
				}

				else {
					?>
						<tbody>
							<tr  align="center">
								<td colspan="3">
									<strong><font color="red">Aucun objet de ce type est inscrit dans la boutique.</font></strong>
								</td>
							</tr>
						</tbody><br/><br/><br/>
					<?php
				}

			}
			else {
				?>
					<div class="news-article" align="center">
					<table class="table" border="0" cellspacing="0" cellpadding="3" width="100%">
						<thead>
							<tr>
								<th><a href="javascript:;" >Nom de l'objet</a></th>
								<th><a href="javascript:;" class="sort-link numeric">Prix</a></th>
								<th ><a href="javascript:;" class="sort-link numeric">Acheter</a></th>
							</tr>
						</thead>
				<?php

				$boutique_cat = mysql_query("SELECT * FROM `boutique` WHERE `cat` = '".$_GET['cat']."'");

				if (mysql_num_rows($boutique_cat) > 0) {
					for($i = 0; $i < mysql_num_rows($boutique_cat); $i++) {
						$row_boutique_cat = mysql_fetch_array($boutique_cat);

						?>																												
							<tbody>
								<tr >
									<td><a><font color="darkgreen"><b><?php echo $row_boutique_cat['nom']; ?></font></a></td>
									<td><font color="darkred"><?php echo $row_boutique_cat['prix']; ?> points</font></td>
									<td ><a href="index.php?page=Boutique&amp;id=<?php echo $row_boutique_cat['id']; ?>#SELECTION"><img src="styles/default/images/icons/admin/acheter.png"/></a></td>
								</tr>
							</tbody>
						<?php
					}
				}

				else {
					?>
						<tbody>
							<tr  align="center">
								<td colspan="3">
									<strong><font color="red">Aucun objet de ce type est inscrit dans la boutique.</font></strong>
								</td>
							</tr>
						</tbody><br/><br/><br/>
					<?php
				}
			}

			echo '	
			</table>
			</div>';
		}

		if (isset($_GET['id'])) {
			$id = strip_tags($_GET['id']);

			$nom_search = mysql_query("SELECT * FROM `boutique` WHERE `id` = '".$_GET['id']."'");
			$nom = mysql_fetch_array($nom_search);

			$db = mysql_select_db ($array_db['db_characters'],$cxn);
			if (!$db) {
				die ('Erreur : ' . mysql_error());
			}
			$characters_account = mysql_query("SELECT * FROM `characters`  WHERE `account`= '".$_SESSION['id']."' ORDER BY `name` ASC LIMIT 0,10");
				
			if (mysql_num_rows($characters_account) > 0) {
				echo '
				<div class="news-article">
					<table class="table" border="0" cellspacing="0" cellpadding="3" width="30%">
						Choisissez le personnage qui recevra la récompense :
						<center><tr>
							<form action="index.php?page=Boutique#submit" method="post">
								<td>
									<center><select name="action">
										<optgroup label="Mes personnages">';
										while($row_characters_account = mysql_fetch_array($characters_account))
										{
											echo '</optgroup>';             
											echo '<option name="nom">'.$row_characters_account['name'].'</option>';
										}		
									echo '
									</select></center>
								</td>
								<td><input type="hidden" name="id" value="'.$id.'"/></td>
								<td><input type="hidden" name="nom" value="'.$nom['nom'].'"/></td>
								<td><center><input type="submit" value="Acheter" /></center></td>
							</form>
						</tr></center>
					</table>
				</div><br/><br/><br/>';
			}
			else {
				echo '
				<div class="news-article" align="center">
					<strong><font color="red">Aucuns personnages !</font></strong>
				</div><br/><br/><br/>';
			}
		}
					
				if(isset($_POST['action']))
				{
					$nom = $_POST['nom'];
					$id = strip_tags($_POST['id']);
					/* Sélection de la base de données des personnages */
					$db = mysql_select_db ($array_db['db_characters'],$cxn);
					if (!$db) {
						die ('Erreur : ' . mysql_error());
					}
					$characters_name = mysql_query("SELECT * FROM `characters` WHERE `name` = '".$_POST['action']."'");
					$mail = mysql_query("SELECT MAX(id) FROM mail");
						
					/* Sélection de la base de données du site */
					$db = mysql_select_db ($array_db['db_site'],$cxn);
					if (!$db) {
						die ('Erreur : ' . mysql_error());
					}
					$boutique_id = mysql_query("SELECT * FROM boutique WHERE id = '".$_POST['id']."'");
					$row_boutique_id = mysql_fetch_array($boutique_id);
					$voting_points_id = mysql_query("SELECT * FROM voting_points WHERE id = '".$_SESSION['id']."'");
					$row_voting_points_id = mysql_fetch_array($voting_points_id);
						
					if ($row_voting_points_id['points'] < $row_boutique_id['prix'])
					{
						echo '
						<script language="javascript"> 
							alert("Vous n\'avez pas asser de points pour acheter cette récompense !");
							document.location.href="index.php?page=Boutique" 
						</script>';
					}else
					{
						if($id > 10000000) {
							$points = $row_voting_points_id['points'] - $row_boutique_id['prix'];
							mysql_query("UPDATE `voting_points` SET `points` = '".$points."' WHERE `id` = '".$_SESSION['id']."'");
																				
							/* Sélection de la base de données des personnages */
							$db = mysql_select_db ($array_db['db_characters'],$cxn);
							if (!$db) {
								die ('Erreur : ' . mysql_error());
							}

							$characters_name = mysql_query("SELECT * FROM `characters` WHERE `name` = '".$_POST['action']."'");
							$mail = mysql_query("SELECT MAX(id) FROM mail");

							$row_characters_name = mysql_fetch_array($characters_name);	
							$row_mail = mysql_fetch_row($mail);
						
							$nb_mail = ($row_mail[0] + 1);
							$sender = $row_characters_name['guid'];
							$receiver = $row_characters_name['guid'];
							$item_template = $row_boutique_id['id'];

							$dateExpiration = time() + 30;
							$date = time();

							do {
								$unique = false;
								$itemid = rand(1, 600000);
								$rech_unique = mysql_query("SELECT guid FROM  item_instance WHERE guid = '".$itemid."'");

								if(mysql_num_rows($rech_unique) == 0){
									$unique = true;
								}
							} while ($unique == false);
							$nombre = 1;

							mysql_query("INSERT INTO characters.mail (id,messageType,stationery,mailTemplateId,sender,receiver,subject,body,has_items,expire_time,deliver_time,money,cod,checked) VALUES('".$nb_mail."','0','41','0','".$sender."','".$receiver."','Commande boutique','Voici les objets commandés. Bon jeu sur Infinity Chaos !','1','".$dateExpiration."* DAY','".$date."','".$nom."0000','0','16')") or die(mysql_error());

							echo '
							<script language="javascript"> 
								alert("Merci de votre achat ! La récompense vous a été envoyé dans votre boîte aux lettres.");
								
							</script>';
						}

						else {						
							$points = $row_voting_points_id['points'] - $row_boutique_id['prix'];
							mysql_query("UPDATE `voting_points` SET `points` = '".$points."' WHERE `id` = '".$_SESSION['id']."'");
																				
							/* Sélection de la base de données des personnages */
							$db = mysql_select_db ($array_db['db_characters'],$cxn);
							if (!$db) {
								die ('Erreur : ' . mysql_error());
							}

							$characters_name = mysql_query("SELECT * FROM `characters` WHERE `name` = '".$_POST['action']."'");
							$mail = mysql_query("SELECT MAX(id) FROM mail");

							$row_characters_name = mysql_fetch_array($characters_name);	
							$row_mail = mysql_fetch_row($mail);
						
							$nb_mail = ($row_mail[0] + 1);
							$sender = $row_characters_name['guid'];
							$receiver = $row_characters_name['guid'];
							$item_template = $row_boutique_id['id'];

							$dateExpiration = time() + 30;
							$date = time();

							do {
								$unique = false;
								$itemid = rand(1, 600000);
								$rech_unique = mysql_query("SELECT guid FROM  item_instance WHERE guid = '".$itemid."'");

								if(mysql_num_rows($rech_unique) == 0){
									$unique = true;
								}
							} while ($unique == false);
							$nombre = 1;

							mysql_query("INSERT INTO characters.item_instance (guid,itemEntry,owner_guid,count, charges, enchantments,`text`) VALUES ('".$itemid."','".$item_template."','".$receiver."','".$nombre."', '0 0 0 0 0 ', '0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 ', '')");

							mysql_query("INSERT INTO characters.mail (id,messageType,stationery,mailTemplateId,sender,receiver,subject,body,has_items,expire_time,deliver_time,money,cod,checked) VALUES('".$nb_mail."','0','41','0','".$sender."','".$receiver."','Commande boutique','Voici les objets commandés. Bon jeu sur Infinity Chaos !','1','".$dateExpiration."* DAY','".$date."','0','0','16')") or die(mysql_error());

							mysql_query("INSERT INTO characters.mail_items (mail_id,item_guid,receiver) VALUES ('".$nb_mail."','".$itemid."','".$receiver."')");

							echo '
							<script language="javascript"> 
								alert("Merci de votre achat ! La récompense vous a été envoyé dans votre boîte aux lettres.");
								document.location.href="index.php?page=Boutique" 
							</script>';
						}
					}
				}
				else {
					?>
					<div align="center">

							<form action="#selection" method="post">
					<table class="table" border="0" cellspacing="0" cellpadding="3" width="100%"><center>

								<tr >
									<td><a href="?page=Boutique&amp;cat=1"><center><img src="styles/default/images/boutique/armes.png" /><br/>Armes</center></a></td>
									<td><a href="?page=Boutique&amp;cat=2"><center><img src="styles/default/images/boutique/armures.png" /><br/>Armures</center></a></td>
									<td><a href="?page=Boutique&amp;cat=3"><center><img src="styles/default/images/boutique/bijoux.png" /><br/>Bijoux</center></a></td>
								</tr>
								<tr >
									<td><a href="?page=Boutique&amp;cat=4"><center><img src="styles/default/images/boutique/compo.png" /><br/>Compos</center></a></td>
									<td><a href="?page=Boutique&amp;cat=5"><center><img src="styles/default/images/boutique/gold.png" /><br/>Monnaies</center></a></td>
									<td><a href="?page=Boutique&amp;cat=6"><center><img src="styles/default/images/boutique/herit.png" /><br/><center>Héritage</center></a></td>
								</tr>
								<tr >
									<td><a href="?page=Boutique&amp;cat=7"><center><img src="styles/default/images/boutique/boucliers.png" /><br/>Boucliers</center></a></td>
									<td><a href="?page=Boutique&amp;cat=8"><center><img src="styles/default/images/boutique/compagnon.png" /><br/>Compagnons</center></a></td>
								</tr>	
								<tr >
									<td><a href="?page=Boutique&amp;cat=9"><center><img src="styles/default/images/boutique/montures.png" /><br/>Montures</center></a></td>
									<td><a href="?page=Boutique&amp;cat=10"><center><img src="styles/default/images/boutique/sacs.png" /><br/>Sacs</center></a></td>	
								</tr>																	
								</center></table>
							</form>
						</div>							
					<?php
				}
				?>

			</div>
		</div>
	<?php
	}else
	{
?>
<script type="text/javascript">
	alert('Connectez-vous pour acceder à cette page !');
	document.location.href="?pahe=Accueil"
</script>
<?php
	}
									?>
			</td> 
		</tr> 
	</tbody>
</table> 

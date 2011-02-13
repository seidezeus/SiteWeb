<body class="fr-fr homepage">
	<div id="wrapper">
		<?php include_once('includes/html/header/boutique.html'); ?>
		<div id="content">
			<div class="content-top">
				<div class="content-bot">	
					<div id="homepage">
						<div id="left">
							<?php include_once('includes/html/slideshow.html'); ?>
								<?php include_once('includes/html/featured-news.html'); ?>
									<?php
									if($_SESSION['login'] && $_SESSION['login'] == TRUE)
									{
										$db = mysql_select_db ($array_db['db_site'],$cxn);
										if (!$db) {
											die ('Erreur : ' . mysql_error());
										}

										$nbr_Points = mysql_query("SELECT * FROM `voting_points`  WHERE `id`= '".$_SESSION['id']."'");
										$nbr_Point_ft = mysql_fetch_array($nbr_Points);

										if($nbr_Point_ft == 0) {
											$nbr_Point_ft = '0';
										}

									?>
										<div id="news-updates">
											<div class="news-article first-child">
												<h3>
													<a>Boutique</a>
												</h3>
											</div>
											<div class="news-article" align="center">
												<p>Vous avez actuellement '<?php echo $nbr_Point_ft['points']; ?>' point(s) !</p>
													<form action="#selection" method="post">
														<table class="table" border="0" cellspacing="0" cellpadding="3" width="100%">

																<tr class="row2">
																	<td class="iconCol"><a href="javascript:;" class="sort-link"><input type="image" name="cat" value="1" src="style/images/boutique/1.png" onclick="submit"/><center>Armes</center></a></td>
																	<td class="iconCol"><a href="javascript:;" class="sort-link"><input type="image" name="cat" value="2" src="style/images/boutique/2.png" onclick="submit"/><center>Armures</center></a></td>
																	<td class="iconCol"><a href="javascript:;" class="sort-link"><input type="image" name="cat" value="3" src="style/images/boutique/3.png" onclick="submit"/><center>Bijoux</center></a></td>
																	<td class="iconCol"><a href="javascript:;" class="sort-link"><input type="image" name="cat" value="4" src="style/images/boutique/4.png" onclick="submit"/><center>Boucliers</center></a></td>
																	<td class="iconCol"><a href="javascript:;" class="sort-link"><input type="image" name="cat" value="5" src="style/images/boutique/5.png" onclick="submit"/><center>Compagnons</center></a></td>
																</tr>
																<tr class="row2">
																	<td class="iconCol"><a href="javascript:;" class="sort-link"><input type="image" name="cat" value="6" src="style/images/boutique/6.png" onclick="submit"/><center>Compos</center></a></td>
																	<td class="iconCol"><a href="javascript:;" class="sort-link"><input type="image" name="cat" value="7" src="style/images/boutique/7.png" onclick="submit"/><center>Monnaies</center></a></td>
																	<td class="iconCol"><a href="javascript:;" class="sort-link"><input type="image" name="cat" value="8" src="style/images/boutique/8.png" onclick="submit"/><center>Héritage</center></a></td>
																	<td class="iconCol"><a href="javascript:;" class="sort-link"><input type="image" name="cat" value="9" src="style/images/boutique/9.png" onclick="submit"/><center>Montures</center></a></td>
																	<td class="iconCol"><a href="javascript:;" class="sort-link"><input type="image" name="cat" value="10" src="style/images/boutique/10.png" onclick="submit"/><center>Sacs</center></a></td>
																</tr>
														</table>
													</form>
											</div>
											<div id="submit">
				<?php
				/* Sélection de la base de données du site */
				$db = mysql_select_db ($array_db['db_site'],$cxn);
				if (!$db) {
					die ('Erreur : ' . mysql_error());
				}
				
				if(isset($_POST['cat']) && $_POST['cat'] != 'NULL') 
				{
					echo '
					<div class="news-article" align="center">
						<table class="table" border="0" cellspacing="0" cellpadding="3" width="100%">
							<thead>
								<tr>
									<th><a href="javascript:;" class="sort-link">Nom de l\'objet</a></th>
									<th><a href="javascript:;" class="sort-link numeric">Prix</a></th>
									<th class="iconCol"><a href="javascript:;" class="sort-link numeric">Acheter</a></th>
								</tr>
							</thead>';
																																  
							$boutique_cat = mysql_query("SELECT * FROM `boutique` WHERE `cat` = '".$_POST['cat']."'");

							if (mysql_num_rows($boutique_cat) > 0)
							{
								for($i = 0; $i < mysql_num_rows($boutique_cat); $i++)
								{
									$row_boutique_cat = mysql_fetch_array($boutique_cat);
																																	
									echo '
									<tbody>
										<tr class="row2">
											<td><a href="http://fr.wowhead.com/item='.$row_boutique_cat['id'].'"><font color="darkgreen"><b>'.$row_boutique_cat['nom'].'</font></a></td>
											<td><font color="darkred">'.$row_boutique_cat['prix'].' points</font></td>
											<td class="iconCol"><a href="index.php?page=Boutique&amp;id='.$row_boutique_cat['id'].'#submit"><img src="style/images/icons/admin/acheter.png"/></a></td>
										</tr>
									</tbody>';
								}
							}else
							{
								echo '
								<tbody>
									<tr class="row2" align="center">
										<td colspan="3">
											<strong><font color="red">Il n\'y a pas d\'objets en vente dans cette catégorie !</font></strong>
										</td>
									</tr>
								</tbody>';
							}
						echo '	
						</table>
					</div>';
				}

				if (isset($_GET['id']))
				{
					$id = strip_tags($_GET['id']);

					/* Sélection de la base de données des personnages */
					$db = mysql_select_db ($array_db['db_characters'],$cxn);
					if (!$db) {
						die ('Erreur : ' . mysql_error());
					}
					$characters_account = mysql_query("SELECT * FROM `characters`  WHERE `account`= '".$_SESSION['id']."' ORDER BY `name` ASC LIMIT 0,10");
					
					if (mysql_num_rows($characters_account) > 0)
					{
						echo '
						<div class="news-article">
							<table class="table" border="0" cellspacing="0" cellpadding="3" width="30%">
								Choisissez le personnage qui recevra la récompense :
								<tr>
									<form action="index.php?page=Boutique#submit" method="post">
										<td>
											<select name="action">
												<optgroup label="Mes personnages">';
												while($row_characters_account = mysql_fetch_array($characters_account))
												{
													echo '</optgroup>';             
													echo '<option name="nom">'.$row_characters_account['name'].'</option>';
												}		
											echo '
											</select>
										</td>
										<td><input type="hidden" name="id" value="'.$id.'"/></td>
										<td><input type="image" src="style/images/icons/admin/acheter.png"/></td>
									</form>
								</tr>
							</table>
						</div>';
					}else
					{
						echo '
						<div class="news-article" align="center">
							<strong><font color="red">Aucuns personnages !</font></strong>
						</div>';
					}
				}
					
				if (isset($_POST['action']))
				{
					/* Sélection de la base de données des personnages */
					$db = mysql_select_db ($array_db['db_characters'],$cxn);
					if (!$db) {
						die ('Erreur : ' . mysql_error());
					}
					$characters_name = mysql_query("SELECT * FROM `characters` WHERE `name` = '".$_POST['action']."'");
					$mail = mysql_query("SELECT COUNT(*) AS nbre_entrees FROM `mail`");
						
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
						$points = $row_voting_points_id['points'] - $row_boutique_id['prix'];
						mysql_query("UPDATE `voting_points` SET `points` = '".$points."' WHERE `id` = '".$_SESSION['id']."'");
																				
						/* Sélection de la base de données des personnages */
						$db = mysql_select_db ($array_db['db_characters'],$cxn);
						if (!$db) {
							die ('Erreur : ' . mysql_error());
						}
						$row_characters_name = mysql_fetch_array($characters_name);	
						$row_mail = mysql_fetch_array($mail);
						
						$nb_mail = ($row_mail['nbre_entrees'] + 1);
						$sender = $row_characters_name['guid'];
						$receiver = $row_characters_name['guid'];
						$item_guid = rand(500000, 600000);
						$item_template = $row_boutique_id['id'];
						$nombre = 1;

						do {
							$unique = false;
							$itemid = rand(1, 600000);
							$rech_unique = mysql_query("SELECT guid FROM  item_instance WHERE guid = '".$itemid."'");
							if(mysql_num_rows($rech_unique) == 0){
								$unique = true;
							}
						} while ($unique == false);

						mysql_query("INSERT INTO item_instance (guid,owner_guid,itemEntry, charges, enchantments,`text`,count) VALUES ('".$itemid."','".$receiver."','".$item_guid."', '0 0 0 0 0 ', '0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 ', '', '".$nombre."')");
																				
						mysql_query("INSERT INTO `mail` VALUES ('".$nb_mail."', '0', '41', '0', '".$sender."', '".$receiver."', 'Boutique', 'Merci de votre achat ! Bon jeu à vous !!', '1', '1298045033', '1295453033', '0', '0', '16')");
						mysql_query("INSERT INTO `mail_items` VALUES ('".$nb_mail."', '".$item_guid."', '".$item_template."', '".$receiver."')");
						echo '
						<script language="javascript"> 
							alert("Merci de votre achat ! La récompense vous a été envoyé dans votre boîte aux lettres.");
							document.location.href="index.php?page=Boutique" 
						</script>';
					}
				}
				?>

			</div>
		</div>
	<?php
	}else
	{
		echo '<font color="red">Vous devez être connecté pour accéder à cette page !</font></p>';
	}
									?>
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

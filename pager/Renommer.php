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
									<?php
									if($_SESSION['login'] && $_SESSION['login'] == TRUE)
									{
									?>
										<div id="news-updates">
											<div class="news-article first-child">
												<h3>
													<a>Renommer un personnage</a>
												</h3>
												<p>Il vous faut un minimum de <font color="green"><?php echo $array_points['renommer']; ?></font> points de vote pour renommer un personnage.</p>
											</div>
											<?php
											if (isset($_POST['renommer']))
											{
												if($infos_points['points'] >= $array_site['prix_renommer'])
												{
													$points = ($infos_points['points'] - $array_site['prix_renommer']);
													
													if(!empty($_POST['nom1']) && !empty($_POST['nom2']))
													{
														$nom1 = mysql_real_escape_string(htmlentities($_POST['nom1']));
														$nom2 = mysql_real_escape_string(htmlentities($_POST['nom2']));
																										
														/* Sélection de la base de données des personnages */
														$db = mysql_select_db ($array_db['db_characters'],$cxn);
														if (!$db) {
															die ('Erreur : ' . mysql_error());
														}
														$characters_name = mysql_query("SELECT * FROM `characters` WHERE `name` = '".$nom2."' LIMIT 1");
																											
														if(mysql_num_rows($characters_name) == 0)
														{
															mysql_query("UPDATE `characters` SET `name` = '".$nom2."' WHERE `name` = '".$nom1."'");
															
															/* Sélection de la base de données du site */
															$db = mysql_select_db ($array_db['db_site'],$cxn);
															if (!$db) {
																die ('Erreur : ' . mysql_error());
															}
															mysql_query("UPDATE `voting_points` SET `points` = '".$points."' WHERE `id` = '".$session_id."'");
															
															echo '
															<script language="javascript"> 
																alert("Personnage renommé avec succès !");
																document.location.href="index.php?page=Gestion" 
															</script>';
														}else
														{
															echo '
															<script language="javascript"> 
																alert("Erreur : Ce nom est déjà utilisé !");
																document.location.href="index.php?page=Renommer" 
															</script>';
														}
													}else
													{
														echo '
														<script language="javascript"> 
															alert("Erreur : Vous n\'avez pas sélectionner de personnage !");
															document.location.href="index.php?page=Renommer" 
														</script>';
													}
												}else
												{
													echo '
													<script language="javascript"> 
														alert("Erreur : Vous n\'avez pas asser de points pour renommer votre personnage !");
														document.location.href="index.php?page=Gestion" 
													</script>';
												}
											}else
											{
												echo '
												<div class="news-article" align="center">
													<form action="index.php?page=Renommer" method="post">
														Personnage à renommer :<br />';

														$characters_account = mysql_query("SELECT * FROM `characters` WHERE `account` = ".$session_id." ORDER BY `name` ASC LIMIT 0,10");
																
														if(mysql_num_rows($characters_account) > 0)
														{
															echo '
															<select name="nom1">
																<optgroup label="Mes personnages"></optgroup>';
																for($i = 0; $i < mysql_num_rows($characters_account); $i++)
																{
																	$row_characters_account = mysql_fetch_array($characters_account);
																															
																	echo '<option>'.$row_characters_account['name'].'</option>';
																}
															echo '
															</select>';
														}else
														{
															echo '<strong><font color="red">Vous n\'avez pas de personnages !</font></strong>';
														}
														echo '
														<br /><br />
														Nouveau nom :<br />
														<input type="text" name="nom2">
														<br /><br />
														<button class="ui-button button1" type="submit" name="renommer">
															<span>
																<span>Renommer</span>
															</span>
														</button>
													</form>	
												</div>';
											}
											?>
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
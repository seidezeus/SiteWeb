<?php require_once ('includes/fonctions/function.change_race.php'); ?>
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
													<a>Changement de race</a>
												</h3>
												<p>Il vous faut un minimum de <font color="green"><?php echo $array_points['change_race']; ?></font> points de vote pour changer la race d'un personnage.</p>
											</div>
											<?php
											if(isset($_POST['choix_perso']) && isset($_POST['perso']))
											{
													$guid = (int)$_POST['perso'];
																	
													$query = mysql_query("SELECT account, race, class, online FROM `characters` WHERE `guid` = '".$guid."'");
													$data = mysql_fetch_array($query);
																	
														if($data['account'] == $session_id)
														{
															if($data['online'] == 0)
															{
																$liste_races = liste_races($data['race'], $data['class']);
																	if(count($liste_races) >= 1)
																	{
																		echo '
																		<div class="news-article" align="center">
																			<form method="post" action="index.php?page=ChangeRace">
																				Nouvelle race :<br />
																				<select id="race" name="race">';
																					foreach($liste_races as $race)
																					{
																						echo '<option value="'.$race.'">'.nom_race($race).'</option>';
																					}
																				echo '</select>
																				<br /><br />
																				<input type="hidden" name="guid" value="'.$guid.'" />
																				<button class="ui-button button1" type="submit" name="choix_race">
																					<span>
																						<span>Changer de race</span>
																					</span>
																				</button>
																			</form>
																		</div>';
																	}
																	else
																	{
																		echo '
																		<script language="javascript"> 
																			alert("Erreur : Aucun changement de race n\'est disponible pour votre personnage !");
																			document.location.href="index.php?page=ChangeRace" 
																		</script>';
																	}
															}
															else
															{
																echo '
																<script language="javascript"> 
																	alert("Erreur : Votre personnage est en ligne !");
																	document.location.href="index.php?page=ChangeRace" 
																</script>';
															}
														}
														else
														{
															echo '
															<script language="javascript"> 
																alert("Erreur : Ce personnage ne vous appartient pas !");
																document.location.href="index.php?page=ChangeRace" 
															</script>';
														}
											}
											elseif(isset($_POST['choix_race']) && isset($_POST['race']) && isset($_POST['guid']))
											{
												if($infos_points['points'] >= $array_points['change_race'])
												{
													$points = ($infos_points['points'] - $array_points['change_race']);
													
													$guid = (int)$_POST['guid'];
													$new_race = (int)$_POST['race'];
																	
													$query = mysql_query("SELECT account, race, class FROM `characters` WHERE `guid` = '".$guid."'");
													$data = mysql_fetch_array($query);
																	
													if($data['account'] == $session_id)
													{
														$liste_races = liste_races($data['race'], $data['class']);
														
														if(in_array($new_race, $liste_races))
														{
															$data_perso = mysql_fetch_array(mysql_query("SELECT `online` FROM `characters` WHERE `guid` = '".$guid."'"));
															
															if($data_perso['online'] == 0)
															{
																mysql_query("UPDATE `characters` SET `race` = '".$new_race."' WHERE `guid` = '".$guid."'");
																
																/* Sélection de la base de données du site */
																$db = mysql_select_db ($array_db['db_site'],$cxn);
																if (!$db) {
																	die ('Erreur : ' . mysql_error());
																}
																mysql_query("UPDATE `voting_points` SET `points` = '".$points."' WHERE `id` = '".$session_id."'");
																
																echo '
																<script language="javascript"> 
																	alert("Changement de race terminé avec succès !");
																	document.location.href="index.php?page=Gestion" 
																</script>';
															}
															else
															{
																echo '
																<script language="javascript"> 
																	alert("Erreur : Votre personnage est en ligne !");
																	document.location.href="index.php?page=ChangeRace" 
																</script>';
															}
														}
														else
														{
															echo '
															<script language="javascript"> 
																alert("Erreur : La race choisie est incompatible avec votre personnage !");
																document.location.href="index.php?page=ChangeRace" 
															</script>';
														}
													}
													else
													{
														echo '
														<script language="javascript"> 
															alert("Erreur : Le personnage ne vous appartient pas !");
															document.location.href="index.php?page=ChangeRace" 
														</script>';
													}
												}else
												{
													echo '
													<script language="javascript"> 
														alert("Erreur : Vous n\'avez pas asser de points pour changer la race de votre personnage !");
														document.location.href="index.php?page=Gestion" 
													</script>';
												}
											}
											else
											{
												$query = mysql_query("SELECT guid, name FROM `characters` WHERE `account` = '".$session_id."' ORDER BY name ASC LIMIT 0,10");
												
												echo '
												<div class="news-article" align="center">
													<form method="post" action="index.php?page=ChangeRace">
														Choisissez un personnage :<br />
														<select id="perso" name="perso">
															<optgroup label="Mes personnages"></optgroup>';
															while($data = mysql_fetch_array($query))
															{
																echo '<option value="'.$data['guid'].'">'.$data['name'].'</option>';
															}
														echo '</select>
														<br /><br />
														<button class="ui-button button1" type="submit" name="choix_perso">
															<span>
																<span>Choisir ce personnage</span>
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
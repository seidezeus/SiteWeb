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
												<a>Connexion</a>
											</h3>
										</div>
										<?php
										if(!$_SESSION['login']) $_SESSION['login'] = FALSE;
											if (isset($_POST['connexion']))
											{
												if(!empty($_POST['login']) AND !empty($_POST['password']))
												{
													$login = mysql_real_escape_string(htmlentities($_POST['login']));
													$password = mysql_real_escape_string(htmlentities($_POST['password']));
															
													/* Sélection de la base de données des comptes */
													$db = mysql_select_db ($array_db['db_realmd'],$cxn);
													if (!$db) {
														die ('Erreur : ' . mysql_error());
													}
													$account_username = mysql_query("SELECT * FROM `account` WHERE `username` = '".$login."'");
													$row_account_username = mysql_fetch_array($account_username);
													$account_banned_id = mysql_query("SELECT * FROM `account_banned` WHERE `id` = '".$row_account_username['id']."' AND `active` = '1'");
													$row_account_banned_id = mysql_fetch_array($account_banned_id);
													$ip_banned = mysql_query("SELECT * FROM `ip_banned` WHERE `ip` = '".$ip."' LIMIT 1");
													$row_ip_banned = mysql_fetch_array($ip_banned);
													
													if(mysql_num_rows($ip_banned) == 0)
													{
														if(mysql_num_rows($account_banned_id) == 0)
														{													
															if(mysql_num_rows($account_username) > 0)
															{
																$account_password = mysql_query("SELECT * FROM `account` WHERE `sha_pass_hash` = SHA1(CONCAT(UPPER('$login'),':',UPPER('$password')))");
																				
																if(mysql_num_rows($account_password) > 0)
																{
																	$_SESSION['login'] = TRUE;
																	$_SESSION['id'] = $row_account_username['id'];
																	$_SESSION['username'] = $login;
																			
																	echo '
																	<script language="javascript"> 
																		alert("Connexion réussie ... Bienvenue '.$_SESSION['username'].' !");
																		document.location.href="index.php?page=Accueil" 
																	</script>';
																}else
																{
																	echo '
																	<script language="javascript"> 
																		alert("Erreur : Le pseudo ou le mot de passe choisis est invalide ...");
																		document.location.href="index.php?page=Connexion" 
																	</script>';
																}
															}else
															{
																echo '
																<script language="javascript"> 
																	alert("Erreur : Le pseudo ou le mot de passe choisis est invalide ...");
																	document.location.href="index.php?page=Connexion" 
																</script>';
															}
														}else
														{
															echo '
															<script language="javascript"> 
																alert("Ce compte a été BAN pour la raison suivante : '.$row_account_banned_id['banreason'].'.\n\Dans ces conséquences il vous sera impossible de vous connectez avec ce compte !");
																document.location.href="index.php?page=Connexion" 
															</script>';
														}
													}else
													{
														echo '
														<script language="javascript"> 
															alert("Cette adresse IP a été pour la raison suivante : '.$row_ip_banned['banreason'].'.\n\Dans ces conséquences il vous sera impossible de vous connectez avec cette adresse IP !");
															document.location.href="index.php?page=Accueil" 
														</script>';
													}
												}else
												{
													echo '
													<script language="javascript"> 
														alert("Erreur : Tous les champs ne sont pas remplis !");
														document.location.href="index.php?page=Connexion" 
													</script>';
												}
											}else
											{
												echo '										
												<div class="news-article">
													<form action="index.php?page=Connexion" method="post">
														Nom de compte :<br /><input type="text" name="login" />
														<br /><br />
														Mot de passe :<br /><input type="password" name="password" />
														<br /><br />
														<input type="submit" value="Connexion" name="connexion" />
													</form>
												</div>';
											}
											?>
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
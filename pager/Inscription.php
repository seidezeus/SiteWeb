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
													<a>Inscription</a>
												</h3>
											</div>

											<div class="news-article ">
												<?php
													require_once('includes/fonctions/function.inscription.php');

													/* Sélection de la base de données comptes */
													$db = mysql_select_db($array_db['db_realmd'],$cxn);
													if (!$db) {
													   die ('Erreur : ' . mysql_error()); // Affichage de l'erreur
													}
													$ip_banned = mysql_query("SELECT * FROM `ip_banned` WHERE `ip` = '".$ip."' LIMIT 1");
													$row_ip_banned = mysql_fetch_array($ip_banned);
													
													if(mysql_num_rows($ip_banned) == 0)
													{
														if(isset($_POST['ok']))
														{
															$joueur = new Inscription();
															$joueur->setUsername($_POST['username']);
															$joueur->setPassword($_POST['password']);
															$joueur->setPasswordRepeat($_POST['passwordRepeat']);
															$joueur->setEmail($_POST['email']);
															$joueur->setExtension($_POST['extension']);
															$joueur->verifyAll();   
														}else
														{
													?>
															<form action="" method="post">
																<table width="430" border="0" cellspacing="0" cellpadding="2" align="center">
																	  <tr>
																		<p style="text-align: left;">Pour vous inscrire et nous rejoindre sur notre serveur de jeu, il vous suffit simplement de remplir les champs ci-dessous !<br />Les identifiants que vous choisirez lors de votre inscription seront ceux que vous utiliserez pour vous connecter &agrave; notre serveur une fois votre jeu lanc&eacute; !</p>    
																	  </tr>
																	  <tr>
																		<td width="200" align="right" valign="top" class="TextSmall"><br />Nom de compte :&nbsp;</td>
																		<td><br /><input name="username" type="text" size="25" maxlength="60" id="txtNomCompte" value="" autocomplete="off" /></td>
																	  </tr>
																	  <tr>
																		<td align="right" class="TextSmall"><br />Adresse e-mail :&nbsp;</td>
																		<td><br /><input name="email" type="text" size="25" maxlength="60" id="txtEmail" value="" autocomplete="off" /></td>
																	  </tr>
																	  <tr>
																		<td align="right" class="TextSmall"><br />Mot de passe :&nbsp;</td>
																		<td><br /><input name="password" type="password" size="25" maxlength="60" id="txtPass" value="" autocomplete="off" /></td>
																	  </tr>
																	  <tr>
																		<td align="right" class="TextSmall"><br />Validation du mot de passe :&nbsp;</td>
																		<td><br /><input name="passwordRepeat" type="password" size="25" maxlength="60" id="txtValPass" value="" autocomplete="off"/></td>
																	  </tr>
																	  <tr>
																		<td align="right" class="TextSmall"><br />Extension :&nbsp;</td>
																		<td>
																		<br />
																		<select name="extension" id="selTypeJeu" class="TextXSmall">
																			<option value="2">World of Warcraft - Wrath of the Lich King</option>
																			<option value="1">World of Warcraft - The Burning Crusade</option>
																			<option value="0">World of Warcraft - Classique</option>
																		</select>
																		</td>
																	  </tr>
																	  <tr>
																		<td colspan="2" align="right">
																		<br />
																		<input type="submit" name="ok" id="Submit" value="Créer le compte" /></td>
																	  </tr>
																</table>
															</form>
													<?php
														}
													}else
													{
														echo '
														<script language="javascript"> 
															alert("Cette adresse IP a été pour la raison suivante : '.$row_ip_banned['banreason'].'.\n\Dans ces conséquences il vous sera impossible de vous inscrire avec cette adresse IP !");
															document.location.href="index.php?page=Accueil" 
														</script>';
													}
													?>
													<br /><br />
													<p>Notre realmlist : <strong><font color="red">set realmlist <?php echo $royaume['address']; ?></font></strong></p>
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
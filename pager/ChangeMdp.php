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
													<a>Changement de mot de passe</a>
												</h3>
											</div>
											<?php
											if (isset($_POST['changer']))
											{
												$password1 = mysql_real_escape_string(htmlentities($_POST['password1']));
												$password2 = mysql_real_escape_string(htmlentities($_POST['password2']));
												$password3 = mysql_real_escape_string(htmlentities($_POST['password3']));
												
												if(!empty($password1) && !empty($password2) && !empty($password3))
												{
													/* Sélection de la base de données des comptes */
													$db = mysql_select_db ($array_db['db_realmd'],$cxn);
													if (!$db) {
														die ('Erreur : ' . mysql_error());
													}
													$account_password = mysql_query("SELECT * FROM `account` WHERE `sha_pass_hash` = SHA1(CONCAT(UPPER('".$session_username."'),':',UPPER('".$password1."'))) AND `id` = '".$session_id."'");
														
													if (mysql_num_rows($account_password) > 0)
													{
														if($password2 == $password3)
														{
															mysql_query("UPDATE `account` SET `sha_pass_hash` = SHA1(CONCAT(UPPER('".$session_username."'),':',UPPER('".$password3."'))) WHERE `id` = '".$session_id."'");
															echo '
															<script language="javascript"> 
																alert("Mot de passe changé avec succès !");
																document.location.href="index.php?page=Gestion" 
															</script>';
														}else
														{
															echo '
															<script language="javascript"> 
																alert("Erreur : Les deux mots de passe ne sont pas identique !");
																document.location.href="index.php?page=ChangeMdp" 
															</script>';
														}
													}else
													{
														echo '
														<script language="javascript"> 
															alert("Erreur : Votre ancien mot de passe est mauvais !");
															document.location.href="index.php?page=ChangeMdp" 
														</script>';
													}
												}else
												{
													echo '
													<script language="javascript"> 
														alert("Erreur : Tous les champs ne sont pas remplis !");
														document.location.href="index.php?page=ChangeMdp" 
													</script>';
												}
											}else
											{
												echo '
												<div class="news-article" align="center">
													<form action="index.php?page=ChangeMdp" method="post">
														Ancien mot de passe :<br />
														<input type="password" name="password1">
														<br /><br />
														Nouveau mot de passe :<br />
														<input type="password" name="password2">
														<br /><br />
														Confirmation :<br />
														<input type="password" name="password3">
														<br /><br />
														<button class="ui-button button1" type="submit" name="changer">
															<span>
																<span>Changer</span>
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
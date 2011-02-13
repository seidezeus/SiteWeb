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
													<a>Changement d'adresse mail</a>
												</h3>
											</div>
											<?php
											if (isset($_POST['changer']))
											{	
												$mail1 = mysql_real_escape_string(htmlentities($_POST['mail1']));
												$mail2 = mysql_real_escape_string(htmlentities($_POST['mail2']));
												$mail3 = mysql_real_escape_string(htmlentities($_POST['mail3']));
												
												if(!empty($mail1) && !empty($mail2) && !empty($mail3))
												{													
													if ($mail1 == $infos_compte['email'])
													{
														if($mail2 == $mail3)
														{
															/* Sélection de la base de données des comptes */
															$db = mysql_select_db ($array_db['db_realmd'],$cxn);
															if (!$db) {
																die ('Erreur : ' . mysql_error());
															}
															mysql_query("UPDATE `account` SET `email` = '".$mail3."' WHERE `id` = '".$session_id."'");
															
															echo '
															<script language="javascript"> 
																alert("Adresse mail changée avec succès !");
																document.location.href="index.php?page=Gestion" 
															</script>';
														}else
														{
															echo '
															<script language="javascript"> 
																alert("Erreur : Les deux adresses mail ne sont pas identique !");
																document.location.href="index.php?page=ChangeMail" 
															</script>';
														}
													}else
													{
														echo '
														<script language="javascript"> 
															alert("Erreur : Votre ancienne adresse mail est mauvaise !");
															document.location.href="index.php?page=ChangeMail" 
														</script>';
													}
												}else
												{
													echo '
													<script language="javascript"> 
														alert("Erreur : Tous les champs ne sont pas remplis !");
														document.location.href="index.php?page=ChangeMail" 
													</script>';
												}
											}else
											{
												echo '
												<div class="news-article" align="center">
													<form action="index.php?page=ChangeMail" method="post">
														Ancienne adresse mail :<br />
														<input type="text" name="mail1">
														<br /><br />
														Nouvelle adresse mail :<br />
														<input type="text" name="mail2">
														<br /><br />
														Confirmation :<br />
														<input type="text" name="mail3">
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
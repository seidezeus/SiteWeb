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
										if($infos_compte['gmlevel'] >= '3')
										{
										?>
											<div id="news-updates">
												<div class="news-article first-child">
													<h3>
														<a>Ajouter une news</a>
													</h3>
												</div>
												<?php
												if (isset($_POST['ajouter']))
												{
													$news_id = mysql_real_escape_string($_POST['id']);
													$news_titre = mysql_real_escape_string(htmlentities($_POST['titre']));
													$news_message = mysql_real_escape_string(htmlentities($_POST['message']));
													$news_auteur = mysql_real_escape_string(htmlentities($_POST['auteur']));
													
													if(!empty($news_titre) && !empty($news_message))
													{
														/* Sélection de la base de données du site */
														$db = mysql_select_db ($array_db['db_site'],$cxn);
														if (!$db) {
															die ('Erreur : ' . mysql_error());
														}
														mysql_query("INSERT INTO `news` (`id`, `titre`, `message`, `auteur`, `date`) VALUES ('".$news_id."', '".$news_titre."', '".$news_message."', '".$news_auteur."', '".time()."')");
														
														echo '
														<script language="javascript"> 
															alert("News ajoutée avec succès !");
															document.location.href="index.php?page=AjoutNews" 
														</script>';
													}else
													{
														echo '
														<script language="javascript"> 
															alert("Erreur : Tous les champs ne sont pas remplis !");
															document.location.href="index.php?page=AjoutNews" 
														</script>';
													}
												}else
												{
													/* Sélection de la base de données du site */
													$db = mysql_select_db ($array_db['db_site'],$cxn);
													if (!$db) {
														die ('Erreur : ' . mysql_error());
													}
													$news = mysql_query("SELECT COUNT(*) AS nbre_entrees FROM `news`");
													$row_news = mysql_fetch_array($news);
													$id = ($row_news['nbre_entrees'] + 1);
																									
													echo '
													<div class="news-article" align="center">
														<form action="index.php?page=AjoutNews" method="post">
															Titre de la news : <br />
															<input type="text" size="30" name="titre" value=""/>
															<br /><br />
															Message de la news :<br />
															<textarea name="message" cols="30" rows="5"></textarea>
															<br/><br/>
															<input type="hidden" name="id" value="'.$id.'"/>
															<input type="hidden" name="auteur" value="'.$session_username.'"/>
															<button class="ui-button button1" type="submit" name="ajouter">
																<span>
																	<span>Ajouter</span>
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
											echo '<font color="red">Vous n\'êtes pas autorisé à accéder à cette page !</font></p>';
										}
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
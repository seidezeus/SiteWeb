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
													<a>Modifier une news</a>
												</h3>
											</div>
											<?php
											if (isset($_GET['modif']))
											{
												$id = mysql_real_escape_string($_GET['modif']);
												
												/* Sélection de la base de données du site */
												$db = mysql_select_db ($array_db['db_site'],$cxn);
												if (!$db) {
													die ('Erreur : ' . mysql_error());
												}
												$news_id = mysql_query("SELECT * FROM `news` WHERE `id` = '".$id."' LIMIT 1");
												
												if (mysql_num_rows($news_id) > 0)
												{
													$row_news_id = mysql_fetch_array($news_id);
												
													echo '
													<div class="news-article" align="center">
														<form action="index.php?page=ModifNews" method="post">
															Titre de la news : <br />
															<input type="text" size="30" name="titre" value="'.$row_news_id['titre'].'"/>
															<br /><br />
															Message de la news :<br />
															<textarea name="message" cols="30" rows="5">'.$row_news_id['message'].'</textarea>
															<br/><br/>
															<input type="hidden" name="id" value="'.$id.'"/>
															<button class="ui-button button1" type="submit" name="modifier">
																<span>
																	<span>Modifier</span>
																</span>
															</button>
														</form>
													</div>';
												}else
												{
													echo '
													<script language="javascript"> 
														alert("Cette news n\'existe pas !");
														document.location.href="index.php?page=ModifNews" 
													</script>';
												}
											}
											elseif (isset($_POST['modifier']))
											{
												if (!empty($_POST['titre']) && !empty($_POST['message']))
												{
													$news_id = mysql_real_escape_string($_POST['id']);
													$news_titre = mysql_real_escape_string(htmlentities($_POST['titre']));
													$news_message = mysql_real_escape_string(htmlentities($_POST['message']));
													
													/* Sélection de la base de données du site */
													$db = mysql_select_db ($array_db['db_site'],$cxn);
													if (!$db) {
														die ('Erreur : ' . mysql_error());
													}
													mysql_query("UPDATE `news` SET `titre` = '".$news_titre."', `message` = '".$news_message."' WHERE `id` = '".$news_id."'");
													
													echo '
													<script language="javascript"> 
														alert("News modifiée avec succès !");
														document.location.href="index.php?page=ModifNews" 
													</script>';
												
												}else
												{
													echo '
													<script language="javascript"> 
														alert("Erreur : Tous les champs ne sont pas remplis !");
														document.location.href="index.php?page=ModifNews&amp;modif='.$id.'" 
													</script>';
												}
											}else
											{
												echo '
												<div class="news-article" align="center">
													<table class="table" border="0" cellspacing="0" cellpadding="3" width="100%">
														<thead>
															<tr>
																<th><a href="javascript:;" class="sort-link">Titre de la news</a></th>
																<th class="iconCol"><a href="javascript:;" class="sort-link numeric">Auteur</a></th>
																<th class="iconCol"><a href="javascript:;" class="sort-link numeric">Modifier</a></th>
															</tr>
														</thead>';

														/* Sélection de la base de données du site */
														$db = mysql_select_db ($array_db['db_site'],$cxn);
														if (!$db) {
															die ('Erreur : ' . mysql_error());
														}
														$news = mysql_query("SELECT * FROM `news` ORDER BY `id` DESC");	
															
														if (mysql_num_rows($news) > 0)
														{
															for($i = 0; $i < mysql_num_rows($news); $i++)
															{
																$row_news = mysql_fetch_array($news);

																echo '
																<tbody>
																	<tr class="row2">
																		<td><font color="darkgreen">'.$row_news['titre'].'</font></td>
																		<td class="iconCol"><font color="darkred">'.$row_news['auteur'].'</font></td>
																		<td class="iconCol"><a href="index.php?page=ModifNews&amp;modif='.$row_news['id'].'"><img src="style/images/icons/admin/modifier.png"/></a></td>
																	</tr>
																</tbody>';
															}
														}else
														{
															echo '
															<tbody>
																<tr class="row2" align="center">
																	<td colspan="3"><strong><font color="red">Il n\'y a pas de news !</font></strong></td>
																</tr>
															</tbody>';
														}
													echo '</table>
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
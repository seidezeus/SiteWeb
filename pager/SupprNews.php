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
													<a>Supprimer une news</a>
												</h3>
											</div>
											<?php
											if (isset($_GET['suppr']))
											{
												$id = mysql_real_escape_string($_GET['suppr']);
												
												/* Sélection de la base de données du site */
												$db = mysql_select_db ($array_db['db_site'],$cxn);
												if (!$db) {
													die ('Erreur : ' . mysql_error());
												}
												mysql_query("DELETE FROM `news` WHERE `id` = '".$id."'");
												mysql_query("DELETE FROM `commentaires` WHERE `news` = '".$id."'");
												
												echo '
												<script language="javascript"> 
													alert("News supprimée avec succès !");
													document.location.href="index.php?page=SupprNews" 
												</script>';
											}else
											{
												echo '
												<div class="news-article" align="center">
													<table class="table" border="0" cellspacing="0" cellpadding="3" width="100%">
														<thead>
															<tr>
																<th><a href="javascript:;" class="sort-link">Titre de la news</a></th>
																<th class="iconCol"><a href="javascript:;" class="sort-link numeric">Auteur</a></th>
																<th class="iconCol"><a href="javascript:;" class="sort-link numeric">Supprimer</a></th>
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
																		<td class="iconCol"><a href="index.php?page=SupprNews&amp;suppr='.$row_news['id'].'"><img src="style/images/icons/admin/supprimer.png"/></a></td>
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
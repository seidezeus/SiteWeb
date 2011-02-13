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
														<a>Supprimer un objet de la boutique</a>
													</h3>
												</div>
												<?php
												if (isset($_GET['id'])) 
												{
													$id = mysql_real_escape_string($_GET['id']);
													
													/* Sélection de la base de données du site */
													$db = mysql_select_db ($array_db['db_site'],$cxn);
													if (!$db) {
														die ('Erreur : ' . mysql_error());
													}
													mysql_query("DELETE FROM `boutique` WHERE `id` = ".$id."");
													
													echo '
													<script language="javascript"> 
														alert("Objet supprimé de la boutique avec succès !");
														document.location.href="index.php?page=SupprObjet" 
													</script>'; 
												}else
												{
													echo '
													<div class="news-article" align="center">
														<table class="table" border="0" cellspacing="0" cellpadding="3" width="100%">
															<thead>
																<tr>
																	<th><a href="javascript:;" class="sort-link">Nom de l\'objet</a></th>
																	<th class="iconCol"><a href="javascript:;" class="sort-link numeric">Supprimer</a></th>
																</tr>
															</thead>';
															
															/* Sélection de la base de données du site */
															$db = mysql_select_db ($array_db['db_site'],$cxn);
															if (!$db) {
																die ('Erreur : ' . mysql_error());
															}
															$boutique_id = mysql_query("SELECT * FROM `boutique` ORDER BY `id` DESC");
															
															if (mysql_num_rows($boutique_id) > 0)
															{
																for($i = 0; $i < mysql_num_rows($boutique_id); $i++)
																{
																	$row_boutique_id = mysql_fetch_array($boutique_id);

																	echo '
																	<tbody>
																		<tr class="row2">
																			<td><a href="http://fr.wowhead.com/?item='.$row_boutique_id['id'].'"><font color="darkgreen">'.$row_boutique_id['nom'].'</font></a></td>
																			<td class="iconCol"><a href="index.php?page=SupprObjet&amp;id='.$row_boutique_id['id'].'"><img src="style/images/icons/admin/supprimer.png"/></a></td>
																		</tr>
																	</tbody>';
																}
															}else
															{
																echo '
																<tbody>
																	<tr class="row2" align="center">
																		<td colspan="2">
																			<strong><font color="red">Il n\'y a pas d\'objets en vente dans la boutique !</font></strong>
																		</td>
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

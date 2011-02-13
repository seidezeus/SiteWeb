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
												<a>Joueurs en ligne</a>
											</h3>
										</div>
										<div class="news-article" align="center">
											<table class="table" border="0" cellspacing="0" cellpadding="3" width="100%">
												<thead>
													<tr>
														<th><a href="javascript:;" class="sort-link">Nom du joueur</a></th>
														<th class="iconCol"><a href="javascript:;" class="sort-link numeric">Niveau</a></th>
														<th class="iconCol"><a href="javascript:;" class="sort-link numeric">Race</a></th>
														<th class="iconCol"><a href="javascript:;" class="sort-link numeric">Classe</a></th>
														<th class="iconCol"><a href="javascript:;" class="sort-link numeric">Faction</a></th>
													</tr>
												</thead>
												<?php
												/* Sélection de la base de données des personnages */
												$db = mysql_select_db ($array_db['db_characters'],$cxn);
												if (!$db) {
													die ('Erreur : ' . mysql_error());
												}
												$characters_online = mysql_query("SELECT * FROM `characters` WHERE `online` = '1'");	
												
												if (mysql_num_rows($characters_online) > 0)
												{
													for($i = 0; $i < mysql_num_rows($characters_online); $i++)
													{
														$row_characters_online = mysql_fetch_array($characters_online);
																										
														echo '
														<tbody>
															<tr class="row2">
																<td class="table-link">
																	<a href="index.php?page=Armurerie&amp;guid='.$row_characters_online['guid'].'" class="color-c'.$row_characters_online['class'].'">
																		<span class="list-icon border-c'.$row_characters_online['class'].'"><img src="style/images/2d/avatar/'.$row_characters_online['race'].'-'.$row_characters_online['gender'].'.jpg"/></span>
																		'.$row_characters_online['name'].'
																	</a>
																</td>
																<td class="iconCol"><font color="darkred">'.$row_characters_online['level'].'</font></td>
																<td class="iconCol"><img src="style/images/icons/race/'.$row_characters_online['race'].'-'.$row_characters_online['gender'].'.gif"/></td>
																<td class="iconCol"><img src="style/images/icons/class/'.$row_characters_online['class'].'.gif"/></td>
																<td class="iconCol"><img src="style/images/icons/faction/'.$faction[$row_characters_online['race']].'.gif"/></td>
															</tr>
														</tbody>';
													}
												}else
												{
													echo '
													<tbody>
														<tr class="row2" align="center">
															<td colspan="5">
																<strong><font color="red">Il n\'y a pas de joueurs en ligne !</font></strong>
															</td>
														</tr>
													</tbody>';
												}
												?>
											</table>
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
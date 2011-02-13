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
													<a>Mes personnages</a>
												</h3>
											</div>
											<div class="news-article" align="center">
												<table class="table" border="0" cellspacing="0" cellpadding="3" width="100%">
													<thead>
														<tr>
															<th><a href="javascript:;" class="sort-link">Nom du personnage</a></th>
															<th class="iconCol"><a href="javascript:;" class="sort-link numeric">Niveau</a></th>
															<th class="iconCol"><a href="javascript:;" class="sort-link numeric">Race</a></th>
															<th class="iconCol"><a href="javascript:;" class="sort-link numeric">Classe</a></th>
															<th class="iconCol"><a href="javascript:;" class="sort-link numeric">Faction</a></th>
															<th><a href="javascript:;" class="sort-link numeric">Guilde</a></th>
														</tr>
													</thead>
													<?php
													/* Sélection de la base de données des personnages */
													$db = mysql_select_db ($array_db['db_characters'],$cxn);
													if (!$db) {
														die ('Erreur : ' . mysql_error());
													}
													$characters_account = mysql_query("SELECT * FROM `characters` WHERE `account` = ".$session_id." ORDER BY `name` ASC LIMIT 0,10");
													
													if (mysql_num_rows($characters_account) > 0)
													{
														for($i = 0; $i < mysql_num_rows($characters_account); $i++)
														{
															$row_characters_account = mysql_fetch_array($characters_account);
															$guild_member_guid = mysql_query("SELECT * FROM `guild_member` WHERE `guid` = '".$row_characters_account['guid']."' LIMIT 1");
															$row_guild_member_guid = mysql_fetch_array($guild_member_guid);
															$guild_guildid = mysql_query("SELECT * FROM `guild` WHERE `guildid` = '".$row_guild_member_guid['guildid']."' LIMIT 1");
															$row_guild_guildid = mysql_fetch_array($guild_guildid);
																											
															echo '
															<tbody>
																<tr class="row2">
																	<td class="table-link">
																		<a href="index.php?page=Armurerie&amp;guid='.$row_characters_account['guid'].'" class="color-c'.$row_characters_account['class'].'">
																			<span class="list-icon border-c'.$row_characters_account['class'].'"><img src="style/images/2d/avatar/'.$row_characters_account['race'].'-'.$row_characters_account['gender'].'.jpg"/></span>
																			'.$row_characters_account['name'].'
																		</a>
																	</td>
																	<td class="iconCol"><font color="darkred">'.$row_characters_account['level'].'</font></td>
																	<td class="iconCol"><img src="style/images/icons/race/'.$row_characters_account['race'].'-'.$row_characters_account['gender'].'.gif"/></td>
																	<td class="iconCol"><img src="style/images/icons/class/'.$row_characters_account['class'].'.gif"/></td>
																	<td class="iconCol"><img src="style/images/icons/faction/'.$faction[$row_characters_account['race']].'.gif"/></td>
																	<td>'.$row_guild_guildid['name'].'</td>
																</tr>
															</tbody>';
														}
													}else
													{
														echo '
														<tbody>
															<tr class="row2" align="center">
																<td colspan="5">
																	<strong><font color="red">Vous n\'avez pas de personnages !</font></strong>
																</td>
															</tr>
														</tbody>';
													}
													?>
												</table>
											</div>	
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
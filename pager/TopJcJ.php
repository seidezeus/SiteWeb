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
												<a>Top <font color="blue">J</font>oueurs contre <font color="red">J</font>oueurs</a>
											</h3>
										</div>
										<div class="news-article ">
											<strong><a>Top 10 victoires honorable</a></strong>
											<br /><br />
												<table class="table" cellspacing="0" cellpadding="3" width="100%">
													<thead>
														<tr>
															<th class="iconCol"><a href="javascript:;" class="sort-link numeric">Top</a></th>
															<th><a href="javascript:;" class="sort-link">Nom du joueur</a></th>
															<th class="iconCol"><a href="javascript:;" class="sort-link numeric">Niveau</a></th>
															<th class="iconCol"><a href="javascript:;" class="sort-link numeric">Race</a></th>
															<th class="iconCol"><a href="javascript:;" class="sort-link numeric">Classe</a></th>
															<th class="iconCol"><a href="javascript:;" class="sort-link numeric">Faction</a></th>
															<th><a href="javascript:;" class="sort-link numeric">Victoires honorable</a></th>
														</tr>
													</thead>
													<?php
													/* Sélection de la base de données des personnages */
													$db = mysql_select_db ($array_db['db_characters'],$cxn);
													if (!$db) {
														die ('Erreur : ' . mysql_error());
													}
													$characters_totalKills = mysql_query("SELECT * FROM `characters` ORDER BY `totalKills` DESC LIMIT 0,10");
													
													$top = array(0=> "1",1=> "2",2=> "3",3=> "0",4=> "0",5=> "0",6=> "0",7=> "0",8=> "0",9=> "0",10=> "0");													
														
													if (mysql_num_rows($characters_totalKills) > 0)
													{										
														for($i = 0; $i < mysql_num_rows($characters_totalKills); $i++)
														{	
															$row_characters_totalKills = mysql_fetch_array($characters_totalKills);
																												
															echo '
															<tbody>
																<tr class="row2">
																	<td><img src="style/images/icons/top/'.$top[$i].'.png"/></td>
																	<td class="table-link">
																		<a href="index.php?page=Armurerie&amp;guid='.$row_characters_totalKills['guid'].'" class="color-c'.$row_characters_totalKills['class'].'">
																			<span class="list-icon border-c'.$row_characters_totalKills['class'].'"><img src="style/images/2d/avatar/'.$row_characters_totalKills['race'].'-'.$row_characters_totalKills['gender'].'.jpg"/></span>
																			'.$row_characters_totalKills['name'].'
																		</a>
																	</td>
																	<td class="iconCol"><font color="darkred">'.$row_characters_totalKills['level'].'</font></td>
																	<td class="iconCol"><img src="style/images/icons/race/'.$row_characters_totalKills['race'].'-'.$row_characters_totalKills['gender'].'.gif"/></td>
																	<td class="iconCol"><img src="style/images/icons/class/'.$row_characters_totalKills['class'].'.gif"/></td>
																	<td class="iconCol"><img src="style/images/icons/faction/'.$faction[$row_characters_totalKills['race']].'.gif"/></td>
																	<td><font color="purple">'.$row_characters_totalKills['totalKills'].'</font></td>
																</tr>
															</tbody>';
														}
													}else
													{
														echo '
														<tbody>
															<tr class="row2">
																<td colspan="7" align="center">
																	<strong><font color="red">Il n\'y a pas de personnages disposant de plus d\'une victoire honorable !</font></strong>
																</td>
															</tr>
														</tbody>';
													}
													?>
												</table>
										</div>	
										<div class="news-article">
											<strong><a>Top 10 points d'honneur</a></strong>
											<br /><br />
												<table class="table" cellspacing="0" cellpadding="3" width="100%">
													<thead>
														<tr>
															<th class="iconCol"><a href="javascript:;" class="sort-link numeric">Top</a></th>
															<th><a href="javascript:;" class="sort-link">Nom du joueur</a></th>
															<th class="iconCol"><a href="javascript:;" class="sort-link numeric">Niveau</a></th>
															<th class="iconCol"><a href="javascript:;" class="sort-link numeric">Race</a></th>
															<th class="iconCol"><a href="javascript:;" class="sort-link numeric">Classe</a></th>
															<th class="iconCol"><a href="javascript:;" class="sort-link numeric">Faction</a></th>
															<th><a href="javascript:;" class="sort-link numeric">Points d'honneur</a></th>
														</tr>
													</thead>
													<?php
													/* Sélection de la base de données des personnages */
													$db = mysql_select_db ($array_db['db_characters'],$cxn);
													if (!$db) {
														die ('Erreur : ' . mysql_error());
													}
													$characters_totalHonorPoints = mysql_query("SELECT * FROM `characters` ORDER BY `totalHonorPoints` DESC LIMIT 0,10");
														
													if (mysql_num_rows($characters_totalHonorPoints) > 0)
													{
														for($i = 0; $i < mysql_num_rows($characters_totalHonorPoints); $i++)
														{		
															$row_characters_totalHonorPoints = mysql_fetch_array($characters_totalHonorPoints);
																													
															echo '
															<tbody>
																<tr class="row2">
																	<td><img src="style/images/icons/top/'.$top[$i].'.png"/></td>
																	<td class="table-link">
																		<a href="index.php?page=Armurerie&amp;guid='.$row_characters_totalHonorPoints['guid'].'" class="color-c'.$row_characters_totalHonorPoints['class'].'">
																			<span class="list-icon border-c'.$row_characters_totalHonorPoints['class'].'"><img src="style/images/2d/avatar/'.$row_characters_totalHonorPoints['race'].'-'.$row_characters_totalHonorPoints['gender'].'.jpg"/></span>
																			'.$row_characters_totalHonorPoints['name'].'
																		</a>
																	</td>
																	<td class="iconCol"><font color="darkred">'.$row_characters_totalHonorPoints['level'].'</font></td>
																	<td class="iconCol"><img src="style/images/icons/race/'.$row_characters_totalHonorPoints['race'].'-'.$row_characters_totalHonorPoints['gender'].'.gif"/></td>
																	<td class="iconCol"><img src="style/images/icons/class/'.$row_characters_totalHonorPoints['class'].'.gif"/></td>
																	<td class="iconCol"><img src="style/images/icons/faction/'.$faction[$row_characters_totalHonorPoints['race']].'.gif"/></td>
																	<td><font color="purple">'.$row_characters_totalHonorPoints['totalHonorPoints'].'</font></td>
																</tr>
															</tbody>';
														}
													}else
													{
														echo '
														<tbody>
															<tr class="row2">
																<td colspan="7" align="center">
																	<strong><font color="red">Il n\'y a pas de personnages disposant de plus d\'un point d\'honneur !</font></strong>
																</td>
															</tr>
														</tbody>';
													}
													?>
												</table>
										</div>
										<div class="news-article">
											<strong><a>Top 10 points d'arène</a></strong>
											<br /><br />
												<table class="table" cellspacing="0" cellpadding="3" width="100%">
													<thead>
														<tr>
															<th class="iconCol"><a href="javascript:;" class="sort-link numeric">Top</a></th>
															<th><a href="javascript:;" class="sort-link">Nom du joueur</a></th>
															<th class="iconCol"><a href="javascript:;" class="sort-link numeric">Niveau</a></th>
															<th class="iconCol"><a href="javascript:;" class="sort-link numeric">Race</a></th>
															<th class="iconCol"><a href="javascript:;" class="sort-link numeric">Classe</a></th>
															<th class="iconCol"><a href="javascript:;" class="sort-link numeric">Faction</a></th>
															<th><a href="javascript:;" class="sort-link numeric">Points d'arène</a></th>
														</tr>
													</thead>
													<?php
													/* Sélection de la base de données des personnages */
													$db = mysql_select_db ($array_db['db_characters'],$cxn);
													if (!$db) {
														die ('Erreur : ' . mysql_error());
													}
													$characters_arenaPoints = mysql_query("SELECT * FROM `characters` ORDER BY `arenaPoints` DESC LIMIT 0,10");
														
													if (mysql_num_rows($characters_arenaPoints) > 0)
													{													
														for($i = 0; $i < mysql_num_rows($characters_arenaPoints); $i++)
														{	
															$row_characters_arenaPoints = mysql_fetch_array($characters_arenaPoints);
														
															echo '
															<tbody>
																<tr class="row2">
																	<td><img src="style/images/icons/top/'.$top[$i].'.png"/></td>
																	<td class="table-link">
																		<a href="index.php?page=Armurerie&amp;guid='.$row_characters_arenaPoints['guid'].'" class="color-c'.$row_characters_arenaPoints['class'].'">
																			<span class="list-icon border-c'.$row_characters_arenaPoints['class'].'"><img src="style/images/2d/avatar/'.$row_characters_arenaPoints['race'].'-'.$row_characters_arenaPoints['gender'].'.jpg"/></span>
																			'.$row_characters_arenaPoints['name'].'
																		</a>
																	</td>
																	<td class="iconCol"><font color="darkred">'.$row_characters_arenaPoints['level'].'</font></td>
																	<td class="iconCol"><img src="style/images/icons/race/'.$row_characters_arenaPoints['race'].'-'.$row_characters_arenaPoints['gender'].'.gif"/></td>
																	<td class="iconCol"><img src="style/images/icons/class/'.$row_characters_arenaPoints['class'].'.gif"/></td>
																	<td class="iconCol"><img src="style/images/icons/faction/'.$faction[$row_characters_arenaPoints['race']].'.gif"/></td>
																	<td><font color="purple">'.$row_characters_arenaPoints['arenaPoints'].'</font></td>
																</tr>
															</tbody>';
														}
													}else
													{
														echo '
														<tbody>
															<tr class="row2">
																<td colspan="7" align="center">
																	<strong><font color="red">Il n\'y a pas de personnages disposant de plus d\'un point d\'arène !</font></strong>
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
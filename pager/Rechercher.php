<body class="fr-fr">
	<div id="wrapper">
		<?php include_once('includes/html/header/armurerie.html'); ?>
			<div id="content">
				<div class="content-top">
					<div class="content-trail">
						<ol class="ui-breadcrumb">
							<li>
								<a href="index.php?page=Accueil" rel="np">Accueil</a>
							</li>
							<li class="last">
								<a href="index.php?page=Rechercher" rel="np">Rechercher</a>
							</li>
						</ol>
					</div>
					<div class="content-bot">
						<?php
						if (isset($_POST['rechercher']))
						{
							echo '						
							<div id="search-results">
								<form action="index.php?page=Rechercher#search-results" method="post">
									<div id="search-again">
										Rechercher
										<div class="search-input">
											<input id="search-again-field" type="text" name="name" value=""/>
											<button class="ui-button button1" type="submit" name="rechercher">
												<span>
													<span>Rechercher</span>
												</span>
											</button>
										</div>
									</div>
								</form>
								<div id="results-interior" class="search">
									<table class="table" border="0" cellspacing="0" cellpadding="3" width="100%">
										<thead>
											<tr>
												<th><a href="javascript:;" class="sort-link"><span class="arrow">Nom</span></a></th>
												<th class="iconCol"><a href="javascript:;" class="sort-link numeric"><span class="arrow">Niveau</span></a></th>
												<th class="iconCol"><a href="javascript:;" class="sort-link numeric"><span class="arrow">Race</span></a></th>
												<th class="iconCol"><a href="javascript:;" class="sort-link numeric"><span class="arrow">Classe</span></a></th>
												<th class="iconCol"><a href="javascript:;" class="sort-link numeric"><span class="arrow">Faction</span></a></th>
												<th><a href="javascript:;" class="sort-link"><span class="arrow">Guilde</span></a></th>
												<th><a href="javascript:;" class="sort-link"><span class="arrow">Royaume</span></a></th>
												<th><a href="javascript:;" class="sort-link"><span class="arrow">Corps de bataille</span></a></th>
											</tr>
										</thead>';
										
										if (!empty($_POST['name']))
										{
											$name = mysql_real_escape_string(htmlentities($_POST['name']));
											
											/* Sélection de la base de données des personnages */
											$db = mysql_select_db ($array_db['db_characters'],$cxn);
											if (!$db) {
												die ('Erreur : ' . mysql_error());
											}
											$characters_name = mysql_query("SELECT * FROM `characters` WHERE `name` = '".$name."' LIMIT 1");
											$row_characters_name = mysql_fetch_array($characters_name);
											
											$guild_member_guid = mysql_query("SELECT * FROM `guild_member` WHERE `guid` = '".$row_characters_name['guid']."' LIMIT 1");
											$row_guild_member_guid = mysql_fetch_array($guild_member_guid);
											$guild_guildid = mysql_query("SELECT * FROM `guild` WHERE `guildid` = '".$row_guild_member_guid['guildid']."' LIMIT 1");
											$row_guild_guildid = mysql_fetch_array($guild_guildid);
											
											if (mysql_num_rows($characters_name) > 0)
											{
												for($i = 0; $i < mysql_num_rows($characters_name); $i++)
												{		
													echo '
													<tbody>
														<tr class="row2">
															<td class="table-link">
																<a href="index.php?page=Armurerie&amp;guid='.$row_characters_name['guid'].'" class="color-c'.$row_characters_name['class'].'">
																	<span class="list-icon border-c'.$row_characters_name['class'].'"><img src="http://eu.battle.net/wow/static/images/2d/avatar/'.$row_characters_name['race'].'-'.$row_characters_name['gender'].'.jpg"/></span>
																	'.$row_characters_name['name'].'
																</a>
															</td>
															<td class="iconCol">'.$row_characters_name['level'].'</td>
															<td class="iconCol"><img src="style/images/icons/race/'.$row_characters_name['race'].'-'.$row_characters_name['gender'].'.gif" /></td>
															<td class="iconCol"><img src="style/images/icons/class/'.$row_characters_name['class'].'.gif" /></td>
															<td class="iconCol"><img src="style/images/icons/faction/'.$faction[$row_characters_name['race']].'.gif" /></td>
															<td>'.$row_guild_guildid['name'].'</td>
															<td>'.$royaume['name'].'</td>
															<td></td>
														</tr>
													</tbody>';
												}
											}else
											{
												echo '
												<tr>
													<td colspan="8" align="center">
														<strong><font color="red">Votre recherche n\'a donné aucun résultat pour le nom "'.$name.'" !</font></strong>
													</td>
												</tr>';
											}
										}
								echo '</table>
								</div>
							</div>';
						}else
						{
							echo '
							<div id="search-results">
								<form action="index.php?page=Rechercher#search-results" method="post">
									<div id="search-again">
										Rechercher
										<div class="search-input">
											<input id="search-again-field" type="text" name="name" value=""/>
											<button class="ui-button button1" type="submit" name="rechercher">
												<span>
													<span>Rechercher</span>
												</span>
											</button>
										</div>
									</div>
								</form>
							</div>';
						}
						?>
					</div>
				</div>
			</div>';
		<?php include_once('includes/html/footer.html'); ?>
		<?php include_once('includes/html/service.html'); ?>
	</div>
</body>
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
														<a>Liste des comptes</a>
													</h3>
												</div>
												<?php
												if (isset($_GET['modif']))
												{
													echo '
													<div class="news-article">	
														<form action="index.php?page=Comptes" method="post">
															<div id="search-again">
																Chercher un compte - <a href="index.php?page=Comptes">Retour à la liste complète des comptes</a>
																<div class="search-input">
																	<div align="center">
																		<input id="search-again-field" type="text" name="username" value=""/>
																		<button class="ui-button button1" type="submit" name="chercher">
																			<span>
																				<span>Chercher</span>
																			</span>
																		</button>
																	</div>
																</div>
															</div>
														</form>
													</div>';
													
													$id = mysql_real_escape_string($_GET['modif']);
													
													/* Sélection de la base de données des comptes */
													$db = mysql_select_db ($array_db['db_realmd'],$cxn);
													if (!$db) {
														die ('Erreur : ' . mysql_error());
													}
													$account_id = mysql_query("SELECT * FROM `account` WHERE `id` = '".$id."' LIMIT 1");
													$row_account_id = mysql_fetch_array($account_id);
													
													/* Sélection de la base de données du site */
													$db = mysql_select_db ($array_db['db_site'],$cxn);
													if (!$db) {
														die ('Erreur : ' . mysql_error());
													}
													$voting_points_id = mysql_query("SELECT * FROM `voting_points` WHERE `id` = '".$id."' LIMIT 1");
													$row_voting_points_id = mysql_fetch_array($voting_points_id);
													
													if (mysql_num_rows($account_id) > 0)
													{
														if(isset($_POST['modif_password']))
														{
															if(!empty($_POST['password']) )
															{
																$login = mysql_real_escape_string(htmlentities($row_account_id['username']));
																$password = mysql_real_escape_string(htmlentities($_POST['password']));
																
																/* Sélection de la base de données des comptes */
																$db = mysql_select_db ($array_db['db_realmd'],$cxn);
																if (!$db) {
																	die ('Erreur : ' . mysql_error());
																}
																mysql_query("UPDATE `account` SET `sha_pass_hash` = SHA1(CONCAT(UPPER('".$login."'),':',UPPER('".$password."'))) WHERE `id`= '".$id."'");
																
																echo '
																<script language="javascript"> 
																	alert("Mot de passe changé avec succès !");
																	document.location.href="index.php?page=Comptes&modif='.$id.'" 
																</script>';
															}
														}
														elseif(isset($_POST['modif_mail']))
														{
															if(!empty($_POST['mail']) )
															{
																$mail = mysql_real_escape_string(htmlentities($_POST['mail']));
																
																/* Sélection de la base de données des comptes */
																$db = mysql_select_db ($array_db['db_realmd'],$cxn);
																if (!$db) {
																	die ('Erreur : ' . mysql_error());
																}
																mysql_query("UPDATE `account` SET `email` = '".$mail."' WHERE `id` = '".$id."'");
																
																echo '
																<script language="javascript"> 
																	alert("Adresse mail changée avec succès !");
																	document.location.href="index.php?page=Comptes&modif='.$id.'" 
																</script>';
															}
														}
														elseif(isset($_POST['ajout_points']))
														{
															if(!empty($_POST['a_points']))
															{
																$a_points = mysql_real_escape_string($_POST['a_points']);
																$ajout_points = ($row_voting_points_id['points'] + $a_points);
																
																/* Sélection de la base de données du site */
																$db = mysql_select_db ($array_db['db_site'],$cxn);
																if (!$db) {
																	die ('Erreur : ' . mysql_error());
																}
																mysql_query("UPDATE `voting_points` SET `points` = '".$ajout_points."' WHERE `id` = '".$id."'");
																
																echo '
																<script language="javascript"> 
																	alert("Points ajoutés avec succès !");
																	document.location.href="index.php?page=Comptes&modif='.$id.'" 
																</script>';
															}
														}
														elseif(isset($_POST['suppr_points']))
														{
															if(!empty($_POST['s_points']))
															{
																$s_points = mysql_real_escape_string($_POST['s_points']);
																$suppr_points = ($row_voting_points_id['points'] - $s_points);
																
																/* Sélection de la base de données du site */
																$db = mysql_select_db ($array_db['db_site'],$cxn);
																if (!$db) {
																	die ('Erreur : ' . mysql_error());
																}
																mysql_query("UPDATE `voting_points` SET `points` = '".$suppr_points."' WHERE `id` = '".$id."'");
																
																echo '
																<script language="javascript"> 
																	alert("Points enlevés avec succès !");
																	document.location.href="index.php?page=Comptes&modif='.$id.'" 
																</script>';
															}
														}
														elseif(isset($_GET['suppr_perso']))
														{
															$suppr_perso = mysql_real_escape_string($_GET['suppr_perso']);
																
															/* Sélection de la base de données des personnages */
															$db = mysql_select_db ($array_db['db_characters'],$cxn);
															if (!$db) {
																die ('Erreur : ' . mysql_error());
															}
															$characters_account_guid = mysql_query("SELECT * FROM `characters` WHERE `account` = ".$id." AND `guid` = '".$suppr_perso."' LIMIT 1");
															
															if(mysql_num_rows($characters_account_guid) > 0)
															{
																mysql_query("DELETE FROM `characters` WHERE `guid` = '".$suppr_perso."'");
																	
																echo '
																<script language="javascript"> 
																	alert("Personnage supprimé de ce compte avec succès !");
																	document.location.href="index.php?page=Comptes&modif='.$id.'" 
																</script>';
															}else
															{
																echo '
																<script language="javascript"> 
																	alert("Ce personnage n\'appartient pas à ce compte !");
																	document.location.href="index.php?page=Comptes&modif='.$id.'" 
																</script>';
															}
														}else
														{
															echo '
															<div class="news-article">
																<font size="3"><strong><a>Informations sur le compte</a></strong></font>
																<br />
																<p><font color="white">Nom de compte :</font> '.$row_account_id['username'].'</p>
																<p><font color="white">Adresse email :</font> '.$row_account_id['email'].'</p>
																<p><font color="white">Points de vote :</font> '.$row_voting_points_id['points'].'</p>
															</div>
															<div class="news-article">
																<font size="3"><strong><a>Gestion de compte</a></strong></font>
																<br />
																<form action="index.php?page=Comptes&amp;modif='.$id.'" method="post">
																	<p><font color="white">Nouveau mot de passe :</font> <input type="password" name="password"> <button class="ui-button button1" type="submit" name="modif_password"><span><span>Changer</span></span></button></p>
																	<p><font color="white">Nouvelle adresse mail :</font> <input type="text" name="mail"> <button class="ui-button button1" type="submit" name="modif_mail"><span><span>Changer</span></span></button></p>
																</form>
															</div>
															<div class="news-article">
																<font size="3"><strong><a>Gestion des points de vote</a></strong></font>
																<br />
																<form action="index.php?page=Comptes&amp;modif='.$id.'" method="post">
																	<p><font color="white">Ajouter des points :</font> <input type="text" name="a_points"> <button class="ui-button button1" type="submit" name="ajout_points"><span><span>Ajouter</span></span></button></p>
																	<p><font color="white">Enlever des points :</font> <input type="text" name="s_points"> <button class="ui-button button1" type="submit" name="suppr_points"><span><span>Enlever</span></span></button></p>
																</form>
															</div>
															<div class="news-article">
																<font size="3"><strong><a>Gestion des personnages</a></strong></font>
																<br /><br />
																<table class="table" border="0" cellspacing="0" cellpadding="3" width="100%">
																	<thead>
																		<tr>
																			<th><a href="javascript:;" class="sort-link">Nom du personnage</a></th>
																			<th class="iconCol"><a href="javascript:;" class="sort-link numeric">Niveau</a></th>
																			<th class="iconCol"><a href="javascript:;" class="sort-link numeric">Race</a></th>
																			<th class="iconCol"><a href="javascript:;" class="sort-link numeric">Classe</a></th>
																			<th class="iconCol"><a href="javascript:;" class="sort-link numeric">Faction</a></th>
																			<th class="iconCol"><a href="javascript:;" class="sort-link numeric">Supprimer</a></th>
																		</tr>
																	</thead>';
																	/* Sélection de la base de données des personnages */
																	$db = mysql_select_db ($array_db['db_characters'],$cxn);
																	if (!$db) {
																		die ('Erreur : ' . mysql_error());
																	}
																	$characters_account = mysql_query("SELECT * FROM `characters` WHERE `account` = ".$id." ORDER BY `name` ASC LIMIT 0,10");
																	
																	if (mysql_num_rows($characters_account) > 0)
																	{
																		for($i = 0; $i < mysql_num_rows($characters_account); $i++)
																		{
																			$row_characters_account = mysql_fetch_array($characters_account);
																															
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
																					<td class="iconCol"><a href="index.php?page=Comptes&amp;modif='.$id.'&amp;suppr_perso='.$row_characters_account['guid'].'"><img src="style/images/icons/admin/supprimer.png"/></a></td>
																				</tr>
																			</tbody>';
																		}
																	}else
																	{
																		echo '
																		<tbody>
																			<tr class="row2" align="center">
																				<td colspan="6">
																					<strong><font color="red">Ce compte n\'a pas de personnages !</font></strong>
																				</td>
																			</tr>
																		</tbody>';
																	}
																echo '</table>
															</div>';
														}
													}
												}
												elseif (isset($_GET['suppr']))
												{
													$id = mysql_real_escape_string($_GET['suppr']);
													
													/* Sélection de la base de données des comptes */
													$db = mysql_select_db ($array_db['db_realmd'],$cxn);
													if (!$db) {
														die ('Erreur : ' . mysql_error());
													}
													mysql_query("DELETE FROM `account` WHERE `id` = '".$id."'");
													echo '
													<script language="javascript"> 
														alert("Compte supprimé avec succès !");
														document.location.href="index.php?page=Comptes" 
													</script>';
												}
												elseif (isset($_POST['chercher']))
												{
													echo '
													<div class="news-article">	
														<form action="index.php?page=Comptes" method="post">
															<div id="search-again">
																Chercher un compte - <a href="index.php?page=Comptes">Retour à la liste complète des comptes</a>
																<div class="search-input">
																	<div align="center">
																		<input id="search-again-field" type="text" name="username" value=""/>
																		<button class="ui-button button1" type="submit" name="chercher">
																			<span>
																				<span>Chercher</span>
																			</span>
																		</button>
																	</div>
																</div>
															</div>
														</form>
													</div>';
													
													if (!empty($_POST['username']))
													{
														$username = mysql_real_escape_string(htmlentities($_POST['username']));
													
														/* Sélection de la base de données des comptes */
														$db = mysql_select_db ($array_db['db_realmd'],$cxn);
														if (!$db) {
															die ('Erreur : ' . mysql_error());
														}
														$account_username = mysql_query("SELECT * FROM `account` WHERE `username` = '".$username."' LIMIT 1");
														
														$gmlevel = array(0=> "Joueur",1=> "Modérateur",2=> "Maître de jeu",3=> "Administrateur");
														$expansion = array(0=> "WoW : Classique",1=> "WoW : The Burning Crusade",2=> "WoW : Wrath of the Lich King",3=> "WoW : Cataclysm");	
														
														if (mysql_num_rows($account_username) > 0)
														{
															echo '
															<div class="news-article" align="center">
																<table class="table" border="0" cellspacing="0" cellpadding="3" width="100%">
																	<thead>
																		<tr>
																			<th><a href="javascript:;" class="sort-link">Nom du compte</a></th>
																			<th class="iconCol"><a href="javascript:;" class="sort-link numeric">Niveau</a></th>
																			<th><a href="javascript:;" class="sort-link numeric">Extension</a></th>
																			<th class="iconCol"><a href="javascript:;" class="sort-link numeric">Modifier</a></th>
																			<th class="iconCol"><a href="javascript:;" class="sort-link numeric">Supprimer</a></th>
																		</tr>
																	</thead>';
																	for($i = 0; $i < mysql_num_rows($account_username); $i++)
																	{
																		$row_account_username = mysql_fetch_array($account_username);

																		echo '
																		<tbody>
																			<tr class="row2">
																				<td><font color="darkgreen">'.$row_account_username['username'].'</font></td>
																				<td class="iconCol"><font color="darkred">'.$gmlevel[$row_account_username['gmlevel']].'</font></td>
																				<td class="color-exp'.$row_account_username['expansion'].'">'.$expansion[$row_account_username['expansion']].'</td>
																				<td class="iconCol"><a href="index.php?page=Comptes&amp;modif='.$row_account_username['id'].'"><img src="style/images/icons/admin/modifier.png"/></a></td>
																				<td class="iconCol"><a href="index.php?page=Comptes&amp;suppr='.$row_account_username['id'].'"><img src="style/images/icons/admin/supprimer.png"/></a></td>
																			</tr>
																		</tbody>';
																	}
																echo '</table>
															</div>';
														}else
														{
															echo '
															<script language="javascript"> 
																alert("Erreur : Ce compte n\'existe pas !");
																document.location.href="index.php?page=Comptes" 
															</script>';
														}
													}else
													{
														echo '
														<script language="javascript"> 
															alert("Erreur : Tous les champs ne sont pas remplis !");
															document.location.href="index.php?page=Comptes" 
														</script>';
													}
												}else
												{
													echo '
													<div class="news-article">	
														<form action="index.php?page=Comptes" method="post">
															<div id="search-again">
																Chercher un compte
																<div class="search-input">
																	<div align="center">
																		<input id="search-again-field" type="text" name="username" value=""/>
																		<button class="ui-button button1" type="submit" name="chercher">
																			<span>
																				<span>Chercher</span>
																			</span>
																		</button>
																	</div>
																</div>
															</div>
														</form>
													</div>
													<div class="news-article" align="center">
														<table class="table" border="0" cellspacing="0" cellpadding="3" width="100%">
															<thead>
																<tr>
																	<th><a href="javascript:;" class="sort-link">Nom du compte</a></th>
																	<th class="iconCol"><a href="javascript:;" class="sort-link numeric">Niveau</a></th>
																	<th><a href="javascript:;" class="sort-link numeric">Extension</a></th>
																	<th class="iconCol"><a href="javascript:;" class="sort-link numeric">Modifier</a></th>
																	<th class="iconCol"><a href="javascript:;" class="sort-link numeric">Supprimer</a></th>
																</tr>
															</thead>';
															
															/* Sélection de la base de données des comptes */
															$db = mysql_select_db ($array_db['db_realmd'],$cxn);
															if (!$db) {
																die ('Erreur : ' . mysql_error());
															}
															$account = mysql_query("SELECT * FROM `account` ORDER BY `username` ASC");
															
															$gmlevel = array(0=> "Joueur",1=> "Modérateur",2=> "Maître de jeu",3=> "Administrateur");
															$expansion = array(0=> "WoW : Classique",1=> "WoW : The Burning Crusade",2=> "WoW : Wrath of the Lich King",3=> "WoW : Cataclysm");	
															
															if (mysql_num_rows($account) > 0)
															{
																for($i = 0; $i < mysql_num_rows($account); $i++)
																{
																	$row_account = mysql_fetch_array($account);

																	echo '
																	<tbody>
																		<tr class="row2">
																			<td><font color="darkgreen">'.$row_account['username'].'</font></td>
																			<td class="iconCol"><font color="darkred">'.$gmlevel[$row_account['gmlevel']].'</font></td>
																			<td class="color-exp'.$row_account['expansion'].'">'.$expansion[$row_account['expansion']].'</td>
																			<td class="iconCol"><a href="index.php?page=Comptes&amp;modif='.$row_account['id'].'"><img src="style/images/icons/admin/modifier.png"/></a></td>
																			<td class="iconCol"><a href="index.php?page=Comptes&amp;suppr='.$row_account['id'].'"><img src="style/images/icons/admin/supprimer.png"/></a></td>
																		</tr>
																	</tbody>';
																}
															}else
															{
																echo '
																<tbody>
																	<tr class="row2" align="center">
																		<td colspan="4">
																			<strong><font color="red">Il n\'y a pas de comptes !</font></strong>
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
						<?php include_once('includes/html/right.html'); ?>
					</div>
				</div>
			</div>
		</div>
		<?php include_once('includes/html/footer.html'); ?>
		<?php include_once('includes/html/service.html'); ?>
	</div>
</body>
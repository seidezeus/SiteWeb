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
														<a>Liste des comptes BAN</a>
													</h3>
												</div>
												<div class="news-article" align="center">
													<table class="table" border="0" cellspacing="0" cellpadding="3" width="100%">
														<thead>
															<tr>
																<th><a href="javascript:;" class="sort-link">Nom du compte</a></th>
																<th><a href="javascript:;" class="sort-link numeric">BAN le</a></th>
																<th><a href="javascript:;" class="sort-link numeric">Expire le</a></th>
																<th><a href="javascript:;" class="sort-link numeric">BAN par</a></th>
															</tr>
														</thead>
														<?php
														/* Sélection de la base de données des comptes */
														$db = mysql_select_db ($array_db['db_realmd'],$cxn);
														if (!$db) {
															die ('Erreur : ' . mysql_error());
														}
														$account_banned_active = mysql_query("SELECT * FROM `account_banned` WHERE `active` = 1 ORDER BY `bandate` DESC");	
														
														if (mysql_num_rows($account_banned_active) > 0)
														{
															for($i = 0; $i < mysql_num_rows($account_banned_active); $i++)
															{
																$row_account_banned_active = mysql_fetch_array($account_banned_active);
																$id = $row_account_banned_active['id'];
																$user = mysql_query("SELECT * FROM `account` WHERE `id` = '".$id."' LIMIT 1");
																$row_user = mysql_fetch_array($user);
																$user_id = $row_user['username'];
																$bandate = date("H:i:s d.m.Y", $row_account_banned_active['bandate']);
																$unbandate = date("H:i:s d.m.Y", $row_account_banned_active['unbandate']);

																echo '
																<tbody>
																	<tr class="row2">
																		<td><font color="#D400FF">'.$user_id.'</font></td>
																		<td><font color="#FE0000">'.$bandate.'</font></td>
																		<td><font color="#419F2E">'.$unbandate.'</font></td>
																		<td><font color="#01B0F0">'.$row_account_banned_active['bannedby'].'</font></td>
																	</tr>
																</tbody>';
															}
														}else
														{
															echo '
															<tbody>
																<tr class="row2" align="center">
																	<td colspan="4">
																		<strong><font color="red">Il n\'y a pas de comptes BAN !</font></strong>
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
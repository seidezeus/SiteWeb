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
													<a>D�bloquer un personnage</a>
												</h3>
											</div>
											<?php
											if (isset($_POST['debloquer']))
											{
												if(!empty($_POST['name']))
												{
													$name = mysql_real_escape_string(htmlentities($_POST['name']));
																									
													/* S�lection de la base de donn�es des personnages */
													$db = mysql_select_db ($array_db['db_characters'],$cxn);
													if (!$db) {
														die ('Erreur : ' . mysql_error());
													}
													$characters_name = mysql_query("SELECT * FROM `characters` WHERE `name` = '".$name."' LIMIT 1");
													$row_characters_name = mysql_fetch_array($characters_name);
													
													$character_homebind_guid = mysql_query("SELECT * FROM `character_homebind` WHERE `guid` = '".$row_characters_name['guid']."'");
													$row_character_homebind_guid = mysql_fetch_array($character_homebind_guid);
													$coordon�e = array(
														"map" => $row_character_homebind_guid['map'],
														"zone" => $row_character_homebind_guid['zone'],
														"position_x" => $row_character_homebind_guid['position_x'],
														"position_y" => $row_character_homebind_guid['position_y'],
														"position_z" => $row_character_homebind_guid['position_z']);
																										
													mysql_query("UPDATE `characters` SET `map` = '".$coordon�e['map']."', `zone` = '".$coordon�e['zone']."', `position_x` = '".$coordon�e['position_x']."', `position_y` = '".$coordon�e['position_y']."', `position_z` = '".$coordon�e['position_z']."', `trans_x` = 0, `trans_y` = 0, `trans_z` = 0, `trans_o` = 0, `transguid` = 0  WHERE `guid` = '".$row_characters_name['guid']."'");
													
													echo '
													<script language="javascript"> 
														alert("Personnage d�bloqu� avec succ�s !");
														document.location.href="index.php?page=Gestion" 
													</script>';
												}else
												{
													echo '
													<script language="javascript"> 
														alert("Erreur : Vous n\'avez pas s�lectionner de personnage !");
														document.location.href="index.php?page=Debloquer" 
													</script>';
												}
											}else
											{
												echo '
												<div class="news-article" align="center">
													<form action="index.php?page=Debloquer" method="post">
														Personnage � d�bloquer :<br />';

														$characters_account = mysql_query("SELECT * FROM `characters` WHERE `account` = ".mysql_real_escape_string($_SESSION['id'])." ORDER BY `name` ASC LIMIT 0,10");
																
														if (mysql_num_rows($characters_account) > 0)
														{
															echo '
															<select name="name">
																<optgroup label="Mes personnages"></optgroup>';
																for($i = 0; $i < mysql_num_rows($characters_account); $i++)
																{
																	$row_characters_account = mysql_fetch_array($characters_account);
																															
																	echo '<option>'.$row_characters_account['name'].'</option>';
																}
															echo '
															</select>';
														}else
														{
															echo '<strong><font color="red">Vous n\'avez pas de personnages !</font></strong>';
														}
														echo '
														<br /><br />
														<button class="ui-button button1" type="submit" name="debloquer">
															<span>
																<span>D�bloquer</span>
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
										echo '<font color="red">Vous devez �tre connect� pour acc�der � cette page !</font></p>';
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
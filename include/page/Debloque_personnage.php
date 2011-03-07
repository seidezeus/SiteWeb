<?php
									if(isset($_SESSION['id']))
									{
									?>
											<?php
											if (isset($_POST['action']))
											{
												if(!empty($_POST['name']))
												{
													$name = mysql_real_escape_string(htmlentities($_POST['name']));
																									
													/* Sélection de la base de données des personnages */
													$db = mysql_select_db ($array_db['db_characters'],$cxn);
													if (!$db) {
														die ('Erreur : ' . mysql_error());
													}
													$characters_name = mysql_query("SELECT * FROM `characters` WHERE `name` = '".$name."' LIMIT 1");
													$row_characters_name = mysql_fetch_array($characters_name);
													
													$character_homebind_guid = mysql_query("SELECT * FROM `character_homebind` WHERE `guid` = '".$row_characters_name['guid']."'");
													$row_character_homebind_guid = mysql_fetch_array($character_homebind_guid);
													$coordonée = array(
														"map" => $row_character_homebind_guid['map'],
														"zone" => $row_character_homebind_guid['zone'],
														"position_x" => $row_character_homebind_guid['position_x'],
														"position_y" => $row_character_homebind_guid['position_y'],
														"position_z" => $row_character_homebind_guid['position_z']);
																										
													mysql_query("UPDATE `characters` SET `map` = '".$coordonée['map']."', `zone` = '".$coordonée['zone']."', `position_x` = '".$coordonée['position_x']."', `position_y` = '".$coordonée['position_y']."', `position_z` = '".$coordonée['position_z']."', `trans_x` = 0, `trans_y` = 0, `trans_z` = 0, `trans_o` = 0, `transguid` = 0  WHERE `guid` = '".$row_characters_name['guid']."'");
													
													echo '
													<script language="javascript"> 
														alert("Personnage débloqué avec succès !");
														document.location.href="?page=Compte" 
													</script>';
												}else
												{
													echo '
													<script language="javascript"> 
														alert("Erreur : Vous n\'avez pas sélectionner de personnage !");
														document.location.href="?page=Debloque_personnage" 
													</script>';
												}
											}else
											{
												echo '
												<div class="news-article" >
													<form action="?page=Debloque_personnage" method="post">
														Personnage à débloquer :';
													$db = mysql_select_db ($array_db['db_characters'],$cxn);
													if (!$db) {
														die ('Erreur : ' . mysql_error());
													}

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
														<input type="submit" name="action" value="Debloquer" class="button doit" /></center> 
													</form>	
												</div>';
											}
											?>
										</div>
									<?php
									}else
									{
										echo '<font color="red">Vous devez être connecté pour accéder à cette page !</font></p>';
									}
									?>
</div></td> 
</tr> 
		</tbody></table> 

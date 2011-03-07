<div class="post2"> 
   <div class="post_header2" align="left">Changer d'adresse mail</div> 
   <div class="post_body2" align="left"> 
<?php
									if(isset($_SESSION['id']))
									{
									?>
											<?php
											if (isset($_POST['mail1']))
											{	
												$mail1 = mysql_real_escape_string(htmlentities($_POST['mail1']));
												$mail2 = mysql_real_escape_string(htmlentities($_POST['mail2']));
												$mail3 = mysql_real_escape_string(htmlentities($_POST['mail3']));
												
												if(!empty($mail1) && !empty($mail2) && !empty($mail3))
												{													
													if ($mail1 == $_SESSION['mail'])
													{
														if($mail2 == $mail3)
														{
															/* Sélection de la base de données des comptes */
															$db = mysql_select_db ($array_db['db_realmd'],$cxn);
															if (!$db) {
																die ('Erreur : ' . mysql_error());
															}
															mysql_query("UPDATE `account` SET `email` = '".$mail3."' WHERE `id` = '".$_SESSION['id']."'");
															
															echo '
															<script language="javascript"> 
																alert("Adresse mail changée avec succès !");
																document.location.href="?page=Compte" 
															</script>';
														}else
														{
															echo '
															<script language="javascript"> 
																alert("Erreur : Les deux adresses mail ne sont pas identique !");
																document.location.href="?page=Changer_Adresse_Mail" 
															</script>';
														}
													}else
													{
														echo '
														<script language="javascript"> 
															alert("Erreur : Votre ancienne adresse mail est mauvaise !");
															document.location.href="?page=Changer_Adresse_Mail" 
														</script>';
													}
												}else
												{
													echo '
													<script language="javascript"> 
														alert("Erreur : Tous les champs ne sont pas remplis !");
														document.location.href="?page=Changer_Adresse_Mail" 
													</script>';
												}
											}else
											{
												echo '
												<div class="news-article">
													<form action="?page=Changer_Adresse_Mail" method="post">
														Ancienne adresse mail :<br />
														<input type="text" name="mail1">
														<br /><br />
														Nouvelle adresse mail :<br />
														<input type="text" name="mail2">
														<br /><br />
														Confirmation :<br />
														<input type="text" name="mail3">
														<br /><br />
														<input type="submit" name="action" value="Changer" class="button doit" />
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

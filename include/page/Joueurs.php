<?php
function faction($race)
{
    $alliance = '1 3 4 7 11';
                
    $data = explode(' ', $alliance);
    return in_array($race, $data);
}
if(isset($_SESSION['id'])) {
?>

<div class="post2"> 
	<div class="post_header2" align="left">Joueurs en lignes</div> 
	<div class="post_body2" align="left">	

<center><table class="table" border="0" cellspacing="0" cellpadding="3">
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

$faction_fonction = faction($row_characters_online['race']);

if($faction_fonction == 1) {
	$faction = "Alliance";
}
else {
	$faction = "Horde";
}
																										
														echo '
														<tbody>
															<tr class="row2">
																<td class="table-link">
																	<a href="javascript:;" class="color-c'.$row_characters_online['class'].'">
																		<span class="list-icon border-c'.$row_characters_online['class'].'"><img src="styles/default/images/2d/avatar/'.$row_characters_online['race'].'-'.$row_characters_online['gender'].'.jpg"/></span>
																		'.$row_characters_online['name'].'
																	</a>
																</td>
																<td class="iconCol"><font color="darkgreen">'.$row_characters_online['level'].'</font></td>
																<td class="iconCol"><img src="styles/default/images/icons/race/'.$row_characters_online['race'].'-'.$row_characters_online['gender'].'.gif"/></td>
																<td class="iconCol"><img src="styles/default/images/icons/class/'.$row_characters_online['class'].'.gif"/></td>
																<td class="iconCol"><img src="styles/default/images/icons/faction/'.$faction.'.gif"/></td>
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
													</tbody></center>';
												}
												?>
											</table></center>

</div>
</div>
<?php
}
else {
?>
<script type="text/javascript">
	alert('Connectez-vous pour acceder à cette page !');
	document.location.href="?pahe=Accueil"
</script>
<?php
}
?>

<?php
$guid = mysql_real_escape_string($_GET['guid']);

/* Sélection de la base de données des personnages */
$db = mysql_select_db ($array_db['db_characters'],$cxn);
if(!$db) {
	die ('Erreur : ' . mysql_error());
}
$characters_guid = mysql_query("SELECT * FROM `characters` WHERE `guid` = '".$guid."' LIMIT 1");
$row_characters_guid = mysql_fetch_array($characters_guid);

$name = htmlentities($row_characters_guid['name']);

if(mysql_num_rows($characters_guid) > 0)
{
	require_once ('includes/classes/class.armurerie.php');

	echo '
	<style type="text/css">
	#content .content-top { background: url("style/images/character/summary/backgrounds/race/'.$row_characters_guid['race'].'.jpg") left top no-repeat; }
	.profile-wrapper { background-image: url("style/images/2d/profilemain/race/'.$row_characters_guid['race'].'-'.$row_characters_guid['gender'].'.jpg"); }
	</style>
	<body class="fr-fr logged-in">
		<div id="wrapper">';
			include_once('includes/html/header/armurerie.html');
				echo '
				<div id="content">
					<div class="content-top">
						<div class="content-trail">
							<ol class="ui-breadcrumb">
								<li>
									<a href="index.php?page=Accueil" rel="np">Accueil</a>
								</li>
								<li class="last">
									<a href="index.php?page=Armurerie&amp;guid='.$guid.'" rel="np">'.$name.' @ '.$royaume['name'].'</a>
								</li>
							</ol>
						</div>
						<div class="content-bot">
							<div id="profile-wrapper" class="profile-wrapper profile-wrapper-'.$faction[$row_characters_guid['race']].' profile-wrapper-light">
								<div class="profile-sidebar-anchor">
									<div class="profile-sidebar-outer">
										<div class="profile-sidebar-inner">
											<div class="profile-sidebar-contents">
												<div class="profile-info-anchor">
													<div class="profile-info">
														<div class="name"><a rel="np">'.$name.'</a></div>
														<div class="title-guild">
															<div class="title">&#160;</div>';
															if(mysql_num_rows($guild_member_guid) > 0)
															{
																echo '
																<div class="guild">
																	<a>'.$row_guild_guildid['name'].'</a>
																</div>';
															}else
															{
																echo '
																<div class="guild">
																	<a></a>
																</div>';
															}
														echo '
														</div>
														<span class="clear"><!-- --></span>
														<div class="under-name color-c'.$row_characters_guid['class'].'">
															<a class="race">'.$race[$row_characters_guid['race']].'</a> <a class="class">'.$class[$row_characters_guid['class']].'</a> de niveau <span class="level"><strong>'.$row_characters_guid['level'].'</strong></span><span class="comma">,</span>
															<span class="realm tip" id="profile-info-realm">'.$royaume['name'].'</span>
														</div>
													</div>
												</div>
												<ul class="profile-sidebar-menu" id="profile-sidebar-menu">
													<li class="active">
														<a class="" rel="np"><span class="arrow"><span class="icon">Sommaire</span></span></a>
													</li>
												</ul>
											</div>
										</div>
									</div>
								</div>
								<div class="profile-contents">
									<div class="summary-top">
										<div class="summary-top-right">
											<ul class="profile-view-options" id="profile-view-options-summary"></ul>
											<div class="summary-averageilvl">
												<div class="rest"></div>
												<div id="summary-averageilvl-best" class="best tip" data-id="averageilvl"></div>
											</div>
										</div>
										<div class="summary-top-inventory">
											<div id="summary-inventory" class="summary-inventory summary-inventory-simple">';
												if(mysql_num_rows($slot0) > 0)
												{
													echo '
													<div class="slot slot-1 item-quality-'.$row_item_template_slot0['Quality'].'" style=" left: 0px; top: 0px;">
														<div class="slot-inner">
															<div class="slot-contents">
																	<a href="http://fr.wowhead.com/item='.$row_slot0['item_template'].'" class="item"><img src="http://eu.battle.net/wow-assets/static/images/icons/56/'.$row_icon_slot0['icon'].'.jpg" alt="" /><span class="frame"></span></a>
															</div>
														</div>
													</div>';
												}else
												{
													echo '	
													<div class="slot slot-1" style=" left: 0px; top: 0px;">
														<div class="slot-inner">
															<div class="slot-contents">
																	<a href="javascript:;" class="empty"><span class="frame"></span></a>
															</div>
														</div>
													</div>';
												}
												if(mysql_num_rows($slot1) > 0)
												{
													echo '
													<div class="slot slot-2 item-quality-'.$row_item_template_slot1['Quality'].'" style=" left: 0px; top: 58px;">
														<div class="slot-inner">
															<div class="slot-contents">
																	<a href="http://fr.wowhead.com/item='.$row_slot1['item_template'].'" class="item"><img src="http://eu.battle.net/wow-assets/static/images/icons/56/'.$row_icon_slot1['icon'].'.jpg" alt="" /><span class="frame"></span></a>
															</div>
														</div>
													</div>';
												}else
												{
													echo '	
													<div class="slot slot-2" style=" left: 0px; top: 58px;">
														<div class="slot-inner">
															<div class="slot-contents">
																	<a href="javascript:;" class="empty"><span class="frame"></span></a>
															</div>
														</div>
													</div>';
												}
												if(mysql_num_rows($slot2) > 0)
												{
													echo '
													<div class="slot slot-3 item-quality-'.$row_item_template_slot2['Quality'].'" style=" left: 0px; top: 116px;">
														<div class="slot-inner">
															<div class="slot-contents">
																	<a href="http://fr.wowhead.com/item='.$row_slot2['item_template'].'" class="item"><img src="http://eu.battle.net/wow-assets/static/images/icons/56/'.$row_icon_slot2['icon'].'.jpg" alt="" /><span class="frame"></span></a>
															</div>
														</div>
													</div>';
												}else
												{
													echo '	
													<div class="slot slot-3" style=" left: 0px; top: 116px;">
														<div class="slot-inner">
															<div class="slot-contents">
																	<a href="javascript:;" class="empty"><span class="frame"></span></a>
															</div>
														</div>
													</div>';
												}
												if(mysql_num_rows($slot14) > 0)
												{
													echo '
													<div class="slot slot-16 item-quality-'.$row_item_template_slot14['Quality'].'" style=" left: 0px; top: 174px;">
														<div class="slot-inner">
															<div class="slot-contents">
																	<a href="http://fr.wowhead.com/item='.$row_slot14['item_template'].'" class="item"><img src="http://eu.battle.net/wow-assets/static/images/icons/56/'.$row_icon_slot14['icon'].'.jpg" alt="" /><span class="frame"></span></a>
															</div>
														</div>
													</div>';
												}else
												{
													echo '	
													<div class="slot slot-16" style=" left: 0px; top: 174px;">
														<div class="slot-inner">
															<div class="slot-contents">
																	<a href="javascript:;" class="empty"><span class="frame"></span></a>
															</div>
														</div>
													</div>';
												}
												if(mysql_num_rows($slot4) > 0)
												{
													echo '
													<div class="slot slot-5 item-quality-'.$row_item_template_slot4['Quality'].'" style=" left: 0px; top: 232px;">
														<div class="slot-inner">
															<div class="slot-contents">
																	<a href="http://fr.wowhead.com/item='.$row_slot4['item_template'].'" class="item"><img src="http://eu.battle.net/wow-assets/static/images/icons/56/'.$row_icon_slot4['icon'].'.jpg" alt="" /><span class="frame"></span></a>
															</div>
														</div>
													</div>';
												}else
												{
													echo '	
													<div class="slot slot-5" style=" left: 0px; top: 232px;">
														<div class="slot-inner">
															<div class="slot-contents">
																	<a href="javascript:;" class="empty"><span class="frame"></span></a>
															</div>
														</div>
													</div>';
												}
												if(mysql_num_rows($slot3) > 0)
												{
													echo '
													<div class="slot slot-4 item-quality-'.$row_item_template_slot3['Quality'].'" style=" left: 0px; top: 290px;">
														<div class="slot-inner">
															<div class="slot-contents">
																	<a href="http://fr.wowhead.com/item='.$row_slot3['item_template'].'" class="item"><img src="http://eu.battle.net/wow-assets/static/images/icons/56/'.$row_icon_slot3['icon'].'.jpg" alt="" /><span class="frame"></span></a>
															</div>
														</div>
													</div>';
												}else
												{
													echo '	
													<div class="slot slot-4" style=" left: 0px; top: 290px;">
														<div class="slot-inner">
															<div class="slot-contents">
																	<a href="javascript:;" class="empty"><span class="frame"></span></a>
															</div>
														</div>
													</div>';
												}
												if(mysql_num_rows($slot18) > 0)
												{
													echo '
													<div class="slot slot-19 item-quality-'.$row_item_template_slot18['Quality'].'" style=" left: 0px; top: 348px;">
														<div class="slot-inner">
															<div class="slot-contents">
																	<a href="http://fr.wowhead.com/item='.$row_slot18['item_template'].'" class="item"><img src="http://eu.battle.net/wow-assets/static/images/icons/56/'.$row_icon_slot18['icon'].'.jpg" alt="" /><span class="frame"></span></a>
															</div>
														</div>
													</div>';
												}else
												{
													echo '	
													<div class="slot slot-19" style=" left: 0px; top: 348px;">
														<div class="slot-inner">
															<div class="slot-contents">
																	<a href="javascript:;" class="empty"><span class="frame"></span></a>
															</div>
														</div>
													</div>';
												}
												if(mysql_num_rows($slot8) > 0)
												{
													echo '
													<div class="slot slot-9 item-quality-'.$row_item_template_slot8['Quality'].'" style=" left: 0px; top: 406px;">
														<div class="slot-inner">
															<div class="slot-contents">
																	<a href="http://fr.wowhead.com/item='.$row_slot8['item_template'].'" class="item"><img src="http://eu.battle.net/wow-assets/static/images/icons/56/'.$row_icon_slot8['icon'].'.jpg" alt="" /><span class="frame"></span></a>
															</div>
														</div>
													</div>';
												}else
												{
													echo '	
													<div class="slot slot-9" style=" left: 0px; top: 406px;">
														<div class="slot-inner">
															<div class="slot-contents">
																	<a href="javascript:;" class="empty"><span class="frame"></span></a>
															</div>
														</div>
													</div>';
												}
												if(mysql_num_rows($slot9) > 0)
												{
													echo '
													<div class="slot slot-10 slot-align-right item-quality-'.$row_item_template_slot9['Quality'].'" style=" right: 0px; top: 0px;">
														<div class="slot-inner">
															<div class="slot-contents">
																	<a href="http://fr.wowhead.com/item='.$row_slot9['item_template'].'" class="item"><img src="http://eu.battle.net/wow-assets/static/images/icons/56/'.$row_icon_slot9['icon'].'.jpg" alt="" /><span class="frame"></span></a>
															</div>
														</div>
													</div>';
												}else
												{
													echo '	
													<div class="slot slot-10 slot-align-right" style=" right: 0px; top: 0px;">
														<div class="slot-inner">
															<div class="slot-contents">
																	<a href="javascript:;" class="empty"><span class="frame"></span></a>
															</div>
														</div>
													</div>';
												}
												if(mysql_num_rows($slot5) > 0)
												{
													echo '
													<div class="slot slot-6 slot-align-right item-quality-'.$row_item_template_slot5['Quality'].'" style=" right: 0px; top: 58px;">
														<div class="slot-inner">
															<div class="slot-contents">
																	<a href="http://fr.wowhead.com/item='.$row_slot5['item_template'].'" class="item"><img src="http://eu.battle.net/wow-assets/static/images/icons/56/'.$row_icon_slot5['icon'].'.jpg" alt="" /><span class="frame"></span></a>
															</div>
														</div>
													</div>';
												}else
												{
													echo '	
													<div class="slot slot-6 slot-align-right" style=" right: 0px; top: 58px;">
														<div class="slot-inner">
															<div class="slot-contents">
																	<a href="javascript:;" class="empty"><span class="frame"></span></a>
															</div>
														</div>
													</div>';
												}
												if(mysql_num_rows($slot6) > 0)
												{
													echo '
													<div class="slot slot-7 slot-align-right item-quality-'.$row_item_template_slot6['Quality'].'" style=" right: 0px; top: 116px;">
														<div class="slot-inner">
															<div class="slot-contents">
																	<a href="http://fr.wowhead.com/item='.$row_slot6['item_template'].'" class="item"><img src="http://eu.battle.net/wow-assets/static/images/icons/56/'.$row_icon_slot6['icon'].'.jpg" alt="" /><span class="frame"></span></a>
															</div>
														</div>
													</div>';
												}else
												{
													echo '	
													<div class="slot slot-7 slot-align-right" style=" right: 0px; top: 116px;">
														<div class="slot-inner">
															<div class="slot-contents">
																	<a href="javascript:;" class="empty"><span class="frame"></span></a>
															</div>
														</div>
													</div>';
												}
												if(mysql_num_rows($slot7) > 0)
												{
													echo '
													<div class="slot slot-8 slot-align-right item-quality-'.$row_item_template_slot7['Quality'].'" style=" right: 0px; top: 174px;">
														<div class="slot-inner">
															<div class="slot-contents">
																	<a href="http://fr.wowhead.com/item='.$row_slot7['item_template'].'" class="item"><img src="http://eu.battle.net/wow-assets/static/images/icons/56/'.$row_icon_slot7['icon'].'.jpg" alt="" /><span class="frame"></span></a>
															</div>
														</div>
													</div>';
												}else
												{
													echo '	
													<div class="slot slot-8 slot-align-right" style=" right: 0px; top: 174px;">
														<div class="slot-inner">
															<div class="slot-contents">
																	<a href="javascript:;" class="empty"><span class="frame"></span></a>
															</div>
														</div>
													</div>';
												}
												if(mysql_num_rows($slot10) > 0)
												{
													echo '
													<div class="slot slot-11 slot-align-right item-quality-'.$row_item_template_slot10['Quality'].'" style=" right: 0px; top: 232px;">
														<div class="slot-inner">
															<div class="slot-contents">
																	<a href="http://fr.wowhead.com/item='.$row_slot10['item_template'].'" class="item"><img src="http://eu.battle.net/wow-assets/static/images/icons/56/'.$row_icon_slot10['icon'].'.jpg" alt="" /><span class="frame"></span></a>
															</div>
														</div>
													</div>';
												}else
												{
													echo '	
													<div class="slot slot-11 slot-align-right" style=" right: 0px; top: 232px;">
														<div class="slot-inner">
															<div class="slot-contents">
																	<a href="javascript:;" class="empty"><span class="frame"></span></a>
															</div>
														</div>
													</div>';
												}
												if(mysql_num_rows($slot11) > 0)
												{
													echo '
													<div class="slot slot-11 slot-align-right item-quality-'.$row_item_template_slot11['Quality'].'" style=" right: 0px; top: 290px;">
														<div class="slot-inner">
															<div class="slot-contents">
																	<a href="http://fr.wowhead.com/item='.$row_slot11['item_template'].'" class="item"><img src="http://eu.battle.net/wow-assets/static/images/icons/56/'.$row_icon_slot11['icon'].'.jpg" alt="" /><span class="frame"></span></a>
															</div>
														</div>
													</div>';
												}else
												{
													echo '	
													<div class="slot slot-11 slot-align-right" style=" right: 0px; top: 290px;">
														<div class="slot-inner">
															<div class="slot-contents">
																	<a href="javascript:;" class="empty"><span class="frame"></span></a>
															</div>
														</div>
													</div>';
												}
												if(mysql_num_rows($slot12) > 0)
												{
													echo '
													<div class="slot slot-12 slot-align-right item-quality-'.$row_item_template_slot12['Quality'].'" style=" right: 0px; top: 348px;">
														<div class="slot-inner">
															<div class="slot-contents">
																	<a href="http://fr.wowhead.com/item='.$row_slot12['item_template'].'" class="item"><img src="http://eu.battle.net/wow-assets/static/images/icons/56/'.$row_icon_slot12['icon'].'.jpg" alt="" /><span class="frame"></span></a>
															</div>
														</div>
													</div>';
												}else
												{
													echo '	
													<div class="slot slot-12 slot-align-right" style=" right: 0px; top: 348px;">
														<div class="slot-inner">
															<div class="slot-contents">
																	<a href="javascript:;" class="empty"><span class="frame"></span></a>
															</div>
														</div>
													</div>';
												}
												if(mysql_num_rows($slot13) > 0)
												{
													echo '
													<div class="slot slot-12 slot-align-right item-quality-'.$row_item_template_slot13['Quality'].'" style=" right: 0px; top: 406px;">
														<div class="slot-inner">
															<div class="slot-contents">
																	<a href="http://fr.wowhead.com/item='.$row_slot13['item_template'].'" class="item"><img src="http://eu.battle.net/wow-assets/static/images/icons/56/'.$row_icon_slot13['icon'].'.jpg" alt="" /><span class="frame"></span></a>
															</div>
														</div>
													</div>';
												}else
												{
													echo '	
													<div class="slot slot-12 slot-align-right" style=" right: 0px; top: 406px;">
														<div class="slot-inner">
															<div class="slot-contents">
																	<a href="javascript:;" class="empty"><span class="frame"></span></a>
															</div>
														</div>
													</div>';
												}
												if(mysql_num_rows($slot15) > 0)
												{
													echo '
													<div class="slot slot-21 slot-align-right item-quality-'.$row_item_template_slot15['Quality'].'" style=" left: 241px; bottom: 0px;">
														<div class="slot-inner">
															<div class="slot-contents">
																	<a href="http://fr.wowhead.com/item='.$row_slot15['item_template'].'" class="item"><img src="http://eu.battle.net/wow-assets/static/images/icons/56/'.$row_icon_slot15['icon'].'.jpg" alt="" /><span class="frame"></span></a>
															</div>
														</div>
													</div>';
												}else
												{
													echo '	
													<div class="slot slot-21 slot-align-right" style=" left: 241px; bottom: 0px;">
														<div class="slot-inner">
															<div class="slot-contents">
																	<a href="javascript:;" class="empty"><span class="frame"></span></a>
															</div>
														</div>
													</div>';
												}
												if(mysql_num_rows($slot16) > 0)
												{
													echo '
													<div class="slot slot-22 item-quality-'.$row_item_template_slot16['Quality'].'" style=" left: 306px; bottom: 0px;">
														<div class="slot-inner">
															<div class="slot-contents">
																	<a href="http://fr.wowhead.com/item='.$row_slot16['item_template'].'" class="item"><img src="http://eu.battle.net/wow-assets/static/images/icons/56/'.$row_icon_slot16['icon'].'.jpg" alt="" /><span class="frame"></span></a>
															</div>
														</div>
													</div>';
												}else
												{
													echo '	
													<div class="slot slot-22" style=" left: 306px; bottom: 0px;">
														<div class="slot-inner">
															<div class="slot-contents">
																	<a href="javascript:;" class="empty"><span class="frame"></span></a>
															</div>
														</div>
													</div>';
												}
												if(mysql_num_rows($slot17) > 0)
												{
													echo '
													<div class="slot slot-15 item-quality-'.$row_item_template_slot17['Quality'].'" style=" left: 371px; bottom: 0px;">
														<div class="slot-inner">
															<div class="slot-contents">
																	<a href="http://fr.wowhead.com/item='.$row_slot17['item_template'].'" class="item"><img src="http://eu.battle.net/wow-assets/static/images/icons/56/'.$row_icon_slot17['icon'].'.jpg" alt="" /><span class="frame"></span></a>
															</div>
														</div>
													</div>';
												}else
												{
													echo '	
													<div class="slot slot-15" style=" left: 371px; bottom: 0px;">
														<div class="slot-inner">
															<div class="slot-contents">
																	<a href="javascript:;" class="empty"><span class="frame"></span></a>
															</div>
														</div>
													</div>';
												}
											echo '	
											</div>
										</div>
									</div>
									<div class="summary-bottom">
										<div class="profile-recentactivity">
											<h3 class="category ">Activit&eacute; r&eacute;cente</h3>
												<div class="profile-box-simple">
													<ul class="activity-feed">
													</ul>
													<span class="clear"><!-- --></span>
												</div>
										</div>
										<div class="summary-bottom-left">
											<div class="summary-talents" id="summary-talents">
												<ul>
													<li class="summary-talents-0">
														<a>
															<span class="inner">
																<span class="icon">
																	<img src="http://eu.battle.net/wow-assets/static/images/icons/36/inv_misc_questionmark.jpg" alt="" />
																	<span class="frame"></span>
																</span>
																<span class="name-build">
																	<span class="name">Talents</span>
																	<span class="build">0<ins>/</ins>0<ins>/</ins>0</span>
																</span>
															</span>
														</a>
													</li>
													<li class="summary-talents-0">
														<a class="active">
															<span class="inner">
																<span class="checkmark"></span>
																<span class="icon">
																	<img src="http://eu.battle.net/wow-assets/static/images/icons/36/inv_misc_questionmark.jpg" alt="" />
																	<span class="frame"></span>
																</span>
																<span class="name-build">
																	<span class="name">Talents</span>
																	<span class="build">0<ins>/</ins>0<ins>/</ins>0</span>
																</span>
															</span>
														</a>
													</li>
												</ul>
											</div>
											<div class="summary-health-resource">
												<ul>
													<li class="health" id="summary-health"><span class="name">Sant&eacute;</span><span class="value">'.$row_characters_guid['health'].'</span></li>';
													if($row_characters_guid['class'] == 1)
													{
														echo '<li class="resource-1" id="summary-power"><span class="name">Rage</span><span class="value">100</span></li>';
													}	
													elseif($row_characters_guid['class'] == 4)
													{
														echo '<li class="resource-3" id="summary-power"><span class="name">&Eacute;nergie</span><span class="value">'.$row_characters_guid['power4'].'</span></li>';
													}
													elseif($row_characters_guid['class'] == 6)
													{
														echo '<li class="resource-6" id="summary-power"><span class="name">Runique</span><span class="value">100</span></li>';
													}
													elseif(($row_characters_guid['class'] == 2) || ($row_characters_guid['class'] == 3) ||($row_characters_guid['class'] == 5) || ($row_characters_guid['class'] == 7) || ($row_characters_guid['class'] == 8) || ($row_characters_guid['class'] == 9) || ($row_characters_guid['class'] == 11))
													{
														echo '<li class="resource-0" id="summary-power"><span class="name">Mana</span><span class="value">'.$row_characters_guid['power1'].'</span></li>';
													}
												echo '
												</ul>
											</div>
											<div class="summary-stats-profs-bgs">
												<div class="summary-stats" id="summary-stats">
													<div id="summary-stats-simple" class="summary-stats-simple">
														<div class="summary-stats-simple-base">
															<div class="summary-stats-column">
																<h4>Base</h4>
																<ul>
																	<li data-id="strength" class="">
																		<span class="name">Force</span>
																		<span class="value">0</span>
																	<span class="clear"><!-- --></span>
																	</li>
																	<li data-id="agility" class="">
																		<span class="name">Agilit&eacute;</span>
																		<span class="value">0</span>
																	<span class="clear"><!-- --></span>
																	</li>
																	<li data-id="stamina" class="">
																		<span class="name">Endurance</span>
																		<span class="value">0</span>
																	<span class="clear"><!-- --></span>
																	</li>
																	<li data-id="intellect" class="">
																		<span class="name">Intelligence</span>
																		<span class="value">0</span>
																	<span class="clear"><!-- --></span>
																	</li>
																	<li data-id="spirit" class="">
																		<span class="name">Esprit</span>
																		<span class="value">0</span>
																	<span class="clear"><!-- --></span>
																	</li>
																</ul>
															</div>
															<br />
														</div>
														<div class="summary-stats-simple-other">
															<a id="summary-stats-simple-arrow" class="summary-stats-simple-arrow" href="javascript:;"></a>
															<div class="summary-stats-column">
																<h4>D&eacute;fense</h4>
																<ul>
																	<li data-id="armor" class="">
																		<span class="name">Armure</span>
																		<span class="value color-q2">0</span>
																	<span class="clear"><!-- --></span>
																	</li>
																	<li data-id="dodge" class="">
																		<span class="name">Esquive</span>
																		<span class="value">0 %</span>
																	<span class="clear"><!-- --></span>
																	</li>
																	<li data-id="parry" class="">
																		<span class="name">Parade</span>
																		<span class="value">0 %</span>
																	<span class="clear"><!-- --></span>
																	</li>
																	<li data-id="block" class="">
																		<span class="name">Blocage</span>
																		<span class="value">0 %</span>
																	<span class="clear"><!-- --></span>
																	</li>
																	<li data-id="resilience" class="">
																		<span class="name">R&eacute;silience</span>
																		<span class="value">0</span>
																	<span class="clear"><!-- --></span>
																	</li>
																</ul>
															</div>
														</div>
														<div class="summary-stats-end"></div>
													</div>
												</div>
												<div class="summary-stats-bottom">
													<div class="summary-battlegrounds">
														<ul>
															<li class="rating">
																<span class="name">Classement en champ de bataille</span>
																<span class="value">0</span>	
																<span class="clear"><!-- --></span>
															</li>
															<li class="kills">
																<span class="name">Victoires honorables</span>
																<span class="value">'.$row_characters_guid['totalKills'].'</span>	
																<span class="clear"><!-- --></span>
															</li>
														</ul>
													</div>
													<div class="summary-professions">
														<ul>
															<li>
																<div class="profile-progress border-3" >
																	<div class="bar border-3" style="width: 0%"></div>
																		<div class="bar-contents">						
																			<span class="profession-details">
																				<span class="icon"> 
																					<span class="icon-frame frame-12">
																						<img src="http://eu.battle.net/wow-assets/static/images/icons/18/inv_misc_questionmark.jpg" alt="" width="12" height="12" />
																					</span>
																				</span>
																				<span class="name"></span>
																				<span class="value">0</span>
																			</span>
																		</div>
																</div>
															</li>
															<li>
																<div class="profile-progress border-3" >
																	<div class="bar border-3" style="width: 0%"></div>
																		<div class="bar-contents">						
																			<span class="profession-details">
																				<span class="icon"> 
																					<span class="icon-frame frame-12">
																						<img src="http://eu.battle.net/wow-assets/static/images/icons/18/inv_misc_questionmark.jpg" alt="" width="12" height="12" />
																					</span>
																				</span>
																				<span class="name"></span>
																				<span class="value">0</span>
																			</span>
																		</div>
																</div>
															</li>
														</ul>
													</div>
													<span class="clear"><!-- --></span>
												</div>
											</div>
										</div>
										<span class="clear"><!-- --></span>
										<span class="clear"><!-- --></span>
									</div>
								</div>
							<span class="clear"><!-- --></span>
							</div>
						</div>
					</div>
				</div>';
			include_once('includes/html/footer.html');
			include_once('includes/html/service.html');
		echo '
		</div>
	</body>';
}else
{
	include_once('pager/404.php');
}
?>
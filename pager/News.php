<?php
$news_id = mysql_real_escape_string($_GET['id']);
	
/* Sélection de la base de données du site */
$db = mysql_select_db ($array_db['db_site'],$cxn);
if (!$db) {
	die ('Erreur : ' . mysql_error());
}
$news = mysql_query("SELECT * FROM `news` WHERE `id` = '".$news_id."' LIMIT 1");

if(mysql_num_rows($news) > 0)
{
	$commentaires_news = mysql_query("SELECT * FROM `commentaires` WHERE `news` = '".$news_id."'");
	
	$commentaires = mysql_query("SELECT COUNT(*) AS nbre_entrees FROM `commentaires`");
	$row_commentaires = mysql_fetch_array($commentaires);
	$id = ($row_commentaires['nbre_entrees'] + 1);
	
	if(mysql_num_rows($news) > 0)
	{
		$row_news = mysql_fetch_array($news);
		$nb_commentaires = mysql_num_rows($commentaires_news);
		
		echo '
		<body class="fr-fr">
			<div id="wrapper">';
				include_once('includes/html/header/accueil.html');
					echo '
					<div id="content">
						<div class="content-top">
							<div class="content-trail">
								<ol class="ui-breadcrumb">
									<li><a href="index.php?page=Accueil" rel="np">Accueil</a></li>
									<li class="last"><a href="index.php?page=News&amp;id='.$row_news['id'].'" rel="np">'.$row_news['titre'].'</a></li>
								</ol>
							</div>
							<div class="content-bot">	
								<div id="blog-wrapper">
									<div id="left">
										<div id="blog-container">';
											include_once('includes/html/featured-news.html');
												echo '
												<div id="blog">
													<h3 class="blog-title">'.$row_news['titre'].'</h3>
													<div class="byline">
														<div class="blog-info">
															par <a>'.$row_news['auteur'].'</a> |
														</div>
														<a class="comments-link" href="#comments">'.$nb_commentaires.'</a>
														<span class="clear"><!-- --></span>
													</div>
													<div class="header-image">
													</div>
													<div class="detail"><p>'.$row_news['message'].'</p></div>
												</div>
												<span id="comments"></span>
												<div id="page-comments">
													<div class="page-comment-interior">
														<h3>Commentaires ('.$nb_commentaires.')</h3>
														<div class="comments-container">';
															if($_SESSION['login'] && $_SESSION['login'] == TRUE)
															{
																if(mysql_num_rows($characters_account))
																{
																	echo '
																	<form action="index.php?page=News&amp;id='.$news_id.'" method="post">
																		<div class="new-post">
																			<div class="comment">
																					<div class="portrait-c ajax-update">
																						<div class="avatar-interior">
																							<a><img height="64" src="style/images/2d/avatar/'.$row_characters_account['race'].'-'.$row_characters_account['gender'].'.jpg"/></a>
																						</div>
																					</div>
																					<div class="comment-interior">
																						<div class="character-info user ajax-update">
																							<div class="user-name">
																								<span class="char-name-code" style="display: none">'.$row_characters_account['name'].'</span>
																								<div id="context-2" class="ui-context character-select">
																									<div class="context">
																										<a href="javascript:;" class="close" onclick="return CharSelect.close(this);"></a>
																										<div class="context-user">
																											<strong>'.$row_characters_account['name'].'</strong>
																											<br />
																											<span>'.$royaume['name'].'</span>
																										</div>
																										<div class="context-links">
																											<a href="index.php?page=Armurerie&amp;guid='.$row_characters_account['guid'].'" title="Fiche" rel="np" class="icon-profile link-first">Fiche</a>
																											<a title="Voir mes messages" rel="np"class="icon-posts"></a>
																											<a title="Voir les enchères" rel="np" class="icon-auctions"></a>
																											<a title="Voir les évènements" rel="np" class="icon-events link-last"></a>
																										</div>
																									</div>
																								</div>
																								<a href="index.php?page=Armurerie&amp;guid='.$row_characters_account['guid'].'" class="context-link" rel="np">'.$row_characters_account['name'].'</a>
																							</div>
																						</div>
																						<div class="content">
																							<div class="comment-ta">
																								<textarea cols="78" rows="3" name="message"></textarea>
																							</div>
																							<div class="action">
																								<div class="submit">
																									<input type="hidden" name="id" value="'.$id.'"/>
																									<input type="hidden" name="news" value="'.$news_id.'"/>
																									<input type="hidden" name="auteur" value="'.$row_characters_account['guid'].'"/>
																									<button class="ui-button button1 comment-submit" type="submit" name="poster">
																										<span>
																											<span>Poster</span>
																										</span>
																									</button>
																								</div>
																								<span class="clear"><!-- --></span>
																							</div>
																						</div>
																					</div>
																			</div>
																		</div>
																	</form>';
																}else
																{
																	echo '
																	<div align="center">
																		<strong><font color="red">Il vous faut au moins un personnage pour poster un commentaire !</font></strong>
																	</div><br />';
																}
															}else
															{
																echo '
																<div align="center">
																	<strong><font color="red">Vous devez &ecirc;tre connect&eacute; pour poster un commentaire !</font></strong>
																</div><br />';
															}
															for($i = 0; $i < mysql_num_rows($commentaires_news); $i++)
															{
																$row_commentaires_news = mysql_fetch_array($commentaires_news);
																
																/* Sélection de la base de données des personnages */
																$db = mysql_select_db ($array_db['db_characters'],$cxn);
																if (!$db) {
																	die ('Erreur : ' . mysql_error());
																}
																$characters_guid = mysql_query("SELECT * FROM `characters` WHERE `guid` = '".$row_commentaires_news['auteur']."' LIMIT 1");
																$row_characters_guid = mysql_fetch_array($characters_guid);
																
																echo '
																<div style="z-index: '.$i.';" class="comment">
																	<div class="avatar portrait-b">
																		<a><img height="64" src="http://eu.battle.net/wow/static/images/2d/avatar/'.$row_characters_guid['race'].'-'.$row_characters_guid['gender'].'.jpg"/></a>
																	</div>
																	<div class="comment-interior">
																		<div class="character-info user">
																			<div class="user-name">
																				<span class="char-name-code" style="display: none">'.$row_characters_guid['name'].'</span>
																				<div id="context-1" class="ui-context">
																					<div class="context">
																						<a href="javascript:;" class="close" onclick="return CharSelect.close(this);"></a>
																						<div class="context-user">
																							<strong>'.$row_characters_guid['name'].'</strong>
																							<br />
																							<span>'.$royaume['name'].'</span>
																						</div>
																						<div class="context-links">
																							<a href="index.php?page=Armurerie&amp;guid='.$row_characters_guid['guid'].'" title="Fiche" rel="np" class="icon-profile link-first">Fiche</a>
																							<a title="Voir les messages" rel="np" class="icon-posts"></a>
																							<a title="Ignorer" rel="np" class="icon-ignore link-last" onclick="Cms.ignore(7500754, false); return false;"></a>
																						</div>
																					</div>
																				</div>
																				<br />
																				<a href="index.php?page=Armurerie&amp;guid='.$row_characters_guid['guid'].'" class="context-link" rel="np">'.$row_characters_guid['name'].'</a>
																			</div>
																		</div>
																		<div class="content" >'.$row_commentaires_news['message'].'</div>
																		<div class="comment-actions"><a class="reply-link"></a></div>
																	</div>
																</div>';
															}
															echo '
															<div class="page-nav-container">
																<div class="page-nav-int">
																	<div class="pageNav">
																		<span class="active">1</span>
																	</div>
																</div>
															</div>
														</div>
													</div>
												</div>
										</div>
									</div>';
									include_once('includes/html/right.html');
								echo '</div>
							</div>
						</div>
					</div>';
					include_once('includes/html/footer.html');
				include_once('includes/html/service.html');
			echo '</div>
		</body>';
	}
	if(isset($_POST['poster']))
	{
		$commentaire_id = mysql_real_escape_string(htmlentities($_POST['id']));
		$commentaire_news = mysql_real_escape_string(htmlentities($_POST['news']));
		$commentaire_auteur = mysql_real_escape_string(htmlentities($_POST['auteur']));
		$commentaire_message = mysql_real_escape_string(htmlentities($_POST['message']));
		
		if(!empty($commentaire_message))
		{
			mysql_query("INSERT INTO `commentaires` (`id`, `news`, `auteur`, `message`) VALUES ('".$commentaire_id."', '".$commentaire_news."', '".$commentaire_auteur."', '".$commentaire_message."')");
			echo '
			<script language="javascript"> 
				alert("Commentaire ajouté avec succès !");
				document.location.href="index.php?page=News&id='.$news_id.'" 
			</script>';
		}else
		{
			echo '
			<script language="javascript"> 
				alert("Erreur : Votre commentaire est vide !");
				document.location.href="index.php?page=News&id='.$news_id.'#comments" 
			</script>';
		}
	
	}
}else
{
	include_once('pager/404.php');
}
?>
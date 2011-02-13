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
											<?php
											/* Sélection de la base de données du site */
											$db = mysql_select_db ($array_db['db_site'],$cxn);
											if (!$db) {
												die ('Erreur : ' . mysql_error());
											}
											$news = mysql_query("SELECT * FROM `news` ORDER BY `id` DESC LIMIT 0,5");
											
											if (mysql_num_rows($news) > 0)
											{
												for($i = 0; $i < mysql_num_rows($news); $i++)
												{	
													$row_news = mysql_fetch_array($news);
													$commentaires = mysql_query("SELECT * FROM `commentaires` WHERE `news` = '".$row_news['id']."'");
													$nb_commentaires = mysql_num_rows($commentaires);
																							
													echo '
													<div class="news-article first-child">
														<h3>
															<a href="index.php?page=News&amp;id='.$row_news['id'].'#blog">'.$row_news['titre'].'</a>
														</h3>
														<div class="by-line">
															par <a>'.$row_news['auteur'].'</a> |<a class="comments-link" href="index.php?page=News&amp;id='.$row_news['id'].'#comments">'.$nb_commentaires.'</a>
														</div>
														<div class="article-left" style="background-image: url(\'http://eu.media4.battle.net/cms/blog_thumbnail/QSZU5GIH5DM41290509434531.jpg\');">
															<a><img src="http://eu.battle.net/wow/static/images/homepage/thumb-frame.gif"/></a>
														</div>
														<div class="article-right">
															<div class="article-summary">
																<p>'.nl2br($row_news['message']).'</p>
															</div>
														</div>
														<span class="clear"><!-- --></span>
													</div>';
												}
											}else
											{
												echo '
												<div class="news-article first-child" align="center">
													<strong><font color="red">Il n\'y a pas de news !</font></strong>
												</div>';
											}
											?>
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
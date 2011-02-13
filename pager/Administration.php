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
														<a>Administration</a>
													</h3>
												</div>
												<div class="news-article">
												<font size="3"><strong><a>Gestion des news</a></strong></font>
												<br />
												<li><a href="index.php?page=AjoutNews"><font color="white">Ajouter une news</font></a></li>
												<li><a href="index.php?page=ModifNews"><font color="white">Modifier une news</font></a></li>
												<li><a href="index.php?page=SupprNews"><font color="white">Supprimer une news</font></a></li>
												</div>
												<div class="news-article">
												<font size="3"><strong><a>Gestion de la boutique</a></strong></font>
												<br />
												<li><a href="index.php?page=AjoutObjet"><font color="white">Ajouter un objet</font></a> </li>
												<li><a href="index.php?page=SupprObjet"><font color="white">Supprimer un objet</font></a></li>
												</div>
												<div class="news-article">
												<font size="3"><strong><a>Gestion des comptes</a></strong></font>
												<br />
												<li><a href="index.php?page=Comptes"><font color="white">Liste des comptes</font></a></li>
												<li><a href="index.php?page=ComptesBan"><font color="white">Liste des comptes Ban</font></a></li>
												</div>
												<div class="news-article">
												<font size="3"><strong><a>Gestion des requêtes MJ</a></strong></font>
												<br />
												<li><a href="index.php?page=Administration#"><font color="white">Liste des requêtes</font></a> <font color="red">[Indisponible]</font></li>
												</div>
												<div class="news-article">
												<font size="3"><strong><a>Gestion des logs</a></strong></font>
												<br />
												<li><a href="index.php?page=LogServeur"><font color="white">Log serveur</font></a></li>
												<li><a href="index.php?page=LogErreurs"><font color="white">Log d'erreurs</font></a></li>
												</div>
											</div>
										<?php
										}else
										{
											echo '<font color="red">Vous n\'&ecirc;tes pas autoris&eacute; &agrave; acc&eacute;der &agrave; cette page !</font></p>';
										}
									}else
									{
										echo '<font color="red">Vous devez &ecirc;tre connect&eacute; pour acc&eacute;der &agrave; cette page !</font></p>';
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

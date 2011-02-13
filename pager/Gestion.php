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
													<a>Gestion de compte</a>
												</h3>
											</div>
											<div class="news-article">
												<font size="3"><strong><a>Informations de compte</a></strong></font>
												<br />
												<p><font color="white">Nom de compte :</font> <?php echo $infos_compte['username']; ?></p>
												<p><font color="white">Adresse email :</font> <?php echo $infos_compte['email']; ?></p>
												<p><font color="white">Points de vote :</font> <?php echo $infos_points['points']; ?></p>
											</div>	
											<div class="news-article">
												<font size="3"><strong><a>Outils de compte</a></strong></font>
												<br />
												<p>
													<li><a href="index.php?page=ChangeMdp"><font color="white">Changement de mot de passe</font></a></li>
													<li><a href="index.php?page=ChangeMail"><font color="white">Changement d'adresse mail</font></a></li>
												</p>
											</div>
											<div class="news-article ">
												<font size="3"><strong><a>Outils de personnage</a></strong></font>
												<br />
												<p>
													<li><a href="index.php?page=Debloquer"><font color="white">Débloquer un personnage</font></a></li>
													<li><a href="index.php?page=ChangeRace"><font color="white">Changement de race</font></a></li>
													<li><a href="index.php?page=Renommer"><font color="white">Renommer un personnage</font></a></li>
												</p>
											</div>	
										</div>
									<?php
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
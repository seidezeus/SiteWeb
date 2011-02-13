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
													<a>Log serveur</a>
												</h3>
											</div>
											<div class="news-article ">
												<?php
												$log_server = file($array_site['log_server']);
												$total = count($log_server);
												
												if ($total > 0)
												{
													echo '<textarea cols="70" rows="25" readonly="readonly">';
													for($i = 0; $i < $total; $i++) 
													{
														echo ''.$log_server[$i].'';
													}
													echo '</textarea>';
												}else
												{
													echo '
													<div align="center">
														<strong><font color="red">Le log est vide !</font></strong>
													</div>';		
												}
												?>
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
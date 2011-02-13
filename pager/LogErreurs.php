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
													<a>Log d'erreurs</a>
												</h3>
											</div>
											<div class="news-article ">
												<?php 
												$log_dberrors = file($array_site['log_dberrors']);
												$total = count($log_dberrors);
													
												if ($total > 0)
												{
													echo '<textarea cols="70" rows="25" readonly="readonly">';
													for($i = 0; $i < $total; $i++) 
													{
														echo ''.$log_dberrors[$i].'<br />';
													}
													echo '</textarea>';
												}else
												{
													echo '
													<div align="center">
														<strong><font color="red">Le log ne contient pas d\'erreurs !</font></strong>
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
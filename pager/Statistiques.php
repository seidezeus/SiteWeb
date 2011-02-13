<?php require_once ('includes/classes/class.statistiques.php'); ?>
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
										<div class="news-article first-child">
											<h3>
												<a>Statistiques</a>
											</h3>
										</div>
										<div class="news-article ">
											<strong><font size="3"><a>Informations sur la machine</a></font></strong>
												<br /><br />
												<table class="table" width="100%" border="0" cellspacing="0" cellpadding="0" align="center">
													<thead>
														<tr>
															<th><a href="javascript:;" class="sort-link">Processeur</a></th>
															<th><a href="javascript:;" class="sort-link numeric">Mémoire vive</a></th>
															<th><a href="javascript:;" class="sort-link numeric">Système</a></th>
															<th><a href="javascript:;" class="sort-link numeric">Connexion</a></th>
														</tr>
													</thead>
													<tbody>
														<tr class="row2">
															<td><?php echo $array_site['processeur']; ?></td>
															<td><?php echo $array_site['memoire']; ?></td>
															<td><?php echo $array_site['systeme']; ?></td>
															<td><?php echo $array_site['connexion']; ?></td>
														</tr>
													</tbody>
												</table>
										</div>	
										<div class="news-article ">
											<strong><font size="3"><a>Informations sur les comptes</a></font></strong>
												<br /><br />
												<table class="table" width="100%" border="0" cellspacing="0" cellpadding="0" align="center">
													<thead>
														<tr>
															<th><a href="javascript:;" class="sort-link">Compte créés</a></th>
															<th><a href="javascript:;" class="sort-link numeric">Personnage créés</a></th>
														</tr>
													</thead>
													<tbody>
														<tr class="row2">
															<td><?php echo $nb_comptes['nbre_entrees']; ?></td>
															<td><?php echo $nb_persos['nbre_entrees']; ?></td>
														</tr>
													</tbody>
												</table>
										</div>
										<div class="news-article">
											<strong><font size="3"><a>Informations sur la population du royaume "<?php echo $royaume['name']; ?>"</a></font></strong>
											<p><font color="white">Répartition par factions :</font></p>
											<table class="table" width="100%" border="0" cellspacing="0" cellpadding="0" align="center">
												<thead>
													<tr>
														<th><a href="javascript:;" class="sort-link">Nombre de joueurs Allianceux</a></th>
														<th><a href="javascript:;" class="sort-link numeric">Nombre de joueurs Hordeux</a></th>
													</tr>
												</thead>
												<tbody>
													<tr class="row2">
														<td><font color="#234CA5"><?php echo $nb_persos_a; ?></font></td>
														<td><font color="#DB2218"><?php echo $nb_persos_h; ?></font></td>
													</tr>
												</tbody>
											</table>
											<br />
											<p><font color="white">Répartition par races :</font></p>
											<table class="table" width="100%" border="0" cellspacing="0" cellpadding="0" align="center">
												<thead>
													<tr>
														<th><a href="javascript:;" class="sort-link">Humains</a></th>
														<th><a href="javascript:;" class="sort-link numeric">Orcs</a></th>
														<th><a href="javascript:;" class="sort-link numeric">Nains</a></th>
														<th><a href="javascript:;" class="sort-link numeric">Elfes de la nuit</a></th>
														<th><a href="javascript:;" class="sort-link numeric">Morts-vivants</a></th>
													</tr>
												</thead>
												<tbody>
													<tr class="row2">
														<td><?php echo $nb_persos_humain['nbre_entrees']; ?></td>
														<td><?php echo $nb_persos_orc['nbre_entrees']; ?></td>
														<td><?php echo $nb_persos_nain['nbre_entrees']; ?></td>
														<td><?php echo $nb_persos_elfedelanuit['nbre_entrees']; ?></td>
														<td><?php echo $nb_persos_mortvivant['nbre_entrees']; ?></td>
													</tr>
												</tbody>
												<thead>
													<tr>
														<th><a href="javascript:;" class="sort-link">Taurens</a></th>
														<th><a href="javascript:;" class="sort-link numeric">Gnomes</a></th>
														<th><a href="javascript:;" class="sort-link numeric">Trolls</a></th>
														<th><a href="javascript:;" class="sort-link numeric">Elfes de sang</a></th>
														<th><a href="javascript:;" class="sort-link numeric">Draeneïs</a></th>
													</tr>
												</thead>
												<tbody>
													<tr class="row2">
														<td><?php echo $nb_persos_tauren['nbre_entrees']; ?></td>
														<td><?php echo $nb_persos_gnome['nbre_entrees']; ?></td>
														<td><?php echo $nb_persos_troll['nbre_entrees']; ?></td>
														<td><?php echo $nb_persos_elfedesang['nbre_entrees']; ?></td>
														<td><?php echo $nb_persos_draenei['nbre_entrees']; ?></td>
													</tr>
												</tbody>
											</table>
											<br />
											<p><font color="white">Répartition par classes :</font></p>
											<table class="table" width="100%" border="0" cellspacing="0" cellpadding="0" align="center">
												<thead>
													<tr>
														<th><a href="javascript:;" class="sort-link">Guerriers</a></th>
														<th><a href="javascript:;" class="sort-link numeric">Paladins</a></th>
														<th><a href="javascript:;" class="sort-link numeric">Chasseurs</a></th>
														<th><a href="javascript:;" class="sort-link numeric">Voleurs</a></th>
														<th><a href="javascript:;" class="sort-link numeric">Prêtres</a></th>
													</tr>
												</thead>
												<tbody>
													<tr class="row2">
														<td class="color-c1"><?php echo $nb_persos_guerrier['nbre_entrees']; ?></td>
														<td class="color-c2"><?php echo $nb_persos_paladin['nbre_entrees']; ?></td>
														<td class="color-c3"><?php echo $nb_persos_chasseur['nbre_entrees']; ?></td>
														<td class="color-c4"><?php echo $nb_persos_voleur['nbre_entrees']; ?></td>
														<td class="color-c5"><?php echo $nb_persos_pretre['nbre_entrees']; ?></td>
													</tr>
												</tbody>
												<thead>
													<tr>
														<th><a href="javascript:;" class="sort-link">Chevaliers de la mort</a></th>
														<th><a href="javascript:;" class="sort-link numeric">Chamans</a></th>
														<th><a href="javascript:;" class="sort-link numeric">Mages</a></th>
														<th><a href="javascript:;" class="sort-link numeric">Démonistes</a></th>
														<th><a href="javascript:;" class="sort-link numeric">Druides</a></th>
													</tr>
												</thead>
												<tbody>
													<tr class="row2">
														<td class="color-c6"><?php echo $nb_persos_dk['nbre_entrees']; ?></td>
														<td class="color-c7"><?php echo $nb_persos_chaman['nbre_entrees']; ?></td>
														<td class="color-c8"><?php echo $nb_persos_mage['nbre_entrees']; ?></td>
														<td class="color-c9"><?php echo $nb_persos_demoniste['nbre_entrees']; ?></td>
														<td class="color-c11"><?php echo $nb_persos_druide['nbre_entrees']; ?></td>
													</tr>
												</tbody>
											</table>
										</div>
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
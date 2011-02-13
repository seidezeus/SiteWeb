<body class="fr-fr homepage">
	<div id="wrapper">
		<?php include_once('includes/html/header/rejoin-nous.html'); ?>
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
												<a>Rejoinds-nous</a>
											</h3>
										</div>

										<div class="news-article ">
											<div style="text-align:left">
												<p><strong>Vous souhaitez rejoindre la communaut� <?php echo $array_site['nom']; ?> et tenter une aventure formidable ?</strong><br /> 
												Vous trouverez ici toutes les informations qu'il vous fait pour nous rejoindre m�me si vous n'avez pas encore le jeu.<br /> 
												Si vous n'�tes pas satisfaits de nos services nous vous invitons � vous rendre sur les serveurs officiels o� normalement vous poss�dez un compte comme pr�cis� dans nos conditions d'utilisation.<br /> 
												Les clients des diff�rentes extensions sont distribu�s gratuitement par l'�diteur.</p> 
											</div>
										<span class="clear"><!-- --></span>
										</div>
										<div class="news-article ">
											<div style="text-align:left">
												<p><strong><a>ETAPE n�1 : Installation des clients de bases</a></strong> <small><a href="#1" onclick="showhide('1');"><font color="white">(Clique ici pour afficher)</font></a></small></p> 
												
												<div id="1" style="display: none;">
													<p><a href="http://www.wow-europe.com/shared/downloads/InstallWoW_frFR/InstallWoW.exe">T�l�chargement du client Fran�ais pour Windows</a><br /> 
													<a href="http://www.wow-europe.com/shared/downloads/InstallWoW_frFR/InstallWoW.zip">T�l�chargement du client Fran�ais pour MAC</a><br /> 
													Si vous t�l�charger ce client, vous �tes normalement propri�taire d'un compte payant Blizzard, World of Warcraft<br /> 
													Apr�s avoir t�l�charge un des deux fichiers ci-dessus, veuillez le lancer � suivre les instructions pour mener � bien votre installation.</p>
												</div>
											</div>
										<span class="clear"><!-- --></span>
										</div>
										<div class="news-article ">
											<div style="text-align:left">
												<p><strong><a>ETAPE n�2 : Mise � jour de votre client</a></strong> <small><a href="#2" onclick="showhide('2');"><font color="white">(Clique ici pour afficher)</font></a></small></p> 

												<div id="2" style="display: none;">
													<p>L'installateur que vous avez t�l�charg� vous a offre un jeu complet mais pas sp�cialement � la derni�re version actuelle de <?php echo $array_site['nom']; ?> : 3.3.5<br /> 
													Cette mise � jour est l'actuelle version des serveurs officiels donc pas de panique � ce niveau ci.<br /> 
													Pour mettre votre jeu � jour vous avez le choix d'utiliser le Launcher Officiel de Blizzard dans les fichiers de votre jeu ou bien alors de t�l�charger les installateurs de ces mise � jour.<br /> 
													Il existe des sites comme <a href="http://www.clubic.com/patch-jeux-video-451-0-world-of-warcraft.html">Clubic</a> qui propose ces patch pour Windows. Les utilisateurs de MAC peuvent �galement trouver les patch sur <a href="http://www.wowwiki.com/Patch_mirrors">d'autres sites</a>.<br /> 
													Donc voil� avec ces informations, vous avez ce qu'il vous faut pour avoir un jeu en 3.3.5.</p> 
												</div>
											</div>
										<span class="clear"><!-- --></span>
										</div>
										<div class="news-article ">
											<div style="text-align:left">
												<p><strong><a>ETAPE n�3 : La modification du Realmlist.wtf</a></strong> <small><a href="#3" onclick="showhide('3');"><font color="white">(Clique ici pour afficher)</font></a></small></p> 

												<div id="3" style="display: none;">
													<p>Pour pouvoir rejoindre nos serveurs, il faut modifier une petite ligne dans un fichier du jeu qui est nomm� "Realmlist.wtf". Vous pouvez le trouver par d�faut ici: C:/Program Files/World of Warcraft/Data/frFR/realmlist.wtf . Ouvrez ce fichier avec un programme comme le Bloc note et supprimez son contenu pour ajouter cette ligne:<br /><font color="red">set realmlist <?php echo $royaume['address']; ?></font><br /> 
													N'oubliez pas d'enregistrer celui-ci.</p> 
												</div>
											</div>
										<span class="clear"><!-- --></span>
										</div>
										<div class="news-article ">
											<div style="text-align:left">
												<p><strong><a>ETAPE n�4 : Cr�ation de compte</a></strong> <small><a href="#4" onclick="showhide('4');"><font color="white">(Clique ici pour afficher)</font></a></small></p> 

												<div id="4" style="display: none;">
													<p>Votre jeu est maintenant � la bonne version pour rejoindre <?php echo $array_site['nom']; ?>.<br /> 
													Il reste une chose importante � faire: Cr�er son compte et vous pouvez faire cela sur cette page.<br /> 
													L'�quipe <?php echo $array_site['nom']; ?> vous conseille d'indiquer un email valide, il vous permettra de r�cup�rer votre mot de passe et recevoir des newslettres, (...)</p> 

													<p>N'oubliez pas que vous devez lancer votre jeu avec le WoW.exe et non le raccourci officiel.</p> <p>Information importante: Vider le Cache.</p> 

													<p>Tout particuli�rement l'�quipe d'assistantce souhaite vous informer que la plus grande source de vos soucis est bel et bien le "Cache" de votre jeu.<br /> 
													Mais qu'est donc le "Cache"?<br /> 
													Le "Cache" correspond � un type d'historique de votre jeu donc, apr�s certaines corrections de notre part si vous ne supprimez pas l'historique vous risquez d'avoir quelques soucis en jeu.<br /> 
													Nous vous recommandons de le supprimer avant chaque utilisation de votre jeu ou le plus souvent possible.<br /> 
													Pour supprimer cet historique, il suffit de supprimer le dossier "Cache" enti�rement et de relancer votre jeu</p> 

													<p><em><strong>En esp�rant vous apercevoir rapidement sur nos serveur,<br /> 
													L'�quipe <a><?php echo $array_site['nom']; ?></a>.</strong></em></p>	
												</div>
											</div>
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
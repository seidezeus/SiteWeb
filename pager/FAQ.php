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
												<a>Foire aux questions</a>
											</h3>
										</div>

										<div class="news-article ">
											<strong><u><a>1°)</a></u></strong><br /> 
											Il faut savoir que beaucoup de bugs de jeu peuvent être résolus simplement avec la manipulation suivante :<br />
											- déconnection du jeu<br />
											- vider son cache (effacer entierement le fichier "cache" dans le répertoire WOW qui se trouve par défaut dans C:/Program Files/World of warcraft)<br />
											- reconnection dans le jeu<br /><br />
											N'oubliez pas de faire aussi cela quand vous changez des addons.
										</div>										
										<div class="news-article ">
											<u><strong><a>2°)</a></strong></u><br />
											J'ai pris la double spé mais je n'ai qu'1 point de talent ?<br />
											- il suffit de demander à votre maître de classe de remettre à zéro vos talents (il vous remettra les 71 points)<br /><br />
											J'ai changé de spé et je me retrouve avec beaucoup trop de points ?<br />
											- idem, allez voir votre maitre de classe pour un reset de points /!\Attention : tout joueur pris avec plus de 71 pts de talents sera ban pour usebugs/!\
										</div>
										<div class="news-article ">
											<u><strong><a>3°)</a></strong></u><br />
											J'ai acheté ma monture et, bien que j'ai le lvl, je ne peux l'utiliser ?<br />
											- voir 1°)
										</div>
										<div class="news-article ">
											<strong><u><a>4°)</a></u></strong><br />
											Je suis bloqué sur un fly qui ne finit pas ?<br />
											- avant de faire une requête, vous avez plusieurs moyens simples pour vous en sortir :<br />
											a) demander un TP d'instance à d'autres joueurs<br />
											b) entrer dans un BG<br />
											c) demander un TP de démoniste
										<span class="clear"><!-- --></span>
										</div>
										<div class="news-article ">
											<u><strong><a>5°)</a></strong></u><br /> 
											Je suis en fantôme à Dalaran ?<br />
											- il existe un ange de rez entre la citadelle pourpre et la halle des mages
										</div>
										<div class="news-article ">
											<u><strong><a>6°)</a></strong></u><br />
											J'ai un problème avec la boutique ou avec un achat fait sur la boutique ?<br />
											- écrire a <?php echo $array_site['mail']; ?>
										</div>
										<div class="news-article ">
											<u><strong><a>7°)</a></strong></u><br /> 
											J'ai un problème de canaux de discution/je ne vois pas ce que j'écris ?<br />
											- a) tapez /console reloadui ou si cela ne change rien passez votre souris sur le tchat oû votre message devrait apparaitre, vous verrez un onglet Général. Faites un clic droit dessus puis allez dans Réglages, et cochez tout. Vous devriez ensuite voir les messages.
										</div>
										<div class="news-article ">
											<strong><u><a>8°)</a></u></strong><br /> 
											Je suis perdu dans le jeu / J'ai besoin d'une aide/info pour le jeu ?<br />
											- vous avez vos guildes (c'est aussi &ccedil;a l'entraide. Vous avez ensuite plus de 2000 joueurs connectés à qui demander. Et, enfin, vous avez des dizaines de sites sur wow (les plus connus étant WOWHEAD, JUDGEHYPE ou ALAKHAZAM)<br />
											La recherche et la découverte fait aussi partie du jeu !
										</div>
										<div class="news-article ">
											<u><strong><a>9°)</a></strong></u><br />
											Un sort ou une quête bug ?<br />
											- merci de le reporter sur le forum afin que nos développeurs puissent le lire. Même si certains ne le voient pas, beaucoup de sorts ou quêtes sont debuguées régulièrement.
										</div>
										<div class="news-article ">
											<strong><u><a>10°)</a></u></strong><br /> 
											Je suis bloqué / je ne peux plus bouger ?<br />
											- Ce bug peut etre dû à divers paramètres :<br />
											a) ré-initialisez vos paramètres graphiques (plusieurs bugs étaient liés a ca)<br />
											Déconnectez vous, effacez le fichier WTF et lancez un repair.exe en cochant tout, ces fichiers se trouvent par défaut dans C:/Program Files/World of warcraft.
										</div>	
										<div class="news-article ">
											<strong><u><a>11°)</a></u></strong><br />
											Je suis témoin d'un cheat/usebug ?<br />
											- une requête est toujours utile mais n'oubliez pas de faire un screenshoot (touche "Im écran", à droite de F12) pour confirmer vos dires auprès du MJ (au besoin, postez le screenshoot sur le forum)<br />
											Nous essayons d'avoir un serveur le plus "propre" possible et cela ne peut se faire sans "vous".
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
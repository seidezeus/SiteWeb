<?php
	/*CONFIGURATION GENERAL*/

	$confGeneral = array(
		'titre' => 'InfinityChaos - Serveur Privé World of Warcraft 3.3.5a !',	//Titre du Site web
		'favicon' => './favicon.ico',						//Lien du Favicon (Icone du site web)
		'mail_nb' => '2',							//Nombre de compte par mail
	);

	/*LEVEL*/

	$confLevel = array(
		'Boutique_Admin' => '2',	// Grade minimum pour acceder aux modules d'administrations de la boutique
		'News_Admin' => '2',		// Grade minimum pour acceder aux modules d'administrations des news
		'Compte_Admin' => '3',		// Grade minimum pour acceder aux modules d'administrations des comptes
		'Vote_Admin' => '3',		// Grade minimum pour acceder aux modules d'administrations des points de votes
	);

	/* VOTE */

	$confVote = array(
		'Rpg_paradize' => 'http://www.rpg-paradize.com/?page=vote&vote=21923',		// Lien de vote pour Rpg-Paradize
		'Gowonda' => 'http://www.gowonda.com/vote.php?server_id=3021',			// Lien de vote pour Gowonda

		'Nbr_Point_Vote' => '2',							//Nombre de points par vote
	);

	/* GRADE */

		// Vous pouvez rajoutez un level en utilisant cette syntaxe : " 'NUMERO_DU_LEVEL' => 'NOM_DU_GRADE' " !

	$confGrade = array(
		'0' => 'Membre',		// Level 1
		'1' => 'Developpeurs',		// Level 2
		'2' => 'Maître de jeu',		// Level 3
		'3' => 'Administrateur',	// Level 4
	);

	/* BASE DE DONNEES */

	$array_db = array(
		'host' => '88.191.137.19',	// IP de la base de données
		'user' => 'clara0705',		// Nom de compte de la base de donées
		'pass' => 'fripouille89',	// Mot de passe de la base de données

		'db_site' => 'site1',		// Nom de la base de données du Site
		'db_mangos' => 'world',		// Nom de la base de données du World
		'db_characters' => 'characters',	// Nom de la base de données du Characters
		'db_realmd' => 'auth',		// Nom de la base de données du Realmd/Auth
	);

	/* WEBOPASS */

	$cc = "5028032405"; // Numéro de compte Webopass
	$document = "8229004768"; // Numéro de document Webospass
	$pts_achats = "20"; // Nombre de points par achats



	/*CONNEXION BASE DE DONNEES*/

	$cxn = mysql_connect($array_db['host'],$array_db['user'],$array_db['pass']);
	if (!$cxn) {
		die('Erreur : ' . mysql_error()); // Affichage de l'erreur
	}

	$db = mysql_select_db ($array_db['db_site'],$cxn);
	if (!$db) {
		die ('Erreur : ' . mysql_error());
	}

	mysql_query('SET NAMES UTF8');

	if(isset($_SESSION['id'])) {
		$test_sh = mysql_query('SELECT * FROM voting_points WHERE id=\''.$_SESSION['id'].'\'');
		$test = mysql_num_rows($test_sh);

		if($test == 0) {
			mysql_query('INSERT INTO voting_points(id, points, date, date_points) VALUES(\''.$_SESSION['id'].'\', \'0\', \'123\', \'0\')') or die ('Erreur'.mysql_error());
		}

		$pts_search = mysql_query('SELECT * FROM voting_points WHERE id=\''.$_SESSION['id'].'\'');
		$pts_search_ft = mysql_fetch_array($pts_search);

		$pts = $pts_search_ft['points'];
	}
?>

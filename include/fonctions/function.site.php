<?php
/* Informations de compte */
function account_id()
{
	global $array_db,$session_id;
	/* Connexion */
	$cxn = mysql_connect($array_db['host'],$array_db['user'],$array_db['pass']);
	if (!$cxn) {
	   die('Erreur : ' . mysql_error()); // Affichage de l'erreur
	}
	/* Sélection de la base de données des comptes */
	$db = mysql_select_db ($array_db['db_realmd'],$cxn);
	if (!$db) {
		die ('Erreur : ' . mysql_error());
	}
	$account_id = mysql_query("SELECT * FROM `account` WHERE `id` = '".$session_id."'");
	$row_account_id = mysql_fetch_array($account_id);
	return $row_account_id;
}
$infos_compte = account_id();

function online()
{
	global $array_db;
	/* Connexion */
	$cxn = mysql_connect($array_db['host'],$array_db['user'],$array_db['pass']);
	if (!$cxn) {
	   die('Erreur : ' . mysql_error()); // Affichage de l'erreur
	}
	/* Sélection de la base de données des comptes */
	$db = mysql_select_db ($array_db['db_characters'],$cxn);
	if (!$db) {
		die ('Erreur : ' . mysql_error());
	}
	$online = mysql_query("SELECT * FROM characters WHERE online = '1'");
	$online_ft = mysql_num_rows($online);
	return $online_ft;
}

$online = online();

function online_pt()
{
	global $array_db, $online;
	/* Connexion */
	$cxn = mysql_connect($array_db['host'],$array_db['user'],$array_db['pass']);
	if (!$cxn) {
	   die('Erreur : ' . mysql_error()); // Affichage de l'erreur
	}
	/* Sélection de la base de données des comptes */
	$db = mysql_select_db ($array_db['db_characters'],$cxn);
	if (!$db) {
		die ('Erreur : ' . mysql_error());
	}
	$online_ft = mysql_query("SELECT * FROM characters");
	$online_ft = mysql_num_rows($online_ft);
	return round((($online * 100) / $online_ft) + 1).' %';
}

$online_pt = online_pt();

/* Uptime */
function uptime()
{
	global $array_db;
	/* Connexion */
	$cxn = mysql_connect($array_db['host'],$array_db['user'],$array_db['pass']);
	if (!$cxn) {
	   die('Erreur : ' . mysql_error()); // Affichage de l'erreur
	}
	/* Sélection de la base de données des comptes */
	$db = mysql_select_db ($array_db['db_realmd'],$cxn);
	if (!$db) {
		die ('Erreur : ' . mysql_error());
	}
	$uptime = mysql_query("SELECT * FROM `uptime` WHERE `realmid` = '2' ORDER BY `starttime` DESC LIMIT 1") or die(mysql_error());
	$row_uptime = mysql_fetch_array($uptime);
	$day = floor($row_uptime['uptime'] / 86400);
	if($day > 0)
		$days = $day.'Jours';
	else
		$days = '';
	$hours = floor(($row_uptime['uptime'] - ($day * 86400)) / 3600);
	if($hours < 10)
		$hours = '0'.$hours;
	$min = floor(($row_uptime['uptime'] - (($hours * 3600) + ($day * 86400))) / 60);
	if ($min < 10)
		$min = "0".$min;
	$sec = $row_uptime['uptime'] - ($day * 86400) - ($hours * 3600) - ($min * 60);
	if ($sec < 10)
		$sec = "0".$sec;
	$totaltime = ''.$days.$hours.'h '.$min.'m et '.$sec.'s';
	return $totaltime;
}
$uptime = uptime();

/* Uptime 2 */
function uptime_2()
{
	global $array_db;
	/* Connexion */
	$cxn = mysql_connect($array_db['host'],$array_db['user'],$array_db['pass']);
	if (!$cxn) {
	   die('Erreur : ' . mysql_error()); // Affichage de l'erreur
	}
	/* Sélection de la base de données des comptes */
	$db = mysql_select_db ($array_db['db_realmd'],$cxn);
	if (!$db) {
		die ('Erreur : ' . mysql_error());
	}
	$uptime = mysql_query("SELECT * FROM `uptime` WHERE `realmid` = '2' ORDER BY `starttime` DESC LIMIT 1") or die(mysql_error());
	$row_uptime = mysql_fetch_array($uptime);
	$day = floor($row_uptime['uptime'] / 86400);
	if($day > 0)
		$days = $day.'Jours';
	else
		$days = '';
	$hours = floor(($row_uptime['uptime'] - ($day * 86400)) / 3600);
	if($hours < 10)
		$hours = '0'.$hours;
	$min = floor(($row_uptime['uptime'] - (($hours * 3600) + ($day * 86400))) / 60);
	if ($min < 10)
		$min = "0".$min;
	$sec = $row_uptime['uptime'] - ($day * 86400) - ($hours * 3600) - ($min * 60);
	if ($sec < 10)
		$sec = "0".$sec;
	$totaltime = ''.$days.$hours.'h '.$min.'m et '.$sec.'s';
	return $totaltime;
}
$uptime_2 = uptime_2();

/* Royaume */
function realmlist_id()
{
	global $array_db;
	/* Connexion */
	$cxn = mysql_connect($array_db['host'],$array_db['user'],$array_db['pass']);
	if (!$cxn) {
	   die('Erreur : ' . mysql_error()); // Affichage de l'erreur
	}
	/* Sélection de la base de données des comptes */
	$db = mysql_select_db ($array_db['db_realmd'],$cxn);
	if (!$db) {
		die ('Erreur : ' . mysql_error());
	}	  
	$realmlist_id = mysql_query("SELECT * FROM `realmlist` WHERE `id` = '1'");
	$row_realmlist_id = mysql_fetch_array($realmlist_id);
	return $row_realmlist_id;
}
$royaume = realmlist_id();

/* Royaume 2 */
function realmlist_id_2()
{
	global $array_db;
	/* Connexion */
	$cxn = mysql_connect($array_db['host'],$array_db['user'],$array_db['pass']);
	if (!$cxn) {
	   die('Erreur : ' . mysql_error()); // Affichage de l'erreur
	}
	/* Sélection de la base de données des comptes */
	$db = mysql_select_db ($array_db['db_realmd'],$cxn);
	if (!$db) {
		die ('Erreur : ' . mysql_error());
	}	  
	$realmlist_id_2 = mysql_query("SELECT * FROM `realmlist` WHERE `id` = '2'");
	return $realmlist_id_2;
}
$royaume_2 = realmlist_id_2();

/* Informations points de vote */
function voting_points_id()
{
	global $array_db,$session_id;
	/* Connexion */
	$cxn = mysql_connect($array_db['host'],$array_db['user'],$array_db['pass']);
	if (!$cxn) {
	   die('Erreur : ' . mysql_error()); // Affichage de l'erreur
	}
	/* Sélection de la base de données du site */
	$db = mysql_select_db ($array_db['db_site'],$cxn);
	if (!$db) {
		die ('Erreur : ' . mysql_error());
	}
	$voting_points_id = mysql_query("SELECT * FROM `voting_points` WHERE `id` = '".$session_id."'");
	$row_voting_points_id = mysql_fetch_array($voting_points_id);
	return $row_voting_points_id;
}
$infos_points = voting_points_id();

function connecteTotal() {
	global $array_db;

	$db = mysql_select_db ($array_db['db_characters'],$cxn);
	if (!$db) {
		die ('Erreur : ' . mysql_error());
	}
}
?>

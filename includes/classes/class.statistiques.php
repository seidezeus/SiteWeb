<?php
/* Sélection de la base de données des comptes */
$db = mysql_select_db ($array_db['db_realmd'],$cxn);
if (!$db) {
	die ('Erreur : ' . mysql_error());
}

/* Nombre de comptes */
$sql_nb_comptes = mysql_query("SELECT COUNT(*) AS nbre_entrees FROM account") or die ('Erreur : ' . mysql_error());
$nb_comptes = mysql_fetch_array($sql_nb_comptes);

/* Sélection de la base de données des personnages */
$db = mysql_select_db ($array_db['db_characters'],$cxn);
if (!$db) {
	die ('Erreur : ' . mysql_error());
}

/* Nombre de personnages */
$sql_nb_persos = mysql_query("SELECT COUNT(*) AS nbre_entrees FROM characters");
$nb_persos = mysql_fetch_array($sql_nb_persos);

/* Nombre de personnages guerrier */
$sql = mysql_query("SELECT COUNT(*) AS nbre_entrees FROM characters WHERE class=1");
$nb_persos_guerrier = mysql_fetch_array($sql);

/* Nombre de personnages paladin */
$sql = mysql_query("SELECT COUNT(*) AS nbre_entrees FROM characters WHERE class=2");
$nb_persos_paladin = mysql_fetch_array($sql);

/* Nombre de personnages chasseur */
$sql = mysql_query("SELECT COUNT(*) AS nbre_entrees FROM characters WHERE class=3");
$nb_persos_chasseur = mysql_fetch_array($sql);

/* Nombre de personnages voleur */
$sql = mysql_query("SELECT COUNT(*) AS nbre_entrees FROM characters WHERE class=4");
$nb_persos_voleur = mysql_fetch_array($sql);

/* Nombre de personnages prêtre */
$sql = mysql_query("SELECT COUNT(*) AS nbre_entrees FROM characters WHERE class=5");
$nb_persos_pretre = mysql_fetch_array($sql);

/* Nombre de personnages chevalier de la mort */
$sql = mysql_query("SELECT COUNT(*) AS nbre_entrees FROM characters WHERE class=6");
$nb_persos_dk = mysql_fetch_array($sql);

/* Nombre de personnages chaman */
$sql = mysql_query("SELECT COUNT(*) AS nbre_entrees FROM characters WHERE class=7");
$nb_persos_chaman = mysql_fetch_array($sql);

/* Nombre de personnages mage */
$sql = mysql_query("SELECT COUNT(*) AS nbre_entrees FROM characters WHERE class=8");
$nb_persos_mage = mysql_fetch_array($sql);

/* Nombre de personnages démoniste */
$sql = mysql_query("SELECT COUNT(*) AS nbre_entrees FROM characters WHERE class=9");
$nb_persos_demoniste = mysql_fetch_array($sql);

/* Nombre de personnages druide */
$sql = mysql_query("SELECT COUNT(*) AS nbre_entrees FROM characters WHERE class=11");
$nb_persos_druide = mysql_fetch_array($sql);

/* Nombre de personnages humain */
$sql = mysql_query("SELECT COUNT(*) AS nbre_entrees FROM characters WHERE race=1");
$nb_persos_humain = mysql_fetch_array($sql);

/* Nombre de personnage nain */
$sql = mysql_query("SELECT COUNT(*) AS nbre_entrees FROM characters WHERE race=3");
$nb_persos_nain = mysql_fetch_array($sql);

/* Nombre de personnage elfe de la nuit */
$sql = mysql_query("SELECT COUNT(*) AS nbre_entrees FROM characters WHERE race=4");
$nb_persos_elfedelanuit = mysql_fetch_array($sql);

/* Nombre de personnages draenei */
$sql = mysql_query("SELECT COUNT(*) AS nbre_entrees FROM characters WHERE race=11");
$nb_persos_draenei = mysql_fetch_array($sql);

/* Nom de personnages gnome */
$sql = mysql_query("SELECT COUNT(*) AS nbre_entrees FROM characters WHERE race=7");
$nb_persos_gnome = mysql_fetch_array($sql);

/* Nombre de personnages orc */
$sql = mysql_query("SELECT COUNT(*) AS nbre_entrees FROM characters WHERE race=2");
$nb_persos_orc = mysql_fetch_array($sql);

/* Nombre de personnages mort-vivant */
$sql = mysql_query("SELECT COUNT(*) AS nbre_entrees FROM characters WHERE race=5");
$nb_persos_mortvivant = mysql_fetch_array($sql);

/* Nombre de personnages tauren */
$sql = mysql_query("SELECT COUNT(*) AS nbre_entrees FROM characters WHERE race=6");
$nb_persos_tauren = mysql_fetch_array($sql);

/* Nombre de personnages troll */
$sql = mysql_query("SELECT COUNT(*) AS nbre_entrees FROM characters WHERE race=8");
$nb_persos_troll = mysql_fetch_array($sql);

/* Nombre de personnages elfe de sang */
$sql = mysql_query("SELECT COUNT(*) AS nbre_entrees FROM characters WHERE race=10");
$nb_persos_elfedesang = mysql_fetch_array($sql);

/* Nombre de personnages allianceux */
$nb_persos_a = ($nb_persos_humain['nbre_entrees'] + $nb_persos_nain['nbre_entrees'] + $nb_persos_elfedelanuit['nbre_entrees'] + $nb_persos_draenei['nbre_entrees'] + $nb_persos_gnome['nbre_entrees']);

/* Nombre de personnages hordeux */
$nb_persos_h = ($nb_persos_orc['nbre_entrees'] + $nb_persos_mortvivant['nbre_entrees'] + $nb_persos_tauren['nbre_entrees'] + $nb_persos_troll['nbre_entrees'] + $nb_persos_elfedesang['nbre_entrees']);
?>
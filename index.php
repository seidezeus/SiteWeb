<?php
//////////////////////////////////////////////////
//			   *MaNGOS-Cata-Web*				//
//												//
//	Site développé par Allan pour Easy-MaNGOS	//
//////////////////////////////////////////////////
session_start();
error_reporting(0);

htmlspecialchars($input);
htmlentities($input);
addslashes($input);

/* Chargement du fichier config */
require_once ('includes/configuration.php');

/* Prise en compte des variables */
$session_id = mysql_real_escape_string($_SESSION['id']);
$session_username = mysql_real_escape_string(htmlentities($_SESSION['username']));
$ip = getenv("REMOTE_ADDR");

$race = array(1=> "Humain",2=> "Orc",3=> "Nain",4=> "Elfe de la nuit",5=> "Mort-vivant",6=> "Tauren",7=> "Gnome",8=> "Troll",10=> "Elfe de sang",11=> "Draenei");
$class = array(1=> "Guerrier",2=> "Paladin",3=> "Chasseur",4=> "Voleur",5=>" Prêtre",6=> "Chevalier de la mort",7=> "Chaman",8=> "Mage",9=> "Démoniste",11=> "Druide");
$faction = array(1=> "Alliance",2=> "Horde",3=> "Alliance",4=> "Alliance",5=> "Horde",6=> "Horde",7=> "Alliance",8=> "Horde",10=> "Horde",11=> "Alliance");

/* Chargement des fonctions */
require_once ('includes/fonctions/function.vote.php');
require_once ('includes/fonctions/function.site.php');
?>
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="fr-fr">
<head>
<title><?php echo $array_site['nom']; ?></title>

<link rel="shortcut icon" href="style/images/favicons/wow-icon.png" type="image/x-icon"/>

<link rel="stylesheet" type="text/css" media="all" href="style/css/common.css" />
<!--[if IE]><link rel="stylesheet" type="text/css" media="all" href="http://eu.battle.net/wow/static/local-common/css/common-ie.css" /><![endif]-->
<!--[if IE 6]><link rel="stylesheet" type="text/css" media="all" href="http://eu.battle.net/wow/static/local-common/css/common-ie6.css" /><![endif]-->
<!--[if IE 7]><link rel="stylesheet" type="text/css" media="all" href="http://eu.battle.net/wow/static/local-common/css/common-ie7.css" /><![endif]-->


<link rel="stylesheet" type="text/css" media="all" href="style/css/wow.css" />
<!--[if IE]><link rel="stylesheet" type="text/css" media="all" href="http://eu.battle.net/wow/static/css/wow-ie.css" /><![endif]-->
<!--[if IE 6]><link rel="stylesheet" type="text/css" media="all" href="http://eu.battle.net/wow/static/css/wow-ie6.css" /><![endif]-->
<!--[if IE 7]><link rel="stylesheet" type="text/css" media="all" href="http://eu.battle.net/wow/static/css/wow-ie7.css" /><![endif]-->

<link rel="stylesheet" type="text/css" media="all" href="style/css/cms/homepage.css" />
<link rel="stylesheet" type="text/css" media="all" href="style/css/cms/blog.css" />
<link rel="stylesheet" type="text/css" media="all" href="style/css/cms/comments.css" />
<link rel="stylesheet" type="text/css" media="all" href="style/css/cms/cms-common.css" />

<link rel="stylesheet" type="text/css" media="all" href="style/css/cms.css" />
<!--[if IE 6]><link rel="stylesheet" type="text/css" media="all" href="http://eu.battle.net/wow/static/css/cms-ie6.css" /><![endif]-->

<link rel="stylesheet" type="text/css" media="all" href="style/css/locale/fr-fr.css" />

<link rel="stylesheet" type="text/css" media="all" href="style/css/profile.css" />
<!--[if IE]><link rel="stylesheet" type="text/css" media="all" href="http://eu.battle.net/wow/static/css/profile-ie.css" /><![endif]-->
<!--[if IE 6]><link rel="stylesheet" type="text/css" media="all" href="http://eu.battle.net/wow/static/css/profile-ie6.css" /><![endif]-->

<link rel="stylesheet" type="text/css" media="all" href="style/css/character/summary.css" />
<!--[if IE]><link rel="stylesheet" type="text/css" media="all" href="http://eu.battle.net/wow/static/css/character/summary-ie.css" /><![endif]-->
<!--[if IE 6]><link rel="stylesheet" type="text/css" media="all" href="http://eu.battle.net/wow/static/css/character/summary-ie6.css" /><![endif]-->

<link rel="stylesheet" type="text/css" media="all" href="style/css/cms/search.css" />
<link rel="stylesheet" type="text/css" media="all" href="style/css/search.css" />

<script type="text/javascript" src="style/js/third-party/jquery-1.4.4.min.js"></script>
<script type="text/javascript" src="style/js/core.js"></script>
<script type="text/javascript" src="style/js/tooltip.js"></script>

<script type="text/javascript" src="style/js/menu.js"></script>
<script type="text/javascript" src="style/js/wow.js"></script>
<script type="text/javascript" src="style/js/noel.js"></script>

<script type="text/javascript" src="http://static.wowhead.com/widgets/power.js"></script>
<script language="javascript">
var state = 'none';
function showhide(layer_ref) 
{
	if (state == 'block') {
	state = 'none';
	}
	else {
		state = 'block';
	}
	if (document.all) {
		eval( "document.all." + layer_ref + ".style.display = state");
	}
	if (document.layers) {
		document.layers[layer_ref].display = state;
	}
	if (document.getElementById &&!document.all) {
		hza = document.getElementById(layer_ref);
		hza.style.display = state;
	}
}
</script>
</head>
<?php
if (isset($_GET['page'])) {
    file_exists('pager/'.$_GET['page'].'.php') ? $page=$_GET["page"] : $page='404';
} else {
    $page='Accueil';
}
include_once 'pager/'.$page.'.php';
?>
</html>

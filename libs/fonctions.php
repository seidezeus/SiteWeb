<?php

function getindexnews()
{
	global $array_db,$array_base;
	mysql_connect($array_db['hote'],$array_db['user'],$array_db['pass'])  or die();
	mysql_select_db($array_db['site']) or die();
	$news = mysql_query("SELECT * FROM news  WHERE act='1' ORDER BY id DESC LIMIT 0,3");
	return $news; 
}
function viewboutique()
{
	global $array_db,$array_base,$_POST;
	mysql_connect($array_db['hote'],$array_db['user'],$array_db['pass'])  or die();
	mysql_select_db($array_db['site']) or die();
	$viewb = mysql_query("SELECT * FROM boutique WHERE cat='".$_POST['cat']."'");
	return $viewb; 
}
function viewinfosperso()
{
global $array_db,$array_base,$_SESSION;
mysql_connect($array_db['hote'],$array_db['user'],$array_db['pass'])  or die();
mysql_select_db($array_db['realmd']) or die();
$voirinfo = mysql_query("SELECT * FROM account WHERE id = '".$_SESSION['id']."'");
$inforesult = mysql_fetch_assoc($voirinfo);
return $inforesult;
}
function viewmaxplayers()
{
global $array_db,$array_base,$_SESSION;
mysql_connect($array_db['hote'],$array_db['user'],$array_db['pass'])  or die();
mysql_select_db($array_db['realmd']) or die();
$viewplayer = mysql_query("SELECT * FROM `uptime` ORDER BY `maxplayers` DESC LIMIT 1") or die(mysql_error());
$viewmax = mysql_fetch_array($viewplayer);
return $viewmax['maxplayers'];
}
function viewserverid()
{
global $array_db,$array_base,$_SESSION;
mysql_connect($array_db['hote'],$array_db['user'],$array_db['pass'])  or die();
mysql_select_db($array_db['realmd']) or die();
$servid = mysql_query("SELECT * FROM `realmlist`") OR DIE(mysql_error());
return $servid;
}
function viewuptime()
{
global $array_db,$array_base;
mysql_connect($array_db['hote'],$array_db['user'],$array_db['pass'])  or die();
mysql_select_db($array_db['realmd']) or die();
$viewup = mysql_query("SELECT * FROM `uptime` ORDER BY `uptime` DESC LIMIT 1") or die(mysql_error());
$viewtime = mysql_fetch_array($viewup);
$day = floor($viewtime['uptime'] / 86400);
if($day > 0)
  $days = $day.'Jours';
else
  $days = '';
$hours = floor(($viewtime['uptime'] - ($day * 86400)) / 3600);
if($hours < 10)
  $hours = '0'.$hours;
$min = floor(($viewtime['uptime'] - (($hours * 3600) + ($day * 86400))) / 60);
if ($min < 10)
    $min = "0".$min;
$sec = $viewtime['uptime'] - ($day * 86400) - ($hours * 3600) - ($min * 60);
if ($sec < 10)
    $sec = "0".$sec;
$totaltime = ''.$days.$hours.'h '.$min.'m '.$sec.'s';
return $totaltime;
}
function viewpersoban()
{
global $array_db,$array_base,$_SESSION;
mysql_connect($array_db['hote'],$array_db['user'],$array_db['pass'])  or die();
mysql_select_db($array_db['realmd']) or die();
$viewban = mysql_query("SELECT * FROM account_banned WHERE id = '".$_SESSION['id']."'");
$banresult = mysql_fetch_assoc($viewban);
return $banresult;
}
function replacepseudo()
{
global $_SESSION;
$pseudo = str_replace("é","&eacute;",$_SESSION['pseudo']);
$pseudo = str_replace("è","&egrave;",$pseudo);
$pseudo = str_replace("ê","&ecirc;;",$pseudo);
$pseudo = str_replace("\"","&quot;",$pseudo);
$pseudo = str_replace("\'","&quot;",$pseudo);
$pseudo = str_replace("á ","&aacute;",$pseudo);
$pseudo = str_replace("©","&copy;",$pseudo);
$pseudo = str_replace("€","&euro;",$pseudo);
$pseudo = str_replace("Ð","&ETH;",$pseudo);
$pseudo = str_replace("ø","&oslash;",$pseudo);
$pseudo = str_replace("Ø","&Oslash;",$pseudo);
return $pseudo;
}
function replacetexte($texte)
{
$textes = str_replace("é","&eacute;",$texte);
$textes = str_replace("è","&egrave;",$textes);
$textes = str_replace("ê","&ecirc;;",$textes);
$textes = str_replace("\"","&quot;",$textes);
$textes = str_replace("\'","&quot;",$textes);
$textes = str_replace("á ","&aacute;",$textes);
$textes = str_replace("©","&copy;",$textes);
$textes = str_replace("€","&euro;",$textes);
$textes = str_replace("Ð","&ETH;",$textes);
$textes = str_replace("ø","&oslash;",$textes);
$textes = str_replace("Ø","&Oslash;",$textes);
return $textes;
}

function verifcomptexist()
{
global $array_db,$array_base,$_POST;
mysql_connect($array_db['hote'],$array_db['user'],$array_db['pass'])  or die();
mysql_select_db($array_db['realmd']) or die();
$viewcompte = mysql_query("SELECT COUNT(*) AS nb_p FROM account WHERE username = '".$_POST['pseudo']."'");
$compteresult = mysql_fetch_assoc($viewcompte);
return $compteresult;
}
function verifpseudolibre()
{
global $array_db,$array_base,$_GET;
mysql_connect($array_db['hote'],$array_db['user'],$array_db['pass'])  or die();
mysql_select_db($array_db['realmd']) or die();
$resultat = mysql_query("SELECT username FROM account WHERE username='".$_GET["pseudo"]."'");
return $resultat;
}
function createcompte()
{
global $array_db,$array_base,$_POST,$_SERVER,$pseudo,$passb,$mail,$expansion,$code_confirmation;
mysql_connect($array_db['hote'],$array_db['user'],$array_db['pass'])  or die();
mysql_select_db($array_db['realmd']) or die();
$create = "INSERT INTO account (username, sha_pass_hash, gmlevel, email, last_ip, expansion, sessionkey) VALUES('".$pseudo."', SHA1(CONCAT(UPPER('".$pseudo."'),':',UPPER('".$passb."'))), 0, '".$mail."', '".$_SERVER['REMOTE_ADDR']."', '".$expansion."','".$code_confirmation."')";
mysql_query($create) or die(mysql_error());
return $create;
}
function ajoutspoints()
{
global $array_db,$array_base,$user,$date_now;
mysql_connect($array_db['hote'],$array_db['user'],$array_db['pass'])  or die();
mysql_select_db($array_db['realmd']) or die();
$viewpoints = mysql_query("SELECT * FROM account WHERE username='$user'");
$pointadd = mysql_fetch_array($viewpoints);
$add_points = ($pointadd['points'] + $array_base['point_vote']);	
$add_vote = ($pointadd['vote'] + 1);
mysql_query("UPDATE account SET points='$add_points', vote='$add_vote', date_vote='$date_now' WHERE username='$user'") or die ();
return $add_vote;
}



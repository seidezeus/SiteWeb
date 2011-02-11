<div align="center">
<h3>Administration des joueurs</h3>
<hr color="#C49720" size="4px"><br/><br/>
<?php
if($_SESSION['login'] && $_SESSION['login'] == TRUE)
{
$gm_result = viewinfosperso();
if($gm_result['gmlevel'] >= '2')
{
if(!isset($_POST['pseudo']))
{
?>
<form action="index.php?site=jadmin" method="post">
<u>Veuillez entrer un nom de compte à administrer :</u><br/><br/>
<div class="champ"><input class="champ1" type="text" name="pseudo"></div><br/>
<input type="submit" value="envoyer"><br/><br/></form>							
<?php
}else
{
if($_GET['action'])
{ 
switch($_GET['action'])
{
case 'delete':
?>
Voulez vous vraiment supprimer le compte "<?php echo $_SESSION['admin_pseudo']; ?>" <a href="">Oui</a> <a href="">Non</a>
<?php
break;
}
}
$pseudo = strip_tags($_POST['pseudo']);
mysql_select_db($array_db['realmd']) or die();
$view_pseudo = mysql_query("SELECT COUNT(*) AS nb_pseudo FROM account WHERE username = '".$pseudo."'");
$pseudo_result = mysql_fetch_assoc($view_pseudo);
if($pseudo_result['nb_pseudo'] != '1')
{
?>
le compte <?php echo $pseudo; ?> n'existe pas.<br>
<a href= "index.php?site=jadmin">Retour</a>
<?php
}else
{
$_SESSION['admin_pseudo'] = $pseudo;
mysql_select_db($array_db['realmd']) or die();
$view_inf = mysql_query("SELECT * FROM account WHERE username ='".$pseudo."'");
$inf_result = mysql_fetch_assoc($view_inf);
$last = date("d/m/Y",$inf_result['last_login']);
if($inf_result['email'] == '0')
{
$mail = 'Aucune';
}else
{
$mail = $inf_result['email'];
}
if($inf_result['tbc'] == '0')
{
$tbc = 'Non';
}else
{
$tbc = 'Oui';
}
if($inf_result['last_ip'] == '127.0.0.1')
{
$ip = 'Inconnue';
}else
{
$ip = $inf_result['last_ip'];
}
if($inf_result['last_login'] == '0000-00-00 00:00:00')
{
$l_log = 'Jamais';
}else
{
$l_log  = $inf_result['last_login'];
}
if($inf_result['locked'] != '0')
{
$txt_lock = 'Dévérouiller le compte';
$url_lock = md5("Dévérouiller");
}else
{
$txt_lock = 'Mettre le compte en maintenance';
$url_lock = md5("maintenance");
}
if($inf_result['gmlevel'] == '0')
{
$txt_gm = 'Donner les accès GM';
$url_gm = md5("Donner accès GM");
}else
{
$txt_gm = 'Enlever les accès GM';
$url_gm = md5("Enlève accès GM");
}
?>
<table border='1'>
<tr><th>ID</th><th>compte</th><th>Date d'inscription</th><th>connexion</th><th>IP</th><th>Email</th><th>Points</th><th>GM</th></tr>
<tr align="center"><th><?php $_SESSION['loginpseudoply'] = $inf_result['id']; echo $inf_result['id']; ?></th><th><?php echo $inf_result['username']; ?></th><th><?php echo $inf_result['joindate'];  ?></th>
<th><?php echo $l_log;  ?></th><th><?php echo $ip;  ?></th><th><?php echo $mail;  ?></th><th><?php echo $inf_result['points']; ?></th><th><?php echo $inf_result['gmlevel']; ?></th></tr>
</table><br/><br/>
Action(s) possible :<br/><br/>
<?php							
if($gm_result['gmlevel'] >= '2')
{
?>
<A class=menu href="index.php?site=pass_admin">Changer son Mot de Passe</a></li><br />
<A class=menu  href="index.php?site=other_ip">Voir les autres comptes avec la même adresse ip</a></li><br />
<?php
}
if($gm_result['gmlevel'] >= '3')
{
?>
<a class=menu href="index.php?site=acces_gm" >Modifier les Rangs GM</a></li><br />
<a class=menu href="index.php?site=admin_points" >Modifier les Points</a></li><br />
<a class=menu  href="index.php?site=chmailadmin">Changer son email</a></li><br />
<a class=menu  href="index.php?site=delperso">Supprimer ce compte</a></li><br />	
<a class=menu href="index.php?site=cst&act=<?php echo $url_lock; ?>"> <?php echo $txt_lock; ?></a></li><br /><br>
<?php
}
}
}
}else
{
?>				
<meta http-equiv="refresh" content="5; url=index.php">
<font color="#CC3300">Erreur, vous n'avez  pas les droits d'acces a cette pages. redirection dans 5 secondes ...</font><br>
<?php 
}
}else
{
?>
<meta http-equiv="refresh" content="5; url=index.php">
<font color="#CC3300">Erreur, vous devez êtres connecter pour avoir acces a cette page. redirection dans 5 secondes ...</font>
<?php 
}
?>
</div>
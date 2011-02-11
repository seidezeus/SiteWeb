<div align="center">
<h3>suspendre le Compte.</h3>
<hr color="#C49720" size="4px"><br/>
<?php
if($_SESSION['login'] && $_SESSION['login'] == TRUE)
{
if($_SESSION['admin_pseudo'] && !empty($_SESSION['admin_pseudo']))
{
$gm_result = viewinfosperso();
if($gm_result['gmlevel'] >= '3')
{
$url_main = md5("maintenance");
$url_de = md5("Dévérouiller");
$get = mysql_escape_string($_GET['act']);
switch($get)
{
case $url_main :
mysql_select_db($array_db['realmd']) or die();
mysql_query("UPDATE account SET locked ='1' WHERE username = '".$_SESSION['admin_pseudo']."' LIMIT 1 ");
echo '<p class="succes">Compte mis en maintenance avec succès.</p><br/><br/><a href="index.php?site=jadmin">[retour]</a><br/>';
break;
case $url_de :
mysql_select_db($array_db['realmd']) or die();
mysql_query("UPDATE account SET locked ='0' WHERE username = '".$_SESSION['admin_pseudo']."' LIMIT 1 ");
echo '<p class="succes">Compte dévérouiller avec succès.</p><br/><br/><a href="index.php?site=jadmin">[retour]</a><br/>';
break;
default :
echo '<p class="erreur">Action impossible</p><br/><br/><a href="index.php?site=jadmin">[retour]</a><br/>';
break;
}    
}else
{
echo '<p class="erreur">Erreur vous n&apos;avez pas les droits d&apos;accès a cette page ...</p><br/><br/><a href="index.php">[retour]</a><br/>';
}
}else
{
echo '<p class="erreur">Erreur vous n&apos;avez Sélectioner aucun compte,<br> pour selectioné un compte aller dans l&apos;administration des joueurs ...</p><br/><br/><a href="index.php">[retour]</a><br/>';
}	
}else
{
echo '<p class="erreur">Erreur vous devez êtres connectée pour avoir acces a cette page ...</p><br/><br/><a href="index.php">[retour]</a><br/>';
}
?>
</div>
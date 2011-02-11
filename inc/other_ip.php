<div align="center">
<h3>Compte lié a la même adresse ip</h3>
<hr color="#C49720" size="4px"><br/>
<?php
$gm_result = viewinfosperso();
if($gm_result['gmlevel'] >= '3')
{
if(isset($_GET['result']) && !empty($_GET['result']))
{
$result = addslashes(mysql_real_escape_string($_GET['result']));
$_SESSION['admin_pseudo'] = $result;
echo '<meta http-equiv="refresh" content="1; url=index.php?site=jadmin&amp;rev=next">';
}
if(isset($_SESSION['admin_pseudo']) && !empty($_SESSION['admin_pseudo']))
{
mysql_select_db($array_db['realmd']) or die();
$sel_mem = mysql_query("SELECT * FROM account WHERE username = '".$_SESSION['admin_pseudo']."'");
$reslt_mem = mysql_fetch_assoc($sel_mem);
$sel_ip = mysql_query("SELECT * FROM account WHERE last_ip = '".$reslt_mem['last_ip']."'");
while($reslt_ip = mysql_fetch_assoc($sel_ip))
{
echo'<a href="index.php?site=jadmin">'.$reslt_ip['username'].'</a><br/>';
}
echo'<br/><a href= "index.php?site=jadmin">[retour]</a>';
}else
{
echo '<p class="erreur">Erreur vous n&apos;avez Sélectioner aucun compte,<br> pour selectioné un compte aller dans l&apos;administration des joueurs ...</p><br/><br/>';
echo '<a href="index.php?site=jadmin" title="">[retour]</a>';
}
}else
{
echo '<meta http-equiv="refresh" content="3; url=index.php"><p class="erreur">Erreur: Vous n&apos;avez pas les droits d&apos;acces a cette pages ...</p><br/><br/>';
}
?>
</div>
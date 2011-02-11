<div align="center">
<h3>supprimer le Compte.</h3>
<hr color="#C49720" size="4px"><br/>
<?php
if($_SESSION['login'] && $_SESSION['login'] == TRUE)
{
if($_SESSION['admin_pseudo'] && !empty($_SESSION['admin_pseudo']))
{
$gm_result = viewinfosperso();
if($gm_result['gmlevel'] >= '3')
{
echo '<p class="erreur">Etes vous sûre de vouloir supprimer ce compte ? <a href="index.php?site=delperso&chx=true">Oui</a> <a href="index.php?site=delperso&chx=false">Non</a>';
if($_GET['chx'] && !empty($_GET['chx']))
{
switch($_GET['chx'])
{
case 'true':
mysql_select_db($array_db['realmd']) or die();
mysql_query("DELETE FROM account WHERE username = '".$_SESSION['admin_pseudo']."' LIMIT 1");
echo '<p class="succes">Compte supprimer avec succes </p><br/><br/> <a href="index.php?site=jadmin">[retour]</a>';
break;
case 'false':
echo '<meta http-equiv="refresh" content="0; url=index.php?site=jadmin">';
break;
}
}
}else
{
echo '<p class="erreur">Erreur vous n&apos;avez pas les droits d&apos;acces a cette page ...</p>';
echo '<br/><br/><a href="index.php?site=jadmin" >[retour]</a><br/><br/>';
}
}else
{
echo '<p class="erreur">Erreur vous n&apos;avez Sélectioner aucun compte,<br> pour selectioné un compte aller dans l&apos;administration des joueurs ...</p>';
echo '<br/><br/><a href="index.php?site=jadmin" >[retour]</a><br/><br/>';
}	
}else
{
echo '<p class="erreur">Erreur vous devez êtres connectée pour avoir acces a cette page ...</p>';
echo '<br/><br/><a href="index.php?site=jadmin" >[retour]</a><br/><br/>';
}
?>
</div>
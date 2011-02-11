<div align="center">
<h3>Modifications Email</h3>
<hr color="#C49720" size="4px"><br/>
<?php
if($_SESSION['login'] && $_SESSION['login'] == TRUE)
{
$gm_result = viewinfosperso();
if($gm_result['gmlevel'] >= '3')
{
if($_POST['mail'])
{
if(!empty($_POST['mail']))
{
$mail = htmlspecialchars(strip_tags($_POST['mail']));
$mail = str_replace("java script:","",$mail);
$mail = str_replace("<script>","",$mail); 
if (preg_match("#[a-z0-9._-]+@[a-z0-9._-]{2,}\.[a-z]{2,4}$#", $mail))
{
mysql_select_db($array_db['realmd']) or die();
mysql_query("UPDATE account SET email = '".$_POST['mail']."' WHERE username = '".$_SESSION['admin_pseudo']."'");
echo '<meta http-equiv="refresh" content="3; url=index.php?site=jadmin">';
echo '<p class="succes">L&apos;email à été mise à jour avec succés</p><br/><br/>';     
}else
{
echo '<p class="erreur">Erreur: L&apos;email choisis n&apos;est pas valide</p>';
}
}else
{
echo '<p class="erreur">Erreur: Vous n&apos;avez pas remplis tous les champs</p>';
}
}
echo 'Entrez la nouvelle adresse Email :<br/><br/><form action="index.php?site=chmailadmin" method="post">';
echo '<div class="champ"><input type="text" size="12" name="mail" class="champ1"></div><br/><br/><input type="submit" value="Envoyer"><br/></form>';
}
}else
{
echo '<meta http-equiv="refresh" content="3; url=index.php">';
echo '<p class="erreur">Erreur vous devez &ecirc;tres connect&eacute;e pour avoir acces a cette page Redirection dans 3 secondes ...</p>';
}
?>
</div>			
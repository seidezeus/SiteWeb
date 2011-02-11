<div align="center">
<h3>Modifications Email</h3>
<hr color="#C49720" size="4px">
<br/>
<?php
if($_SESSION['login'] && $_SESSION['login'] == TRUE)
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
mysql_query("UPDATE account SET email = '".$_POST['mail']."' WHERE username = '".$_SESSION['pseudo']."'");
?>
<p class="succes">L'email à été mise à jour avec succes!</p><br/><br/>
<?php     
}else
{
?>
<p class="erreur">Erreur: L'email choisis n'est pas valide</p><br/><br/>
<?php
}
}else
{
?>
<p class="erreur">Erreur: Vous n'avez pas remplis tous les champs</p><br/><br/>
<?php
}
}
?>
Entrez la nouvelle adresse Email :<br/><br/>
<form action="index.php?site=chmail" method="post">
<div class="champ"><input type="text" size="12" name="mail" class="champ1"></div>
<br><input type="image" src="images/boutonchang.png" value="changer"/><br/>
</form>
<?php
}else
{
?>				
<meta http-equiv="refresh" content="3; url=index.php">
<p class="erreur">Erreur vous devez &ecirc;tres connect&eacute;e pour avoir acces a cette page Redirection dans 3 secondes ...</p>
<?php 
}
?>
</div>			
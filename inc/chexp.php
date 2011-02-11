<div align="center">
<h3>Mise à jour du compte</h3>
<hr color="#C49720" size="4px">
<br/>
<?php
if($_SESSION['login'] && $_SESSION['login'] == TRUE)
{
if($_POST['expansion'])
{
if($_POST['expansion'] == 'wow')
{
$exp = '0';
}
$exp = $_POST['expansion'];
mysql_select_db($array_db['realmd']) or die();
mysql_query("UPDATE account SET expansion = '".$exp."' WHERE username = '".$_SESSION['pseudo']."'");
?>
<p class="succes">Le compte à été mis à jour avec succes!</p><br/><br/>
<?php
}
?>
<form action="index.php?site=chexp" method="post">
Expansion :<br/><br/>
<div class="champ"><select name="expansion"  class="champ1">
<option value="wow">WoW Classique</option>
<option value="1">Burning Crusade</option>
<option value="2">Woltk</option>
</select></div>
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
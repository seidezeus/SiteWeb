<div align="center">
<h3>Changer mot de passe</h3>
<hr color="#C49720" size="4px">
<br/>
<p><u>Veuillez entrer votre nouveau mot de passe, et le répéter dans la deuxième case.</u></p>
<br/><br/>
<?php
 if($_SESSION['login'] && $_SESSION['login'] == TRUE)
{				
if($_POST['paww'] && $_POST['paww2'])
{
if(!empty($_POST['paww']) && !empty($_POST['paww2']))
{
mysql_select_db($array_db['site']) or die();
mysql_query("DELETE FROM password_template");
$passa = htmlspecialchars(strip_tags($_POST['paww']));
$passb = htmlspecialchars(strip_tags($_POST['paww2']));
$passa = str_replace("java script:","",$passa);
$passa = str_replace("<script>","",$passa); 
$passb = str_replace("java script:","",$passb);
$passb = str_replace("<script>","",$passb); 
if($passa == $passb)
{
$q = "INSERT INTO password_template(password) VALUES (SHA1(CONCAT(UPPER('".$_SESSION['pseudo']."'),':',UPPER('".$passb."'))))";
mysql_query($q) or die(mysql_error());
$password_post = mysql_query("SELECT * FROM password_template");
$password_result = mysql_fetch_assoc($password_post);
mysql_select_db($array_db['realmd']) or die();
mysql_query("UPDATE account SET sha_pass_hash = '".$password_result['password']."' WHERE id = '".$_SESSION['id']."'");
?>
<p class="succes">Le mot de passe a &eacute;t&eacute; mis a jour avec succes.</p><br/><br/>
<?php
}else
{
?>
<p class="erreur">Erreur : Les deux mots de passe ne sont pas identique</p><br/><br/>
<?php
}
}else
{
?>
<p class="erreur">Erreur : Tous les champ n'ont pas &eacute;t&eacute;es remplis</p><br/><br/>
<?php
}
}
?>
<form action="index.php?site=chpass" method="post">
Nouveau Mot de passe : <br><div class="champ"><input type="text" size="15" name="paww" class="champ1"></div><br/><br/>
Repeter Mot de passe : <br><div class="champ"><input type="text" size="15" name="paww2" class="champ1"></div><br>
<input type="image" src="images/boutonchang.png" value="changer"/>
</form><br/><br/>
<?php
}else
{
?>
<p class="erreur">Erreur vous devez êtres connect&eacute;e pour avoir acces a cette page ...</p><br/><br/>
<a href="index.php" title="">[retour]</a>
<?php 
}
?>
</div>
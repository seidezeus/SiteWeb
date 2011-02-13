<div align="center">
<h3>Changer mot de passe</h3>
<hr color="#c67114" size="4px">
<br/>
<p class="erreur">Etes-vous sur de vouloir changer le mot de passe du compte : <?php echo $_SESSION['admin_pseudo']; ?> ?</p><br/><br/>
<?php
if($_SESSION['login'] && $_SESSION['login'] == TRUE)
{
$gm_result = viewinfosperso();
if($gm_result['gmlevel'] >= '3')
{
if($_SESSION['admin_pseudo'] && !empty($_SESSION['admin_pseudo']))
{
if($_POST['paww'] && $_POST['paww2'])
{
if(!empty($_POST['paww']) && !empty($_POST['paww2']))
{
mysql_select_db($array_db['site']) or die();
mysql_query("DELETE FROM password_template");
$passa = strip_tags($_POST['paww']);
$passb = strip_tags($_POST['paww2']);
if($passa == $passb)
{
mysql_select_db($array_db['site']) or die();
$q = "INSERT INTO password_template(password) VALUES (SHA1(CONCAT(UPPER('".$_SESSION['admin_pseudo']."'),':',UPPER('".$passb."'))))";
mysql_query($q) or die(mysql_error());
$password_post = mysql_query("SELECT * FROM password_template");
$password_result = mysql_fetch_assoc($password_post);
mysql_select_db($array_db['realmd']) or die();
mysql_query("UPDATE account SET sha_pass_hash = '".$password_result['password']."' WHERE username = '".$_SESSION['admin_pseudo']."'");
echo '<p class="succes">Le mot de passe a étée mis a jour avec succes.</p><br/><br/>';
echo '<meta http-equiv="refresh" content="3; url=index.php?site=jadmin">';
}else
{
echo '<p class="erreur">Erreur : Les deux mots de passe ne sont pas identique</p><br/><br/>';
echo '<a href="index.php?site=jadmin" title="">[retour]</a>';
}
}else
{
echo '<p class="erreur">Erreur : Tous les champ n&apos;ont pas étées remplis</p><br/><br/>';
echo '<a href="index.php?site=jadmin" title="">[retour]</a>';
}
}
echo '<form action="index.php?site=pass_admin" method="post">Nouveau Mot de passe : <br/><div class="champ"><input class="champ1" type="password" size="13" name="paww"></div><br/>';
echo 'Répétez Mot de passe : <br/><div class="champ"><input class="champ1" type="password" size="13" name="paww2"></div><br/><input type="submit" value="Envoyer"></form><br/>';
}else
{
echo '<p class="erreur">Erreur vous n&apos;avez Sélectioner aucun compte,<br> pour selectioné un compte aller dans l&apos;administration des joueurs ...</p><br/><br/>';
echo '<a href="index.php?site=jadmin" title="">[retour]</a>';
}	
}else
{
echo '<p class="erreur">Erreur vous n&apos;avez pas les droits d&apos;acces pour afficher cette page ...</p><br/><br/>';
echo '<a href="index.php" title="">[retour]</a>';
}
}else
{
echo '<p class="erreur">Erreur vous devez êtres connectée pour avoir acces a cette page ...</p>';
echo '<a href="index.php" title="">[retour]</a>';
}
?>
</div>
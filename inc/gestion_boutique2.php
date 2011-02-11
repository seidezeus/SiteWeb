<div align="center">
<h3>Gestion Boutique</h3>
<hr color="#C49720" size="4px"><br/>
<?php
if($_SESSION['login'] && $_SESSION['login'] == TRUE)
{
$gm_result = viewinfosperso();
if($gm_result['gmlevel'] >= '3')
{
mysql_select_db($array_db['site']) or die();	
$ry = mysql_query("SELECT * FROM boutique WHERE id='".$_POST['id']."' ");
echo '<form action="index.php?site=admin_boutique3" method="post" id="post" >';
while($rep = mysql_fetch_array($ry))
{
$_SESSION['idmertelol'] = $_POST['id'];
?>
<table  width=200 height=20 border "1">
<b>Editer table</b>
</tr><th><u><i>Id:</i></u></th><th><div class="champ"><input type="text" class="champ1" name="id" value="<?php echo $rep['id']; ?>"></div></th></tr><br>
</tr><th><u><i>Prix:</i></u></th><th><div class="champ"><input type="text" class="champ1" name="prix" value="<?php echo $rep['prix']; ?>"></div></th></tr><br>
</tr><th><u><i>Nom:</i></u></th><th><div class="champ"><input type="text" class="champ1" name="nom" value="<?php echo $rep['nom']; ?>"></div></th></tr><br>
</tr><th><u><i>Catégorie:</i></u></th><th><div class="champ"><input type="text" class="champ1" name="cat" value="<?php echo $rep['cat']; ?>"></div></th></tr><br></table>
<p class="erreur">Attention, les ' ne seront pas supporter par le formulaire ...</p><br/><br/>
<input class="submit" type="submit" value="Envoyer" /><input class="input_submit" type="reset" value="Par default" /></form>
<form action="index.php?site=supr_obj" method="post" id="post" ><input class="input_submit" type="Submit" value="Supprimer" /></form>
<?php
}
}else
{
echo '<p class="erreur">Vous n&apos;avez pas les droits d&apos;accès à cette page !</p>';
echo '<br/><br/><a href="index.php" >[retour]</a><br/><br/>';
}
}else
{
echo '<p class="erreur">Vous devez être connecter avant de pouvoir accèder à cette page.</p>';
echo '<br/><br/><a href="index.php" >[retour]</a><br/><br/>';
}
?>
</div>					
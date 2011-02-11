<script src="js/power.js"></script>
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
$ry = mysql_query("SELECT * FROM boutique ");
echo '<table width="530" border="1"> ';
echo '<th>ID</th><th>Prix</th><th>Nom</th><th>Catégorie</th>';
while($rep = mysql_fetch_array($ry))
{
echo '<form action="index.php?site=admin_boutique2" method="post" id="post" name="post">';
echo '<input type="hidden" name="id" value="'.$rep['id'].'" />';
echo '<tr><th>'.$rep['id'].'</th><th>'.$rep['prix'].'</th><th><a href="http://fr.wowhead.com/?item='.$rep['id'].'">'.$rep['nom'].'</a></th><th>'.$rep['cat'].'</th><th><input type="submit"  value="Modif/Suppr" /></th></tr><br/><br:></form>';
}
echo "</table>";
echo '<form action="index.php?site=ajt_obj" method="post" id="post" name="post"><br/><input type="submit"  value="Ajouter nouvel objet" /></form><br/>';
}else
{
echo '<p class="erreur">Vous n&apos;avez pas les droits d&apos;accès à cette page !</p>';
echo '<br/><br/><a href="index.php" title="">[retour]</a>';
}
}else
{
echo '<p class="erreur">Vous devez être connecter avant de pouvoir accèder à cette page.</p>';
echo '<br/><br/><a href="index.php" title="">[retour]</a>';
}
?>
</div>				
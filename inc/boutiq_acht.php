<script src="js/power.js"></script>
<div align="center">
<h3>Choisissez royaume & personnage</h3>
<hr color="#C49720" size="4px">
<br/>
<?php
if($_SESSION['login'] && $_SESSION['login'] == TRUE)
{
$id = strip_tags($_GET['id']);
mysql_select_db($array_db['site']) or die();
$view_id = mysql_query("SELECT COUNT(*) AS nb_id FROM boutique WHERE id = '".$id."'");
$id_result = mysql_fetch_assoc($view_id);
$_SESSION['nomobj'] = $id;
$ry = mysql_query("SELECT * FROM boutique WHERE id= '".$_GET['id']."' ");
while($rep = mysql_fetch_array($ry))
{
echo '<br/><b><a href="http://fr.wowhead.com/?item='.$rep['id'].'">'.$rep['nom'].'</a></b><br> <b> Prix :</b> '.$rep['prix'].' Points<br/>';
mysql_select_db($array_db['characters']) or die();
$ry = mysql_query("SELECT * FROM characters  WHERE account='".$_SESSION['id']."' ORDER BY name DESC LIMIT 0,10");
$ry2 = mysql_query("SELECT COUNT(name)as Count FROM characters WHERE account='".$_SESSION['id']."' ");
echo '<br/>Veuillez choisir un personnage:<br/><br/><form action="index.php?site=boutiqfinal" method="post">';
echo '<div class="champ"><select name="action" class="champ1"><optgroup label="personnage">';
while($rep = mysql_fetch_array($ry))
{
echo '</optgroup>';
echo ''.$ry2.'';              
echo '<option  name="nom" >'.$rep['name'].'</option>';
}
echo '</select></div><br/><br/><input type="submit" value="Valider" /></form>';
}
}
else
 {
echo '<meta http-equiv="refresh" content="3; url=index.php">';
echo '<p class="erreur">Erreur : vous devez être connecté pour accèder à cette page. Redirection dans 3 secondes ...</p>';
}
?>
</div>	
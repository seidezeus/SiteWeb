<script src="js/power.js"></script>
<div align="center">
<h3>Confirmation d'achat</h3>
<hr color="#C49720" size="4px">
<br/>
<?php
if($_SESSION['login'] && $_SESSION['login'] == TRUE ) 
{
mysql_select_db($array_db['characters']) or die();
$ry44 = mysql_query("SELECT * FROM characters WHERE name='".$_POST['action']."' ");
$rep44 = mysql_fetch_array($ry44);
mysql_select_db($array_db['site']) or die();
$ry2 = mysql_query("SELECT * FROM boutique WHERE id='".$_SESSION['nomobj']."' ");
$rep2 = mysql_fetch_array($ry2);
mysql_select_db($array_db['realmd']) or die();
$ry = mysql_query("SELECT * FROM account WHERE id='".$_SESSION['id']."' ");
$rep = mysql_fetch_array($ry);
if ($rep['points'] < $rep2['prix'])
 {
 echo '<p class="erreur">Erreur:veuillez vérifier que vous avez assez de points pour acheter cet object, ou encore que le personnage choisit est valide .</p>';
 echo '<br/><br/><a href="index.php?site=boutique" title="">[retour]</a>';
 }else
 {
 $calc = $rep['points'] - $rep2['prix'];
 mysql_query("UPDATE account SET points = '".$calc."' WHERE username = '".$_SESSION['pseudo']."'")or die (mysql_error());
 mysql_select_db($array_db['characters']) or die();
$ry44 = mysql_query("SELECT * FROM characters WHERE name='".$_POST['action']."' ");
$character = $rep44['guid'];
$iditem = $rep2['id'];
$nombre = 1;
$itemid = rand(1, 600000);
mysql_query("INSERT INTO item_instance (guid,owner_guid,data) VALUES ('".$itemid."','".$character."','".$itemid." 1073741936 3 ".$iditem." 1065353216 0 ".$character." 0 ".$character." 0 0 0 0 0 ".$nombre." 0 0 0 0 0 0 1 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0')");
mysql_query("REPLACE INTO character_inventory (guid, bag, slot, item, item_template) VALUES ('".$character."', '0', '23', '".$itemid."', '".$iditem."')");
echo '<p class="succes">Objet acheté avec succès !<br> ( Votre objet a été envoyé par courrier, si vous ne recevez pas l&apos;objet pendant 10 minutes, veuillez contacter un maître de jeu. )<br> Il vous reste: <u>'.$calc.' Point(s)</u></p><br/><br/>';
echo '<a href="index.php?site=boutique">[retour]</a>';
 }
 }else
 {			
echo '<meta http-equiv="refresh" content="3; url=index.php"><p class="erreur">Erreur : vous devez être connecté pour accèder à cette page. Redirection dans 3 secondes ...</p>';
echo '<br/><br/><a href="index.php?site=boutique" title="">[retour]</a>';
}
?>
</div>
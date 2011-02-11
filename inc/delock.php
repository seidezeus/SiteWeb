<div align="center">
<h2>Déblocage de personnage</h2>
<?php 
if($_SESSION['login'] && $_SESSION['login'] == TRUE)
{
mysql_select_db($array_db['characters']) or die();
?>
<hr color="#C49720" size="4px">
<br/>
<img src="images/dk.png" /><br/>
Bienvenue dans l'interface de d&eacute;blocage de personnages.<br/>
<br><u>Veuillez-vous d&eacute;connecter du jeu avant le d&eacute;blocage.</u><br/><br/>
 <?php
if(isset($_POST['perso']))
{
$perso = htmlspecialchars(mysql_real_escape_string(strip_tags($_POST['perso'])));
$perso = str_replace("java script:","",$perso);
$perso = str_replace("<script>","",$perso); 
$view_perso = mysql_query("SELECT * FROM `characters` WHERE name = '$perso' AND account = '$_SESSION[id]';") or die(mysql_error());
$perso_result = mysql_fetch_assoc($view_perso);
$feedback = mysql_affected_rows();
if($feedback == '0')
{
echo '<p class"erreur">Erreur: Le personnage n&apos;existe pas ou n&apos;est pas associé à ce compte ...</p>';
}else
{
$sel_char = mysql_query("SELECT * FROM `characters` WHERE name = '".$perso."' AND account = '".$_SESSION['id']."';")or die(mysql_error());
$char_result = mysql_fetch_assoc($sel_char);
$view_home = mysql_query("SELECT * FROM character_homebind WHERE guid = '".$char_result['guid']."'");
$home_result = mysql_fetch_assoc($view_home);
$coordonée = array(
     "map" => $home_result['map'],
     "zone" => $home_result['zone'],
	 "position_x" => $home_result['position_x'],
	 "position_y" => $home_result['position_y'],
	 "position_z" => $home_result['position_z']); 
  mysql_query("UPDATE `characters` SET `map` = '".$coordonée['map']."', `zone` = '".$coordonée['zone']."', `position_x` = '".$coordonée['position_x']."', `position_y` = '".$coordonée['position_y']."', `position_z` = '".$coordonée['position_z']."', `trans_x` = 0, `trans_y` = 0, `trans_z` = 0, `trans_o` = 0, `transguid` = 0  WHERE `guid` = '".$char_result['guid']."'");
echo '<p class="succes">Votre personnage a été d&eacute;bloquer avec succès. Vous pouvez vous connecter.</p><br><br/>';
}
}
$ry = mysql_query("SELECT * FROM characters  WHERE account='".$_SESSION['id']."' ORDER BY name DESC LIMIT 0,10");
$ry2 = mysql_query("SELECT COUNT(name)as Count FROM characters WHERE account='".$_SESSION['id']."' ");
?>
<p>Veuillez choisir un personnage à débloquer.</p><br/>
<form action="index.php?site=delock" method="post">
<div class="champ"><select name="perso" class="champ1">
<optgroup label="Choisissez un personnage">
<?php
while($rep = mysql_fetch_array($ry))
{
?>
</optgroup>
<?php echo $ry2; ?>
 <option  name="nom"><?php echo $rep['name']; ?></option>
<?php
}
?>
</select></div><br/>
<input type="image" src="images/boutondebloq.png" value="debloquer"/>
</form>
<?php
}else
{
?>				
<p class="erreur">Erreur, vous devez être connecté pour avoir accès a cette page.</p><br/><br/>
<a href="index.php">[retour]</a>
<?php 
}
?>
</div>
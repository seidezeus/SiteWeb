<div align="center">
<h3>Donner des accès MJ</h3>
<hr color="#C49720" size="4px"><br/>
<?php
if($_SESSION['login'] && $_SESSION['login'] == TRUE)
{
$gm_result = viewinfosperso();
if($gm_result['gmlevel'] >= '3')
{
if($_SESSION['admin_pseudo'] && !empty($_SESSION['admin_pseudo']))
{
if($_POST['pgm'] && $_POST['action'])
{
if(!empty($_POST['pgm']) && !empty($_POST['action']))
{
if (preg_match("#[0-9]#", $_POST['pgm']))
{
$pi = strip_tags($_POST['pgm']);
$action = strip_tags($_POST['action']);
if($pi >= '2')
{
$txt_pi = 'Rangs';
$au_pi = 'ont';
}else
{
$txt_pi = 'Rangs';
$au_pi = 'a';
}
switch($action)
{
case 'enlv':
mysql_select_db($array_db['realmd']) or die();
$view_pi = mysql_query("SELECT * FROM account WHERE username = '".$_SESSION['admin_pseudo']."'") or die (mysql_error());
$pi_result = mysql_fetch_assoc($view_pi);
if($pi_result['pgm'] < $pi)
{
echo '<p class="erreur">Le nombre de rang MJ que vous voulez retirer est supérieur au nombre de points du membre '.$_SESSION['admin_pseudo'].'</p>';
echo '<br/><br/><a href="index.php?site=jadmin" title="">[retour]</a>';
}else
{
$calc = $pi_result['pgm'] - $pi;
mysql_select_db($array_db['site']) or die();
mysql_query("UPDATE account SET gmlevel = '".$calc."' WHERE username = '".$_SESSION['admin_pseudo']."'")or die (mysql_error());
echo '<p class="succes">'.$pi.' '.$txt_pi.' '.$au_pi.' été enlever au membre '.$_SESSION['admin_pseudo'].'</p>';
echo '<br/><br/><a href="index.php?site=jadmin" title="">[retour]</a>';
}
break;
case 'ajt' :
mysql_select_db($array_db['realmd']) or die();
$view_pi = mysql_query("SELECT * FROM account WHERE username = '".$_SESSION['admin_pseudo']."'") or die (mysql_error());
$pi_result = mysql_fetch_assoc($view_pi);
$calc = $pi_result['pgm'] + $pi;
mysql_select_db($array_db['realmd']) or die();        
mysql_query("UPDATE account SET gmlevel = '".$calc."' WHERE username = '".$_SESSION['admin_pseudo']."'")or die (mysql_error());
echo '<p class="succes">Le rang gm du membre '.$_SESSION['admin_pseudo'].' est maintenant de '.$pi.' </p>';
echo '<br/><br/><a href="index.php?site=jadmin" title="">[retour]</a>';
break;
default :
echo '<p class="erreur">Erreur : l&apos;action demandée est impossible</p>';
echo '<br/><br/><a href="index.php?site=jadmin" title="">[retour]</a>';
break;
}
}else
{
echo '<p class="erreur">Erreur : Le nombre de rang que vous voulez ajouter ne doit contenir que des chiffres !</p>';
echo '<br/><br/><a href="index.php?site=jadmin" title="">[retour]</a>';
}
}else
{
echo '<p class="erreur">Erreur : vous n&apos;avez pas remplis tous les champs !</p>';
echo '<br/><br/><a href="index.php?site=jadmin" title="">[retour]</a>';
}
}else
{
echo '<form action="index.php?site=acces_gm" method="post">Rang désiré : <br><div class="champ"><input type="text" class="champ1" size="15"name="pgm"></div><br/>';
echo 'Action a éxécuter : <br><div class="champ"><select class="champ1" name="action"><option default="default" value="Choisir une action">Choisir une action</option>';
if($gm_result['gmlevel'] >= '3'){
echo '<option value="ajt" name="ajt">Set to</option>';
} 
echo '</select></div><br>';
echo '<input type="submit" value="Envoyer"></form><p><br>Note:<br>GM=2<br>ADMIN=3 <br><br><br>';
}
}else
{
echo '<p class="erreur">Erreur : vous n&apos;avez Sélectioné aucun compte,<br>pour selectioner un compte, allez dans l&apos;administration des Joueurs ...</p><br/><br/>';
echo '<br/><br/><a href="index.php?site=jadmin" title="">[retour]</a>';
}
}else
{
echo '<p class="erreur">Erreur : vous n&apos;avez pas les droits d&apos;accès a cette page ...</p>';
echo '<br/><br/><a href="index.php" title="">[retour]</a>';
}	
}else
{
echo '<p class="erreur">Erreur : vous devez être connecté pour avoir accès a cette page ...</p>';
echo '<br/><br/><a href="index.php" title="">[retour]</a>';
}
?>
</div>
<div align="center">
<h3>Modifier les points du joueur</h3>
<hr color="#C49720" size="4px"><br/>
<?php
if($_SESSION['login'] && $_SESSION['login'] == TRUE)
{
$gm_result = viewinfosperso();
if($gm_result['gmlevel'] >= '3')
{
if($_SESSION['admin_pseudo'] && !empty($_SESSION['admin_pseudo']))
{
if($_POST['Points_allo'] && $_POST['action'])
{
if(!empty($_POST['Points_allo']) && !empty($_POST['action']))
{
if (preg_match("#[0-9]#", $_POST['Points_allo']))
{
$pi = strip_tags($_POST['Points_allo']);
$action = strip_tags($_POST['action']);
if($pi >= '2')
{
$txt_pi = 'Points';
$au_pi = 'ont';
}else
{
$txt_pi = 'Point';
$au_pi = 'a';
}
switch($action)
{
case 'enlv':
mysql_select_db($array_db['realmd']) or die();
$view_pi = mysql_query("SELECT * FROM account WHERE username = '".$_SESSION['admin_pseudo']."'") or die (mysql_error());
$pi_result = mysql_fetch_assoc($view_pi);
if($pi_result['points'] < $pi)
{
echo '<p class="erreur">Le nombre de points que vous voulez retirer est supérieur au nombre de points du membre '.$_SESSION['admin_pseudo'].'.</p>';
echo '<br/><br/><a href="index.php?site=jadmin" >[retour]</a>';
}else
{
$calc = $pi_result['points'] - $pi;
mysql_query("UPDATE account SET points = '".$calc."' WHERE username = '".$_SESSION['admin_pseudo']."'")or die (mysql_error());
echo '<p class="succes">'.$pi.' '.$txt_pi.' '.$au_pi.' été enlever au membre '.$_SESSION['admin_pseudo'].'</p>';
echo '<br/><br/><a href="index.php?site=jadmin" >[retour]</a>';
}
break;
case 'ajt' :
mysql_select_db($array_db['realmd']) or die();
$view_pi = mysql_query("SELECT * FROM account WHERE username = '".$_SESSION['admin_pseudo']."'") or die (mysql_error());
$pi_result = mysql_fetch_assoc($view_pi);
$calc = $pi_result['points'] + $pi;              
mysql_query("UPDATE account SET points = '".$calc."' WHERE username = '".$_SESSION['admin_pseudo']."'")or die (mysql_error());
echo '<p class="succes">'.$pi.' '.$txt_pi.' '.$au_pi.' été ajouter au membre '.$_SESSION['admin_pseudo'].'</p>';
echo '<br/><br/><a href="index.php?site=jadmin" >[retour]</a>';
break;
default :
echo '<p class="erreur">Erreur : l&apos;action demandée est impossible</p>';
echo '<br/><br/><a href="index.php?site=jadmin" >[retour]</a>';
break;
}
}else
{
echo '<p class="erreur">Erreur : Le nombre de point que vous voulez ajouter ne doit contenir que des chiffres !</p>';
echo '<br/><br/><a href="index.php?site=jadmin" >[retour]</a>';
}
}else
{
echo '<p class="erreur">Erreur : vous n&apos;avez pas remplis tous les champs !</p>';
echo '<br/><br/><a href="index.php?site=jadmin" >[retour]</a>';
}
}else
{
echo '<u>Veuillez complèter le formulaire suivant afin d&apos;ajuster les points du compte '.$_SESSION['admin_pseudo'].'</u><br/>';
echo '<form action="index.php?site=admin_points" method="post">Nombre de point : <br/><div class="champ"><input type="text" class="champ1" name="Points_allo"></div><br/><br/>';
echo 'Action a éxécuter : <br><div class="champ"><select class="champ1" name="action"><option default="default" value="Choisir une action">Choisir une action</option>';
if($gm_result['gmlevel'] >= '3'){
echo '<option value="ajt" name="ajt">Ajouter</option>';
}
echo '<option value="enlv" name="enlv">Retirer</option></select></div><br/><input type="submit" value="Envoyer"></form><br/>';
}
}else
{
echo '<p class="erreur">Erreur : vous n&apos;avez Sélectioné aucun compte,<br/> pour selectioner un compte, allez dans l&apos;administration des Joueurs ...</p>';
echo '<br/><br/><a href="index.php?site=jadmin" >[retour]</a>';
}
}else
{
echo '<p class="erreur">Erreur : vous n&apos;avez pas les droits d&apos;accès a cette page ...</p>';
echo '<br/><br/><a href="index.php?site=jadmin" >[retour]</a>';
}	
}else
{
echo '<p class="erreur">Erreur : vous devez être connecté pour avoir accès a cette page ...</p>';
echo '<br/><br/><a href="index.php?site=jadmin" >[retour]</a>';
}
?>
</div>
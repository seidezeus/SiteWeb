<div align="center">
<h3>Administration des News</h3>
<hr color="#C49720" size="4px">
<br/>
<?php
$date_now = date("Y-m-d H:i:s");
if($_SESSION['login'] && $_SESSION['login'] == TRUE)
{
$gm_result = viewinfosperso();
if($gm_result['gmlevel'] >= '3')
{
echo '<p class="erreur">Attention Vous pouvez afficher que 3 news à la fois.</p><br/><br/>';
if ($_POST['titre'] AND $_POST['contenu'])
{
@$titre = $_POST['titre'];
@$contenu = $_POST['contenu'];
@$auteur = $_SESSION['pseudo'];
if ($_POST['blabla'] == 5)
{
$lettres_chiffres = 'ABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789';
$lettres_chiffres_melanges = str_shuffle($lettres_chiffres);
$code_confirmation = substr($lettres_chiffres_melanges, 1, 100);
$code = 'PPNV'.$code_confirmation;
mysql_select_db($array_db['site']) or die();
mysql_query("INSERT INTO `news` ( `id` , `titre` , `category` , `auteur` , `contenu` , `timestamp` , `act` , `act_code` , `date` )
VALUES ('".$_POST['id_news']."', '" . $titre . "', '" . $categorie . "','" . $auteur . "', '" . $contenu . "', '" . time() . "', '".$_POST['act']."', '".$code."', '" .$date_now."')")or die (mysql_error());
}
else
{
mysql_select_db($array_db['site']) or die();
mysql_query("UPDATE `news` SET `titre` = '".$titre."' ,`category` = '".$categorie."',`auteur` = '".$auteur."',`act` = '".$_POST['act']."',`contenu` = '".$contenu."',`timestamp` = '".time()."'  WHERE id=" . $_POST['id_news']);
}
}
if (isset($_GET['supprimer_news'])) 
{
mysql_select_db($array_db['site']) or die();
$supprimer_retour = mysql_query("SELECT * FROM news WHERE id = '".$_GET['supprimer_news']."'");
$supprimer_info = mysql_fetch_array($supprimer_retour);
echo '<br><b>Voulez vraiment supprimer la news au titre : '.$supprimer_info['titre'].' ?   <a href="index.php?site=news&amp;confirm_supprimer_news='.$_GET['supprimer_news'].'">Oui</a> / <a href="index.php?site=news">Non</a></b><br><br>';
}
if (isset($_GET['confirm_supprimer_news'])) 
{
mysql_select_db($array_db['site']) or die();
mysql_query("DELETE FROM news WHERE id = '".$_GET['confirm_supprimer_news']."'");
mysql_query($del_com); 
}
echo '<table border="1"><tr><th>Modifier</th><th>Supprimer</th><th>Titre</th><th>Date</th><th>Activé</th></tr>';
mysql_select_db($array_db['site']) or die();
$retour = mysql_query("SELECT * FROM news ORDER BY id");
while ($donnees = mysql_fetch_array($retour)) // On fait une boucle pour lister les news
{
$news_id = $donnees['id'];
$news_id = md5($donnees['id']);
if($donnees['act'] == '1')
{
$act = '&nbsp;&nbsp;<font color="#00CC00" face="Verdana">Oui</font>';
}else
{
$act = '<font color="#CC0000" face="Verdana">&nbsp;Non</font>';
}
echo '<tr><td><a href="index.php?site=supprnews&amp;news_id='.$donnees['id'].'">Modifier</a></td>';
echo '<td><a href="index.php?site=news&amp;supprimer_news='.$donnees['id'].'">Supprimer</a></td>';
$donnees['titre'] = replacetexte($donnees['titre']);
?>
<td><?php echo stripslashes($donnees['titre']); ?></td>
<td><?php echo date('d/m/Y', $donnees['timestamp']); ?></td>
<td><?php echo $act; ?></td>
</tr>
<?php
} 
echo '</table><br/><br/>';
echo '<form action="index.php?site=newsconf" method="post" id="post" name="post"><input class="input_submit" type="submit" value="Ajouter news" /></form>';
}else
{
echo '<meta http-equiv="refresh" content="3; url=index.php">';
echo '<p class="erreur">Erreur : vous n&apos;avez pas les droits requis pour acceder à cette page.<br/>Redirection dans 3 secondes ...</p>';
}
}else
{
echo '<meta http-equiv="refresh" content="3; url=index.php">';
echo '<p class="erreur">Erreur : vous devez être connecté pour accèder à cette page.<br/> Redirection dans 3 secondes ...</p>';
}
?>
</div>
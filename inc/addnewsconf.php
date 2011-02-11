<div align="center">
<h3>Administration des News</h3>
<hr color="#C49720" size="4px">
<br/>
<?php
$gm_result = viewinfosperso();
if($gm_result['gmlevel'] >= '3')
{
?>
<p class="erreur">Attention, les ' ont été désactiver pour une meilleure securisations contre les injections SQL</p><br/><br/>
<?php
mysql_select_db($array_db['site']) or die();
$nbr1= mysql_query('SELECT COUNT(*) AS nbre_entrees FROM news where category="0" ');
$data_1=mysql_fetch_array($nbr1);
$nbre_entrees=$data_1['nbre_entrees'] ;
$data_2=($nbre_entrees +1);
$data_3=$data_2;
$titre = '';
$contenu = '';
$auteur = $login;
$categorie = '';
$id_news = 0; 
?>
<form action="index.php?site=news" method="post" id="post" name="post">
Titre : <br>
<div class="champ"><input type="text" size="30" class="champ1" name="titre" value="<?php echo $titre; ?>" /></div>
<br/>Contenu :<br />
<textarea name="contenu" cols="30" rows="5">
<?php echo $contenu; ?>
</textarea>
<br/><br/>
<div class="champ"><select class="champ1" name="act">
<option  value="1"><font color="green">Activer</font></option>
<option  value="0"><font color="red">Désactivé</font></option>
</select></div><br/><br/>
<input type="hidden" name="id_news" value="<?php echo $data_3; ?>" />
<input type="hidden" name="blabla" value="5" />
<input type="hidden" name="auteur" value="<?php echo $_SESSION['pseudo']; ?>" />
<input class="input_submit" type="submit" value="Envoyer" />
<input class="input_submit" type="reset" value="Recommencer" />
</form>
<?php
}else
{
echo '<meta http-equiv="refresh" content="3; url=index.php">';
echo '<p class="erreur">Erreur : vous n&apos;avez pas les droits requis pour acceder à cette page.<br/>Redirection dans 3 secondes ...</p>';
}
?>
</div>
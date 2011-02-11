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
if ($_GET['news_id']) // Si on demande de modifier une news
{
// On récupère les infos de la correspondante
mysql_select_db($array_db['site']) or die();
$retour = mysql_query("SELECT * FROM news WHERE id = '".$_GET['news_id']."'");
$donnees = mysql_fetch_array($retour);
// On place le titre et le contenu dans des variables simples
$titre =  $donnees['titre'];
$contenu = $donnees['contenu'];
$auteur = $donnees['auteur'];
$categorie = $donnees['categorie'];
$id_news = $donnees['id']; // Cette variable va servir pour se souvenir que c'est une modification
}
else // C'est qu'on rédige une nouvelle news
{
// Les variables $titre et $contenu sont vides, puisque c'est une nouvelle news
$titre = '';
$contenu = '';
$auteur = $login;
$categorie = '';
$id_news = 0; // La variable vaut 0, donc on se souviendra que ce n'est pas une modification
}
?>
<form action="index.php?site=news" method="post" id="post" name="post">Titre :<br>
<div class="champ"><input type="text" class="champ1" size="30" name="titre" value="<?php echo $titre; ?>" /></div>
<br/>Contenu :<br/>
<textarea name="contenu" cols="30" rows="5">
<?php echo $contenu; ?>
</textarea><br/><br/>
<div class="champ"><select class="champ1" name="act"></div>
<option  value="1"><font color="green">Activer</font></option>
<option  value="0"><font color="red">Désactivé</font></option>
</select></div><br/><br/>
<input type="hidden" name="id_news" value="<?php echo $id_news; ?>" />
<input type="hidden" name="auteur" value="<?php echo $_SESSION['pseudo']; ?>" />
<input class="input_submit" type="submit" value="Envoyer" />
<input class="input_submit" type="reset" value="Recommencer" />
</form><br/>
<?php
}
?>
</div>
<?php
$gm_result = viewinfosperso();
if($gm_result['gmlevel'] >= '3')
{
?>
<div align="center">
<h3>Gestion Boutique</h3>
<hr color="#C49720" size="4px"><br/>
<?php 
if (isset($_POST['id'])) 
{
if(!empty($_POST['id']) && !empty($_POST['nom']) &&  !empty($_POST['prix']) )
{
mysql_select_db($array_db['site']) or die();
mysql_query("INSERT INTO boutique (id, prix, nom, cat) VALUES('".$_POST['id']."', '".$_POST['prix']."', '".$_POST['nom']."', '".$_POST['cat']."') ");
echo '<p class="succes">Objet créer avec succès ! Redirection ...</p><br/><br/>';
}else
{
echo '<p class="erreur">Erreur: Veuillez vérifier que vous avez remplis tout les champs svp.</p>';
}
echo '<meta http-equiv="refresh" content="3; url=index.php?site=admin_boutique">';
}else
{
?>
<form action="index.php?site=ajt_obj" method="post" id="post" ><b>Ajouter objet</b><table  width=200 height=20 border "1">
<th><u><i> Id: </i></u></th><th><div class="champ"><input type="text" class="champ1" name="id" value=""></div></th></tr><br>
<th><u><i> Prix: </i></u></th><th><div class="champ"><input type="text" class="champ1" name="prix" value=""></div></th></tr><br>
<th><u><i> Nom: </i></u></th><th><div class="champ"><input type="text" class="champ1" name="nom" value=""></div></th></tr><br>
<th><u><i> Catégorie: </i></u></th><th><div class="champ"><input type="text" class="champ1" name="cat" value=""></div></th></tr><br></table>
<p class="erreur">Veuillez remplir tout les champs ...</p><br/>
<input class="submit" type="submit" value="Envoyer" /><input class="input_submit" type="reset" value="Par défaut" />
</form>
<?php 
}
}
?>
</div>
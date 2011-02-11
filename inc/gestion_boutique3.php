<div align="center">
<h3>Gestion Boutique</h3>
<hr color="#C49720" size="4px"><br/>
<?php
if($_SESSION['login'] && $_SESSION['login'] == TRUE)
{
$gm_result = viewinfosperso();
if($gm_result['gmlevel'] >= '3')
{
if (isset($_POST['prix'])) // Si le POST prix existe
{
mysql_select_db($array_db['site']) or die();
mysql_query("UPDATE Boutique SET prix = '".$_POST['prix']."' WHERE id = '".$_SESSION['idmertelol']."'"); 
mysql_query("UPDATE Boutique SET id = '".$_POST['id']."' WHERE id = '".$_SESSION['idmertelol']."'"); 
mysql_query("UPDATE Boutique SET nom = '".$_POST['nom']."' WHERE id = '".$_SESSION['idmertelol']."'"); 
mysql_query("UPDATE Boutique SET cat = '".$_POST['cat']."' WHERE id = '".$_SESSION['idmertelol']."'");
unset($_SESSION["idmertelol"]);
echo '<p class="succes">Modifications éfféctuer avec succès ! Redirection dans 3s ...</p>';
}
echo '<meta http-equiv="refresh" content="3; url=index.php?site=admin_boutique">'; 
}else
{
echo '<p class="erreur">Vous n&apos;avez pas les droits d&apos;accès à cette page !</p>';
echo '<br/><br/><a href="index.php" >[retour]</a><br/><br/>';
}
}else
{
echo '<p class="erreur">Vous devez être connecter avant de pouvoir accèder à cette page.</p>';
echo '<br/><br/><a href="index.php" >[retour]</a><br/><br/>';
}
?>
</div>
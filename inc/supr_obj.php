<?php
$gm_result = viewinfosperso();
if($gm_result['gmlevel'] >= '3')
{
?>
<div align="center">
<h3>Gestion Boutique</h3>
<hr color="#C49720" size="4px"><br/>
<?php
mysql_select_db($array_db['site']) or die();
mysql_query("DELETE FROM boutique WHERE id = '".$_SESSION['idmertelol']."' ");
echo '<p class="succes">Objet supprimer avec succès ! Redirection dans 3s...</p>';
unset($_SESSION["idmertelol"]);
echo '<meta http-equiv="refresh" content="3; url=index.php?site=admin_boutique">';
}
?>
</div>
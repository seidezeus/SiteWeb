<?php
echo '<div class="mh">Status Serveur</div><div class="mf">';
 $fserv=@fsockopen("localhost","8085",$errno,$errstr,1);
if($fserv)
{
mysql_select_db($array_db['characters']) or die();
$rep1 = mysql_query("SELECT COUNT(*) AS nbre_entrees1 FROM characters WHERE online=1") OR DIE();
$joueurs = mysql_fetch_array($rep1);
$viewhorde = mysql_query("SELECT guid FROM characters WHERE race IN (2, 5, 6, 8, 10) AND online='1'");
$horde = mysql_num_rows($viewhorde);
$viewalli = mysql_query("SELECT guid FROM characters WHERE race IN (1, 3, 4, 7, 11) AND online='1'");
$alli = mysql_num_rows($viewalli);
echo '<b><font class="top" size="3">Serveur :&nbsp;&nbsp;</font></b><img class="top" src="images/up.png"><br/>';
echo '<div class="stats"><img  class="statsimg" src="inc/compteur.php?pc='.$joueurs['nbre_entrees1'].'">';
echo '<div class="alli">'.$alli.'</div><div class="horde">'.$horde.'</div></div>';
}
else
{
echo '<b><font class="top" size="3">Serveur :&nbsp;&nbsp;</font></b><img class="top" src="images/down.png"><br/>';
}
echo '</div><div class="mb"></div>';
?>
<div align="center">
<h3>Informations Serveur</h3>
<hr color="#C49720" size="4px">
<br/>
<table width="300px" border="1" cellpadding="2" cellspacing="0" align="center">
<tr><th align="center">Realmlist : </th><th align="center"><?php echo ''.$array_base['realmlist'].''; ?></th></tr>
<tr><th align="center">Mémoire vive : </th><th align="center"><?php echo ''.$array_base['memvive'].''; ?></th></tr>
<tr><th align="center">Bande passante : </th><th align="center"><?php echo ''.$array_base['bandepass'].''; ?></th></tr>
<tr><th align="center">Processeur : </th><th align="center"><?php echo ''.$array_base['process'].''; ?></th></tr>
<tr><th align="center">Disque dur : </th><th align="center"><?php echo ''.$array_base['hdd'].''; ?></th></tr></table>
<?php
$icon_type = Array(
	0 => $lang_realm['normal'],
	1 => $lang_realm['pvp'],
	4 => $lang_realm['normal'],
	6 => $lang_realm['rp'],
	8 => $lang_realm['rppvp']
);
setlocale(LC_TIME, "fr");
echo '<br/><b>Les Records du Serveur :</b><br/><br/>';
$max_uptime = viewuptime();
$maxplayers = viewmaxplayers();
echo '<table width="200px" border="1" cellpadding="2" cellspacing="0" align="center">';
echo '<tr><th align="center">Max uptime:</th><th align="center">'.$max_uptime.'</th></tr>';
echo '<tr><th align="center">joueurs max:</th><th align="center">'.$maxplayers.'</th></tr></table><br />';
$infoserver = viewserverid();
echo '<b>Liste des royaumes :<br/><br/></b>';
?>
<table width="400px" border="1" cellpadding="2" cellspacing="0" align="center">
	<tr>
		<th align='center' nowrap='nowrap' width=10%>ID</th>
		<th align='center' nowrap='nowrap' width=10%>Statuts</th>
		<th align='center' nowrap='nowrap' width=50%>Nom du Royaume</th>
		<th align='center' nowrap='nowrap' width=20%>Type</th>
	</tr>
	<?php
	while ($donnees = mysql_fetch_array($infoserver,MYSQL_ASSOC))
	{
	
echo '<tr><td align="center">'.$donnees['id'].'</th><td align="center">';
error_reporting(1);  
$s = fsockopen($array_base['realmlist'], $donnees['port'], $errno, $errstr, 2);
if(!$s){ 
echo '<img src="images/down.png">';
} 
else 
{
echo '<img src="images/up.png">';
}   
echo '</td><td align="center">'.$donnees['name'].'</td><td align="center">';
if ($donnees['time_zone'] == 0)
{
$pop = 'normal';
}
if ($donnees['time_zone'] == 1)
{
$pop = 'pvp';
}
if ($donnees['time_zone'] == 4)
{
$pop = 'normal';
}
if ($donnees['time_zone'] == 6)
{
$pop = 'rp';
}
if ('time_zone' == 8)
{
$pop = $lang_realm['rppvp'];
}
echo ''.$pop.'</td></tr>';
}
?>
</table></div>
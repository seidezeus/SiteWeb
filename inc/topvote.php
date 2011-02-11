<div class="mh">Top Vote</div><div class="mf"><!-- Menu -->
<div>
<?php
echo '<table  width="80%" class="top">';
mysql_select_db($array_db['realmd']) or die();
	$sql = "SELECT username, vote FROM account ORDER BY vote DESC LIMIT 0,5";
	$req = mysql_query($sql) or die("<h3>Une erreur est survenue!</h3>");
	$place = '0';
	while($data = mysql_fetch_assoc($req))
{
$place++;
echo '<tr><td class="top">&nbsp;&nbsp;&nbsp;<img src="images/'.$place.'.png" /></td><td class="top"><font size="3"><b>'.$data['username'].' </b></font></td><td class="top"><font size="4"><b> '.$data['vote'].'</b></font></td></tr>';
}
echo '</table>';
?>
</div>
</div><div class="mb"></div> <!-- Fin Menu -->
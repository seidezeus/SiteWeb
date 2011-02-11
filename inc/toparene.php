<div class="mh">Teams Arène</div><div class="mf"><!-- Menu -->	
<?php
{
mysql_select_db($array_db['characters']) or die();
$selectGuild = "SELECT * FROM `arena_team_stats`  ORDER BY rating DESC LIMIT 0,5 ";
$resultGuild = mysql_query($selectGuild) or die(MYSQL_QUERY_ERROR.mysql_error());
echo "<table width=80%>";
$toparene = '0';
while ($vystup = mysql_fetch_array($resultGuild))
  {   
$selectGuild2 = "SELECT * FROM `arena_team` WHERE arenateamid ='".$vystup['arenateamid']."' ";
$arenaname = mysql_query($selectGuild2) or die(MYSQL_QUERY_ERROR.mysql_error());
while ($vystup2 = mysql_fetch_array($arenaname))
  {
$toparene++;
echo '<tr><td class="top">&nbsp;&nbsp;&nbsp;<img src="images/'.$toparene.'.png" /></td><td class="top"><font size="5">'.$vystup2['name'].'</font></td>';
$selectGuild3 = "SELECT `guid` FROM `arena_team_member` WHERE arenateamid ='".$vystup['arenateamid']."'order by guid DESC LIMIT 0,1 ";
$arenaplayer = mysql_query($selectGuild3) or die(MYSQL_QUERY_ERROR.mysql_error());
while ($vystup3 = mysql_fetch_array($arenaplayer))
{ 
}
echo "</tr>";
 }	
   }
echo "</table>";
}
?>
</div><div class="mb"></div> <!-- Fin Menu -->
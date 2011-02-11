<div align="center">
<h3>Votez !!!</h3>
<hr color="#C49720" size="4px">
<br/>
Votez pour <?php echo $array_base['nom']; ?> et gagnez des Points Boutique !<br/>
Vous gagnerez <?php echo $array_base['point_vote']; ?> Points Boutique pour chaque votes que vous effectuerez !<br/><br/>
<?php
$user = $_SESSION['pseudo'];
$date_now = date("Y-m-d H:i:s");
mysql_select_db($array_db['realmd']) or die();
$sql = "SELECT username, date_vote, vote FROM account WHERE username='$user'";
$req = mysql_query($sql) or die("ERROR OMG");
while($data = mysql_fetch_assoc($req))
		{
		$date_vote = $data['date_vote'];
	    $vote = $data['vote'];
	    $login_ok = $data['username'];
        }
if (isset($login_ok))
{
$votesup = ++$data['vote'];
mysql_select_db($array_db['realmd']) or die();
$sql8 = "SELECT username FROM account WHERE TIMEDIFF('$date_now', '$date_vote') >= '02:00:00' AND username='$user'"; 
$req8 = mysql_query($sql8) or die(mysql_error()); 
while($data8 = mysql_fetch_assoc($req8))
{
$username_ok = $data8['username'];
}
if (isset($username_ok))
{
echo '<a href="index.php?site=vote&amp;avote=oui"><img src="'.$array_base['banvote'].'" alt=""/></a>';
if (isset($_GET['avote'])) 
{
$totalvote = ajoutspoints();
echo '<meta http-equiv="refresh" content="0;URL='.$array_base['votesite'].'">';
}
}
else
{
echo '<p class="erreur">Vous avez déjà voté il y à moins de 2 heures !</p>';
echo '<br/><br/><a href="index.php" >[retour]</a>';
}
}
else
{
echo '<p class="erreur">Vous devez être connecté pour voter !</p>';
echo '<br/><br/><a href="index.php" >[retour]</a>';
}
?>
</div>
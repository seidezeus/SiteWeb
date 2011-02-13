<?php
function change_db($db)
{
	global $array_db;
	$mysql_link = mysql_connect($array_db['host'], $array_db['user'], $array_db['pass']) or die ("Connexion impossible !");
	mysql_select_db($db, $mysql_link) or die (mysql_error());
}
function create_vote_lists($id,$db)
{
	change_db($db);
	$check_exist = "SELECT * FROM `voting_points` WHERE `id` LIKE '$id'";
	$check = mysql_query($check_exist) or die (mysql_error());
	if(!mysql_num_rows($check))
	{
		$create_list = "INSERT INTO `voting_points` (`id`) VALUES ('$id')";
		$create = mysql_query($create_list) or die (mysql_error());
	}
	$user_ip = getenv("REMOTE_ADDR");
	$check_exist = "SELECT * FROM `voting` WHERE `user_ip` LIKE '$user_ip'";
	$check = mysql_query($check_exist) or die (mysql_error());
	$row = mysql_fetch_array($check);
	$today = time();
	if(!mysql_num_rows($check))
	{
		$create_list = "INSERT INTO `voting` (`user_ip`) VALUES ('$user_ip')";
		$create = mysql_query($create_list) or die (mysql_error());
	}
	else 
		if(($today - $row['time']) > 7200)
		{
			$create_list = "UPDATE `voting` SET `sites` = 0 WHERE `user_ip` LIKE '$user_ip'";
			$create = mysql_query($create_list) or die (mysql_error());
		}
}

function show_points($id,$db)
{
	change_db($db);
	$sql = "SELECT `points` FROM `voting_points` WHERE `id` LIKE '$id'";
	$result = mysql_query($sql) or die (mysql_error());
	$row = mysql_fetch_array($result);
	$acc_points = $row['points'];
	return $acc_points;
}
$points = show_points($_SESSION['id'],$array_db['db_realmd']);

function show_passed_time($db)
{
	change_db($db);
	$user_ip = getenv("REMOTE_ADDR");
	$sql = "SELECT * FROM `voting` WHERE `user_ip` LIKE '$user_ip'";
	$result = mysql_query($sql) or die (mysql_error());
	$row = mysql_fetch_array($result);
	$user_time = $row['time'];
	if ($user_time == 0)
		return 0;
	else
	{
		$today = time();
		$passed = $today - $user_time;
		$passed_seconds = $passed %60;
		$passed_minutes_in_seconds = ($passed - $passed_seconds)%3600;
		$passed_minutes = $passed_minutes_in_seconds/60;
		$passed_hours = ($passed - ($passed_seconds + $passed_minutes_in_seconds))/3600;
		$user_passed_time = $passed_hours."h ".$passed_minutes."m et ".$passed_seconds."s";
		return $user_passed_time;
	}
}
function return_voted_sites($db)
{
	change_db($db);
	$user_ip = getenv("REMOTE_ADDR");
	$sql = "SELECT `sites` FROM `voting` WHERE `user_ip` LIKE '$user_ip'";
	$result = mysql_query($sql) or die (mysql_error());
	$row = mysql_fetch_array($result);
	$sites = $row['sites'];
	return $sites;
}
function vote($site,$id,$db)
{
	global $tab_sites;
	if(array_key_exists($site, $tab_sites))
	{
		if(!($site & return_voted_sites($db)))
		{
			$user_ip = getenv("REMOTE_ADDR");
			echo "<script language='javascript'>setTimeout(window.open(\"".$tab_sites[$site][1]."\", \"_self\", \"\"),0);</script>";
			$today = time();
			change_db($db);
			$vote_user = "UPDATE `voting` SET `sites`=(`sites` + $site), `time`='$today' WHERE `user_ip` LIKE '$user_ip'";
			$results = mysql_query($vote_user) or die(mysql_error());
			$vote_acc = "UPDATE `voting_points` SET `points`=(`points` + 1), `date_points`=(`date_points` + 1) WHERE `id` = '$id'";
			$results = mysql_query($vote_acc) or die(mysql_error());
		}
	}
}
function count_tab_sites()
{
	global $tab_sites;
	$counter = 0;
	foreach($tab_sites as $key => $value)
		$counter+=$key;
	return $counter;
}
function show_sites_menu($db)
{
	global $tab_sites;
	$user_ip = getenv("REMOTE_ADDR");
	change_db($db);
	foreach($tab_sites as $key => $value)
	{
		$sql = "SELECT `sites` FROM `voting` WHERE `user_ip` LIKE '$user_ip'";
		$result = mysql_query($sql) or die(mysql_error());
		$row = mysql_fetch_array($result);
		$sites = $row['sites'];
		if (!($sites & $key))
			echo "<option value='".$key."'>".$value[0]."</option>";
	}
}
function show_time_to_vote($db)
{
	change_db($db);
	$user_ip = getenv("REMOTE_ADDR");
	$sql = "SELECT * FROM `voting` WHERE `user_ip` LIKE '$user_ip'";
	$result = mysql_query($sql) or die (mysql_error());
	$row = mysql_fetch_array($result);
	$user_time = $row['time'];
	
	$today = time();
	$remaining = 7200 -($today - $user_time);
	$remaining_seconds = $remaining%60;
	$remaining_minutes_in_seconds = ($remaining - $remaining_seconds)%3600;
	$remaining_minutes = $remaining_minutes_in_seconds/60;
	$remaining_hours = ($remaining - ($remaining_seconds + $remaining_minutes_in_seconds))/3600;
	$user_remaining_time = $remaining_hours."h ".$remaining_minutes."m et ".$remaining_seconds."s";
	return $user_remaining_time;
}
function check_date_points($id,$db)
{
	global $tab_sites;
	change_db($db);
	$sql = "SELECT * FROM `voting_points` WHERE `id` = $id";
	$result = mysql_query($sql) or die (mysql_error());
	$row = mysql_fetch_array($result);
	$date = $row['date'];
	$date_points = $row['date_points'];
	$today = date("Ymd");
	if($date <> $today)
	{
		$reset_date_and_datepoints = "UPDATE `voting_points` SET `date`='$today', `date_points`='0' WHERE `id` = $id";
		$reset = mysql_query($reset_date_and_datepoints) or die (mysql_error());
		return 1;
	}
	else
		if($date_points >= sizeof($tab_sites))
			return 0;
		else
			return 1;
}
?>
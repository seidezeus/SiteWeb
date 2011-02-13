<?php $date = date("d-m-Y H:i:s");  ?>
<?php echo $date ?> <br><br>
Etat du serveur : 

<?php
                    $fserv=@fsockopen("localhost","8085",$errno,$errstr,1);
if($fserv)
{
echo "<font color='green'>&nbsp;Serveur En Ligne!</font></b>";
}
else
{
echo "<font color='red'>&nbsp;Serveur Hors Ligne</font></b>";
}
?>

<?php 
$ip = "127.0.0.1";
$port = "3306";
$host = "localhost";
$user = "fangames59";
$pass = "lolotryber37"; 
$mangoscharacters = "fangames_characters";
$mangosrealm = "fangames_realmd";
$cod = 'utf8';
?> <br>


<?php


mysql_connect($host, $user, $pass) or die ("Can't connect with $host");
mysql_selectdb ("$mangosrealm");

$sql = mysql_query ("SELECT * FROM uptime ORDER BY `starttime` DESC LIMIT 1");  
$uptime_results = mysql_fetch_array($sql);    

if ($uptime_results['uptime'] > 86400) { 
    $uptime =  round(($uptime_results['uptime'] / 24 / 60 / 60),2)." Days";
}
elseif($uptime_results['uptime'] > 3600) { 
    $uptime =  round(($uptime_results['uptime'] / 60 / 60),2)." Hours";
}
else { 
    $uptime =  round(($uptime_results['uptime'] / 60),2)." Min";
}

echo "Uptime:$uptime <br>";
?>

Connecté sur le serveur :
<?php  

$conn = mysql_connect($host, $user, $pass) or die('Connection failed: ' . mysql_error());

mysql_select_db($mangoscharacters, $conn) or die('Select DB failed: ' . mysql_error());

$sql = "SELECT Count(Online) FROM `characters` WHERE `online` = 1";
$result = mysql_query($sql, $conn);
$row = mysql_fetch_array($result);
$online = $row["Count(Online)"];

echo $online; 
?> <br>



<?php

// Configuration.
// Realm database.
$r_db = "fangames_realmd";
// IP (and port).
$ip = "127.0.0.1:3306";
// Username.
$user = "fangames59";
// Password.
$pass = "lolotryber37";
// Site title.
$title = "set realmlist serveur.panktara.fr:3727";
$title2 = "Serveur Panktara Inscription";
// End config.

$page = '<?xml version="1.0" encoding="utf-8" ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
<title>' . $title . '</title>
</head>
<body style="background-color:black;color:yellow;font-family:verdana;">
<form method="post" action="' . $_SERVER["SCRIPT_NAME"] . '">
<p style="text-align:center;">
<strong>' . $title2 . ' - ' . $title . '</strong>
<br /><br /><br />
Nom de compte:
<br /><input name="username" type="text" maxlength="14" /><br />
Mot de Passe:
<br /><input name="password" type="password" maxlength="12" /><br />
Email:
<br /><input name="email" type="text" maxlength="50" />
<br /><input name="tbc" type="checkbox" checked="checked" /> Wrath Of The Lich King<br /><br /><br />
<button type="Submit">Creer Compte**</button>
</p>
</form>
</body>
</html>';

function error_s ($text) {
   echo("<p style=\"background-color:black;color:yellow;font-family:verdana;\">" . $text);
   echo("<br /><br /><a style=\"color:orange;\" href=\"" . $_SERVER["SCRIPT_NAME"] . "\">Go back...</a></p>");
};

$user_chars = "#[^a-zA-Z0-9_\-]#";
$email_chars = "/^[^0-9][A-z0-9_]+([.][A-z0-9_]+)*[@][A-z0-9_]+([.][A-z0-9_]+)*[.][A-z]{2,4}$/";

$con = @mysql_connect($ip, $user, $pass);
if (!$con) {
   error_s("Unable to connect to database: " . mysql_error());
};

if (!empty($_POST)) {
        if ((empty($_POST["username"]))||(empty($_POST["password"]))||(empty($_POST["email"]))||(empty($_POST["tbc"])) ) {
                error_s("Vous n'avez pas completer toutes les informations nescessaires !");
            exit();
        } else {
                $username = strtoupper($_POST["username"]);
                $password = strtoupper($_POST["password"]);
                $email = strtoupper($_POST["email"]);
                if (strlen($username) < 3) {
                        error_s("Nom de Compte trop court !");
                        exit();
                };
                if (strlen($username) > 14) {
                        error_s("Nom de Compte trop long !");
                        exit();
                };
                if (strlen($password) < 4) {
                        error_s("Mot de Passe trop court !");
                        exit();
                };
                if (strlen($password) > 12) {
                        error_s("Mot de Passe trop long !");
                        exit();
                };
                if (strlen($email) < 7) {
                        error_s("E-mail trop court !");
                        exit();
                };
            if (strlen($email) > 50) {
                        error_s("E-mail trop long !");
                        exit();
                };
                if (preg_match($user_chars,$username)) {
                        error_s("Votre Nom de Compte contient des caracteres illegal !");
                        exit();
                };
                if (preg_match($user_chars,$password)) {
                        error_s("Votre Mot de Passe contient des caracteres illegal !");
                        exit();
                };
                if (!preg_match($email_chars,$email)) {
                        error_s("Votre e-mail n'est pas au bon format !");
                        exit();
                };
                if ($_POST['tbc'] != "on") {
                        $tbc = "0";
                } else {
                        $tbc = "2";
                };
                $username = mysql_real_escape_string($username);
                $password = mysql_real_escape_string($password);
                $email = mysql_real_escape_string($email);
                $qry = @mysql_query("select username from " . mysql_real_escape_string($r_db) . ".account where username = '" . $username . "'", $con);
            if (!$qry) {
               error_s("Error querying database: " . mysql_error());
            };
                if ($existing_username = mysql_fetch_assoc($qry)) {
                        foreach ($existing_username as $key => $value) {
                                $existing_username = $value;
                        };
                };
                $existing_username = strtoupper($existing_username);
                if ($existing_username == strtoupper($_POST['username'])) {
                        error_s("That username is already taken.");
                        exit();
                };
            unset($qry);
                $qry = @mysql_query("select email from " . mysql_real_escape_string($r_db) . ".account where email = '" . $email . "'", $con);
            if (!$qry) {
               error_s("Error querying database: " . mysql_error());
            };
                if ($existing_email = mysql_fetch_assoc($qry)) {
                        foreach ($existing_email as $key => $value) {
                                $existing_email = $value;
                        };
                };
                if ($existing_email == $_POST['email']) {
                        error_s("Cet Email est deja utilisé.");
                        exit();
                };
            unset($qry);
                $sha_pass_hash = sha1(strtoupper($username) . ":" . strtoupper($password));
                $register_sql = "insert into " . mysql_real_escape_string($r_db) . ".account (username, sha_pass_hash, email, expansion) values (upper('" . $username . "'),'" . $sha_pass_hash . "','" . $email . "','" . $tbc . "')";
                $qry = @mysql_query($register_sql, $con);
            if (!$qry) {
               error_s("Error creating account: " . mysql_error());
            };
                echo("Votre compte a ete correctement creer. Vous pouvez Jouer ! Cliquez sur precedent pour revenir et cliquez sur le forum ou site web");
            exit();
        };
} else {
        echo($page);
};

?> 
<div align="center"><font face="arial" size="2" color="red"> Votre Mot de Passe doit comporter au minimum 5 caracteres chiffres ET lettres, vous devez posseder une adresse e-mail valide</font><br />
<div align="center"><font face="arial" size="2" color="blue"> Toute l'equipe du serveur Panktara vous souhaite un excellent moment sur notre serveur !</font><br />
<br>
NAVIGATION :
<br>
FORUM :
<a style="color:orange;" href="http://www.panktara.fr/forum">Retourner sur le forum...</a>
<br>
SITE WEB :
<a style="color:orange;" href="http://www.panktara.fr">Retourner sur le site web...</a>
<br>
SITE Serveur :
<a style="color:orange;" href="http://inscriptions.panktara.fr/">Acceder au Site du Serveur...</a>
<br>

<br>
<br>
<br>
<br>

<?php
echo '<div align="center"><font face="arial" size="4" color="yellow"> ATTENTION : la creation de compte automatique a ete entierement debug ! Vous serez maintenant en WOTLK !</font><br /> ';

?>

<div align="center"><font face="arial" size="1" color="white"> **En cliquant sur 'Creer Compte' vous vous engagez a respecter le reglement de notre serveur et vous donnez l'autorisation</font><br />
<div align="center"><font face="arial" size="1" color="white"> a l'administrateur du serveur de sauvegarder votre adresse IP dans la DataBase, seul votre mot de passe sera garde confidentiel</font><br />
<div align="center"><font face="arial" size="1" color="white"> donc si vous perdrez votre mot de passe nous ne pourrons pas vous le rendre.</font><br />
<br>

<img src="http://www.gearfuse.com/wp-content/uploads/2009/05/blizzard-entertainment-logo-2.jpg" border="0" /></div>
<br>
<div align="center"><font face="arial" size="2" color="purple"> Blizzard Entertainment - tous droits reserves au Serveur panktara - 2011</font><br />





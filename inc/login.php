<?php
session_start();
error_reporting(0);
htmlspecialchars($input);
htmlentities($input);
addslashes($input);
echo '<div align="center">';
mysql_select_db($array_db['site']) or die();
if(!$_SESSION['login']) $_SESSION['login'] = FALSE;
if($_POST['login'] && $_POST['password'])
{
if(!empty($_POST['login']) && !empty($_POST['password']))
{
 mysql_query("DELETE FROM password_template") or die(mysql_error);
$pseudo = htmlspecialchars(strip_tags($_POST['login']));
$pseudo = str_replace("java script:","",$pseudo);
$pseudo = str_replace("<script>","",$pseudo); 
$password = htmlspecialchars(strip_tags($_POST['password']));
$password = str_replace("java script:","",$password);
$password = str_replace("<script>","",$password);
mysql_select_db($array_db['realmd']) or die();
$count_p = mysql_query("SELECT COUNT(*) AS nb_p FROM account WHERE username = '".$pseudo."'");
$p_result = mysql_fetch_array($count_p);
if($p_result['nb_p'] == '1')
{
mysql_select_db($array_db['site']) or die();
$q = "INSERT INTO password_template(password) VALUES (SHA1(CONCAT(UPPER('".$pseudo."'),':',UPPER('".$password."'))));";
mysql_query($q) or die(mysql_error());
$password_post = mysql_query("SELECT * FROM password_template");
$password_result = mysql_fetch_assoc($password_post);
mysql_select_db($array_db['realmd']) or die();
$compare_pa = mysql_query("SELECT * FROM account WHERE sha_pass_hash = '".$password_result['password']."' AND username = '".$pseudo."'");
$compare_result = mysql_fetch_array($compare_pa);
if($compare_result['sha_pass_hash'] == $password_result['password'])
{
$view_information = mysql_query("SELECT * FROM account WHERE username = '".$pseudo."'");
$information_result = mysql_fetch_assoc($view_information);
$_SESSION['login'] = TRUE;
$_SESSION['pseudo'] = $pseudo;
$_SESSION['id'] = $information_result['id'];
echo '<meta http-equiv="refresh" content="0; url=index.php">';
}else
{
echo '<br/><img src="images/erreur.png"  alt=""/><br/><p class="erreur">Erreur : Le pseudo ou le mot de passe choisis est invalide ...</p>';
mysql_select_db($array_db['site']) or die();
mysql_query("DELETE FROM password_template");
}
}else
{
echo '<br/><img src="images/erreur.png"  alt=""/><br/><p class="erreur">Erreur : Le pseudo ou le mot de passe choisis est invalide ...</p>';
}
}else
{
echo '<br/><img src="images/erreur.png"  alt=""/><br/><p class="erreur">Erreur : Vous n&apos;avez pas remplis tous les champs ...</p>';
}
}else
{
echo '<br/><img src="images/erreur.png"  alt=""/><br/><p class="erreur">Erreur : Vous n&apos;avez pas remplis tous les champs ...</p>';
}
echo '</div>';
?>	
<div align="center">
<center><h3>Confirmation</h3></center>
<hr color="#c67114" size="4px">
<br/>
<?php
if(isset($_POST['pseudo']) && isset($_POST['password1']) && isset($_POST['password2']) && isset($_POST['mail']))
{
if(!empty($_POST['pseudo']) && !empty($_POST['password1']) &&  !empty($_POST['password2']) && !empty($_POST['mail']))
{
if($_SESSION['code'] = $_POST['verif'])
{
$pseudo = strip_tags($_POST['pseudo']);
$passa = strip_tags($_POST['password1']);
$passb = strip_tags($_POST['password2']);
$mail = strip_tags($_POST['mail']);
if($_POST['expansion'] == 'classique')
{
$expansion = '0';
}
if($_POST['expansion'] == 'bc')
{
$expansion = '1';
}
if($_POST['expansion'] == 'woltk')
{
$expansion = '2';
}
$p_result = verifcomptexist();
if($p_result['nb_p'] != '1')
{
if($passa == $passb)
{
if (preg_match("#[a-z0-9._-]+@[a-z0-9._-]{2,}\.[a-z]{2,4}$#", $mail))
{
$lettres_chiffres = 'ABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789';
$lettres_chiffres_melanges = str_shuffle($lettres_chiffres);
$code_confirmation = substr($lettres_chiffres_melanges, 1, 100);
$creates = createcompte();
echo '<meta http-equiv="refresh" content="3; url=index.php">';
echo '<p class="succes">Inscription r&eacute;alis&eacute;e avec succes, redirection dans 3 secondes...</p>';
}else
{
echo '<p class="erreur">Erreur: L&apos;adresse Email n&apos;est pas valide...</p><br/><br/>';
echo '<a href="index.php?site=inscription">[retour]</a>';
}
}else
{
echo '<p class="erreur">Erreur: les deux mots de passe ne sont pas identiques...</p><br/><br/>';
echo '<a href="index.php?site=inscription">[retour]</a>';
}
}else
{
echo '<p class="erreur">Erreur: le nom d&apos;utilisateur est d&eacute;j&aacute; utilis&eacute; par un autre joueur...</p><br/><br/>';
echo '<a href="index.php?site=inscription">[retour]</a>';
}
}else
{
echo '<p class="erreur">Erreur: Code de protection invalide ...</p><br/><br/>';
echo '<a href="index.php?site=inscription">[retour]</a>';
}
}else
{
echo '<p class="erreur">Erreur: tous les champs n&apos;ont pas &eacute;t&eacute; remplis...</p><br/><br/>';
echo '<a href="index.php?site=inscription">[retour]</a>';
}
}
session_unset();
session_destroy();
?>
</div>
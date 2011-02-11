<div class="mh">Zone Membre</div><div class="mf"><!-- Menu -->
<div id="Espace_Membre"><!-- Espace_Membre -->	
<?php
if($_SESSION['login'] && $_SESSION['login'] == TRUE)
{
$inf_result = viewinfosperso();
$last = date("d/m/Y",$inf_result['last_login']);
$ban_result = viewpersoban();
if($inf_result['woltk'] == '0')
{
$woltk = '0';
}else
{
$woltk = '1';
}
$points = $inf_result['points'];
$vote = $inf_result['vote'];
if($inf_result['expansion'] == '0')
{
$exp = 'WoW Classique';
}else
{
if($inf_result['expansion'] == '1')
{
$exp = 'Bc';
}Else
{
$exp = 'Woltk';
}
}  
if($ban_result['active'] == '1')
{
$ban = '<font color="red">Banni</font>';
}else
{
$ban = '<font color="green">Actif</font>';
}
if($inf_result['gmlevel'] >= '2')
{
$gm = '<font color="red">MJ</font>';
}							
$pseudo = replacepseudo();
if ($woltk == '0' AND ($inf_result['expansion'] == '2')) 
{
$exp = 'WoW Classique + Bc';
}		
?>						
<div>
Compte : <a href="index.php?site=mc"><?php echo $gm ?> <?php echo $pseudo; ?></a><br/>Situation : <?php echo $ban; ?><br/>Type : <?php echo $exp ?><br/>Points : <?php echo $points; ?><br/>Vote : <?php echo $vote; ?><br/><br />
<a href="index.php?site=mc">[Mon Compte]</a><br />
<a href="index.php?site=boutique">[Boutique]</a><br /><br />
<a href="inc/deconnexion.php">[Deconnexion]</a><br />
</div>
<?php
}else
{
?>
<form action="index.php?site=login" method="post">
<div>  
<div class="champ"><input type="text" value="Pseudo" class="champ1" name="login" onclick="effacer(this, 'Pseudo');" onblur="restaurer(this, 'Pseudo');" /></div>
<div class="champ"><input type="password" name="password" class="champ1" value="motdepasse" onclick="effacer(this, 'motdepasse');" onblur="restaurer(this, 'motdepasse');" /></div>
<input type="image" id="ok" src="images/ok.png" value="Connexion" title="Connexion"/>	
</div>	
</form>
<a href="index.php?site=inscription">[Inscription]</a><br />
<a href="">Mot de passe perdu?</a>
<?php
} 
?>
</div><!-- Fin Espace_Membre -->
</div><div class="mb"></div> <!-- Fin Menu -->	  					
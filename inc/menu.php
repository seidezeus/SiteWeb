<div class="mh">Menu</div><div class="mf"><!-- Menu -->	
<ul>
<li><a href="index.php" title="">Acceuil</a></li>
<li><a href="<?php echo ''.$array_base['lien_forum'].''; ?>" title="">Notre Forum</a></li>
<li><a href="index.php?site=rejoindre" title="">Nous rejoindre</a></li>
<li><a href="index.php?site=staff" title="">Le Staff <?php echo ''.$array_base['nom'].''; ?></a></li>
</ul> 
</div><div class="mb"></div> <!-- Fin Menu -->
<div class="mh">Serveur</div><div class="mf"><!-- Menu -->
<ul>
<?php
if($_SESSION['login'] && $_SESSION['login'] == TRUE)
{
$gm_result = viewinfosperso();
?>
<li><a href="index.php?site=mc" title="">Gestion & Informations</a></li>
<li><a href="index.php?site=delock" title="">D&eacute;bloquer Personnage</a></li>
<li><a href="index.php?site=boutique" title="">Boutique</a></li>
<li><a href="index.php?site=vote" title="">Votez</a></li>
<?php if($gm_result['gmlevel'] >= '2')
{
?>
</ul> 
</div><div class="mb"></div> <!-- Fin Menu -->
<div class="mh">Administration</div><div class="mf"><!-- Menu -->	
<ul>
<li><a href="index.php?site=jadmin" title="">Gestion des joueurs</a></li>
<?php							
}
if($gm_result['gmlevel'] >= '3')
{
?>
<li><a href="index.php?site=news" title="">Gestion des News</a></li>
<li><a href="index.php?site=admin_boutique" title="">Gestion Boutique</a></li>
<?php
}
?>
<?php
}else
{
?>
<li><a href="index.php?site=inscription" title="">Inscriptions</a></li>
<li><a href="index.php?site=infos" title="">Informations</a></li>
<li><a href="index.php?site=vote" title="">Votez</a></li>
<?php
} 
?>
</ul> 
</div><div class="mb"></div> <!-- Fin Menu -->
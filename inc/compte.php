<?php 
if($_SESSION['login'] && $_SESSION['login'] == TRUE)
{
?>
<h2><img class="float-left" src="images/mesperso.png" alt=""/>Mes personnages<h2>
<span class="right">Voir tous vos personnages de Votre compte.</span><br/>
<div align="right">
<form action="index.php?site=mperso" method="post" >
<input type="image" src="images/boutonvoir.png" value="Voir"/>
</form>
</div>
<hr color="#C49720" size="4px">
<h2><img class="float-left" src="images/deblocage.png" alt=""/>Déblocage de personnage</h2>
<span class="right">Ce système de déblocage vous téléporte à votre pierre de foyer.</span><br/><br/>
<div align="right">
<form action="index.php?site=delock" method="post">
<input type="image" src="images/boutondebloq.png" value="debloquer"/>
</form>
</div>
<hr color="#C49720" size="4px">
<h2><img class="float-left" src="images/update.png" alt=""/>Mise à jour du compte</h2>
<span class="right">Cliquez ici pour mettre à niveau votre compte.</span><br/><br/>
<div align="right">
<form action="index.php?site=chexp" method="post">
<input type="image" src="images/boutonchang.png" value="changer"/>
</form>
</div>
<hr color="#C49720" size="4px">
<h2><img class="float-left" src="images/chpass.png" alt=""/>Changement de mot de passe</h2>
<span class="right">Vous permet de changer le mot de passe de votre compte.</span><br/><br/>
<div align="right">
<form action="index.php?site=chpass" method="post">
<input type="image" src="images/boutonchang.png" value="changer"/>
</form>
</div>
<hr color="#C49720" size="4px">
<h2><img class="float-left" src="images/chemail.png" alt=""/>Changement d'adresse Email</h2>
<span class="right">Vous permet de changer l'adresse Email de votre compte.</span><br/><br/>
<div align="right">
<form action="index.php?site=chmail" method="post">
<input type="image" src="images/boutonchang.png" value="changer"/>
</form>
</div>
<hr color="#C49720" size="4px">
<br/>
<?php
}else
{
?>
<div align="center">
<p class="erreur">Erreur : vous devez &ecirc;tre connect&eacute; pour avoir acc&egrave;s a cette page.</p>
<a href="index.php" title="">[retour]</a>
</div>
<?php 
}
?>

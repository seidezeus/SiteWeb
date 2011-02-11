<?php
session_start();
include ('libs/config.php');
include ('libs/fonctions.php');
error_reporting(0);
htmlspecialchars($input);
htmlentities($input);
addslashes($input);
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="fr" lang="fr">
<head>
<title><?php  echo $array_base['nom']; ?></title>
<link rel="shortcut icon" href="images/favicon.ico" type="image/x-icon">
<link rel="icon" href="images/favicon.ico" type="image/x-icon">
<meta http-equiv="Content-Type" content="text/html; charset=windows-1252" />
<meta http-equiv="content-language" content="fr" />
<link href="css/style.css"	title="Défaut" rel="stylesheet" type="text/css" media="screen" />
	<script type="text/javascript" src="js/script.js"></script>
	<script type="text/javascript" src="js/mootools.js"></script>
	<script type="text/javascript" src="js/slideshow.js"></script>
	<script type="text/javascript">		
	  window.addEvent('domready', function(){
	    var data = {
	      '1.png': { caption: 'Votre Titre 1' }, 
	      '2.png': { caption: 'Votre Titre 2' }, 
	      '3.png': { caption: 'Votre Titre 3' }, 
	      '4.png': { caption: 'Votre Titre 4' }
	    };
	    var myShow = new Slideshow('show', data, {controller: true, height: 260, hu: 'images/banniere/', thumbnails: true, width: 600});
	  });
</script>
</head>
<body>


<div id="conteneur"><!-- Global -->  
<div id="header"> 
<body>
</div><!-- Header --> 
<div id="contenu"><!-- Contenu -->

<div id="left"><!-- colonne gauche --> 
<?php include ('inc/menu.php');?>
<?php include ('inc/toparene.php');?>
</div><!-- Fin colonne gauche -->  

<div id="right"><!-- colonne droite -->	 
<?php include ('inc/infocompte.php');?>
<?php include ('inc/statuserv.php');?>
<?php include ('inc/topvote.php');?>
</div><!-- Fin colonne droite -->

<div id="centre"><!-- Centre -->
 <div id="show" class="slideshow">
    <img src="images/1.png" alt="World Of Warcraft" />
  </div>
<div class="nh"></div><div class="nf"><!-- news --> 
<?php include ('inc/racc.php');?>
</div><div class="nb"></div><!-- news --> 	
</div><!-- Fin Centre -->
<div class="clear"></div><!-- NE PAS SUPPRIMER -->
</div><!-- Fin Contenu -->

<div id="pied"><!-- Pied -->
<!-- mention de copyright Ne pas retirer sans autorisation écrite -->  
<div class="copyright">©<a href=""> Votresite.com</a> 2010 | Design <a href="http://www.kitgraphiquegratuit.org" onclick="window.open(this.href); return false;" title="kits graphiques gratuits"> Kit graphique</a></div>
<!-- mention de copyright Ne pas retirer sans autorisation écrite -->	
</div><!-- Fin Pied -->
</div><!-- Fin Global -->  
<div class="copyrightblizzard"><!-- Copyright Blizzard -->
World of Warcraft® et Blizzard Entertainment® sont des marques commerciales ou des marques déposées de Blizzard Entertainment aux Etats-Unis et/ou dans d'autres pays.
These terms and all related materials, logos, and images are copyright © Blizzard Entertainment. This site is in no way associated with or endorsed by Blizzard Entertainment®.
</div><!-- Fin Copyright Blizzard -->
</body>
</html>
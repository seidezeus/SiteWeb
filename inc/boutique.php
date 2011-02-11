<script src="js/power.js"></script>
<?php
if($_SESSION['login'] && $_SESSION['login'] == TRUE ) 
     {
?>
<div align="center">
<h2>Boutique d'Objets!</h2>
<hr color="#C49720" size="4px">
<br/>
<span>&nbsp;&nbsp;&nbsp;&nbsp; Armes &nbsp; &nbsp;Armures &nbsp; &nbsp; Bijoux &nbsp;&nbsp; Boucliers &nbsp;Familiers&nbsp;&nbsp;</span><br/>
<form action="index.php?site=boutique" method="post">
<input type="image" name="cat" value="1" src="images/boutique/boutons/armes.png" onclick="submit"/>
<input type="image" name="cat" value="2" src="images/boutique/boutons/armures.png" onclick="submit"/>
<input type="image" name="cat" value="3" src="images/boutique/boutons/bijoux.png" onclick="submit"/>
<input type="image" name="cat" value="4" src="images/boutique/boutons/boucliers.png" onclick="submit"/>
<input type="image" name="cat" value="5" src="images/boutique/boutons/compagnon.png" onclick="submit"/><br/>
<span>&nbsp; &nbsp;artisanats&nbsp; Argents &nbsp;&nbsp; Héritage &nbsp; Montures &nbsp; &nbsp; Sacs &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;</span><br/>
<input type="image" name="cat" value="6" src="images/boutique/boutons/compo.png" onclick="submit"/>
<input type="image" name="cat" value="7" src="images/boutique/boutons/gold.png" onclick="submit"/>
<input type="image" name="cat" value="8" src="images/boutique/boutons/herit.png" onclick="submit"/>
<input type="image" name="cat" value="9" src="images/boutique/boutons/montures.png" onclick="submit"/>
<input type="image" name="cat" value="10" src="images/boutique/boutons/sacs.png" onclick="submit"/>
</form>
<?php
if(isset($_POST['cat']) && $_POST['cat'] != 'NULL') {
$ry = viewboutique();
echo '<table border="1">';
while($rep = mysql_fetch_array($ry)) {
echo '<tr><th width="200"><a href="index.php?site=boutiqacht&amp;id='.$rep['id'].'">Acheter</a></th><th width="200"><a href="http://fr.wowhead.com/?item='.$rep['id'].'"> '.$rep['nom'].'</a></th><th width="200">Prix : '.$rep['prix'].' Points</th></tr><br/>';
}
echo "</table>";
}
}else
{
echo '<meta http-equiv="refresh" content="3;URL=index.php">';
echo '<p class="erreur">Erreur : vous devez &ecirc;tre connect&eacute; pour avoir acc&egrave;s a cette page.<br/><br/>Redirection dans 3 secondes ...</p>';
}
?>
</div>
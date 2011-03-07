<div id="filter"></div>
<div id="box">
	<span id="boxtitle"></span>
	<div align="center">
		<p>Vous avez actuellement '<?php echo $nbr_Point_ft['points_site']; ?>' point(s) !</p>
		<form action="#selection" method="post">
			<table class="table" border="0" cellspacing="0" cellpadding="3" width="100%">

			<tr >
				<td ><a href="javascript:;" ><input type="image" name="cat" value="1" src="styles/default/images/boutique/armes.png" onclick="submit"/><center>Armes</center></a></td>
				<td ><a href="javascript:;" ><input type="image" name="cat" value="2" src="styles/default/images/boutique/armures.png" onclick="submit"/><center>Armures</center></a></td>
				<td ><a href="javascript:;" ><input type="image" name="cat" value="3" src="styles/default/images/boutique/bijoux.png" onclick="submit"/><center>Bijoux</center></a></td>
			</tr>
			<tr >
				<td ><a href="javascript:;" ><input type="image" name="cat" value="6" src="styles/default/images/boutique/compo.png" onclick="submit"/><center>Compos</center></a></td>
				<td ><a href="javascript:;" ><input type="image" name="cat" value="7" src="styles/default/images/boutique/gold.png" onclick="submit"/><center>Monnaies</center></a></td>
				<td ><a href="javascript:;" ><input type="image" name="cat" value="8" src="styles/default/images/boutique/herit.png" onclick="submit"/><center>Héritage</center></a></td>
			</tr>
			<tr >
				<td ><a href="javascript:;" ><input type="image" name="cat" value="4" src="styles/default/images/boutique/boucliers.png" onclick="submit"/><center>Boucliers</center></a></td>
				<td ><a href="javascript:;" ><input type="image" name="cat" value="5" src="styles/default/images/boutique/compagnon.png" onclick="submit"/><center>Compagnons</center></a></td>
			</tr>	
			<tr >
				<td ><a href="javascript:;" ><input type="image" name="cat" value="9" src="styles/default/images/boutique/montures.png" onclick="submit"/><center>Montures</center></a></td>
				<td ><a href="javascript:;" ><input type="image" name="cat" value="10" src="styles/default/images/boutique/sacs.png" onclick="submit"/><center>Sacs</center></a></td>	
			</tr>																	
			</table>
		</form>
	</div>		
	<br/><br/><a href="javascript:closebox()">Fermer</a>
</div>

<a href="javascript:openbox('Boutique', 1)">Boutique</a>';


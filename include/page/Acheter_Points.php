<?php
	if(isset($_SESSION['id'])) {
		$erreur_general = '';
		if(isset($_POST['code'])) {
			if(!empty($_POST['code'])) {
				$code = trim($_POST['code']);
				$test_webopass = @file("http://payer.webopass.fr/valider_code.php?cc=".$cc."&document=".$document."&requete=1&code=".$code."&ig=1");

				if(trim($test_webopass[0]) == "OUI") {
					$pts_s = mysql_query('SELECT * FROM voting_points WEHERE id=\''.$_SESSION['id'].'\'');
					$pts = mysql_fetch_array($pts_s);

					$points_ajout = $pts['points'] + $pts_achats;

					mysql_query('UPDATE voting_points SET points = '.$points_ajout.' WHERE id='.$_SESSION['id']) or die ('Erreur ACHETER_POINTS : '.mysql_error());

					?>
					<script type="text/javascript">
						alert('Merci de votre achat, vous avez été crédité de <?=$pts_achats?> points ! Ce qui vous fait <?=$points_ajout?> points ! Bon jeu sur Infinity-Chaos.');
						document.location.href="?page=Acheter_Points"
					</script>
					<?php	

				}
				else {
					$erreur_general = "* Le code saisi est invalide !";
				}
			}
			else {
				$erreur_general = "* Veuillez remplir le champs !";
			}
		}
?>
<div class="post2"> 
	<div class="post_header2" align="left">Acheter des points</div> 
	<div class="post_body2" align="left">
		<form action="?page=Acheter_Points&amp;Step=2#Verification" method="post">
			<?php
				if($pts_achats > 10) {
					$pts_en_plus = $pts_achats - 10;

					?>
						<p><center><font color="darkgreen">Si vous acheter des points maintenant, vous gagnez <?=$pts_achats?> points soit <?=$pts_en_plus?> points en plus ! Alors n'hésitez plus, achetez des points par Webopass !</font></center></p><br/><br/>
					<?php
				}
				else {
					?>
						<p><center>Pour chaque achat vous gagnerez <?=$pts_achats?> points en plus.</center></p><br/><br/>
					<?php
				}
			?>

			<table align="center">
				<tr>
					<td colspan="2"><center><a href="#ouvrirFenetre" onclick="window.open('http://payer.webopass.fr/affiche_drapeaux.php?cc=<?=$cc?>&document=<?=$document?>&no_saisie_code=1','','toolbar=no,location=no,directories=no,status=no,menubar=no,scrollbars=yes,resizable=no,copyhistory=no,width=650,height=550');"><img src="styles/default/images/webopass.png" alt="Obtenir un code ?" title="Obtenir un code ?" /></a></center></td>
				</tr>
				<tr>
					<td colspan="2"><font color="red"><?=$erreur_general?></font></td>
				</tr>
				<tr>
					<td><label for="code">Entrez le code reçus lors de l'apel : </label></td>
					<td><input type="text" name="code" id="code" size="9" /></td>
				</tr>
				<tr>
					<td colspan="2"><input type="submit" value="Vérifier" /></td>
				</tr>
			</table>
		</form>
	</div>
</div>
<?php
	}
	else {
		?>
			<script type="text/javascript">
				alert('Connectez-vous pour acceder à cette page !');
				document.location.href="?page=Accueil"
			</script>
		<?php	
	}
?>

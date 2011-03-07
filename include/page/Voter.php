<div class="post2"> 
	<div class="post_header2" align="left">Voter</div> 
	<div class="post_body2" align="center"> 
	<?php
		if(isset($_SESSION['id'])) {
			$date_now = date("Y-m-d H:i:s");

			$db = mysql_select_db ($array_db['db_realmd'],$cxn);
			if (!$db) {
				die ('Erreur : ' . mysql_error());
			}

			$sql1 = "SELECT username, datevote_site FROM account WHERE username='".$_SESSION['acc']."'";
			$req1 = mysql_query($sql1) or die("ERROR OMG");
			while($data = mysql_fetch_assoc($req1))
			{
				$datevote_site = $data['datevote_site'];
			}

			$sql2 = "SELECT username, datevote2_site FROM account WHERE username='".$_SESSION['acc']."'";
			$req2 = mysql_query($sql2) or die("ERROR OMG");
			while($data = mysql_fetch_assoc($req2))
			{
				$datevote2_site = $data['datevote2_site'];
			}

			$gowonda_lastvote = mysql_query("SELECT username FROM account WHERE TIMEDIFF('$date_now', '$datevote_site') <= '02:00:00' AND username='".$_SESSION['acc']."'"); 
			$rpg_lastvote = mysql_query("SELECT username FROM account WHERE TIMEDIFF('$date_now', '$datevote2_site') <= '02:00:00' AND username='".$_SESSION['acc']."'"); 

			while($gowonda_lvis = mysql_fetch_assoc($gowonda_lastvote))
			{
				$gowonda_isset = $gowonda_lvis['username'];
			}

			while($rpg_lvis = mysql_fetch_assoc($rpg_lastvote))
			{
				$rpg_isset = $rpg_lvis['username'];
			}

			
			echo '<h1>Cliquez sur l\'image pour voter</h1>';

			$i = 0;

			if(!isset($gowonda_isset['username'])) {
				echo '<a href="?page=Voter&amp;top=Gowonda#captcha"><img src="http://www.gowonda.com/vote.gif" /></a> ';

				$i++;
			}
			if(!isset($rpg_isset['username'])) {
				echo '<a href="?page=Voter&amp;top=Rpg-Paradize#captcha"><img src="http://www.rpg-paradize.com/vote.gif" /></a>';

				$i++;
			}

			echo '<br/><br/>';

			if($i == 0) {
				echo '<font>Vous n\'avez plus de vote disponible. Un vote est disponible toute les 2 heures.</font>';
			}

			echo '<br/><br/>';

			$db = mysql_select_db ($array_db['db_site'],$cxn);
			if (!$db) {
				die ('Erreur : ' . mysql_error());
			}

			$points = mysql_query('SELECT id, points FROM voting_points WHERE id=\''.$_SESSION['id'].'\'');	
			$points_ft = mysql_fetch_array($points);

			echo 'Vous avez actuellement \''.$points_ft['points'].'\' points.<br/><br/><br/>';

			if(isset($_GET['top'])) {
				if(!isset($_SESSION['captcha_vote2']) OR $_SESSION['captcha_vote2'] == '0') {
					$_SESSION['nbr1'] = rand(0,10);
					$_SESSION['nbr2'] = rand(1,10);

					$_SESSION['captcha_vote2'] = $_SESSION['nbr1'] + $_SESSION['nbr2'];

					echo '<script type="text/javascript">document.location.href="?page=Voter&top='.$_GET['top'].'&captcha=cree#captcha"</script>';
					echo 'Vous n\'avez pas été redirigé ? <a href="?page=Voter&top='.$_GET['top'].'&captcha=cree#captcha">Cliquez sur moi</a>';
				}

				else {
					if(isset($_POST['captcha']) AND $_POST['captcha'] == $_SESSION['captcha_vote2']) {
						$_SESSION['captcha_vote2'] = '0';

						$points_ajout = $points_ft['points'] + $confVote['Nbr_Point_Vote'];

						

						$db = mysql_select_db ($array_db['db_realmd'],$cxn);
						if (!$db) {
							die ('Erreur : ' . mysql_error());
						}

						$test_sh = mysql_query('SELECT * FROM voting_points WHERE id=\''.$_SESSION['id'].'\'');
						$test = mysql_fetch_array($test_sh);

						if(isset($test['points']) AND $test['points'] != '') {
							if($_GET['top'] == 'Gowonda') {
								mysql_query('UPDATE account SET datevote_site = NOW() WHERE id='.$_SESSION['id']);

								$db = mysql_select_db ($array_db['db_site'],$cxn);
								if (!$db) {
									die ('Erreur : ' . mysql_error());
								}

								mysql_query('UPDATE voting_points SET points = '.$points_ajout.' WHERE id='.$_SESSION['id']);

								?>
									<script type="text/javascript">
										alert('Vote pour Gowonda pris en compte, redirection vers la page de vote');
										document.location.href="<?php echo $confVote['Gowonda']; ?>";
									</script>
								<?php
								echo 'Vous n\'avez pas été redirigé ? <a href="'.$confVote['Gowonda'].'">Cliquez sur moi</a>';
							}	

							if($_GET['top'] == 'Rpg-Paradize') {
								mysql_query('UPDATE account SET datevote2_site = NOW() WHERE id='.$_SESSION['id']);

								$db = mysql_select_db ($array_db['db_site'],$cxn);
								if (!$db) {
									die ('Erreur : ' . mysql_error());
								}

								mysql_query('UPDATE voting_points SET points = '.$points_ajout.' WHERE id='.$_SESSION['id']);

								?>
									<script type="text/javascript">
										alert('Vote pour Rpg Paradize pris en compte, redirection vers la page de vote');
										document.location.href="<?php echo $confVote['Rpg_paradize']; ?>";
									</script>
								<?php

								echo 'Vous n\'avez pas été redirigé ? <a href="'.$confVote['Rpg_paradize'].'">Cliquez sur moi</a>';
							}
						}

						else {
							mysql_query('INSERT INTO voting_points(id, points, date, date_points) VALUES(\''.$_SESSION['id'].'\', \'0\', \'123\', \'0\')') or die ('Erreur'.mysql_error());

							
							if($_GET['top'] == 'Gowonda') {
								mysql_query('UPDATE account SET datevote_site = NOW() WHERE id='.$_SESSION['id']);

								$db = mysql_select_db ($array_db['db_site'],$cxn);
								if (!$db) {
									die ('Erreur : ' . mysql_error());
								}

								mysql_query('UPDATE voting_points SET points = '.$points_ajout.' WHERE id='.$_SESSION['id']);

								?>
									<script type="text/javascript">
										alert('Vote pour Gowonda pris en compte, redirection vers la page de vote');
										document.location.href="<?php echo $confVote['Gowonda']; ?>";
									</script>
								<?php
								echo 'Vous n\'avez pas été redirigé ? <a href="'.$confVote['Gowonda'].'">Cliquez sur moi</a>';
							}	

							if($_GET['top'] == 'Rpg-Paradize') {
								mysql_query('UPDATE account SET datevote2_site = NOW() WHERE id='.$_SESSION['id']);

								$db = mysql_select_db ($array_db['db_site'],$cxn);
								if (!$db) {
									die ('Erreur : ' . mysql_error());
								}

								mysql_query('UPDATE voting_points SET points = '.$points_ajout.' WHERE id='.$_SESSION['id']);

								?>
									<script type="text/javascript">
										alert('Vote pour Rpg Paradize pris en compte, redirection vers la page de vote');
										document.location.href="<?php echo $confVote['Rpg_paradize']; ?>";
									</script>
								<?php

								echo 'Vous n\'avez pas été redirigé ? <a href="'.$confVote['Rpg_paradize'].'">Cliquez sur moi</a>';
							}
						}																
					}

					else {
						if(!isset($_POST['captcha'])) {
							echo'<hr/><h1 id="captcha">Captcha</h1>';
							?>
								<form action="#captchaValidation" method="post">
									<table>
										<tr>
											<td><label for="captcha"><?php echo $_SESSION['nbr1'].' + '.$_SESSION['nbr2'].' '; ?></label></td>
											<td><input type="text" name="captcha" id="captcha" /></td>
										</tr>
										<tr>
											<td colspan="2"><input type="submit" name="action" value="Valider"/></td>
										</tr>
									</table>
								</form>
							<?php
						}
						else {
							echo'<hr/><h1>Captcha</h1>';
							?>
								<form action="#captchaValidation" method="post">
									<table>
										<tr>
											<td colspan="2"><font color="red">Le résultat est incorrect</font></td>
										</tr>
										<tr>
											<td><label for="captcha"><?php echo $_SESSION['nbr1'].' + '.$_SESSION['nbr2'].' '; ?></label></td>
											<td><input type="text" name="captcha" id="captcha" /></td>
										</tr>
										<tr>
											<td colspan="2"><input type="submit" name="action" value="Valider"/></td>
										</tr>
									</table>
								</form>
							<?php
						}
					}
				}
			}
		}

		else {
		?>
			<script type="text/javascript">
				alert('Vous devez etre connecté pour voter ! (Redirection vers la page d\'Accueil)');
				document.location.href="?page=Accueil";
			</script>
		<?php
		}
	?>	
</div>
			</td> 
		</tr> 
	</tbody>
</table> 

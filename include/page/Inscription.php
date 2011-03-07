<div class="post2"> 
   <div class="post_header2" align="left">Inscription</div> 
   <div class="post_body2" align="left"> 
<?php
$db = mysql_select_db ($array_db['db_realmd'],$cxn);
if (!$db) {
	die ('Erreur : ' . mysql_error());
}

if(isset($_POST['username'])) {
	if(empty($_POST['username']) OR empty($_POST['password']) OR empty($_POST['password2']) OR empty($_POST['email'])) {
		echo '<font color="red">Veuillez remplir tous les champs !</font>';
	}
	else {
		$user = mysql_query('SELECT * FROM account WHERE username=\''.htmlspecialchars($_POST['username']).'\'');
		$user_ft = mysql_num_rows($user);

		if($user_ft != 0) {
			echo '<font color="red">Ce nom de compte existe déjà!</font>';
		}
		else {
			$mail = mysql_query('SELECT * FROM account WHERE email=\''.htmlspecialchars($_POST['email']).'\'');
			$mail_ft = mysql_num_rows($mail);

			if($mail_ft > $confGeneral['mail_nb']) {
				echo '<font color="red">Vous avez déjà créé trop de compte pour cette adresse mail</font>';
			}	
			else {
				if(preg_match("#^[a-z0-9._-]+@[a-z0-9._-]{2,}\.[a-z]{2,4}$#", htmlspecialchars($_POST['email']))) {
					if(htmlspecialchars($_POST['password']) != htmlspecialchars($_POST['password2'])) {
						echo '<font color="red">Les deux mot de passes sont différents.</font>';
					}

					else {


         					mysql_query('INSERT INTO account(username, sha_pass_hash, gmlevel, email, joindate, last_ip, expansion) VALUES(\''.htmlspecialchars($_POST['username']).'\', \''.sha1(strtoupper(htmlspecialchars($_POST['username'])).':'.strtoupper(htmlspecialchars($_POST['password']))).'\', \'0\', \''.htmlspecialchars($_POST['email']).'\', \''.date('Y-m-d H:i:s').'\', \''.$_SERVER['REMOTE_ADDR'].'\', \'3\')');
		
						echo '<script type="text/javascript">alert("Enregistrement terminé ! Bienvenue '.htmlspecialchars($_POST['username']).'."); document.location.href="?page=Accueil";</script>';
					}
				}

				else {
					echo '<font color="red">Votre adresse mail est invalide. (Forme : xxxx@xxxx.xxxx)</font>';
				}
			}	
		}
	}
}	
?>
							<form action="#Donnees" method="post"> 
								<table align="center" border="0"> 
 
									<tr> 
										<td class="td"> 
											<label for="username" onmouseover="$WowheadPower.showTooltip(event, 'Entrez un nom de compte, celui-ci sera votre identifiant de connexion.')" onmousemove="$WowheadPower.moveTooltip(event)" onmouseout="$WowheadPower.hideTooltip();"> 
												Nom de compte:
                                 	       </label> 
										</td> 
										<td> 
											<input type="text" id="username" maxlength="20" name="username" /> 											
										</td> 
									</tr> 
									<tr> 
										<td class="td"> 
											<label for="password" onmouseover="$WowheadPower.showTooltip(event, 'Trouvez un mot de passe sûr ! Les mot de passe étant cryptés, ceci ne peuvent être récupérés !')" onmousemove="$WowheadPower.moveTooltip(event)" onmouseout="$WowheadPower.hideTooltip();"> 
												Mot de passe:
                                 	       </label> 
										</td> 
										<td> 
											<input type="password" id="password" maxlength="20" name="password" />											
										</td> 
									</tr> 
 
									<tr> 
										<td class="td"> 
											<label for="password2"> 
												Confirmez le mot de passe :
                                 	       </label> 
										</td> 
									  <td> 
											<input type="password" id="password2" maxlength="20" name="password2" /> 											
										</td> 
									</tr> 
									<tr> 
										<td class="td"> 
											<label for="email" onmouseover="$WowheadPower.showTooltip(event, 'Entrez une adresse mail.')" onmousemove="$WowheadPower.moveTooltip(event)" onmouseout="$WowheadPower.hideTooltip();"> 
												Adresse mail:
                                 	       </label> 
										</td> 
										<td> 
											<input type="text" id="email" maxlength="40" name="email" /> 											
										</td> 
									</tr> 
 
								</table><br /> 
 
								<center>
						
 
								<br /> 
								<input type="submit" name="action" value="S'inscrire" class="button doit" /></center> 
							</form> 
</div></td> 
</tr> 
		</tbody></table> 

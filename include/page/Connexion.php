<div class="post2"> 
   <div class="post_header2" align="left">Connexion</div> 
   <div class="post_body2" align="left"> 
<?php
$db = mysql_select_db ($array_db['db_realmd'],$cxn);
if (!$db) {
	die ('Erreur : ' . mysql_error());
}

if(isset($_POST['username'])) {
	if(empty($_POST['username']) OR empty($_POST['password'])) {
		echo '<font color="red">Veuillez remplir tous les champs !</font>';
	}
	else {
		$realmd = mysql_query('SELECT * FROM account WHERE username=\''.htmlspecialchars($_POST['username']).'\'');
		$realmd_ft = mysql_num_rows($realmd);
		$realmd_ft2 = mysql_fetch_array($realmd);

		if($realmd_ft == 0) {
			echo '<font color="red">Nom de compte ou mot de passe incorrect !</font>';
		}
		else {
			$pass = sha1(strtoupper(htmlspecialchars($_POST['username'])).':'.strtoupper(htmlspecialchars($_POST['password'])));

			if($realmd_ft2['sha_pass_hash'] != $pass) {
				echo '<font color="red">Nom de compte ou mot de passe incorrect !</font>';
			}
	
			else {
				$_SESSION['id'] = $realmd_ft2['id'];
				$_SESSION['acc'] = $realmd_ft2['username'];
				$_SESSION['mail'] = $realmd_ft2['email'];
				$_SESSION['level'] = $realmd_ft2['gmlevel'];

				echo '<script type="text/javascript">alert("Bienvenue '.htmlspecialchars($_POST['username']).' !"); document.location.href="?page=Accueil";</script>';
			}
		}
	}
}	
?>
							<form action="#Donnees" method="post"> 
								<table align="center" border="0"> 
 
									<tr> 
										<td class="td"> 
											<label for="username"> 
												Nom de compte:
                                 	       </label> 
										</td> 
										<td> 
											<input type="text" id="username" maxlength="20" name="username" /> 											
										</td> 
									</tr> 
									<tr> 
										<td class="td"> 
											<label for="password"> 
												Mot de passe:
                                 	       </label> 
										</td> 
										<td> 
											<input type="password" id="password" maxlength="20" name="password" />											
										</td> 
									</tr> 

 
								</table><br /> 
 
								<center>
						
 
								<br /> 
								<input type="submit" name="action" value="Connexion" class="button doit" /></center> 
							</form> 
</div></td> 
</tr> 
		</tbody></table> 

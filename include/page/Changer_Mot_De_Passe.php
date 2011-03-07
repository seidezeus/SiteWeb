<div class="post2"> 
   <div class="post_header2" align="left">Changer le mot de passe</div> 
   <div class="post_body2" align="left"> 
<?php
if(isset($_SESSION['id']))
{
?>
<?php
if (isset($_POST['password1']))
{
	$password1 = mysql_real_escape_string(htmlspecialchars($_POST['password1']));
	$password2 = mysql_real_escape_string(htmlspecialchars($_POST['password2']));
	$password3 = mysql_real_escape_string(htmlspecialchars($_POST['password3']));
	
	if(!empty($password1) && !empty($password2) && !empty($password3))
	{
		/* Sélection de la base de données des comptes */
		$db = mysql_select_db ($array_db['db_realmd'],$cxn);
		if (!$db) {
			die ('Erreur : ' . mysql_error());
		}
		$account_password = mysql_query("SELECT * FROM `account` WHERE `sha_pass_hash` = SHA1(CONCAT(UPPER('".$_SESSION['acc']."'),':',UPPER('".$password1."'))) AND `id` = '".$_SESSION['id']."'");
			
		if (mysql_num_rows($account_password) > 0)
		{
			if($password2 == $password3)
			{
				mysql_query("UPDATE `account` SET `sha_pass_hash` = SHA1(CONCAT(UPPER('".$_SESSION['acc']."'),':',UPPER('".$password3."'))) WHERE `id` = '".$_SESSION['id']."'");
				echo '
				<script language="javascript"> 
					alert("Mot de passe changé avec succès !");
					document.location.href="index.php?page=Compte" 
				</script>';
			}else
			{
				echo '
				<script language="javascript"> 
					alert("Erreur : Les deux mots de passe ne sont pas identique !");
					document.location.href="?page=Changer_Mot_De_Passe" 
				</script>';
			}
		}else
		{
			echo '
			<script language="javascript"> 
				alert("Erreur : Votre ancien mot de passe est mauvais !");
				document.location.href="?page=Changer_Mot_De_Passe" 
			</script>';
		}
	}else
	{
		echo '
		<script language="javascript"> 
			alert("Erreur : Tous les champs ne sont pas remplis !");
			document.location.href="?page=Changer_Mot_De_Passe" 
		</script>';
	}
}else
{
	echo '
	<div>
		<form action="?page=Changer_Mot_De_Passe#Donnees" method="post">
			Ancien mot de passe : <br />
			<input type="password" name="password1">
			<br /><br />
			Nouveau mot de passe :<br />
			<input type="password" name="password2">
			<br /><br />
			Confirmation :<br />
			<input type="password" name="password3">
			<br /><br />
			<input type="submit" name="action" value="Changer" class="button doit" /></center> 
		</form>	
	</div>';
}
?>
</div>
<?php
}else
{
echo '<font color="red">Vous devez être connecté pour accéder à cette page !</font></p>';
}
?>
</div></td> 
</tr> 
		</tbody></table> 

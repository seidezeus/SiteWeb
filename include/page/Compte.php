				<div class="post2"> 
					<div class="post_header2" align="left">Mon compte</div> 

					<div class="post_body2" align="left">
						<div style="float: right; border: 1px outset orange; padding: 5px;">
							Nom de compte : <font color="#c1954f"><?php echo $_SESSION['acc']; ?><br /></font>
							Votre adresse mail : <font color="#c1954f"><?php echo $_SESSION['mail']; ?> <br/></font>
							Nombre de points de vote : <font color="#c1954f"><?php echo $pts; ?><br /></font>
							<br /> 
						</div>

						<div>
							<h1>Outils de compte</h1>							
						</div>

						<table width="100%" border="0" > 
							<tr> 
								<td width="67" height="74" style="background-image:url(./styles/default/images/icon_lock.png); background-position:center top"></td> 
								<td align="left">&nbsp;<br /><a style="font-size:14px; letter-spacing:1px" href="?page=Changer_Mot_De_Passe">Changer le mot de passe</a><br /><i><font color="#999999">Vous souhaitez changer votre mot de passe ?</font></i></td> 
							</tr>

							<tr> 
								<td height="74" style="background-image:url(./styles/default/images/star2.png); background-position:center top"></td> 
								<td align="left"><a style="font-size:14px" href="?page=Changer_Adresse_Mail">Changer d'adresse mail</a><br><i><font color="#999999">Vous avez changé d'adresse mail ? Changez la !</font></i></td> 
							</tr>

							<tr> 
								<td height="74" style="background-image:url(./styles/default/images/chars.png); background-position:center top"></td> 
								<td align="left">&nbsp;<br /><a style="font-size:14px; letter-spacing:1px" href="?page=Debloque_personnage">Debloquer un personnage</a><br /><i><font color="#999999">Vous êtes bloqué dans un ravin ? Venez débloquer votre personnage !</font></i></td> 
							</tr>
						</table>
					</div> 
				</div>				
			</td> 
		</tr> 
	</tbody>
</table> 

<center><h3>Inscription</h3></center>
<script type="text/javascript">
function writediv(texte)
{
document.getElementById('pseudobox').innerHTML = texte;
}

function verifPseudo(pseudo)
{
if(pseudo != '')
{
if(pseudo.length<3)
writediv('<span style="color:#cc0000"><b>'+pseudo+' :</b> Ce pseudo est trop court</span>');
else if(pseudo.length>12)
writediv('<span style="color:#cc0000"><b>'+pseudo+' :</b> Ce pseudo est trop long</span>');
else if(texte = file('inc/verifpseudo.php?pseudo='+escape(pseudo)))
{
if(texte == 1)
writediv('<span style="color:#cc0000"><b>'+pseudo+' :</b> Ce pseudo est deja pris</span>');
else if(texte == 2)
writediv('<span style="color:#1A7917"><b>'+pseudo+' :</b> Ce pseudo est libre</span>');
else
writediv(texte);
}
}

}

function file(fichier)
{
if(window.XMLHttpRequest) // FIREFOX
xhr_object = new XMLHttpRequest();
else if(window.ActiveXObject) // IE
xhr_object = new ActiveXObject("Microsoft.XMLHTTP");
else
return(false);
xhr_object.open("GET", fichier, false);
xhr_object.send(null);
if(xhr_object.readyState == 4) return(xhr_object.responseText);
else return(false);
}
</script>
<hr color="#C49720" size="4px">
<br/>
<div align="center">
<form action="index.php?site=confirmation" method="post">

<b>
Nom d'utilisateur:<br />
<div class="champ"><input type="text" name="pseudo" class="champ1" onKeyUp="verifPseudo(this.value)"/></div>
<div id="pseudobox"></div>
Mot de passe :<br />
<div class="champ"><input type="password" class="champ1" name="password1" /></div><br />
R&eacute;p&eacute;ter mot de passe :<br />
<div class="champ"><input type="password" class="champ1" name="password2" /></div><br />
Adresse Email :<br />
<div class="champ"><input type="text" class="champ1" name="mail" /></div><br/>
Expansion :
<div class="champ"><select name="expansion"  class="champ1">
<option value="classique">WoW Classique</option>
<option value="bc">Burning Crusade</option>
<option value="woltk">Woltk</option>
</select></div>
<br /><br />
<table><tr>
<td><img  src="inc/captcha.php" alt="Img verif" /></td>
<td><input type="text" name="verif" size="10" maxlength="6" /></td>
</table><br/>
</tr><input type="submit" value="valider" />
</form>
<br/>
*Minimum 3 caracteres, maximum 12 caracteres, caracteres sp&eacute;ciaux interdits.
<br/>
*Si l'image ne s'affiche pas, cliquer sur F5.
</div>
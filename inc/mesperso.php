<div align="center">
<h3>Mes personnages</h3>
<hr color="#C49720" size="4px">
<br/>
 <?php
mysql_select_db($array_db['characters']) or die();
$query = "SELECT * FROM `characters` WHERE account='".$_SESSION['id']."' ORDER BY `name` ASC";
$result = mysql_query($query) or die (mysql_error());
echo  '<table width=520 height=50 border "1">
</tr><th> Nom </th><th>Race </th><th> Classe </th><th> niveau </th><th><center> Argent </center></th></tr>';
while ($row = mysql_fetch_array($result)){
	if($cpt % 2){
		$cssclass = 'background-color: #;';
	}
	else{
		$cssclass = 'background-color: #;';
	}
	echo '<center><tr style="'.$cssclass.'">
				<td><center>'.$row['name'].'</td>
				<td>';
	if ($row['race']==1){
		echo '<center><img src="images/classes/1-0.gif" title="Humain" alt="Humain"/></td>';
	}
	else if ($row['race']==2){
		echo '<center><img src="images/classes/2-0.gif" title="Orc" alt="Orc"/></td>';
	}
	else if ($row['race']==3){
		echo '<center><img src="images/classes/3-0.gif" title="Nain" alt="Nain"/></td>';
	}
	else if ($row['race']==4){
		echo '<center><img src="images/classes/4-0.gif" title="Elf de la nuit " alt="Elfe de la nuit"/></td>';
	}
	else if ($row['race']==5){
		echo '<center><img src="images/classes/5-0.gif" title="Un-dead" alt="Mort vivant"/></td>';
	}
	else if ($row['race']==6){
		echo '<center><img src="images/classes/6-0.gif" title="Tauren" alt="Tauren"/></td>';
	}
	else if ($row['race']==7){
		echo '<center><img src="images/classes/7-0.gif" title="Gnome" alt="Gnome"/></td>';
	}
	else if($row['race']==8){
		echo '<center><img src="images/classes/8-0.gif" title="Troll" alt="Troll"/></td>';
	}
	else if($row['race']==9){
		echo '<center><img src="images/classes/9-0.gif" title="Troll" alt="Troll"/></td>';
	}
	else if($row['race']==10){
		echo '<center><img src="images/classes/10-0.gif" title="Kikooelf" alt="Elfe de sang"/></td>';
	}
	else if($row['race']==11){
		echo '<center><img src="images/classes/11-0.gif" title="Draneil" alt="Draenei"/></td>';
	}
	$class = $row['class'];
		
    	switch ($class){
	
		case "1" :
			echo '<td><center><img src="images/classes/guerrier.gif" title="Guerrier" alt="Guerrier"/></td>';
		break;
		
		case "2" :
			echo '<td><center><img src="images/classes/paladin.gif" title="Palagay :p"alt="Paladin"/></td>';
		break;
			
		case "3" :
			echo '<td><center><img src="images/classes/chasseur.gif" title="Chasseur" alt="Chasseur"/></td>';
		break;
					
		case "4" :
			echo '<td><center><img src="images/classes/voleur.gif" title="Voleur" alt="Voleur"/></td>';
		break;
					
		case "5" :
			echo '<td><center><img src="images/classes/prêtre.gif" title="Prêtre" alt="Prêtre"/></td>';
		break;
				case "6" :
			echo '<td><center><img src="images/classes/dk.gif" title="Prêtre" alt="Deathknight"/></td>';
		break;
				
		case "7" :
			echo '<td><center><img src="images/classes/chaman.gif" title="Chaman" alt="Chaman"/></td>';
		break;
					
		case "8" :
			echo '<td><center><img src="images/classes/mage.gif" title="Mage" alt="Mage"/></td>';
		break;
					
		case "9" :
			echo '<td><center><img src="images/classes/demoniste.gif" title="Démoniste" alt="Démoniste"/></td>';
		break;
					
                                case "11" :
                                                echo '<td><center><img src="images/classes/druide.gif" alt="Druide"/></td>';
                                break;
}


$cpt++; 
echo '<td><center>'.$row['level'].'</td>';
echo '<td><div align="right">';
$money = $row['money'];
$inverse_money = strrev($money) ;
$pieces = str_split($inverse_money, 2);
$pa_pc = (str_split($inverse_money, 4));
$endroit_papc = strrev($pa_pc[0]);
$remplace = array($endroit_papc);
$po = str_replace($remplace, "", $money);
$pc = strrev($pieces[0]);
$pa = strrev($pieces[1]);
switch ($money) {

case 0 :
    echo "0&nbsp;<img src='images/or.gif' />&nbsp;";
    break;
default: 
    switch ($po) {
    
    case! '' :
    echo $po . "&nbsp;<img src='images/or.gif' />&nbsp;";
    break;
    
    default:
    break;
    
    }
    
    switch ($pa) {
    
    case! '' :
    echo $pa . "&nbsp;<img src='images/argent.gif' />&nbsp;";
    break;
    
    default:
    break;
    
    }
    
    switch ($pc) {
    
    case! '' :
    echo $pc . "&nbsp;<img src='images/cuivre.gif' />&nbsp;";
    break;
    
    default:
    break;
    
    }
    
    break;

}
echo '</td></div>';
echo '</tr>';
}
echo '</table>';
?>
</div>		
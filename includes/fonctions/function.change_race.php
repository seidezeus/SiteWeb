<?php
function faction($race)
{
    $alliance = '1 3 4 7 11';
                
    $data = explode(' ', $alliance);
    return in_array($race, $data);
}
        
function data_classe($classe)
{
    $guerrier = '1 2 3 4 5 6 7 8 11';
    $paladin = '1 3 4 11';
    $chasseur = '2 3 4 6 8 10 11';
    $voleur = '1 2 3 4 5 7 8 10';
    $pretre = '1 3 4 5 8 10 11';
    $chevalier_mort = '1 2 3 4 5 6 7 8 10 11';
    $chaman = '2 6 7 11';
    $mage = '1 5 7 8 10 11';
    $demoniste = '1 2 5 8 11';
    $druide = '4 6';
        
	switch($classe)
	{
							case 1:
									return $guerrier;
									break;
							case 2:
									return $paladin;
									break;
							case 3:
									return $chasseur;
									break;
							case 4:
									return $voleur;
									break;
							case 5:
									return $pretre;
									break;
							case 6:
									return $chevalier_mort;
									break;
							case 7:
									return $chaman;
									break;
							case 8:
									return $mage;
									break;
							case 9:
									return $demoniste;
									break;
							case 11:
									return $druide;
									break;
							default:
									return null;
	}
}
        
        function liste_races($race, $classe)
        {
                $faction = faction($race);
                $data = explode(' ', data_classe($classe));
                $liste = array();
                
                foreach($data as $new_race)
                {
                        if((faction($new_race) == $faction) && ($new_race != $race))
                        {
                                $liste[] = $new_race; // Ajout dans la liste
                        }
                }
                return $liste;
		}
        
        function nom_race($race)
        {
                switch($race)
                {
                        case 1:
                                return 'Humain';
                                break;
                        case 2:
                                return 'Orc';
                                break;
                        case 3:
                                return 'Nain';
                                break;
                        case 4:
                                return 'Elfe de la nuit';
                                break;
                        case 5:
                                return 'Mort-vivant';
                                break;
                        case 6:
                                return 'Tauren';
                                break;
                        case 7:
                                return 'Gnome';
                                break;
                        case 8:
                                return 'Troll';
                                break;
                        case 10:
                                return 'Elfe de sang';
                                break;
                        case 11:
                                return 'Draeneï';
                                break;
                        default:
                                return 'Race inconnue';
                                break;
                }
        }
?>
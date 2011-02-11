			<?php
                   if($_GET['site'])
				   {
		     $get = strip_tags($_GET['site']);
	               switch($get)
				   {
				   // Le serveur
				    case 'inscription':
                    include ('inc/inscription.php');				   
				    break; 
					case 'confirmation':
                    include ('inc/confirmation.php');				   
				    break; 
					case 'FaQ':
                    include ('pages/F-a-q.php');				   
				    break;
					case 'staff':
                    include ('inc/staff.php');				   
				    break;
					case 'vote':
                    include ('inc/vote.php');				   
				    break;
					
					
					// Mon compte 
					case 'mc':
                    include ('inc/compte.php');				   
				    break;
					case 'login':
                    include ('inc/login.php');				   
				    break;
					case 'Ext':
                    include ('pages/Ext.php');				   
				    break;
					case 'mperso':
                    include ('inc/mesperso.php');				   
				    break;
					case 'chpass':
                    include ('inc/chpass.php');				   
				    break;
					case 'chmail':
                    include ('inc/chmail.php');				   
				    break;
					case 'chexp':
                    include ('inc/chexp.php');				   
				    break;
					case 'delock':
                    include ('inc/delock.php');				   
				    break;
                                   case 'Achat':
                    include ('pages/achat.php');				   
				    break;
					
					// Boutique
					case 'boutique':
                    include ('inc/boutique.php');				   
				    break;
					case 'boutiqacht':
                    include ('inc/boutiq_acht.php');				   
				    break;
					case 'boutiqfinal':
                    include ('inc/boutiq_conf.php');				   
				    break;
					case 'Boutique_gold':
                    include ('pages/Boutique_gold.php');				   
				    break;
					case 'Boutique_chx_gold':
                    include ('pages/Object5.php');				   
				    break;
					case 'Boutique_final_gold':
                    include ('pages/Object6.php');				   
				    break;
					
					// Statistiques
					case 'online':
                    include ('inc/online.php');				   
				    break;
					case 'arenes':
                    include ('inc/toparene.php');				   
				    break;
					case 'infos':
                    include ('inc/infos.php');				   
				    break;
					
					// Administration
 
                                  
					case 'DelAccount':
                    include ('pages/delaccount');
					break;
					
					case 'jadmin':
                    include ('inc/jadmin.php');				   
				    break;
					case 'news':
                    include ('inc/addnews.php');				   
				    break;
					case 'supprnews':
                    include ('inc/modifnews.php');				   
				    break;
					case 'newsconf':
                    include ('inc/addnewsconf.php');				   
				    break;
					case 'pass_admin':
                    include ('inc/pass_admin.php');				   
				    break;
					case 'other_ip':
                    include ('inc/other_ip.php');				   
				    break;
					case 'delperso':
                    include ('inc/delperso.php');				   
				    break;
					case 'acces_gm':
                    include ('inc/acces_gm.php');				   
				    break;
					case 'chmailadmin':
                    include ('inc/chmailadmin.php');				   
				    break;
					case 'cst':
                    include ('inc/cst.php');				   
				    break;
					case 'admin_points':
                    include ('inc/point.php');				   
				    break;

                    // Administration Boutique
					case 'admin_boutique':
                    include ('inc/gestion_boutique.php');				   
				    break;
					case 'admin_boutique2':
                    include ('inc/gestion_boutique2.php');				   
				    break;
					case 'admin_boutique3':
                    include ('inc/gestion_boutique3.php');				   
				    break;
					case 'ajt_obj':
                    include ('inc/ajt_obj.php');				   
				    break;
					case 'supr_obj':
                    include ('inc/supr_obj.php');				   
				    break;
					case 'confirmationn':
                    include ('inc/confirmation.php');				   
				    break;
					case 'allopass':
					include ('pages/allopass.php');
					break;
					case 'allopassok':
					include ('pages/allopassok.php');
					break;
					case 'topvote':
					include ('inc/topvote.php');
					break;
					case 'rejoindre':
					include ('inc/rejoindre.php');
					break;

                  	
					// Page par défault
					default:
                    include ('inc/news.php');				   
				    break;		
				     }
					}else
					{
					include ('inc/news.php');	
					}
						   ?>
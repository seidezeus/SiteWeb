<?php
$array_db = array(
"hote"		=> "localhost",			// H�te MySQL
"user"		=> "seidezeus",			// Nom d'utilisateur MySQL
"pass"		=> "ursmodja",			// Mot de passe de l'utilisateur MySQL
"mangos"	=> "world",			// Nom de la base de donn�es du monde
"characters"=> "characters",		// Nom de la base de donn�es des personnages
"realmd"	=> "auth",			// Nom de la base de donn�es des comptes
"site"		=> "site",				// Nom de la base de donn�es du site
);

$array_base	=	array(
"nom"			=> "InfinityChaos",     // Nom du serveur
"lien_forum"	=> "/forum",             // Lien du forum
"realmlist"		=> "88.191.137.19",			 // Realmlist du serveur (sans le port)
"port"			=> "8085",				 // Port serveur
"version"		=> "3.3.5",			     // Version du serveur
"emulateur"		=> "TrinityCore",			 // Emulateur (mangos,trinity,acsent..)
"admin"         => "Gladorius",            // Administrateur du site & serveur
"devsite1"      => "Poste � Pourvoir",             // Premier d�veloppeur du serveur
"devsite2"      => "Poste � Pourvoir",            // Deuxi�me d�veloppeur du serveur
"mjsite1"       => "Bressys",            // Premier Ma�tre de jeu du serveur
"mjsite2"       => "Weed",            // Deuxi�me Ma�tre de jeu du serveur
"mjsite3"       => "Ptitours",            // Troisi�me Ma�tre de jeu du serveur
"modosite1"     => "Poste � Pourvoir",            // Premier Mod�rateur du forum,site
"modosite2"     => "Poste � Pourvoir",            // Deuxi�me Mod�rateur du forum,site
"memvive"       => "2Go DDR2",           // Informations sur la m�moire vive du serveur
"bandepass"     => "100mb/s",            // Informations sur la Bande passante du serveur
"process"       => "Pentium",            // Informations sur le Processeur du serveur
"hdd"           => "160Go SSD",          // Informations sur le disque dur du serveur
"point_vote"    => "1",			     // Points par vote
"votesite"		=> 'http://www.rpg-paradize.com/?page=vote&vote=21923',                // Adresse du site de vote
"banvote"		=> 'http://www.rpg-paradize.com/vote.gif',        // Adresse de la banniere d'image du site de vote
);

$connect = mysql_connect($array_db['hote'],$array_db['user'],$array_db['pass'])  or die(); // Ne pas toucher
$db = mysql_select_db($array_db['site']) or die(); // Ne pas toucher
 ?>
 
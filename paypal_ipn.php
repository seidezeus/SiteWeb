<?php
// Setup class
include 'kernel/config.php';
require_once('kernel/paypal.class.php');  // include the class file
$p = new paypal_class;             // initiate an instance of the class
$p->paypal_url = $url_paypal;   // testing paypal url

if ($p->validate_ipn()) {

	$connexion = mysql_connect($coolwow['host'], $coolwow['user'], $coolwow['password']) or die(mysql_error());
	mysql_select_db($coolwow['db']) or die(mysql_error());
	mysql_query("SET NAMES 'utf8'");

	$compte_id_paiement = $p->ipn_data['custom'];
	$montant = $p->ipn_data['mc_gross'];
	$quantite = $p->ipn_data['quantity'];

	if ($montant/$quantite == $cout_points_par_paypal && $p->ipn_data['receiver_email'] == $adresse_paypal) {
		$nombredepointsenplus = $quantite * 2; 
	} else { 
		$nombredepointsenplus = 0; 
	}
	$resultat  = mysql_query("UPDATE membres SET nb_point_vote=nb_point_vote+".$nombredepointsenplus." WHERE id='".$compte_id_paiement."' LIMIT 1") or die(mysql_error());
	$log = mysql_query("INSERT INTO log_achat_points (account_id, type,nombre_points,date) VALUES ($compte_id_paiement, 'paypal',$nombredepointsenplus,NOW())");
} 
?>
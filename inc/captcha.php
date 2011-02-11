<?php
// on d�marre une session pour pouvoir m�moriser le code
session_start();
error_reporting(0);
htmlspecialchars($input);
htmlentities($input);
addslashes($input);
// on d�finit les caract�res utilis�s pour le code g�n�r�
$liste = "123456789ABCDEFGHIJKLMNOPQRSTUVWXYZ";
// g�n�re le code en piochant dans les caract�res de la liste
$code = '';
while(strlen($code) != 5) {
   $code .= $liste[rand(0,36)];
}
// on m�morise le code de 6 caract�res g�n�r� en session
$_SESSION['code']=$code;

// on cr�� une image de 70 x 20 pixels (larg x hauteur) 
$img = imageCreate(70, 20) or die ("Probl�me de cr�ation GD");
// Choix de la couleur de fond, ici �a donne du Gris ( RVB)
$background_color = imagecolorallocate ($img, 255, 255, 155);
// Choix de la couleur de la police, ici du noir
$ecriture_color = imagecolorallocate ($img, 0, 0, 0);
// le code la police utilis�e
$code_police=9;
// on cr�� une image jpeg en emp�chant la mise en cache
header('Expires: Mon, 26 Jul 1997 05:00:00 GMT'); 
header('Cache-Control: no-store, no-cache, must-revalidate'); 
header('Cache-Control: post-check=0, pre-check=0', false); 
header("Content-type: image/jpeg");
// on introduit le code dans l'image
imageString($img, $code_police,(70-imageFontWidth($code_police) * strlen("".$code.""))/2,0, $code,$ecriture_color);
// on cr�� une image avec une qualit� m�diocre de 30%
// pour �viter qu'un robot puisse la lire
imagejpeg($img,'',30);
// on lib�re la m�moire
imageDestroy($img);
?>
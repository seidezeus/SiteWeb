<?php
/*cette fonction indique que la page devra etre interprétée comme une image PNG*/
     header ("Content-type: image/png");

/*on crée une image de 150 pixels de large sur 15 de haut*/
     $image = imagecreate(131,20);
     
     /*Ici, on récupère dans la variable $pc le pourcentage que l'on veut afficher la page est appelée par compteur.php?pc=[un nombre entre 0 et 100]*/
if(isset($_GET['pc']))
{
$pc=$_GET['pc'];
}
     
     /* pour une image de 150 px, la partie à remplire en pourcentage fait 148px... on calcule la longueur à remplir en pixels */
     $x=($pc*130)/100;
     
     /*définition des couleurs... l'image est automatiquement remplie avec la première couleur que vous définissez. Ici on aura un fond blanc */
     $blanc=imagecolorallocate($image, 192, 192, 192);
     $noir=imagecolorallocate($image, 19, 19, 19);
     $or=imagecolorallocate($image, 196, 151, 32);
	 
     
/*on fait un petit cadre noir sur le pourtour de l'image*/
     imagerectangle($image, 0, 0, 149, 19, $or);

     /*dessin du remplissage en fonction de $x : on dessine un rectangle de $x pixels de large rempli en bleu*/
     imageFilledRectangle($image, 1, 1, $x, 18, $or);

     /*on place le texte au milieu : [$pc %]...*/
     imagestring($image, 3, 55, 3, $pc."%", $noir);

/*Pour finir, on génère l'image en png§ */
     imagepng($image);
?>


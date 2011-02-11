<?php
include ('../libs/config.php');
include ('../libs/fonctions.php');
$result = verifpseudolibre();
if(mysql_num_rows($result)>=1)
echo "1";
else
echo "2";
?>
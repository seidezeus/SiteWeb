<?php if (!defined('IN_PHPBB')) exit; ?>Subject: phpBB installé

Félicitations,

Vous venez d'installer phpBB sur votre serveur.

Cet e-mail contient d'importantes informations concernant votre installation que vous devriez conserver. Votre mot de passe a été stocké de manière sécurisée dans notre base de données et ne pourra pas être retrouvé. Dans le cas où vous l'auriez oublié, vous pourrez le réinitialiser en utilisant l'adresse e-mail associée à votre compte.

----------------------------

Nom d'utilisateur: <?php echo (isset($this->_rootref['USERNAME'])) ? $this->_rootref['USERNAME'] : ''; ?>

Adresse du forum: <?php echo (isset($this->_rootref['U_BOARD'])) ? $this->_rootref['U_BOARD'] : ''; ?>

----------------------------

Des informations utiles peuvent être consultées dans le dossier "docs" de votre installation, ou sur le forum de support francophone - http://forums.phpbb-fr.com

Dans le but de conserver votre forum en sécurité, nous vous recommandons fortement de vous tenir au courant des mises à jour du logiciel. Pour votre convenance, une inscription à la newsletter du groupe phpBB est disponible sur la page ci-dessous.
http://www.phpbb.com/support/

<?php echo (isset($this->_rootref['EMAIL_SIG'])) ? $this->_rootref['EMAIL_SIG'] : ''; ?>
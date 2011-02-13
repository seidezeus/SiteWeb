<?php if (!defined('IN_PHPBB')) exit; ?>Subject: Bienvenue sur les forums de "<?php echo (isset($this->_rootref['SITENAME'])) ? $this->_rootref['SITENAME'] : ''; ?>"

<?php echo (isset($this->_rootref['WELCOME_MSG'])) ? $this->_rootref['WELCOME_MSG'] : ''; ?>

Vous êtes prié de conserver cet e-mail dans vos archives. Voici les informations concernant votre compte:

----------------------------
Nom d'utilisateur: <?php echo (isset($this->_rootref['USERNAME'])) ? $this->_rootref['USERNAME'] : ''; ?>

Adresse du forum: <?php echo (isset($this->_rootref['U_BOARD'])) ? $this->_rootref['U_BOARD'] : ''; ?>
----------------------------

Votre mot de passe a été stocké de manière sécurisée dans notre base de données et ne pourra pas être retrouvé. Dans le cas où vous l'auriez oublié, vous pourrez le réinitialiser en utilisant l'adresse e-mail associée à votre compte.

Merci de vous être enregistré.

<?php echo (isset($this->_rootref['EMAIL_SIG'])) ? $this->_rootref['EMAIL_SIG'] : ''; ?>
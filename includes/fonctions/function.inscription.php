<?php
define('USER_LENGHT', 3);     // Taille minimum du nom de compte
define('PASSWORD_LENGHT', 3); // Taille minimum du mot de passe

class Inscription
{
    private $inscriptionId;
    private $username;
    private $password;
    private $passwordRepeat;
    private $cryptedPassword;
    private $email;
    private $inscriptionDate;
    private $extension;
    private $errorMsg;
    private $error;
    private $injection;    
    
    private function construct()
    {
        $this->inscriptionDate = date('Y-m-d H:i:s');
        $this->error = false;
        $this->errorMsg = '';
        $this->injection = false;
        $this->cryptedPassword = '';
    }
    private function verifyUsername()
    {
        if(strlen($this->username) <= USER_LENGHT)
        {
            $this->error = true;
            $this->errorMsg .= ' - Le nom d\'utilisateur choisi est trop court.<br />';
        }
        $sqlUsername = mysql_query('SELECT COUNT(*) AS nombre FROM account WHERE username=\'' . $this->username.'\'') or die('Comparaison des noms d\'utilisateur : '.mysql_error());
        $datasUsername = mysql_fetch_assoc($sqlUsername);

        if($datasUsername['nombre'] == 1)
        {
            $this->error = true;
            $this->errorMsg .= ' - Ce nom d\'utilisateur est d&eacute;j&agrave; pris.<br />';
        }
        $this->sqlDetect($this->username);
    }
    private function verifyPassword()
    {
        if(strlen($this->password) <= PASSWORD_LENGHT)
        {
            $this->error = true;
            $this->errorMsg .= ' - Le mot de passe choisi est trop court.<br />';
        }
        if($this->password !== $this->passwordRepeat)
        {
            $this->error = true;
            $this->errorMsg .= ' - Les mots de passe ne sont pas identiques.<br />';            
        }
        $this->sqlDetect($this->password);
    }
    private function verifyEmail()
    {
        if(!preg_match('#^[a-z0-9.-_]+@[a-z0-9.-_]{2,}\.[a-z]{2,4}$#', $this->email))
        {
            $this->error = true;
            $this->errorMsg .= ' - L\'email n\'est pas correct.<br />';
        }
        $sqlEmail = mysql_query('SELECT COUNT(*) AS nombre FROM account WHERE email=\''.$this->email.'\'') or die('Comparaison des emails : '.mysql_error());;
        $datasEmail = mysql_fetch_assoc($sqlEmail);

        if($datasEmail['nombre'] != 0)
        {
            $this->error = true;
            $this->errorMsg .= ' - L\'email est d&eacute;j&agrave; utilis&eacute;.<br />';
        }
        $this->sqlDetect($this->email);
    }

    public function verifyAll()
    {
        $this->verifyUsername();
        $this->verifyEmail();
        $this->verifyPassword();
        
        if(!$this->error)
        {
            $this->cryptedPassword = sha1(strtoupper($this->username).':'.strtoupper($this->password));
            mysql_query('INSERT INTO account(username,
                                            sha_pass_hash,
                                            gmlevel,
                                            email,
                                            joindate,
                                            last_ip,
                                            expansion)
                                    VALUES(\''.$this->username.'\',
                                            \''.$this->cryptedPassword.'\',
                                            0,
                                            \''.$this->email.'\',
                                            \''.$this->inscriptionDate.'\',
                                            \''.$_SERVER['REMOTE_ADDR'].'\',
                                            \''.$this->extension.'\')') or die('Enregistrement du compte : '.mysql_error());
            echo '<p class="info"><br /><br /><br />Votre enregistrement &agrave; &eacute;t&eacute; effectu&eacute; avec succ&egrave;s !<br /><a href="index.php?page=Accueil">Retour &agrave; l\'accueil</a></p>';
        }
        else
        {
            if($this->injection)
            {
                echo '<p class="info"><br /><br />On ne fait pas ça !</p>';
            }
            else
            {
                echo '<p class="info">Des erreurs ont &eacute;t&eacute; trouv&eacute;e durant l\'enregistrement :<br /><br />',$this->errorMsg,'<br /><a href="index.php?page=pageInscription">R&eacute;essayer</a></p>';
            }
        }
    }
    private function sqlDetect($string)
    {
        if (preg_match('#INSERT|SELECT|UNION|FROM|WHERE|DELETE#', $string))
        {
            $this->error = true;
            $this->errorMsg .= ' - Injection sql det&eacute;ct&eacute;e !<br />';
            $this->injection = true;
        }
    }
    public function setUsername($username)
    {
        $this->username = mysql_real_escape_string($username);
    }
    
    public function setPassword($password)
    {
        $this->password = mysql_real_escape_string($password);
    }
    
    public function setPasswordRepeat($password)
    {
        $this->passwordRepeat = mysql_real_escape_string($password);
    }
    
    public function setEmail($email)
    {
        $this->email = mysql_real_escape_string($email);
    }
    
    public function setExtension($extension)
    {
        $this->extension = $extension;
    }
}
?>
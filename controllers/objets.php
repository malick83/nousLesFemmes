<?php
require_once "../modeles/database.php";

class Personnes
{
    protected $_nom;
    protected $_prenonm;
    protected $_telephone;
    protected $_mail;

    public function __construct($nom, $prenom, $telephone, $mail)
    {
        $this->_nom = $nom;
        $this->_prenom = $prenom;
        $this->_telephone = $telephone;
        $this->_mail = $mail;
    }
    
    public function hello()
    {
        echo "je suis la personne";

    }
}

class Employees extends Personnes
{
    protected $_naiss;
    protected $_role;

    public function __construct($nom, $prenom, $telephone, $mail, $naiss, $role)
    {
        parent::__construct($nom, $prenom, $telephone, $mail);
        $this->_naiss = $naiss;
        $this->_role = $role;
    }

    public function hello()
    {
        echo $this->_nom.'</br>';
        echo $this->_prenom.'</br>';
        echo $this->_telephone.'</br>';
        echo $this->_mail.'</br>';
        echo $this->_naiss.'</br>';
        echo $this->_role.'</br>';
    }

}

class Comptes
{
    protected $_pseudo;
    protected $_motDePasse;
    protected $_admin;

    public function __construct($pseudo, $motDePasse, $admin)
    {
        $this->_pseudo = $pseudo;
        $this->_motDePasse = $motDePasse;
        $this->_admin = $admin;
    }
    
    public function hello()
    {
        echo $this->_pseudo.'</br>';
        echo $this->_motDePasse.'</br>';
        echo $this->_admin.'</br>';

        SetAcccout($this->_pseudo, $this->_motDePasse, $this->_admin);

    }
}

?>
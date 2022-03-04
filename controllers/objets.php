<?php
require_once "../modeles/database.php";

class Personnes
{
    protected $_nom;
    protected $_prenonm;
    protected $_telephone;

    public function __construct($nom, $prenom, $telephone)
    {
        $this->_nom = $nom;
        $this->_prenom = $prenom;
        $this->_telephone = $telephone;
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

    public function __construct($nom, $prenom, $telephone, $naiss, $role)
    {
        parent::__construct($nom, $prenom, $telephone);
        $this->_naiss = $naiss;
        $this->_role = $role;
    }

    public function ajouterEmp()
    {
        echo $this->_nom.'</br>';
        echo $this->_prenom.'</br>';
        echo $this->_telephone.'</br>';
        echo $this->_naiss.'</br>';
        echo $this->_role.'</br>';
    }

}

class Comptes
{
    protected $_pseudo;
    protected $_mail;
    protected $_motDePasse;
    protected $_admin;

    public function __construct($pseudo, $mail, $motDePasse, $admin, )
    {
        $this->_pseudo = $pseudo;
        $this->_mail = $mail;
        $this->_motDePasse = $motDePasse;
        $this->_admin = $admin;
    }
    
    public function ajouterAcc()
    {
        // echo $this->_pseudo.'</br>';
        // echo $this->_motDePasse.'</br>';
        // echo $this->_admin.'</br>';
        // echo $this->_mail.'</br>';

        SetAcccout($this->_pseudo, $this->_mail, $this->_motDePasse, $this->_admin);

    }
}

?>
<?php

require_once "../modeles/personnes.php";

class Personnes
{
    protected $_nom;
    protected $_prenom;
    protected $_telephone;

    public function __construct($nom, $prenom, $telephone)
    {
        $this->_nom = $nom;
        $this->_prenom = $prenom;
        $this->_telephone = $telephone;
    }
    
    public function ajouterPersonnes()
    {
        SetPersons($this->_nom, $this->_prenom, $this->_telephone);
    }

    public function DernieriDpers()
    {
        return monDernierID();
    }

}

class VerifyTel
{
    public static function verifyTel($num)
    {
        foreach(getEmpTel() as $tel)
        {
            if ($num == $tel['telephone'])
            {
                return true;
                break;
            }
        }
    }
}

?>
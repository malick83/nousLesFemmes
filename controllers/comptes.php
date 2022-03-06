<?php
require_once "../modeles/comptes.php";

class Comptes
{
    protected $_pseudo;
    protected $_mail;
    protected $_motDePasse;
    protected $_admin;

    public function __construct($pseudo, $mail, $motDePasse, $admin)
    {
        $this->_pseudo = $pseudo;
        $this->_mail = $mail;
        $this->_motDePasse = $motDePasse;
        $this->_admin = $admin;
    }
    
    public function ajouterAcc()
    {

        SetAcccout($this->_pseudo, $this->_mail, $this->_motDePasse, $this->_admin);

    }

    public function DernieriDcpt()
    {
        return Dernierid();
    }
    
}

class GetInfosAccount
{
    public static function getAccount($myacc)
    {
        return getAcc($myacc);
    }
}

class VerifyAcc
{
    public static function verifyMail($mail)
    {
        foreach(getCptMail() as $courrier)
        {
            if ($mail == $courrier['cpt_mail'])
            {
                return true;
                break;
            }
        }
    }

    public static function verifyPseudo($monPse)
    {
        foreach(getCptPseudo() as $pse)
        {
            if ($monPse == $pse['cpt_pseudo'])
            {
                return true;
                break;
            }
        }
    }
}
?>
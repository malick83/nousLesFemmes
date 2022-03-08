<?php
require_once "../modeles/repondants.php";

class Repondants
{
    protected $_mail;
    protected $_pers;

    public function __construct($mail, $pers)
    {
        $this->_mail = $mail;
        $this->_pers = $pers;
    }

    public function ajouterRep()
    {
        SetRepondants($this->_mail, $this->_pers);
    }

}

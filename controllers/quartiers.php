<?php
require_once "../modeles/quartiers.php";

class Quartiers
{
    protected $_nom;
    protected $_com;

    public function __construct($nom, $com)
    {
        $this->_nom = $nom;
        $this->_com = $com;
    }

    public function ajouterQrt()
    {
        SetQuartiers($this->_nom, $this->_com);
    }
    public function DernieriDqtr()
    {
        return monQtrID();
    }  

}

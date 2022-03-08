<?php
require_once "../modeles/sieges.php";

class Sieges
{
    protected $_nom;
    protected $_quartier;

    public function __construct($nom, $quartier)
    {
        $this->_nom = $nom;
        $this->_quartier = $quartier;
    }

    public function ajouterSg()
    {
        SetSieges($this->_nom, $this->_quartier);
    }
    public function DernieriDsg()
    {
        return DernierSgid();
    }

}

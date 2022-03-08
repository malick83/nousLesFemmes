<?php
require_once "../modeles/entreprises.php";

class Entreprises
{
    protected $_nomEnt;
    protected $_gpsEnt;
    protected $_creationEnt;
    protected $_juridiqueEnt;
    protected $_registreEnt;
    protected $_typeEnt;
    protected $_secteurEnt;
    protected $_pageEnt;
    protected $_nbEmpEnt;
    protected $_contratEnt;
    protected $_organiEnt;
    protected $_disposEnt;
    protected $_cotEnt;
    protected $_repEnt;
    protected $_sgEnt;

    public function __construct($nomEnt, $gpsEnt, $creationEnt, $juridiqueEnt, $registreEnt, $typeEnt, $secteurEnt, $pageEnt, $nbEmpEnt, $contratEnt, $organiEnt, $disposEnt, $cotEnt, $repEnt, $sgEnt)
    {
        $this->_nomEnt = $nomEnt; 
        $this->_gpsEnt = $gpsEnt; 
        $this->_creationEnt = $creationEnt; 
        $this->_juridiqueEnt = $juridiqueEnt; 
        $this->_registreEnt = $registreEnt; 
        $this->_typeEnt = $typeEnt; 
        $this->_secteurEnt = $secteurEnt; 
        $this->_pageEnt = $pageEnt; 
        $this->_nbEmpEnt = $nbEmpEnt; 
        $this->_contratEnt = $contratEnt; 
        $this->_organiEnt = $organiEnt; 
        $this->_disposEnt = $disposEnt; 
        $this->_cotEnt = $cotEnt;
        $this->_repEnt = $repEnt;
        $this->_sgEnt = $sgEnt;
    }

    public function ajouterEnt()
    {
        SetEntreprises($this->_nomEnt, $this->_gpsEnt, $this->_creationEnt, $this->_juridiqueEnt, $this->_registreEnt, $this->_typeEnt, $this->_secteurEnt, $this->_pageEnt, $this->_nbEmpEnt, $this->_contratEnt, $this->_organiEnt, $this->_disposEnt, $this->_cotEnt, $this->_repEnt, $this->_sgEnt);
    }

}


  





<?php
require_once "../modeles/admins.php";


class Admins
{
    protected $_naiss;
    protected $_pers;
    protected $_cpt;

    public function __construct($naiss, $pers, $cpt)
    {
        $this->_naiss = $naiss;
        $this->_pers = $pers;
        $this->_cpt = $cpt;
    }

    public function ajouterAdmin()
    {
        SetAdmins($this->_naiss, $this->_pers, $this->_cpt);
    }

}

class GetInfosAdmin
{
    public static function getDetailsAdmin($myEmp)
    {
        return getAdminD($myEmp);
    }
}

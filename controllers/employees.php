<?php
require_once "../modeles/employees.php";

class Employees
{
    protected $_naiss;
    protected $_role;
    protected $_pers;
    protected $_cpt;

    public function __construct($naiss, $role, $pers, $cpt)
    {
        $this->_naiss = $naiss;
        $this->_role = $role;
        $this->_pers = $pers;
        $this->_cpt = $cpt;
    }

    public function ajouterEmp()
    {
        SetEmployees($this->_naiss, $this->_role, $this->_pers, $this->_cpt);
    }

}
class GetInfosEmp
{
    public static function getDetailsEmp($myEmp)
    {
        return getEmpD($myEmp);
    }
}

<?php
require_once "database.php";

function SetEmployees($par1, $par2, $par3, $par4)
{
    $request = Database::getPdo()->prepare('INSERT INTO `Nlf_Employees`(`emp_naiss`, `emp_role`, `emp_pers`, `emp_cpt`) VALUES (:param1, :param2, :param3, :param4)');
    $monTableau = 
    [
        'param1' => $par1,
        'param2' => $par2,
        'param3' => $par3,
        'param4' => $par4,
    ];
    $request->execute($monTableau);
    return true;
}

function getEmpD($details)
{
    $request = Database::getPdo()->prepare('SELECT * FROM `Nlf_Employees`
    INNER JOIN `Nlf_Personnes` ON `Nlf_Employees`.`emp_pers` = `Nlf_Personnes`.`id`
    INNER JOIN `Nlf_Comptes` ON `Nlf_Employees`.`emp_cpt` = `Nlf_Comptes`.`id_cpt` WHERE `cpt_pseudo` = :my_pseudo OR `cpt_mail` = :my_mail');

    $request->bindValue(":my_pseudo", $details);
    $request->bindValue(":my_mail", $details);
    $request->execute();

    return $request->fetch(PDO::FETCH_ASSOC);
}
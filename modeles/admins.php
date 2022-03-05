<?php

require_once "database.php";

function SetAdmins($par1, $par2, $par3)
{
    $request = Database::getPdo()->prepare('INSERT INTO `Nlf_Admin`(`admin_naiss`, `admin_pers`, `admin_cpt`) VALUES (:param1, :param2, :param3)');
    $monTableau = 
    [
        'param1' => $par1,
        'param2' => $par2,
        'param3' => $par3,
    ];
    $request->execute($monTableau);
    return true;
}

function getAdminD($details)
{
    $request = Database::getPdo()->prepare('SELECT * FROM `Nlf_Admin`
    INNER JOIN `Nlf_Personnes` ON `Nlf_Admin`.`admin_pers` = `Nlf_Personnes`.`id`
    INNER JOIN `Nlf_Comptes` ON `Nlf_Admin`.`admin_cpt` = `Nlf_Comptes`.`id_cpt` WHERE `cpt_pseudo` = :my_pseudo OR `cpt_mail` = :my_mail');

    $request->bindValue(":my_pseudo", $details);
    $request->bindValue(":my_mail", $details);
    $request->execute();

    return $request->fetch(PDO::FETCH_ASSOC);
}
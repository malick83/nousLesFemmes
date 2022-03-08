<?php
require_once "database.php";



function SetEntreprises($par1, $par2, $par3, $par4, $par5, $par6, $par7, $par8, $par9, $par10, $par11, $par12, $par13, $par14, $par15)
{
    $request = Database::getPdo()->prepare('INSERT INTO `Nlf_Entreprises`(`ent_nom`, `ent_GPS`, `ent_dateCreation`, `ent_regimeJuridique`, `ent_registreCom`, `ent_type`, `ent_secteur`, `ent_pageWeb`, `ent_nombreEmp`, `ent_contratFormel`, `ent_organigramme`, `ent_dispositifForm`, `ent_cotisationSoc`, `ent_rep`, `ent_sg`) VALUES (:param1, :param2, :param3, :param4, :param5, :param6, :param7, :param8, :param9, :param10, :param11, :param12, :param13, :param14, :param15)');
    $monTableau = 
    [
        'param1' => $par1,
        'param2' => $par2,
        'param3' => $par3,
        'param4' => $par4,
        'param5' => $par5,
        'param6' => $par6,
        'param7' => $par7,
        'param8' => $par8,
        'param9' => $par9,
        'param10' => $par10,
        'param11' => $par11,
        'param12' => $par12,
        'param13' => $par13,
        'param14' => $par14,
        'param15' => $par15,
    ];
    $request->execute($monTableau);
    return true;
}





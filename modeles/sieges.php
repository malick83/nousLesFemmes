<?php
require_once "database.php";

function SetSieges($par1, $par2)
{
    $request = Database::getPdo()->prepare('INSERT INTO `Nlf_Sieges`(`sg_nom`, `sg_quartier`)
    VALUES (:param1, :param2)');
    $monTableau = 
    [
        'param1' => $par1,
        'param2' => $par2,
    ];
    $request->execute($monTableau);
    return true;
}
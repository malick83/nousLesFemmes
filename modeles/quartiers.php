<?php
require_once "database.php";

function SetQuartiers($par1, $par2)
{
    $request = Database::getPdo()->prepare('INSERT INTO `Nlf_Quartiers`(`quartier_nom`, `quartier_com`) VALUES (:param1, :param2)');
    $monTableau = 
    [
        'param1' => $par1,
        'param2' => $par2,
    ];
    $request->execute($monTableau);
    return true;
}

function monQtrID()
{
    $IDcommu = Database::getPdo()->prepare('SELECT MAX(LAST_INSERT_ID(id_quartier)) FROM Nlf_Quartiers');
    $IDcommu->execute();

    return $IDcommu->fetch(PDO::FETCH_BOTH)[0];
}

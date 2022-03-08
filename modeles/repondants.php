<?php
require_once "database.php";

function SetRepondants($par1, $par2)
{
    $request = Database::getPdo()->prepare('INSERT INTO `Nlf_Repondants`(`rep_mail`, `rep_pers`) VALUES (:param1, :param2)');
    $monTableau = 
    [
        'param1' => $par1,
        'param2' => $par2,
    ];
    $request->execute($monTableau);
    return true;
}

function monDernierRepID()
{
    $IDReppers = Database::getPdo()->prepare('SELECT MAX(LAST_INSERT_ID(id_rep)) FROM Nlf_Repondants');
    $IDReppers->execute();

    return $IDReppers->fetch(PDO::FETCH_BOTH)[0];
}
<?php
require_once "database.php";

function SetPersons($par1, $par2, $par3)
{
    $request = Database::getPdo()->prepare('INSERT INTO Nlf_Personnes(nom, prenom, telephone) VALUES (:param1, :param2, :param3)');
    $monTableau = 
    [
        'param1' => $par1,
        'param2' => $par2,
        'param3' => $par3,
    ];
    $request->execute($monTableau);
    return true;
}

function monDernierID()
{
    $IDpers = Database::getPdo()->prepare('SELECT MAX(LAST_INSERT_ID(id)) FROM Nlf_Personnes');
    $IDpers->execute();

    return $IDpers->fetch(PDO::FETCH_BOTH)[0];
}
?>
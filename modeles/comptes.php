<?php

require_once "database.php";

function Dernierid()
{
    $IDcpt = Database::getPdo()->prepare('SELECT MAX(LAST_INSERT_ID(id_cpt)) FROM Nlf_Comptes');
    $IDcpt->execute();

    return $IDcpt->fetch(PDO::FETCH_BOTH)[0];
}

function SetAcccout($par1, $par2, $par3, $par4)
{
    $request = Database::getPdo()->prepare('INSERT INTO Nlf_Comptes(cpt_pseudo, cpt_mail, cpt_motDePasse, cpt_admin) VALUES (:param1, :param2, :param3, :param4)');
    $monTableau = 
    [
        'param1' => $par1,
        'param2' => $par2,
        'param3' => password_hash($par3, PASSWORD_BCRYPT),
        'param4' => $par4,
    ];
    $request->execute($monTableau);
    return true;
}
function getAcc($compte)
{
    $request = Database::getPdo()->prepare('SELECT * FROM Nlf_Comptes WHERE cpt_pseudo = :my_pseudo OR cpt_mail = :my_mail');
    $request->bindValue(":my_pseudo", $compte);
    $request->bindValue(":my_mail", $compte);

    $request->execute();

    return $request->fetch(PDO::FETCH_ASSOC);
}
?>
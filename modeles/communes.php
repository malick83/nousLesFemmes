<?php
require_once "database.php";

function getIDcom($Com)
{
    $IDpers = Database::getPdo()->prepare('SELECT `id_com` FROM `Nlf_Communes` WHERE `com_nom`=:param1');
    $IDpers->bindValue(":param1", $Com);

    $IDpers->execute();

    return $IDpers->fetch(PDO::FETCH_BOTH)[0];
}
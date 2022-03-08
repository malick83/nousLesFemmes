<?php
require_once "../modeles/communes.php";

class GetInfosCommunes
{
    public static function getID($myid)
    {
        return getIDcom($myid);
    }
}
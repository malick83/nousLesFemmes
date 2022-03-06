<?php
error_reporting(-1);
ini_set("display_errors", 1);
require_once "utils/util.php";



if(!is_logged())
    header('Location: /mesProjets/nousLesFemmes/views/connexion.php');
elseif(is_admin())
    header('Location: /mesProjets/nousLesFemmes/views/admin.php');
else
    header('Location: /mesProjets/nousLesFemmes/views/employe.php');
?>
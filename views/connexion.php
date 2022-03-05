<?php
error_reporting(-1);
ini_set("display_errors", 1);

require_once "../utils/util.php";
init_php_session();

if(isset($_GET['action']) && !empty($_GET['action']) && $_GET['action'] == 'logout')
{
    clean_php_session();
    // header('Location: /mesProjets/nousLesFemmes/views/formulaire.php');
}




if(!is_logged())
    header('Location: /mesProjets/nousLesFemmes/views/formulaire.php');
elseif(is_admin())
    header('Location: /mesProjets/nousLesFemmes/views/admin.php');
else
    header('Location: /mesProjets/nousLesFemmes/views/visiteur.php');
?>


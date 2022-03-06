<?php
error_reporting(-1);
ini_set("display_errors", 1);
require_once "../utils/util.php";
init_php_session();

if(is_logged())
{
    $title= "<a class=\"nav-link\" href=\"/mesProjets/nousLesFemmes/views/connexion.php?action=logout\">Se déconnecter</a>";
    require_once 'accueilEmp.php';

    echo $_SESSION['pseudo'].'</br>';
    echo $_SESSION['motDePasse'].'</br>';
    echo $_SESSION['admin'].'</br>';
    echo $_SESSION['naiss'].'</br>';
    echo $_SESSION['nom'].'</br>';
    echo $_SESSION['prenom'].'</br>';
    echo $_SESSION['telephone'].'</br>';
    echo $_SESSION['role'].'</br>';
    echo $_SESSION['mail'].'</br>';
    echo $_SESSION['dateCreation'].'</br>';

}
else
{
    $title= "<a class=\"nav-link\" href=\"/mesProjets/nousLesFemmes/controllers/principalOut.php\">Se Connecter</a>";
    require_once 'accueil.php';
}
?>
</body>
</html>
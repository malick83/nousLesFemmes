<?php
error_reporting(-1);
ini_set("display_errors", 1);
require_once "../utils/util.php";
init_php_session();

if(is_admin())
{
    $title= "<a class=\"nav-link\" href=\"/mesProjets/nousLesFemmes/views/connexion.php?action=logout\">Se déconnecter</a>";
    $ajout= "<a class=\"nav-link\" <a href=\"/mesProjets/nousLesFemmes/views/inscription.php\">Ajouter un employer</a>";
    $registre= "<a class=\"nav-link\" <a href=\"/mesProjets/nousLesFemmes/views/registre.php\">Faire un enregistrement</a>";
    require_once 'base-accueil.php';

    echo $_SESSION['pseudo'].'</br>';
    echo $_SESSION['motDePasse'].'</br>';
    echo $_SESSION['admin'].'</br>';

    echo $_SESSION['naiss'].'</br>';
    echo $_SESSION['nom'].'</br>';
    echo $_SESSION['prenom'].'</br>';
    echo $_SESSION['telephone'].'</br>';
    
    echo $_SESSION['mail'].'</br>';
    echo $_SESSION['dateCreation'].'</br>';

    echo '</br>';

}
else
{
    header('Location: /mesProjets/nousLesFemmes/controllers/principalOut.php');
}    

?>
</body>
</html>
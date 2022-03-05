<?php
error_reporting(-1);
ini_set("display_errors", 1);
require_once "../utils/util.php";
init_php_session()
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<?php
if(is_logged())
{
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
    echo '</br>';
    echo "<a href=\"/mesProjets/nousLesFemmes/views/connexion.php?action=logout\">Se déconnecter ?</a></p>";
}
else
{
    echo 'Vous n\'êtes pas connecté';
    echo "<a href=\"/mesProjets/nousLesFemmes/controllers/controlForm.php\">Se Connecter ?</a></p>";
}
?>
</body>
</html>
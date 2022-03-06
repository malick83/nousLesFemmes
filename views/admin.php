<?php
error_reporting(-1);
ini_set("display_errors", 1);
require_once "../utils/util.php";
init_php_session();

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <title>Document</title>
</head>
<body>
<?php
if(is_admin())
{
    $title= "<a class=\"nav-link\" href=\"/mesProjets/nousLesFemmes/views/connexion.php?action=logout\">Se déconnecter</a>";
    $ajout= "<a class=\"nav-link\" <a href=\"/mesProjets/nousLesFemmes/views/inscription.php\">Ajouter un employer</a>";
    require_once 'accueilAdmin.php';

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
    $title= "<a class=\"nav-link\" href=\"/mesProjets/nousLesFemmes/controllers/principalOut.php\">Se Connecter</a>";
    require_once 'accueil.php';
    // echo 'Vous n\'êtes pas connecté';
}    

?>
</body>
</html>
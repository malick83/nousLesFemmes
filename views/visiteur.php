<?php
error_reporting(-1);
ini_set("display_errors", 1);
require_once "../utils/util.php";

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
    <?=$_SESSION['pseudo']?>
    </br>
    <a href="/mesProjets/nousLesFemmes/controllers/traitements.php?action=logout">Se déconnecter ?</a></p>
</body>
</html>
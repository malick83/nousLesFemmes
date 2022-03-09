<?php
error_reporting(-1);
ini_set("display_errors", 1);

error_reporting(-1);
ini_set("display_errors", 1);

require_once "../controllers/personnes.php";
require_once "../controllers/comptes.php";
require_once "../utils/util.php";
require_once "../controllers/entreprises.php";
init_php_session();

$DetailsEnt = GetInfosEnt::getDetailsEnt();



if(isset($_POST['rep-registre']))
{
    $prenomPersonneE = isset($_POST['prenom']);
    $prenomPersonneV = !empty($_POST['prenom']);

    $nomPersonneE = isset($_POST['nom']);
    $nomPersonneV = !empty($_POST['nom']);

    $telephonePersonneE = !empty($_POST['telephone']);
    $telephonePersonneV = isset($_POST['telephone']);


    $mailRepondantE = isset($_POST['mail']);
    $mailRepondantV = !empty($_POST['mail']);    

    $nomEntE = isset($_POST['nomEnt']);
    $nomEntV = !empty($_POST['nomEnt']);

    $coorEntE = isset($_POST['coorEnt']);
    $coorEntV = !empty($_POST['coorEnt']);

    $creationEntE = isset($_POST['creationEnt']);
    $creationEntV = !empty($_POST['creationEnt']);

    $regimeJEntE = isset($_POST['regimeJEnt']);
    $regimeJEntV = !empty($_POST['regimeJEnt']);

    $registreEntE = isset($_POST['registreEnt']);
    $registreEntV = !empty($_POST['registreEnt']);    

    $typeEntE = isset($_POST['typeEnt']);
    $typeEntV = !empty($_POST['typeEnt']);  

    $secteurEntE = isset($_POST['secteurEnt']);
    $secteurEntV = !empty($_POST['secteurEnt']); 

    $pageWebEntE = isset($_POST['pageWebEnt']);
    $pageWebEntV = !empty($_POST['pageWebEnt']); 

    $nombreEmpEntE = isset($_POST['nombreEmpEnt']);
    $nombreEmpEntV = !empty($_POST['nombreEmpEnt']); 

    $contratEntE = isset($_POST['contratEnt']);
    $contratEntV = !empty($_POST['contratEnt']);

    $organiEntE = isset($_POST['organiEnt']);
    $organiEntV = !empty($_POST['organiEnt']);
    
    $dispositifFEntE = isset($_POST['dispositifFEnt']);
    $dispositifFEntV = !empty($_POST['dispositifFEnt']); 

    $cotSEntE = isset($_POST['cotSEnt']);
    $cotSEntV = !empty($_POST['cotSEnt']); 

    $nomSiegeEntE = isset($_POST['nomSiegeEnt']);
    $nomSiegeEntV = !empty($_POST['nomSiegeEnt']); 


    $quartierEntE = isset($_POST['quartierEnt']);
    $quartierEntV = !empty($_POST['quartierEnt']);

    $regEntE = isset($_POST['regEnt']);
    $regEntV = !empty($_POST['regEnt']);

    $dptEntE = isset($_POST['dptEnt']);
    $dptEntV = !empty($_POST['dptEnt']);

    $comEntE = isset($_POST['comEnt']);
    $comEntV = !empty($_POST['comEnt']);


    if($prenomPersonneE && $prenomPersonneV && $nomPersonneE && $nomPersonneV && $telephonePersonneE && $telephonePersonneV && $mailRepondantE && $mailRepondantV && $nomEntE && $nomEntV && $coorEntE && $coorEntV && $creationEntE && $creationEntV && $regimeJEntE && $regimeJEntV && $registreEntE && $registreEntV && $typeEntE && $typeEntV && $secteurEntE &&$secteurEntV && $pageWebEntE && $pageWebEntV && $nombreEmpEntE && $nombreEmpEntV && $contratEntE && $contratEntV && $organiEntE && $organiEntV && $dispositifFEntE && $dispositifFEntV && $cotSEntE && $cotSEntV && $nomSiegeEntE && $nomSiegeEntV && $quartierEntE && $quartierEntV && $regEntE && $regEntV && $dptEntE && $dptEntV && $comEntE && $comEntV)
        {
            $prenomPersonne = $_POST['prenom'];
            $nomPersonne = $_POST['nom'];
            $telephonePersonne = $_POST['telephone'];
            $mailRepondant = $_POST['mail'];   
            $nomEnt = $_POST['nomEnt'];
            $coorEnt = $_POST['coorEnt'];
            $creationEnt = $_POST['creationEnt'];
            $regimeJEnt = $_POST['regimeJEnt'];
            $registreEnt = $_POST['registreEnt'];
            $typeEnt = $_POST['typeEnt'];
            $secteurEnt = $_POST['secteurEnt'];
            $pageWebEnt = $_POST['pageWebEnt'];
            $nombreEmpEnt = $_POST['nombreEmpEnt'];
            $contratEnt = $_POST['contratEnt'];
            $organiEnt = $_POST['organiEnt'];
            $dispositifFEnt = $_POST['dispositifFEnt'];
            $cotSEnt = $_POST['cotSEnt'];
            $nomSiegeEnt = $_POST['nomSiegeEnt'];
            $quartierEnt = $_POST['quartierEnt'];
            $regEnt = $_POST['regEnt'];
            $dptEnt = $_POST['dptEnt'];
            $comEnt = $_POST['comEnt'];


            require_once "../controllers/personnes.php";
            $maPersonne = new Personnes($nomPersonne, $prenomPersonne, $telephonePersonne);
            $maPersonne->ajouterPersonnes();
            $monIDpers=$maPersonne->DernieriDpers();

            require_once "../controllers/repondants.php";
            $monRepondant = new Repondants($mailRepondant, $monIDpers);
            $monRepondant->ajouterRep();
            $monIdRep = $monRepondant->DernieriDrep();

            require_once "../controllers/quartiers.php";
            require_once "../controllers/communes.php";
            $idCom=GetInfosCommunes::getID($comEnt);

            $monQuartier = new Quartiers($quartierEnt, $idCom);
            $monQuartier->ajouterQrt();
            $monIDqrt=$monQuartier->DernieriDqtr();

            require_once "../controllers/sieges.php";
            $monSiege = new Sieges($nomSiegeEnt, $monIDqrt);
            $monSiege->ajouterSg();
            $monIDsg=$monSiege->DernieriDsg();

            require_once "../controllers/entreprises.php";
            $monEntreprise = new Entreprises($nomEnt, $coorEnt, $creationEnt, $regimeJEnt, $registreEnt, $typeEnt, $secteurEnt, $pageWebEnt, $nombreEmpEnt, $contratEnt, $organiEnt, $dispositifFEnt, $cotSEnt, $monIdRep, $monIDsg);
            $monEntreprise->ajouterEnt();

            $DetailsEnt = GetInfosEnt::getDetailsEnt($registreEnt);


        }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <script src="/mesProjets/nousLesFemmes/utils/main.js" defer></script>
</head>
<body style="margin-left:12px;margin-right:12px;">
<?php if(is_admin()): ?>
    <nav class="row navbar navbar-expand-lg navbar-dark bg-primary fixed-top">
        <div class="container-fluid" style="width: 800px;"> 
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav">
                <li class="nav-item h5 mx-auto">
                <a class="nav-link" href="/mesProjets/nousLesFemmes/">Nous les femmes</a>
                </li>
                <li class="nav-item h4 mx-auto">
                    <a class="nav-link" href="/mesProjets/nousLesFemmes/views/connexion.php?action=logout">Se deconnecter</a>
                </li>
                <li class="nav-item h4 mx-auto">
                <a class="nav-link" href="/mesProjets/nousLesFemmes/views/inscription.php">Ajouter un employer</a>
                </li>
            </ul>
            </div>
        </div>
    </nav>
    <?php require_once "base-registre.php";?>
<?php elseif(is_logged()): ?>
    <nav class="row navbar navbar-expand-lg navbar-dark bg-primary fixed-top">
        <div class="container-fluid" style="width: 450px;"> 
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav">
                <li class="nav-item h5 mx-auto">
                <a class="nav-link" href="/mesProjets/nousLesFemmes/">Nous les femmes</a>
                </li>
                <li class="nav-item h4 mx-auto">
                    <a class="nav-link" href="/mesProjets/nousLesFemmes/views/connexion.php?action=logout">Se deconnecter</a>
                </li>
            </ul>
            </div>
        </div>
    </nav>
    <?php require_once "base-registre.php";?>
<?php else: ?>
    <?php header('Location: /mesProjets/nousLesFemmes/controllers/principalOut.php');?>
<?php endif; ?>
</body>
</html>
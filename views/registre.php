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
<?php elseif(is_logged()): ?>
    <nav class="row navbar navbar-expand-lg navbar-dark bg-primary">
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
<?php endif; ?>

<h1 style="text-align:center;margin-top:100px;">Page d'enregistrement</h1>
<hr style="width:350px; margin:auto;margin-bottom:80px;margin-top:20px;height:3px;">

<div class="container-fluid">
    <div class="row">
        <div class="col-6 col-xs-2">
            <table class="table mb-12 table-striped table-bordered" style="text-align:center;margin-top:0px;">
                <thead>
                    <tr>
                        <th><a href="#">Nom entreprise</a></th>
                        <th><a href="#">INEA</a></th>
                        <th><a href="#">Prénom</a></th>
                        <th><a href="#">Nom</a></th>
                        <th>Action</th>
                    </tr>
                </thead>

                <tbody>                        
                    <?php foreach ($DetailsEnt as $detail): ?>
                        <tr>
                            <td><?php echo htmlentities($detail['ent_nom']); ?></td>
                            <td><?php echo htmlentities($detail['ent_registreCom']); ?></td>
                            <td><?php echo htmlentities($detail['prenom']); ?></td>
                            <td><?php echo htmlentities($detail['nom']); ?></td>
                            <td>
                                <a class="btn btn-info" href="#">Détails</a>
                                <a class="btn btn-success" href="#">Modifier</a>
                                <a class="btn btn-danger" href="#">Supprimer</a>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table> 
        </div>
        
        <div class="col-6 col-xs-2"> 
            <form id="id_form" method="POST" action="" style="border-radius: 15px 15px 15px 15px;margin:auto;box-shadow: 10px 8px 34px 6px rgba(185, 181, 181, 0.685);padding-left:30px;padding-right:30px;padding-top:30px;padding-bottom:30px;">
                <div class="mb-4">
                    <label for="prenom" class="form-label">Prénom du répondant</label>
                    <input id="prenom" class="form-control" name="prenom" type="text" placeholder="Malick" aria-describedby="emailHelp">
                </div>
                <div class="mb-4">
                    <label for="nom" class="form-label">Nom du répondant</label>
                    <input id="nom" class="form-control" name="nom" type="text" placeholder="KEBE" aria-describedby="emailHelp">
                </div>
                <div class="mb-4">
                    <label for="telephone" class="form-label">Téléphone du répondant</label>
                    <input id="telephone" class="form-control" name="telephone" type="tel" placeholder="777777777" aria-describedby="emailHelp">
                </div>
                <div class="mb-4">
                    <label for="mail" class="form-label">Mail du répondant</label>
                    <input id="mail" class="form-control" name="mail" type="email" placeholder="malickkebe154@gmail.com" aria-describedby="emailHelp">
                </div>
                <div class="mb-4">
                    <label for="nomEnt" class="form-label">Nom entreprise</label>
                    <input id="nomEnt" class="form-control" name="nomEnt" type="text" placeholder="PATISEN" aria-describedby="emailHelp">
                </div>
                
                <div class="mb-4">
                    <label for="coorEnt" class="form-label">Coordonnées GPS de l'entreprise</label>
                    <input id="coorEnt" class="form-control" name="coorEnt" type="text" placeholder="Boulevard Canal VI" aria-describedby="emailHelp">
                </div>

                <div class="mb-4">
                    <label for="creationEnt" class="form-label">Date création</label>
                    <input id="creationEnt" class="form-control" name="creationEnt" type="date" placeholder="18-12-2020" aria-describedby="emailHelp">
                </div>

                <div class="mb-4">
                    <label for="regimeJEnt" class="form-label">Régime juridique</label>
                    <p>
                        <select form="id_form" name="regimeJEnt" size="1">
                            <option value="selectionner">selectionner--</option>
                            <option value="GIE">GIE</option>
                            <option value="SA">SA</option>
                            <option value="SARL">SARL</option>
                            <option value="SUARL">SUARL</option>
                            <option value="EI">EI</option>
                        </select>
                    </p>
                </div>

                <div class="mb-4">
                    <label for="registreEnt" class="form-label">Registre de commerce</label>
                    <input id="registreEnt" class="form-control" name="registreEnt" type="text" placeholder="37384638343" aria-describedby="emailHelp">
                </div>

                <div class="mb-4">
                    <label for="typeEnt">type ?</label> : <input id="typeEnt" name="typeEnt" type="radio" value="1"> Oui <input id="typeEnt" name="typeEnt" type="radio" value="2"> Non
                </div>
                <div class="mb-4">
                    <label for="secteurEnt" class="form-label">Secteur d'activité</label>
                    <p>
                        <select form="id_form" name="secteurEnt" size="1">
                            <option value="selectionner">selectionner--</option>
                            <option value="Commerce(C)">Commerce(C)</option>
                            <option value="Commerce de motocyclette et accessoires(C.1.1)">Commerce de motocyclette et accessoires(C.1.1)</option>
                            <option value="Commerce en magasinage(C.2)">Commerce en magasinage(C.2)</option>
                        </select>
                    </p>
                </div>            
                <div class="mb-4">
                    <label for="pageWebEnt" class="form-label">Page Web de l'entreprise</label>
                    <input id="pageWebEnt" class="form-control" name="pageWebEnt" type="text" placeholder="https://patisen.sn" aria-describedby="emailHelp">
                </div>
                
                <div class="mb-4">
                <label for="nombreEmpEnt" class="form-label">Nombre employer</label>
                    <p>
                        <select form="id_form" name="nombreEmpEnt" size="1">
                            <option value="selectionner">selectionner--</option>
                            <option value="0">0</option>
                            <option value="<5">&lt;5</option>
                            <option value="5 à 10">5 à 10</option>
                            <option value="10 à 20">10 à 20</option>
                            <option value="=20">=20</option>
                        </select>
                    </p>
                </div>

                <div class="mb-4">
                    <label for="contratEnt">Contrat Formel ?</label> : <input id="contratEnt" name="contratEnt" type="radio" value="1"> Oui <input id="contratEnt" name="contratEnt" type="radio" value="2"> Non
                </div>
                <div class="mb-4">
                    <label for="organiEnt">organigramme ?</label> : <input id="organiEnt" name="organiEnt" type="radio" value="1"> Oui <input id="organiEnt" name="organiEnt" type="radio" value="2"> Non       
                </div>
                <div class="mb-4">
                    <label for="dispositifFEnt">dispositif de formation ?</label> : <input id="dispositifFEnt" name="dispositifFEnt" type="radio" value="1"> Oui <input id="dispositifFEnt" name="dispositifFEnt" type="radio" value="2"> Non
                </div>

                <div class="mb-4">
                <label for="cotSEnt" class="form-label">Cotisation sociale</label>
                    <p>
                        <select form="id_form" name="cotSEnt" size="1">
                            <option value="selectionner">selectionner--</option>
                            <option value="Oui">Oui</option>
                            <option value="Non">Non</option>
                            <option value="Partiellement">Partiellement</option>
                        </select>
                    </p>
                </div>

                <div class="mb-4">
                    <label for="nomSiegeEnt" class="form-label">Nom du siège</label>
                    <input id="nomSiegeEnt" class="form-control" name="nomSiegeEnt" type="text" placeholder="le Hangar" aria-describedby="emailHelp">
                </div>

                <div class="mb-4">
                    <label for="quartierEnt" class="form-label">Nom du quartier</label>
                    <input id="quartierEnt" class="form-control" name="quartierEnt" type="text" placeholder="HML" aria-describedby="emailHelp">
                </div>

                <div class="mb-4">
                <label for="regEnt" class="form-label">Région</label>
                    <p>
                        <select form="id_form" name="regEnt" size="1">
                            <option id="sel" value="selectionner">selectionner--</option>
                            <option id="louga" value="Louga">Louga</option>
                            <option id="dakar" value="Dakar">Dakar</option>
                            <option id="fatick" value="Fatick">Fatick</option>
                        </select>
                    </p>
                </div>

                <div class="mb-4">
                <label for="dptEnt" class="form-label">Département</label>
                    <p>
                        <select form="id_form" name="dptEnt" size="1">
                            <option id="selection" value="selectionner">selectionner--</option>
                            <option class="masqueDptlg" style="display:none;" value="KÉBÉMER">KÉBÉMER</option>
                            <option class="masqueDptlg" style="display:none;" value="Linguère">Linguère</option>
                            <option class="masqueDptlg" style="display:none;" value="Louga">Louga</option>
                            <option class="masqueDptdk" style="display:none;" value="Dakar">Dakar</option>
                            <option class="masqueDptdk" style="display:none;" value="Pikine">Pikine</option>
                            <option class="masqueDptdk" style="display:none;" value="Rufisque">Rufisque</option>
                            <option class="masqueDptdk" style="display:none;" value="Guédiawaye">Guédiawaye</option>
                            <option class="masqueDptft" style="display:none;" value="Fatick">Fatick</option>
                            <option class="masqueDptft" style="display:none;" value="Gossas">Gossas</option>
                            <option class="masqueDptft" style="display:none;" value="Foundiougne">Foundiougne</option>                    
                        </select>
                    </p>
                </div>

                <div class="mb-4">
                <label for="comEnt" class="form-label">Commune</label>
                    <p>
                        <select form="id_form" name="comEnt" size="1">
                            <option id="selectionCom" value="selectionner">selectionner--</option>
                            <option class="masqueComlg" style="display:none;" value="KÉBÉMER">KÉBÉMER</option>
                            <option class="masqueComlg" style="display:none;" value="Guéoul">Guéoul</option>
                            <option class="masqueComdk" style="display:none;" value="Ouakam">Ouakam</option>
                            <option class="masqueComdk" style="display:none;" value="Yoff">Yoff</option>
                            <option class="masqueComft" style="display:none;" value="Passy">Passy</option>
                        </select>
                    </p>
                </div>

                <div class="mb-4" style="width:150px;margin:auto;margin-bottom:80px;margin-top:20px">
                    <button type="submit" class="btn btn-primary" name="rep-registre">Enregistrer</button>
                </div>
            </form>  
            <nav style="width:155px;margin:auto;margin-bottom:80px;margin-top:20px;height:3px;margin-top:25px;">
                <ul style="list-style:none;display: inline-flex;">
                    <li><a href="/mesProjets/nousLesFemmes/" >&laquo; Mon compte</a></li>   
                </ul>
            </nav>
        </div>
    </div>
</div>
</body>
</html>
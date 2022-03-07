<?php
error_reporting(-1);
ini_set("display_errors", 1);

error_reporting(-1);
ini_set("display_errors", 1);

require_once "../controllers/personnes.php";
require_once "../controllers/comptes.php";
require_once "../utils/util.php";
init_php_session();



if(isset($_POST['rep-registre']))
{
    $prenomPersonneE = isset($_POST['prenom']);
    $prenomPersonneV = !empty($_POST['prenom']);

    $nomPersonneE = isset($_POST['nom']);
    $nomPersonneV = !empty($_POST['nom']);

    $telephonePersonneE = !empty($_POST['telephone']);
    $telephonePersonneV = isset($_POST['telephone']);

    $naissEmpE = isset($_POST['naiss']);
    $naissEmpV = !empty($_POST['naiss']);

    $roleEmpE = isset($_POST['role']);
    $roleEmpV = !empty($_POST['role']);

    $pseudoCptE = isset($_POST['pseudo']);
    $pseudoCptV = !empty($_POST['pseudo']);

    $mailCptE = isset($_POST['mail']);
    $mailCptV = !empty($_POST['mail']);    

    $motDePasseCptE = isset($_POST['motDePasse']);
    $motDePasseCptV = !empty($_POST['motDePasse']);

    $adminCptE = isset($_POST['admin']);
    $adminCptV = !empty($_POST['admin']);

    $motDePasseConfirmationCptE = isset($_POST['motDePasseConfirmation']);
    $motDePasseConfirmationCptV = !empty($_POST['motDePasseConfirmation']);


    if($prenomPersonneE && $prenomPersonneV && $nomPersonneE && $nomPersonneV && $mailCptE && $telephonePersonneE && $telephonePersonneV && $mailCptV && $naissEmpE &&  $naissEmpV && $roleEmpE && $roleEmpV && $pseudoCptE && $pseudoCptV && $motDePasseCptE && $motDePasseCptV && $motDePasseConfirmationCptE && $motDePasseConfirmationCptV && $adminCptE && $adminCptV)
    {
        $prenomPersonne = $_POST['prenom'];
        $nomPersonne = $_POST['nom'];
        $telephonePersonne = $_POST['telephone'];
        $mailCpt = $_POST['mail'];
        $naissEmp = $_POST['naiss'];
        $roleEmp = $_POST['role'];
        $pseudoCpt = $_POST['pseudo'];
        $motDePasseCpt = $_POST['motDePasse'];
        $adminCpt = $_POST['admin'];

        $motDePasseConfirmationCpt = $_POST['motDePasseConfirmation'];



        if(($motDePasseCpt !== $motDePasseConfirmationCpt) && VerifyTel::verifyTel($telephonePersonne) && VerifyAcc::verifyMail($mailCpt) && VerifyAcc::verifyPseudo($pseudoCpt))

            echo '<p style="text-align:center;color:red;">VERIFIER VOS DONNÉES !!</p>';

        elseif($motDePasseCpt !== $motDePasseConfirmationCpt)

            echo '<p style="text-align:center;color:red;">Les mots de passe ne correspondent pas !!</p>';
  
        elseif(VerifyTel::verifyTel($telephonePersonne))

            echo '<p style="text-align:center;color:red;">Ce numéro téléphone existe déjà !!</p>';
  
        elseif(VerifyAcc::verifyMail($mailCpt))

            echo '<p style="text-align:center;color:red;">Cet adresse mail existe déjà !!</p>';
 
        elseif(VerifyAcc::verifyPseudo($pseudoCpt))

            echo '<p style="text-align:center;color:red;">Ce nom d\'utilisateur existe déjà !!</p>';

        elseif($adminCpt != 1)
        {
            require_once "../controllers/comptes.php";
            $monCompte = new Comptes($pseudoCpt, $mailCpt, $motDePasseCpt, $adminCpt);
            $monCompte->ajouterAcc();
            $monIDcpt=$monCompte->DernieriDcpt();

            require_once "../controllers/personnes.php";
            $maPersonne = new Personnes($nomPersonne, $prenomPersonne, $telephonePersonne);
            $maPersonne->ajouterPersonnes();
            $monIDpers=$maPersonne->DernieriDpers();

            require_once "../controllers/employees.php";
            $monEmploye = new Employees($naissEmp, $roleEmp, $monIDpers, $monIDcpt);
            $monEmploye->ajouterEmp();
            header('Location: /mesProjets/nousLesFemmes/controllers/principalOut.php');
        }
        elseif($adminCpt = 1)
        {
            require_once "../controllers/comptes.php";
            $monCompte = new Comptes($pseudoCpt, $mailCpt, $motDePasseCpt, $adminCpt);
            $monCompte->ajouterAcc();
            $monIDcpt=$monCompte->DernieriDcpt();

            require_once "../controllers/personnes.php";
            $maPersonne = new Personnes($nomPersonne, $prenomPersonne, $telephonePersonne);
            $maPersonne->ajouterPersonnes();
            $monIDpers=$maPersonne->DernieriDpers();

            require_once "../controllers/admins.php";
            $monAdmin = new Admins($naissEmp, $monIDpers, $monIDcpt);
            $monAdmin->ajouterAdmin();
            header('Location: /mesProjets/nousLesFemmes/controllers/principalOut.php');
        }
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
</head>
<body>
<?php if(is_admin()): ?>
    <nav class="navbar navbar-expand-lg navbar-dark bg-primary">
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
    <nav class="navbar navbar-expand-lg navbar-dark bg-primary">
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
<h1 style="text-align:center;">Page d'enregistrement</h1>
<div class="container">
    <hr class="row" style="width:350px; margin:auto;margin-bottom:80px;margin-top:20px;height:3px;">
    <div class="row justify-content-md-center">
        <!-- <hr style="width:1050px;margin:auto;margin-bottom:80px;margin-top:20px;height:3px;"> -->
        <form id="id_form" class="col-md-8 col-xs-2" method="POST" action="" style="border-radius: 15px 15px 15px 15px;margin:auto;box-shadow: 10px 8px 34px 6px rgba(185, 181, 181, 0.685);padding-left:30px;padding-right:30px;padding-top:30px;padding-bottom:30px;">
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
                    <option value="selectionner">selectionner--</option>
                    <option value="Louga">Louga</option>
                    <option value="Dakar">Dakar</option>
                    <option value="Fatick">Fatick</option>
                </select>
                </p>
            </div>

            <div class="mb-4">
            <label for="dptEnt" class="form-label">Département</label>
                <p>
                <select form="id_form" name="dptEnt" size="1">
                    <option value="selectionner">selectionner--</option>
                    <option value="KÉBÉMER">KÉBÉMER</option>
                    <option value="Linguère">Linguère</option>
                    <option value="Louga">Louga</option>
                </select>
                </p>
            </div>

            <div class="mb-4">
            <label for="comEnt" class="form-label">Commune</label>
                <p>
                <select form="id_form" name="comEnt" size="1">
                    <option value="selectionner">selectionner--</option>
                    <option value="KÉBÉMER">KÉBÉMER</option>
                    <option value="Ndande">Ndande</option>
                </select>
                </p>
            </div>

            <div class="row mb-4" style="width:150px;margin:auto;margin-bottom:80px;margin-top:20px">
                <button type="submit" class="btn btn-primary" name="rep-registre">Enregistrer</button>
            </div>
        </form> 
    </div> 
    <nav class="row" style="width:155px;margin:auto;margin-bottom:80px;margin-top:20px;height:3px;margin-top:25px;">
        <ul style="list-style:none;display: inline-flex;">
            <li><a href="/mesProjets/nousLesFemmes/" >&laquo; Mon compte</a></li>
        </ul>
    </nav>
</div>
</body>
</html>
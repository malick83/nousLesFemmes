<?php
error_reporting(-1);
ini_set("display_errors", 1);



require_once "../modeles/database.php";
error_reporting(-1);
ini_set("display_errors", 1);



function verifyTel($num)
{
    foreach(getTelephone() as $tel)
    {
        if ($num == $tel['telephone'])
        {
            return true;
            break;
        }
    }
}


function verifyMail($mail)
{
    foreach(getMail() as $courrier)
    {
        if ($mail == $courrier['cpt_mail'])
        {
            return true;
            break;
        }
    }
}

function verifyPseudo($monPse)
{
    foreach(getPseudo() as $pse)
    {
        if ($monPse == $pse['cpt_pseudo'])
        {
            return true;
            break;
        }
    }
}

// $request = Database::getPdo()->prepare('SELECT * FROM Nlf_Comptes');
// $request->execute();

// $listUsers = $request->fetchAll(PDO::FETCH_ASSOC);

// foreach($listUsers as $list)
// {
//     echo '<pre>';
//     print_r($list);
//     echo '</pre>';
// }

if(isset($_POST['rep-inscription']))
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



        if(($motDePasseCpt !== $motDePasseConfirmationCpt) && verifyTel($telephonePersonne) && verifyMail($mailCpt) && verifyPseudo($pseudoCpt))

            echo '<p style="text-align:center;color:red;">VERIFIER VOS DONNÉES !!</p>';

        elseif($motDePasseCpt !== $motDePasseConfirmationCpt)

            echo '<p style="text-align:center;color:red;">Les mots de passe ne correspondent pas !!</p>';
  
        elseif(verifyTel($telephonePersonne))

            echo '<p style="text-align:center;color:red;">Ce numéro téléphone existe déjà !!</p>';
  
        elseif(verifyMail($mailCpt))

            echo '<p style="text-align:center;color:red;">Cet adresse mail existe déjà !!</p>';
 
        elseif(verifyPseudo($pseudoCpt))

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
            header('Location: /mesProjets/nousLesFemmes/controllers/controlForm.php');
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
            header('Location: /mesProjets/nousLesFemmes/controllers/controlForm.php');
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
    <h1 style="text-align:center;">Page d'inscription</h1>

    <hr style="width:1050px;margin:auto;margin-bottom:80px;margin-top:20px;height:3px;">
<main style="border-radius: 15px 15px 15px 15px;width:600px;margin:auto;box-shadow: 10px 8px 34px 6px rgba(185, 181, 181, 0.685);padding-left:30px;padding-right:30px;padding-top:30px;padding-bottom:30px;">
    <form method="POST" action="">
        <div class="mb-3">
            <label for="prenom" class="form-label">Prénom</label>
            <input id="prenom" class="form-control" name="prenom" type="text" placeholder="Malick" aria-describedby="emailHelp">
        </div>
        <div class="mb-3">
            <label for="nom" class="form-label">Nom</label>
            <input id="nom" class="form-control" name="nom" type="text" placeholder="KEBE" aria-describedby="emailHelp">
        </div>
        <div class="mb-3">
            <label for="telephone" class="form-label">Téléphone</label>
            <input id="telephone" class="form-control" name="telephone" type="tel" placeholder="777777777" aria-describedby="emailHelp">
        </div>
        <div class="mb-3">
            <label for="naiss" class="form-label">Date de naissance</label>
            <input id="naiss" class="form-control" name="naiss" type="date" placeholder="18-12-2020" aria-describedby="emailHelp">
        </div>
        <div class="mb-3">
            <label for="role" class="form-label">Role de NLF</label>
            <input id="role" class="form-control" name="role" type="text" placeholder="Secrétaire, Collectionneur" aria-describedby="emailHelp">
        </div>
        <div class="mb-3">
            <label for="pseudo" class="form-label">Pseudo</label>
            <input id="pseudo" class="form-control" name="pseudo" type="text" placeholder="milkzo83" aria-describedby="emailHelp">
        </div>
        <div class="mb-3">
            <label for="mail" class="form-label">Mail</label>
            <input id="mail" class="form-control" name="mail" type="email" placeholder="malickkebe154@gmail.com" aria-describedby="emailHelp">
        </div>
        <div class="mb-3">
            <label for="motDePasse" class="form-label">Mot de passe</label>
            <input name="motDePasse" type="password" class="form-control" id="motDePasse" placeholder="Entrez votre mot de passe">
        </div>
        <div class="mb-3">
            <label for="motDePasseConfirmation" class="form-label">Confirmer votre mot de passe</label>
            <input name="motDePasseConfirmation" type="password" class="form-control" id="motDePasseConfirmation" placeholder="confirmer votre mot de passe">
        </div>

        <!-- <div class="form-check">
        <input class="form-check-input" type="radio" name="admin" id="flexRadioDefault1" value="1">
        <label class="form-check-label" for="flexRadioDefault1">Admin</label>
        </div> -->
        <!-- <div class="form-check" style="margin-bottom:30px;">
        <input class="form-check-input" type="radio" name="admin" id="flexRadioDefault1" value="0">
        <label class="form-check-label" for="flexRadioDefault2">Pas Admin</label>
        </div> -->

        <p><label for="admin">Admin ?</label> : <input id="admin" name="admin" type="radio" value="1"> Oui <input id="admin" name="admin" type="radio" value="2"> Non</p>
        <button type="submit" class="btn btn-primary" name="rep-inscription">Ajouter</button>
    </form>
    <nav style="width:155px;margin:auto;margin-bottom:80px;margin-top:20px;height:3px;margin-top:25px;">
        <ul style="list-style:none;display: inline-flex;">
            <li><a href="/mesProjets/nousLesFemmes/" >&laquo; Mon compte</a></li>
        </ul>
    </nav>
</main>
</body>
</html>
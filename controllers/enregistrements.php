<?php
require_once "../modeles/database.php";
error_reporting(-1);
ini_set("display_errors", 1);

require_once "objets.php";

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
            $monCompte = new Comptes($pseudoCpt, $mailCpt, $motDePasseCpt, $adminCpt);
            $monCompte->ajouterAcc();
            $monIDcpt=DernieriDcpt();

            $maPersonne = new Personnes($nomPersonne, $prenomPersonne, $telephonePersonne);
            $maPersonne->ajouterPersonnes();
            $monIDpers=DernieriDpers();

            $monEmploye = new Employees($naissEmp, $roleEmp, $monIDpers, $monIDcpt);
            $monEmploye->ajouterEmp();
        }
        elseif($adminCpt = 1)
        {
            $monCompte = new Comptes($pseudoCpt, $mailCpt, $motDePasseCpt, $adminCpt);
            $monCompte->ajouterAcc();
            $monIDcpt=DernieriDcpt();

            $maPersonne = new Personnes($nomPersonne, $prenomPersonne, $telephonePersonne);
            $maPersonne->ajouterPersonnes();
            $monIDpers=DernieriDpers();

            $monAdmin = new Admins($naissEmp, $monIDpers, $monIDcpt);
            $monAdmin->ajouterAdmin();
        }
    }
}
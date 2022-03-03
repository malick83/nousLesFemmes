<?php
require_once "../modeles/database.php";
error_reporting(-1);
ini_set("display_errors", 1);

require_once "objets.php";


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

    $mailPersonneE = isset($_POST['mail']);
    $mailPersonneV = !empty($_POST['mail']);

    $naissEmpE = isset($_POST['naiss']);
    $naissEmpV = !empty($_POST['naiss']);

    $roleEmpE = isset($_POST['role']);
    $roleEmpV = !empty($_POST['role']);

    $pseudoCptE = isset($_POST['pseudo']);
    $pseudoCptV = !empty($_POST['pseudo']);

    $motDePasseCptE = isset($_POST['motDePasse']);
    $motDePasseCptV = !empty($_POST['motDePasse']);

    $adminCptE = isset($_POST['admin']);
    $adminCptV = !empty($_POST['admin']);

    $motDePasseConfirmationCptE = isset($_POST['motDePasseConfirmation']);
    $motDePasseConfirmationCptV = !empty($_POST['motDePasseConfirmation']);


    if($prenomPersonneE && $prenomPersonneV && $nomPersonneE && $nomPersonneV && $mailPersonneE && $telephonePersonneE && $telephonePersonneV && $mailPersonneV && $naissEmpE &&  $naissEmpV && $roleEmpE && $roleEmpV && $pseudoCptE && $pseudoCptV && $motDePasseCptE && $motDePasseCptV && $motDePasseConfirmationCptE && $motDePasseConfirmationCptV && $adminCptE && $adminCptV)
    {
        $prenomPersonne = $_POST['prenom'];
        $nomPersonne = $_POST['nom'];
        $telephonePersonne = $_POST['telephone'];
        $mailPersonne = $_POST['mail'];
        $naissEmp = $_POST['naiss'];
        $roleEmp = $_POST['role'];
        $pseudoCpt = $_POST['pseudo'];
        $motDePasseCpt = $_POST['motDePasse'];
        $adminCpt = $_POST['admin'];

        $motDePasseConfirmationCpt = $_POST['motDePasseConfirmation'];



        if($motDePasseCpt !== $motDePasseConfirmationCpt)
            echo '<p style="text-align:center;color:red;">Les mots de passes ne correspondent pas</p>';
        else
        {
            $monEmploye = new Employees($nomPersonne, $prenomPersonne, $telephonePersonne, $mailPersonne, $naissEmp, $roleEmp);
            echo $monEmploye->hello();
            $monCompte = new Comptes($pseudoCpt, $motDePasseCpt, $adminCpt);
            echo $monCompte->hello();
        }

    }
}
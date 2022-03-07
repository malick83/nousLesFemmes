<?php
error_reporting(-1);
ini_set("display_errors", 1);
// require_once "../modeles/database.php";
require_once "../utils/util.php";
init_php_session();




if(isset($_POST['rep-validation']))
    if(isset($_POST['cpt-pseudo']) && !empty($_POST['cpt-pseudo']) && isset($_POST['cpt-motDePasse']) && !empty($_POST['cpt-motDePasse']))
    {
        $cptPseudo = $_POST['cpt-pseudo'];
        $cptMotDePasse = $_POST['cpt-motDePasse'];


        require_once "../controllers/comptes.php";
        $listUsers = GetInfosAccount::getAccount($cptPseudo);


        if($listUsers && password_verify($cptMotDePasse, $listUsers['cpt_motDePasse']))
        {   
            $_SESSION['pseudo'] = $cptPseudo;
            $_SESSION['motDePasse'] = $cptMotDePasse;
            $_SESSION['mail'] = $listUsers['cpt_mail'];
            $_SESSION['dateCreation'] = $listUsers['cpt_dateCreation'];
            $_SESSION['admin'] = $listUsers['cpt_admin'];

            if(is_admin())
            {
                require_once "../controllers/admins.php";
                $listUsersA = GetInfosAdmin::getDetailsAdmin($cptPseudo);

                $_SESSION['nom'] = $listUsersA['nom'];
                $_SESSION['prenom'] = $listUsersA['prenom'];
                $_SESSION['telephone'] = $listUsersA['telephone'];
                $_SESSION['naiss'] = $listUsersA['admin_naiss'];
                header('Location: /mesProjets/nousLesFemmes/controllers/principalOut.php');

            }
            else
            {
                require_once "../controllers/employees.php";
                $listUsersE = GetInfosEmp::getDetailsEmp($cptPseudo);

                $_SESSION['nom'] = $listUsersE['nom'];
                $_SESSION['prenom'] = $listUsersE['prenom'];
                $_SESSION['telephone'] = $listUsersE['telephone'];

                $_SESSION['naiss'] = $listUsersE['emp_naiss'];
                $_SESSION['role'] = $listUsersE['emp_role'];
                header('Location: /mesProjets/nousLesFemmes/controllers/principalOut.php');
            }
                
        }
        else
            echo '<p style="text-align:center;color:red;">Login ou mot de passe incorrect</p>';
    }
?>
<?php if(!is_logged()): ?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

    <title>Page de connexion</title>
</head>
<body>
<nav class="navbar navbar-expand-lg navbar-dark bg-primary">
    <div class="container-fluid" style="width: 300px;"> 
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav">
            <li class="nav-item h4 mx-auto">
            <a class="nav-link" href="#">Nous les femmes</a>
            </li>
        </ul>
        </div>
    </div>
</nav>
    <h1 style="text-align:center;">Page de connexion</h1>

    
    <div class="container">
        <hr class="row" style="width:350px; margin:auto;margin-bottom:80px;margin-top:20px;height:3px;">
        <div class="row justify-content-md-center">

            <form class="col-md-5 col-xs-2" method="POST" action="" style="border-radius: 15px 15px 15px 15px;box-shadow: 10px 8px 34px 6px rgba(185, 181, 181, 0.685);padding-left:30px;padding-right:30px;padding-top:30px;padding-bottom:30px;">
            <div class="mb-4">
                <label for="pseudo" class="form-label">Nom utilisateur</label>
                <input id="pseudo" class="form-control" name="cpt-pseudo" type="text" placeholder="Entrez votre nom utilisateur" aria-describedby="emailHelp">
            </div>
            <div class="mb-4">
                <label for="motDePasse" class="form-label">Mot de passe</label>
                <input name="cpt-motDePasse" type="password" class="form-control" id="motDePasse" placeholder="Entrez votre mot de passe">
            </div>
                <button type="submit" class="btn btn-primary" name="rep-validation">Se connecter</button>
            </form>
        </div>
    </div>
</body>
</html>
<?php else: ?>
    <?php header('Location: /mesProjets/nousLesFemmes/controllers/principalOut.php');?>
<?php endif; ?>
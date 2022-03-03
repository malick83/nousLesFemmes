<?php
error_reporting(-1);
ini_set("display_errors", 1);
require_once "../modeles/database.php";
require_once "../utils/util.php";
init_php_session();

if(isset($_GET['action']) && !empty($_GET['action']) && $_GET['action'] == 'logout')
{
    clean_php_session();
    header('Location: traitements.php');
}


if(isset($_POST['rep-validation']))
    if(isset($_POST['cpt-pseudo']) && !empty($_POST['cpt-pseudo']) && isset($_POST['cpt-motDePasse']) && !empty($_POST['cpt-motDePasse']))
    {
        $cptPseudo = $_POST['cpt-pseudo'];
        $cptMotDePasse = $_POST['cpt-motDePasse'];

        $listUsers = getAccount($cptPseudo)->fetch(PDO::FETCH_ASSOC);
        if($listUsers && password_verify($cptMotDePasse, $listUsers['cpt_motDePasse']))
        {
            
            $_SESSION['pseudo'] = $cptPseudo;
            $_SESSION['admin'] = $listUsers['cpt_admin'];
            if(is_admin())
                require('../views/admin.php');
            else
                require('../views/visiteur.php');
                
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
    <h1 style="text-align:center;">Page de connexion</h1>

    <hr style="width:1050px;margin:auto;margin-bottom:80px;margin-top:20px;height:3px;">

    <main style="border-radius: 15px 15px 15px 15px;width:600px;margin:auto;box-shadow: 10px 8px 34px 6px rgba(185, 181, 181, 0.685);padding-left:30px;padding-right:30px;padding-top:30px;padding-bottom:30px;">
        <form method="POST" action="/mesProjets/nousLesFemmes/controllers/traitements.php">
        <div class="mb-3">
            <label for="pseudo" class="form-label">Nom utilisateur</label>
            <input id="pseudo" class="form-control" name="cpt-pseudo" type="text" placeholder="Entrez votre nom utilisateur" aria-describedby="emailHelp">
        </div>
        <div class="mb-3">
            <label for="motDePasse" class="form-label">Mot de passe</label>
            <input name="cpt-motDePasse" type="password" class="form-control" id="motDePasse" placeholder="Entrez votre mot de passe">
        </div>
            <button type="submit" class="btn btn-primary" name="rep-validation">Se connecter</button>
        </form>
        <!-- <nav style="width:155px;margin:auto;margin-bottom:80px;margin-top:20px;height:3px;">
            <ul style="list-style:none;display: inline-flex;">
                <li><a href="inscription.php">&laquo; S'inscrire</a></li>
            </ul>
        </nav> -->
    </main>
    </body>
</html>    
<?php endif; ?>
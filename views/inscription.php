<?php
error_reporting(-1);
ini_set("display_errors", 1);


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
    <form method="POST" action="/mesProjets/nousLesFemmes/controllers/enregistrements.php">
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
            <li><a href="/mesProjets/nousLesFemmes/" >&laquo; Se connecter ?</a></li>
        </ul>
    </nav>
</main>
</body>
</html>
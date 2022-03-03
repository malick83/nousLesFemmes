<?php
require_once "../modeles/database.php";


$request = Database::getPdo()->prepare('SELECT * FROM Nlf_Comptes');
$request->execute();

$listUsers = $request->fetchAll(PDO::FETCH_ASSOC);

foreach($listUsers as $list)
{
    echo '<pre>';
    print_r($list);
    echo '</pre>';
}

if(isset($_POST['rep-inscription']))
{
    $userFirstNameS = isset($_POST['userFirstName']);
    $userFirstNameE = !empty($_POST['userFirstName']);

    $userLastNameS = isset($_POST['userLastName']);
    $userLastNameE = !empty($_POST['userLastName']);

    $userMailS = isset($_POST['userMail']);
    $userMailE = !empty($_POST['userMail']);

    $userPseudoS = isset($_POST['userPseudo']);
    $userPseudoE = !empty($_POST['userPseudo']);

    $userPassWordS = isset($_POST['userPassWord']);
    $userPassWordE = !empty($_POST['userPassWord']);

    $userPassWordConfirmationS = isset($_POST['userPassWordConfirmation']);
    $userPassWordConfirmationE = !empty($_POST['userPassWordConfirmation']);

    if($userFirstNameS && $userFirstNameE && $userLastNameS && $userLastNameE && $userMailS && $userMailE && $userPseudoS &&  $userPseudoE && $userPassWordS && $userPassWordE && $userPassWordConfirmationS && $userPassWordConfirmationE)
    {
        $userFirstName = $_POST['userFirstName'];
        $userLastName = $_POST['userLastName'];
        $userMail = $_POST['userMail'];
        $userPseudo = $_POST['userPseudo'];
        $userPassWord = $_POST['userPassWord'];
        $userPassWordConfirmation = $_POST['userPassWordConfirmation'];

        if($userPassWord !== $userPassWordConfirmation)
            echo '<p style="text-align:center;color:red;">Les mots de passes ne correspondent pas</p>';
        else
        {
            $request = Database::getPdo()->prepare('INSERT INTO auth_users(user_firstname, user_lastname, user_mail, user_pseudo, user_password) VALUES (:param1, :param2, :param3, :param4, :param5)');
            $monTableau = 
            [
                'param1' => $userFirstName,
                'param2' => $userLastName,
                'param3' => $userMail,
                'param4' => $userPseudo,
                'param5' => password_hash($userPassWord, PASSWORD_BCRYPT)
            ];
            $request->execute($monTableau);
    
            $requestGet = Database::getPdo()->prepare('SELECT * FROM auth_users WHERE user_firstname = :my_name');
            $requestGet->bindValue(":my_name", $userFirstName);
            $requestGet->execute();

            // $listUsers = $requestGet->fetch(PDO::FETCH_ASSOC);
            // if($listUsers)
            // {
            //     echo '<pre>';
            //     print_r($listUsers);
            //     echo '</pre>';
            // }

        }

    }
}
?>
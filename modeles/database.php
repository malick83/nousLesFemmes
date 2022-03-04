<?php

class Database
{
    private static $instance = null;
    /**
     * Retourne une connexion à la base de données
     * 
     * @return PDO
     * J'utilise un singleton qui est un design pattern appartenant à la catégorie de Creational pattern.
     * le singleton fait référence à la simplicité(single)
     * Le modéle de création offre un moyen de créer des objets tout en masquant la logique de création plutôt que 
     * d'instancier des objets directement à l'aide de l'opérateur new. 
    */
    public static function getPdo(): PDO
    {
        require 'db-config.php';
        if(self::$instance === null)
        {

            try
                {
                    $options=
                    [
                        PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8',
                        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
                        PDO::ATTR_PERSISTENT => true,
                        PDO::ATTR_EMULATE_PREPARES => false,
                    ];
    
                    self::$instance = new PDO($DB_DSN, $DB_USER, $DB_PASS, $options);
                    return self::$instance;
                    
                }
            catch(PDOException $pdoe)
                {
                    echo 'ERREUR: '.$pdoe->getMessage();
                }
        }
        return self::$instance;
    }
}


function getDetailsAdmin($details)
{
    $request = Database::getPdo()->prepare('SELECT * FROM `Nlf_Admin`
    INNER JOIN `Nlf_Personnes` ON `Nlf_Admin`.`admin_pers` = `Nlf_Personnes`.`id`
    INNER JOIN `Nlf_Comptes` ON `Nlf_Admin`.`admin_cpt` = `Nlf_Comptes`.`id_cpt` WHERE `cpt_pseudo` = :my_pseudo OR `cpt_mail` = :my_mail');

    $request->bindValue(":my_pseudo", $details);
    $request->bindValue(":my_mail", $details);
    $request->execute();

    return $request;
}

function getDetailsEmp($details)
{
    $request = Database::getPdo()->prepare('SELECT * FROM `Nlf_Employees`
    INNER JOIN `Nlf_Personnes` ON `Nlf_Employees`.`emp_pers` = `Nlf_Personnes`.`id`
    INNER JOIN `Nlf_Comptes` ON `Nlf_Employees`.`emp_cpt` = `Nlf_Comptes`.`id_cpt` WHERE `cpt_pseudo` = :my_pseudo OR `cpt_mail` = :my_mail');

    $request->bindValue(":my_pseudo", $details);
    $request->bindValue(":my_mail", $details);
    $request->execute();

    return $request;
}

function getAccount($compte)
{
    $request = Database::getPdo()->prepare('SELECT * FROM Nlf_Comptes WHERE cpt_pseudo = :my_pseudo OR cpt_mail = :my_mail');
    $request->bindValue(":my_pseudo", $compte);
    $request->bindValue(":my_mail", $compte);

    $request->execute();

    return $request;
}

function SetAcccout($par1, $par2, $par3, $par4)
{
    $request = Database::getPdo()->prepare('INSERT INTO Nlf_Comptes(cpt_pseudo, cpt_mail, cpt_motDePasse, cpt_admin) VALUES (:param1, :param2, :param3, :param4)');
    $monTableau = 
    [
        'param1' => $par1,
        'param2' => $par2,
        'param3' => password_hash($par3, PASSWORD_BCRYPT),
        'param4' => $par4,
    ];
    $request->execute($monTableau);
    return true;
}




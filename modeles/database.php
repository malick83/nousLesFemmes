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
?>




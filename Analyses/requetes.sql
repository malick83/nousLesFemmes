DROP DATABASE `nousLesFemmes_database`;
CREATE DATABASE IF NOT EXISTS `nousLesFemmes_database`;
USE `nousLesFemmes_database`;

CREATE TABLE `Nlf_Comptes`
(
    `id_cpt` INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
    `cpt_pseudo` VARCHAR(100) NOT NULL UNIQUE,
    `cpt_mail` VARCHAR(100) NOT NULL UNIQUE,
    `cpt_motDePasse` VARCHAR(255) NOT NULL,
    `cpt_dateCreation` DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP,
    `cpt_admin` BOOLEAN DEFAULT 0
);


CREATE TABLE `Nlf_Personnes`
(
    `id` INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
    `nom` VARCHAR(100) NOT NULL,
    `prenom` VARCHAR(100) NOT NULL,
    `telephone` VARCHAR(100) NOT NULL UNIQUE
);


SELECT MAX(id) FROM Nlf_Personnes;
SELECT LAST_INSERT_ID(id) FROM Nlf_Personnes;

SELECT MAX(id) FROM Nlf_Personnes


CREATE TABLE `Nlf_Admin`
(
    `id_admin` INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
    `admin_naiss` DATE NOT NULL,
    `admin_pers` INT NOT NULL,
    `admin_cpt` INT NOT NULL UNIQUE,
    CONSTRAINT `FK_admin_pers` FOREIGN KEY (`admin_pers`) REFERENCES `Nlf_Personnes`(`id`),
    CONSTRAINT `FK_admin_cpt` FOREIGN KEY (`admin_cpt`) REFERENCES `Nlf_Comptes`(`id_cpt`)
);


CREATE TABLE `Nlf_Employees`
(
    `id_emp` INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
    `emp_naiss` DATE NOT NULL,
    `emp_role` VARCHAR(100) NOT NULL,
    `emp_pers` INT NOT NULL,
    `emp_cpt` INT NOT NULL UNIQUE,
    CONSTRAINT `FK_emp_pers` FOREIGN KEY (`emp_pers`) REFERENCES `Nlf_Personnes`(`id`),
    CONSTRAINT `FK_emp_cpt` FOREIGN KEY (`emp_cpt`) REFERENCES `Nlf_Comptes`(`id_cpt`)
);


CREATE TABLE `Nlf_Repondants`
(
    `id_rep` INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
    `rep_mail` VARCHAR(100) NOT NULL UNIQUE,
    `rep_pers` INT NOT NULL,
    CONSTRAINT `FK_rep_pers` FOREIGN KEY (`rep_pers`) REFERENCES `Nlf_Personnes`(`id`)
);

INSERT INTO `Nlf_Personnes`(`nom`, `prenom`, `telephone`)
VALUES
('GUEYE', 'Rokhaya', '750981209');


INSERT INTO `Nlf_Repondants`(`rep_mail`, `rep_pers`)
VALUES
('rokhydaaba@gmail.com', 18);

CREATE TABLE `Nlf_Regions`
(
    `id_reg` INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
    `reg_nom` VARCHAR(100) NOT NULL
);

INSERT INTO `Nlf_Regions`(`reg_nom`)
VALUES
('Louga'),
('Dakar'),
('Fatick');


CREATE TABLE `Nlf_Departements`
(
    `id_dpt` INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
    `dpt_nom` VARCHAR(100) NOT NULL,
    `dpt_reg` INT NOT NULL,
    CONSTRAINT `FK_dpt_reg` FOREIGN KEY (`dpt_reg`) REFERENCES `Nlf_Regions`(`id_reg`) ON DELETE CASCADE
);


INSERT INTO `Nlf_Departements`(`dpt_nom`, `dpt_reg`)
VALUES
('KÉBÉMER', 1),
('Linguére', 1),
('Louga', 1),
('Pikine', 2),
('Rufisque', 2),
('Guédiawaye', 2),
('Dakar', 2);


CREATE TABLE `Nlf_Communes`
(
    `id_com` INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
    `com_nom` VARCHAR(100) NOT NULL,
    `com_dpt` INT NOT NULL,
    CONSTRAINT `FK_com_dpt` FOREIGN KEY (`com_dpt`) REFERENCES `Nlf_Departements`(`id_dpt`) ON DELETE CASCADE
);

INSERT INTO `Nlf_Communes`(`com_nom`, `com_dpt`)
VALUES
('KÉBÉMER', 1),
('Ndande', 1);



CREATE TABLE `Nlf_Quartiers`
(
    `id_quartier` INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
    `quartier_nom` VARCHAR(100) NOT NULL,
    `quartier_com` INT NOT NULL,
    CONSTRAINT `FK_quartier_com` FOREIGN KEY (`quartier_com`) REFERENCES `Nlf_Communes`(`id_com`) ON DELETE CASCADE
);

INSERT INTO `Nlf_Quartiers`(`quartier_nom`, `quartier_com`)
VALUES
('MBABOU', 1),
('Galla', 1),
('HLM', 1),
('Escale', 1);


CREATE TABLE `Nlf_Sieges`
(
    `id_sg` INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
    `sg_nom` VARCHAR(100) NOT NULL,
    `sg_quartier` INT NOT NULL,
    CONSTRAINT `FK_sg_quartier` FOREIGN KEY (`sg_quartier`) REFERENCES `Nlf_Quartiers`(`id_quartier`) ON DELETE CASCADE
);


INSERT INTO `Nlf_Sieges`(`sg_nom`, `sg_quartier`)
VALUES
('myCompany', 1),
('theStore', 1);


CREATE TABLE `Nlf_Entreprises`
(
    `id_ent` INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
    `ent_nom` VARCHAR(100) NOT NULL,
    `ent_GPS` VARCHAR(100) NOT NULL,
    `ent_dateCreation` DATE NOT NULL,
    `ent_regimeJuridique` ENUM('GIE', 'SA', 'SARL', 'SUARL', 'EI') NOT NULL,
    `ent_registreCom` INT NOT NULL,
    `ent_type` BOOLEAN NOT NULL,
    `ent_secteur` ENUM('Commerce(C)', 'Commerce de motocyclette et accessoires(C.1.1)', 'Commerce en magasinage(C.2)') NOT NULL,
    `ent_pageWeb` VARCHAR(100) NOT NULL,
    `ent_nombreEmp` ENUM('0', '<5', '5 à 10', '10 à 20', '=20') NOT NULL,
    `ent_contratFormel` BOOLEAN NOT NULL,
    `ent_organigramme` BOOLEAN NOT NULL,
    `ent_dispositifForm` BOOLEAN NOT NULL,
    `ent_cotisationSoc` ENUM('Oui', 'Non', 'Partiellement') NOT NULL,
    `ent_rep` INT NOT NULL,
    `ent_sg` INT NOT NULL,
    CONSTRAINT `FK_ent_rep` FOREIGN KEY (`ent_rep`) REFERENCES `Nlf_Repondants`(`id_rep`),
    CONSTRAINT `FK_ent_sg` FOREIGN KEY (`ent_sg`) REFERENCES `Nlf_Sieges`(`id_sg`) 
);

INSERT INTO `Nlf_Entreprises`(`ent_nom`, `ent_GPS`, `ent_dateCreation`, `ent_regimeJuridique`, `ent_registreCom`, `ent_type`, `ent_secteur`, `ent_pageWeb`, `ent_nombreEmp`, `ent_contratFormel`, `ent_organigramme`, `ent_dispositifForm`, `ent_cotisationSoc`, `ent_rep`, `ent_sg`)
VALUES
('Shadow enterprise', 'Avenue les jambars', '2020-03-12', 'SARL', 19484342, 1, 'Commerce(C)', 'https://www.shadowenterprise.com', '5 à 10', 0, 1, 1, 'Oui', 1, 1);



SELECT * FROM `Nlf_Entreprises`
INNER JOIN `Nlf_Repondants` ON `Nlf_Entreprises`.`ent_rep` = `Nlf_Repondants`.`id_rep`
INNER JOIN `Nlf_Sieges` ON `Nlf_Entreprises`.`ent_sg` = `Nlf_Sieges`.`id_sg`;


SELECT `ent_secteur`, `ent_nom`, `sg_nom`, `rep_mail` FROM `Nlf_Entreprises`
INNER JOIN `Nlf_Repondants` ON `Nlf_Entreprises`.`ent_rep` = `Nlf_Repondants`.`id_rep`
INNER JOIN `Nlf_Sieges` ON `Nlf_Entreprises`.`ent_sg` = `Nlf_Sieges`.`id_sg`;


-- TOP REQUEST
SELECT `ent_secteur`, `ent_nom`, `sg_nom`, `rep_mail`, `nom`, `prenom`, `telephone` FROM `Nlf_Entreprises`
INNER JOIN `Nlf_Repondants` ON `Nlf_Entreprises`.`ent_rep` = `Nlf_Repondants`.`id_rep`
INNER JOIN `Nlf_Sieges` ON `Nlf_Entreprises`.`ent_sg` = `Nlf_Sieges`.`id_sg`
INNER JOIN `Nlf_Personnes` ON `Nlf_Repondants`.`rep_pers` = `Nlf_Personnes`.`id`;


-- TOP REQUEST
SELECT `ent_nom`, `sg_nom`, `quartier_nom`, `com_nom`, `dpt_nom`, `reg_nom`, `ent_secteur`, `ent_regimeJuridique`, `prenom`, `nom`, `telephone`, `rep_mail` FROM `Nlf_Entreprises`
INNER JOIN `Nlf_Repondants` ON `Nlf_Entreprises`.`ent_rep` = `Nlf_Repondants`.`id_rep`
INNER JOIN `Nlf_Sieges` ON `Nlf_Entreprises`.`ent_sg` = `Nlf_Sieges`.`id_sg`
INNER JOIN `Nlf_Personnes` ON `Nlf_Repondants`.`rep_pers` = `Nlf_Personnes`.`id`
INNER JOIN `Nlf_Quartiers` ON `Nlf_Sieges`.`sg_quartier` = `Nlf_Quartiers`.`id_quartier`
INNER JOIN `Nlf_Communes` ON `Nlf_Quartiers`.`quartier_com` = `Nlf_Communes`.`id_com`
INNER JOIN `Nlf_Departements` ON `Nlf_Communes`.`com_dpt` = `Nlf_Departements`.`id_dpt`
INNER JOIN `Nlf_Regions` ON `Nlf_Departements`.`dpt_reg` = `Nlf_Regions`.`id_reg`;


SELECT `ent_secteur`, `ent_nom`, `sg_nom`, `rep_mail`, `nom`, `prenom`, `telephone` FROM `Nlf_Entreprises`
INNER JOIN `Nlf_Repondants` ON `Nlf_Entreprises`.`ent_rep` = `Nlf_Repondants`.`id_rep`
INNER JOIN `Nlf_Sieges` ON `Nlf_Entreprises`.`ent_sg` = `Nlf_Sieges`.`id_sg`
INNER JOIN `Nlf_Personnes` ON `Nlf_Repondants`.`rep_pers` = `Nlf_Personnes`.`id`;



SELECT * FROM `Nlf_Employees`
INNER JOIN `Nlf_Personnes` ON `Nlf_Employees`.`emp_pers` = `Nlf_Personnes`.`id`
INNER JOIN `Nlf_Comptes` ON `Nlf_Employees`.`emp_cpt` = `Nlf_Comptes`.`id_cpt`;



UPDATE `Nlf_Admin`
SET `admin_pers` = 11, `admin_cpt` = 16
WHERE `id_admin` = 2;

DELETE FROM `Nlf_Comptes` WHERE `id_cpt` = 13;

SELECT * FROM `Nlf_Admin`;
LEFT JOIN `Nlf_Personnes` ON `Nlf_Admin`.`admin_pers` = `Nlf_Personnes`.`id`
LEFT JOIN `Nlf_Comptes` ON `Nlf_Admin`.`admin_cpt` = `Nlf_Comptes`.`id_cpt`;


SELECT * FROM `Nlf_Admin`
INNER JOIN `Nlf_Personnes` ON `Nlf_Admin`.`admin_pers` = `Nlf_Personnes`.`id`
INNER JOIN `Nlf_Comptes` ON `Nlf_Admin`.`admin_cpt` = `Nlf_Comptes`.`id_cpt` WHERE `cpt_pseudo` = :my_pseudo OR `cpt_mail` = :my_mail';

SELECT * FROM `Nlf_Admin`
INNER JOIN `Nlf_Personnes` ON `Nlf_Admin`.`admin_pers` = `Nlf_Personnes`.`id`
INNER JOIN `Nlf_Comptes` ON `Nlf_Admin`.`admin_cpt` = `Nlf_Comptes`.`id_cpt`;







INSERT INTO `Nlf_Comptes`(`cpt_pseudo`, `cpt_mail`, `cpt_motDePasse`, `cpt_admin`)
VALUES
('milkzo83', 'malickkebe83@gmail.com', '$2y$10$EgyjBVjnAO8dXPtYKDRUru10cksfwCpbrOgDkH/u31v0P7gPmZr9C', 1);


INSERT INTO `Nlf_Comptes`(`cpt_pseudo`, `cpt_mail`, `cpt_motDePasse`)
VALUES
('zall83', 'cheikhtalla@gmail.com', '$2y$10$IHHOJ3.FUw7LMn3lWlaKiuWW5aI5JEu5tbvoquDD5jP6uuLCMsUOK');


DROP TABLE Nlf_Employees;

SELECT * FROM Nlf_Personnes;

SELECT * FROM Nlf_Comptes;

SELECT * FROM Nlf_Employees;

SELECT * FROM Nlf_Admin;

SELECT `telephone` FROM Nlf_Personnes;

DELETE FROM `Nlf_Comptes` WHERE `id_cpt` = 13;

SELECT `cpt_mail` FROM Nlf_Comptes;


DELETE FROM `Nlf_Comptes` WHERE `id_cpt` = 3;


DELETE FROM `Nlf_Personnes` WHERE `id` = 6;

INSERT INTO `Nlf_Personnes`(`nom`, `prenom`, `telephone`)
VALUES
('KÉBÉ', 'Malick', '771234567');


INSERT INTO `Nlf_Personnes`(`nom`, `prenom`, `telephone`)
VALUES
('TALLA', 'Cheikh Serigne Saliou', '771234561');

-- 

INSERT INTO `Nlf_Admin`(`admin_naiss`, `admin_pers`, `admin_cpt`)
VALUES
('1999-02-12', 1, 1);


DROP TABLE Nlf_Employees;

INSERT INTO `Nlf_Employees`(`emp_naiss`, `emp_role`, `emp_pers`, `emp_cpt`)
VALUES
('1998-07-11', 'Agent Terrain', 2, 2);


SELECT `admin_naiss`, `nom`, `prenom`, `telephone`, `cpt_pseudo`, `cpt_mail`, `cpt_motDePasse`, `cpt_admin` FROM `Nlf_Admin`
INNER JOIN `Nlf_Personnes` ON `Nlf_Admin`.`id_admin` = `Nlf_Personnes`.`id`
INNER JOIN `Nlf_Comptes` ON `Nlf_Admin`.`id_admin` = `Nlf_Comptes`.`id_cpt`;


SELECT * FROM `Nlf_Admin`
INNER JOIN `Nlf_Personnes` ON `Nlf_Admin`.`id_admin` = `Nlf_Personnes`.`id`
INNER JOIN `Nlf_Comptes` ON `Nlf_Admin`.`id_admin` = `Nlf_Comptes`.`id_cpt`
WHERE `cpt_pseudo`='milkzo83';


SELECT * FROM `Nlf_Admin`
INNER JOIN `Nlf_Personnes` ON `Nlf_Admin`.`id_admin` = `Nlf_Personnes`.`id`;



SELECT * FROM `Nlf_Admin`
INNER JOIN `Nlf_Comptes` ON `Nlf_Admin`.`id_admin` = `Nlf_Comptes`.`id_cpt` WHERE `cpt_pseudo`='milkzo83';


SELECT * FROM `Nlf_Employees`
WHERE `emp_cpt` = ANY
(
    SELECT `id_cpt` FROM `Nlf_Comptes`
    WHERE `id_cpt` = 2
);




SELECT * FROM `Nlf_Employees`
RIGHT JOIN `Nlf_Comptes` ON `Nlf_Employees`.`id_emp` = `Nlf_Comptes`.`id_cpt` WHERE `cpt_pseudo`='milkzo83';


SELECT * FROM `Nlf_Admin`
INNER JOIN `Nlf_Personnes` ON `Nlf_Admin`.`id_admin` = `Nlf_Personnes`.`id`
INNER JOIN `Nlf_Comptes` ON `Nlf_Admin`.`id_admin` = `Nlf_Comptes`.`id_cpt`
WHERE `cpt_pseudo`='milkzo83';





SELECT * FROM `Nlf_Employees`
RIGHT JOIN `Nlf_Comptes` ON `Nlf_Employees`.`id_emp` = `Nlf_Comptes`.`id_cpt`;
LEFT JOIN `Nlf_Personnes` ON `Nlf_Employees`.`id_emp` = `Nlf_Personnes`.`id`;


SELECT * FROM `Nlf_Employees`
LEFT JOIN `Nlf_Personnes` ON `Nlf_Employees`.`id_emp` = `Nlf_Personnes`.`id`;

LEFT JOIN `Nlf_Comptes` ON `Nlf_Employees`.`id_emp` = `Nlf_Comptes`.`id_cpt`;










SELECT * FROM `Nlf_Employees`
INNER JOIN `Nlf_Personnes` ON `Nlf_Employees`.`id_emp` = `Nlf_Personnes`.`id`
RIGHT JOIN `Nlf_Comptes` ON `Nlf_Employees`.`id_emp` = `Nlf_Comptes`.`id_cpt`
WHERE `cpt_pseudo` = 'zall83' OR `mail` = 'cheikhtalla@gmail.com';


SELECT `cpt_pseudo` FROM `Nlf_Employees`
INNER JOIN `Nlf_Personnes` ON `Nlf_Employees`.`id_emp` = `Nlf_Personnes`.`id`
RIGHT JOIN `Nlf_Comptes` ON `Nlf_Employees`.`id_emp` = `Nlf_Comptes`.`id_cpt`;


INSERT INTO `Nlf_Comptes`(`cpt_pseudo`, `cpt_motDePasse`, `cpt_admin`)
VALUES
('milkzo83', '$2y$10$EgyjBVjnAO8dXPtYKDRUru10cksfwCpbrOgDkH/u31v0P7gPmZr9C', 1);


INSERT INTO `Nlf_Comptes`(`cpt_pseudo`, `cpt_motDePasse`)
VALUES
('zall83', '$2y$10$IHHOJ3.FUw7LMn3lWlaKiuWW5aI5JEu5tbvoquDD5jP6uuLCMsUOK');

SELECT * FROM `Nlf_Comptes`;

UPDATE `Nlf_Comptes`
SET `cpt_motDePasse` = '$2y$10$vu2JliNfS2qOAT3SDKwPmOXIERNFl/ztq8WWyoBmcBplwXZdSXg1q'
WHERE `id_cpt` = 2;


-- INSERT INTO `auth_users`(`user_name`, `user_password`)
-- VALUES
-- ('sonhibousimplon@gmail.com', '$2y$10$bSoYpbMv5cUuDCH8AspKA.1yEfSN7sEzFoLtfjPgBs.N2jzhdYhXy'),
-- ('ramataka@gmail.com', '$2y$10$pQuoPG6OIcfq6U22.eJwCuHSQv6fdEwfLgN27RtbgBcRmRey9/enS'),
-- ('dieyemouhamet1@gmail.com', '$2y$10$Mp6NY059/K2paWXCSbtTmuPl/DvzfUQe5gscjmeUhHthDAVztVUvO'),
-- ('salioutalla@gmail.com', '$2y$10$KCWORu92KtTd.pKPLSb1FO5PPFmQFAnXIADH2wyWhkuVVYI0EG3qa');



-- ADD `user_points` TINYINT(2)
-- DROP `user_birthday`
-- MODIFY `id_user` SMALLINT
-- CHANGE `user_name` `user_mail` VARCHAR(70);

-- ALTER TABLE `auth_users`
-- ADD `user_firstname` VARCHAR(50) NOT NULL DEFAULT 'Malick';

-- ALTER TABLE `auth_users`
-- ADD `user_secondname` VARCHAR(50) NOT NULL DEFAULT 'KEBE';


-- ALTER TABLE `auth_users`
-- ADD `user_pseudo` VARCHAR(50) NOT NULL DEFAULT 'milkzo';

-- ALTER TABLE `auth_users`
-- ALTER `user_firstname` DROP DEFAULT;

-- ALTER TABLE `auth_users`
-- CHANGE `user_secondname` `user_lastname` VARCHAR(50);

-- ALTER TABLE `auth_users`
-- ALTER `user_lastname` DROP DEFAULT;

-- ALTER TABLE `auth_users`
-- ALTER `user_pseudo` DROP DEFAULT;

-- ALTER TABLE `auth_users`
-- CHANGE `user_name` `user_mail` VARCHAR(70);

-- ALTER TABLE `auth_users`
-- MODIFY `user_mail` VARCHAR(70) NOT NULL;

-- ALTER TABLE `auth_users`
-- MODIFY `user_admin` BOOLEAN NOT NULL DEFAULT 0;

-- UPDATE `auth_users`
-- SET `user_firstname` = 'Cheikh Saliou', `user_lastname` = 'TALLA', `user_pseudo` = 'kheuss56'
-- WHERE `id_user` = 5;


-- ALTER TABLE `auth_users`
-- ADD UNIQUE(`user_mail`);

-- ALTER TABLE `auth_users`
-- ADD UNIQUE(`user_pseudo`);

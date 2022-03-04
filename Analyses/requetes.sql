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


INSERT INTO `Nlf_Comptes`(`cpt_pseudo`, `cpt_mail`, `cpt_motDePasse`, `cpt_admin`)
VALUES
('milkzo83', 'malickkebe83@gmail.com', '$2y$10$EgyjBVjnAO8dXPtYKDRUru10cksfwCpbrOgDkH/u31v0P7gPmZr9C', 1);


INSERT INTO `Nlf_Comptes`(`cpt_pseudo`, `cpt_mail`, `cpt_motDePasse`)
VALUES
('zall83', 'cheikhtalla@gmail.com', '$2y$10$IHHOJ3.FUw7LMn3lWlaKiuWW5aI5JEu5tbvoquDD5jP6uuLCMsUOK');


DROP TABLE Nlf_Employees;

SELECT * FROM Nlf_Personnes;

SELECT * FROM Nlf_Comptes;


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



-- SELECT * FROM `Nlf_Admin`
-- INNER JOIN `Nlf_Comptes` ON `Nlf_Admin`.`id_admin` = `Nlf_Comptes`.`id_cpt` WHERE `cpt_pseudo`='milkzo83';


-- SELECT * FROM `Nlf_Employees`
-- WHERE `emp_cpt` = ANY
-- (
--     SELECT `id_cpt` FROM `Nlf_Comptes`
--     WHERE `id_cpt` = 2
-- );



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

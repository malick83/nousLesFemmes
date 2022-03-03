DROP DATABASE `nousLesFemmes_database`;
CREATE DATABASE IF NOT EXISTS `nousLesFemmes_database`;
USE `nousLesFemmes_database`;

CREATE TABLE `Nlf_Comptes`
(
    `id_cpt` INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
    `cpt_pseudo` VARCHAR(100) NOT NULL UNIQUE,
    `cpt_motDePasse` VARCHAR(255) NOT NULL,
    `cpt_dateCreation` DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP,
    `cpt_admin` BOOLEAN DEFAULT 0
);


INSERT INTO `Nlf_Comptes`(`cpt_pseudo`, `cpt_motDePasse`, `cpt_admin`)
VALUES
('milkzo83', '$2y$10$EgyjBVjnAO8dXPtYKDRUru10cksfwCpbrOgDkH/u31v0P7gPmZr9C', 1);

SELECT * FROM `Nlf_Comptes`;


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

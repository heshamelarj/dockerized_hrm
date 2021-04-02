
















INSERT INTO `staff_personal_info` (`id`, `cin`, `name`, `birthdate`, `address`, `phone`, `family_situation`) VALUES (NULL, 'FH53936', 'Hicham EL-ARGEOUNI', '1992-09-10 00:00:00', 'HAY SAADA ,NR G27 JERADA', '0635791978', 'célibataire'), (NULL, 'V548789', 'John Doe', '1990-10-10 00:00:00', '1st Street 2nd Avenu 4005D Manhathan NYC', '001654789321', 'Marié'),(NULL, 'F547896', 'Mohammed Achraf', '1970-10-12 00:00:00', 'Hay Lwahda Lot 15 3éme Etage NR 50 Oujda', '06541247895', 'célibataire'), (NULL, 'CD451236', 'Boutayna Alfassia', '1991-06-25 00:00:00', 'Hay L\'aqdim NR 120 lmdina Laqima FES', '0754893124', 'célibataire'), (NULL, 'FA547896', 'Ahmed Elberkani', '1960-11-13 00:00:00', 'Hay EZITOUN NR 145 BERKANE', '0668786812', 'Divorcé'), (NULL, 'Z548965', 'NAJAT ELFARISSI', '1998-12-12 00:00:00', 'LOT NAKHIL BT 117 1er ETAGE APP 15 Guilmim', '07548954', 'Marié');




INSERT INTO `staff_work_info` (`id`, `doti`, `department`, `grade`, `function`, `position`, `entrence_date`, `function_date`, `staff_personal_info_id`) VALUES (NULL, '1973745', 'Administration', 'Technicien 3éme Grade', 'Administratif', 'GRH', '2019-06-17 00:00:00', '2019-06-17 00:00:00', '1'), (NULL, '1205548', 'Administration', 'Administrateur 2 éme grade ', 'Secrétaire Generale', 'Secrétaria Génerale', '1990-10-10 00:00:00', '1986-10-10 00:00:00', '2'), (NULL, '102054', 'Droit Privé', 'Professeur de l\'Enseignement Superieur', 'Enseignant', 'Rechercheur', '1970-05-10 00:00:00', '1965-05-10 00:00:00', '3' ), (NULL, '1974585', 'Scolarité ', 'Ingenieur Etat 3éme Grade', 'Administratif', 'Guchet 2', '2000-03-15 00:00:00', '2000-03-15 00:00:00', '4');

INSERT INTO `role` (`id`, `role`, `role_code`,`staff_work_info_id`) VALUES (NULL, 'fonctionnaire', '1','1'), (NULL, 'fonctionnaire_sup', '2','2'), (NULL, 'enseignant', '3','4');



INSERT INTO `performance` (`id`, `staff_work_info_id`, `ladder`, `echelon`, `ladder_date`, `echelon_date`) VALUES (NULL, '1', '9', '1', '2019-06-17 00:00:00', '2019-06-17 00:00:00'), (NULL, '4', '11', '2', '2014-03-15 00:00:00', '2016-03-15 00:00:00'), (NULL, '3', 'D', '4', '2018-01-01 00:00:00', '2019-01-01 00:00:00');
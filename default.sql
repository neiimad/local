-- phpMyAdmin SQL Dump
-- version OVH
-- http://www.phpmyadmin.net
--
-- Client: mysql5-9.perso
-- Généré le : Mer 18 Décembre 2013 à 02:37
-- Version du serveur: 5.1.66
-- Version de PHP: 5.3.8

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";

--
-- Base de données: `equinode_main`
--

-- --------------------------------------------------------

--
-- Structure de la table `bloc`
--

CREATE TABLE IF NOT EXISTS `bloc` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `id_front` int(10) DEFAULT NULL,
  `bloc_place` varchar(80) DEFAULT NULL,
  `bloc_label` varchar(80) DEFAULT NULL,
  `bloc_disabled` varchar(1) DEFAULT NULL,
  `bloc_users` varchar(255) DEFAULT NULL,
  `bloc_class` varchar(80) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `Place` (`bloc_place`),
  KEY `Id_Front` (`id_front`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=22 ;

--
-- Contenu de la table `bloc`
--

INSERT INTO `bloc` (`id`, `id_front`, `bloc_place`, `bloc_label`, `bloc_disabled`, `bloc_users`, `bloc_class`) VALUES
(2, 2, 'page_middle', 'contenu_list', 'N', NULL, NULL),
(3, 3, 'page_middle', 'contenu_text2', 'N', NULL, NULL),
(4, 4, 'page_middle', 'contenu_connexion', 'N', NULL, NULL),
(5, 5, 'page_middle', 'contenu_form', 'N', NULL, NULL),
(11, 7, 'page_middle', 'contenu_deconnexion', 'N', NULL, NULL),
(13, 9, 'page_middle', 'form_saisie', 'N', 'administrator', 'edit'),
(15, 10, 'page_middle', 'form_saisie', 'N', 'administrator', 'edit'),
(16, 11, 'page_middle', 'contact', 'N', NULL, NULL);

-- --------------------------------------------------------

--
-- Structure de la table `data`
--

CREATE TABLE IF NOT EXISTS `data` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `type` varchar(80) NOT NULL,
  `value` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `Type` (`type`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Contenu de la table `data`
--

INSERT INTO `data` (`id`, `type`, `value`) VALUES
(1, 'texte', 'BIENVENUE SUR LA PAGE D''ACCUEIL'),
(2, 'texte', 'Completely scale exceptional partnerships without prospective intellectual capital. Monotonectally evolve resource-leveling ideas with front-end technology. Professionally integrate pandemic human capital with 24/365 networks. Compellingly visualize.'),
(3, 'image', 'noimage.png');

-- --------------------------------------------------------

--
-- Structure de la table `departement`
--

CREATE TABLE IF NOT EXISTS `departement` (
  `id_departement` char(2) NOT NULL DEFAULT '',
  `departement` varchar(50) NOT NULL DEFAULT '',
  `id_region` tinyint(4) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id_departement`),
  KEY `id_region` (`id_region`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Contenu de la table `departement`
--

INSERT INTO `departement` (`id_departement`, `departement`, `id_region`) VALUES
('01', 'Ain', 22),
('02', 'Aisne', 19),
('03', 'Allier', 3),
('04', 'Alpes-de-Haute-Provence', 21),
('05', 'Hautes-Alpes', 21),
('06', 'Alpes-Maritimes', 21),
('07', 'Ardèche', 22),
('08', 'Ardennes', 8),
('09', 'Ariège', 16),
('10', 'Aube', 8),
('11', 'Aude', 13),
('12', 'Aveyron', 16),
('13', 'Bouches-du-Rhône', 21),
('14', 'Calvados', 4),
('15', 'Cantal', 3),
('16', 'Charente', 20),
('17', 'Charente-Maritime', 20),
('18', 'Cher', 7),
('19', 'Corrèze', 14),
('2A', 'Corse-du-Sud', 9),
('2B', 'Haute-Corse', 9),
('21', 'Côte-d''Or', 5),
('22', 'Côtes-d''Armor', 6),
('23', 'Creuse', 14),
('24', 'Dordogne', 2),
('25', 'Doubs', 10),
('26', 'Drôme', 22),
('27', 'Eure', 11),
('28', 'Eure-et-Loir', 7),
('29', 'Finistère', 6),
('30', 'Gard', 13),
('31', 'Haute-Garonne', 16),
('32', 'Gers', 16),
('33', 'Gironde', 2),
('34', 'Hérault', 13),
('35', 'Ille-et-Vilaine', 6),
('36', 'Indre', 7),
('37', 'Indre-et-Loire', 7),
('38', 'Isère', 22),
('39', 'Jura', 10),
('40', 'Landes', 2),
('41', 'Loir-et-Cher', 7),
('42', 'Loire', 22),
('43', 'Haute-Loire', 3),
('44', 'Loire-Atlantique', 18),
('45', 'Loiret', 7),
('46', 'Lot', 16),
('47', 'Lot-et-Garonne', 2),
('48', 'Lozère', 13),
('49', 'Maine-et-Loire', 18),
('50', 'Manche', 4),
('51', 'Marne', 8),
('52', 'Haute-Marne', 8),
('53', 'Mayenne', 18),
('54', 'Meurthe-et-Moselle', 15),
('55', 'Meuse', 15),
('56', 'Morbihan', 6),
('57', 'Moselle', 15),
('58', 'Nièvre', 5),
('59', 'Nord', 17),
('60', 'Oise', 19),
('61', 'Orne', 4),
('62', 'Pas-de-Calais', 17),
('63', 'Puy-de-Dôme', 3),
('64', 'Pyrénées-Atlantiques', 2),
('65', 'Hautes-Pyrénées', 16),
('66', 'Pyrénées-Orientales', 13),
('67', 'Bas-Rhin', 1),
('68', 'Haut-Rhin', 1),
('69', 'Rhône', 22),
('70', 'Haute-Saône', 10),
('71', 'Saône-et-Loire', 5),
('72', 'Sarthe', 18),
('73', 'Savoie', 22),
('74', 'Haute-Savoie', 22),
('75', 'Paris', 12),
('76', 'Seine-Maritime', 11),
('77', 'Seine-et-Marne', 12),
('78', 'Yvelines', 12),
('79', 'Deux-Sèvres', 20),
('80', 'Somme', 19),
('81', 'Tarn', 16),
('82', 'Tarn-et-Garonne', 16),
('83', 'Var', 21),
('84', 'Vaucluse', 21),
('85', 'Vendée', 18),
('86', 'Vienne', 20),
('87', 'Haute-Vienne', 14),
('88', 'Vosges', 15),
('89', 'Yonne', 5),
('90', 'Territoire de Belfort', 10),
('91', 'Essonne', 12),
('92', 'Hauts-de-Seine', 12),
('93', 'Seine-Saint-Denis', 12),
('94', 'Val-de-Marne', 12),
('95', 'Val-d''Oise', 12);

-- --------------------------------------------------------

--
-- Structure de la table `element`
--

CREATE TABLE IF NOT EXISTS `element` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `id_bloc` int(10) NOT NULL,
  `element_place` varchar(80) NOT NULL,
  `element_disabled` varchar(1) DEFAULT NULL,
  `element_label` varchar(80) NOT NULL,
  `type` varchar(80) DEFAULT NULL,
  `element_parent` int(10) DEFAULT NULL,
  `element_class` varchar(80) DEFAULT NULL,
  `value` varchar(255) DEFAULT NULL,
  `data0` varchar(255) DEFAULT NULL,
  `data1` varchar(255) DEFAULT NULL,
  `data2` varchar(255) DEFAULT NULL,
  `data3` varchar(255) DEFAULT NULL,
  `data4` varchar(255) DEFAULT NULL,
  `data5` varchar(255) DEFAULT NULL,
  `data6` varchar(255) DEFAULT NULL,
  `data7` varchar(255) DEFAULT NULL,
  `data8` varchar(255) DEFAULT NULL,
  `data9` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `type` (`type`),
  KEY `id_bloc` (`id_bloc`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=130 ;

--
-- Contenu de la table `element`
--

INSERT INTO `element` (`id`, `id_bloc`, `element_place`, `element_disabled`, `element_label`, `type`, `element_parent`, `element_class`, `value`, `data0`, `data1`, `data2`, `data3`, `data4`, `data5`, `data6`, `data7`, `data8`, `data9`) VALUES
(58, 11, 'head', 'N', 'contenu_deconnexion_h2', 'content_h2', NULL, NULL, 'Information', '/app/src/view/img/picto_default.png', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(59, 11, 'inner', 'N', 'contenu_deconnexion_info', 'content_info', NULL, NULL, 'Vous avez été déconnecté.', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(3, 2, 'head', 'N', 'contenu_list_h2', 'content_h2', NULL, NULL, 'Contenu en liste', '/app/src/view/img/picto_default.png', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(4, 2, 'inner', 'N', 'contenu_list_texte', 'content_texte', NULL, NULL, 'Affichage d''éléments sous forme de liste :', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(38, 2, 'bottom', 'N', 'contenu_list_items_link_prev', 'link', NULL, 'btn prev up', 'Plus récent', '_self', NULL, 'Afficher le précédent', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(39, 2, 'bottom', 'N', 'contenu_list_items_link_next', 'link', NULL, 'btn next down', 'Moins récent', '_self', NULL, 'Afficher le suivant', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(5, 2, 'inner', 'N', 'contenu_list_items', 'items', NULL, 'results slider', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(6, 2, 'inner', 'N', 'contenu_list_items_item1', 'item', 5, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(7, 2, 'inner', 'N', 'contenu_list_items_item1_h4', 'content_h4', 6, NULL, '06/05/2013', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(8, 2, 'inner', 'N', 'contenu_list_items_item1_texte', 'content_texte', 6, NULL, 'Interactively e-enable error-free schemas after bleeding-edge core competencies.', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(9, 2, 'inner', 'N', 'contenu_list_items_item1_link', 'link', 6, NULL, 'En savoir plus', NULL, '/app/workspace/equinode/home', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(10, 2, 'inner', 'N', 'contenu_liste_items_item2', 'item', 5, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(11, 2, 'inner', 'N', 'contenu_list_items_item2_h4', 'content_h4', 10, NULL, '05/05/2013', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(12, 2, 'inner', 'N', 'contenu_list_items_item2_texte', 'content_texte', 10, NULL, 'Globally maintain mission-critical solutions for e-business e-commerce.', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(13, 2, 'inner', 'N', 'contenu_list_items_item2_link', 'link', 10, NULL, 'En savoir plus', NULL, '/app/workspace/equinode/home', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(14, 2, 'inner', 'N', 'contenu_list_items_item3', 'item', 5, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(15, 2, 'inner', 'N', 'contenu_list_items_item3_h4', 'content_h4', 14, NULL, '04/05/2013', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(16, 2, 'inner', 'N', 'contenu_list_items_item3_texte', 'content_texte', 14, NULL, 'Completely synthesize economically sound relationships vis-a-vis value-added vortals.', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(17, 2, 'inner', 'N', 'contenu_list_items_item3_link', 'link', 14, NULL, 'En savoir plus', NULL, '/app/workspace/equinode/home', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(18, 2, 'inner', 'N', 'contenu_list_items_item4', 'item', 5, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(19, 2, 'inner', 'N', 'contenu_list_items_item4_h4', 'content_h4', 18, NULL, '03/05/2013', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(20, 2, 'inner', 'N', 'contenu_list_items_item4_texte', 'content_texte', 18, NULL, 'Authoritatively impact goal-oriented services for ubiquitous expertise.', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(21, 2, 'inner', 'N', 'contenu_list_items_item4_link', 'link', 18, NULL, 'En savoir plus', NULL, '/app/workspace/equinode/home', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(22, 2, 'inner', 'N', 'contenu_list_items_item5', 'item', 5, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(23, 2, 'inner', 'N', 'contenu_list_items_item5_h4', 'content_h4', 22, NULL, '02/05/2013', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(24, 2, 'inner', 'N', 'contenu_list_items_item5_texte', 'content_texte', 22, NULL, 'Efficiently productize quality functionalities vis-a-vis 24/365 action items.', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(25, 2, 'inner', 'N', 'contenu_list_items_item5_link', 'link', 22, NULL, 'En savoir plus', NULL, '/app/workspace/equinode/home', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(26, 2, 'inner', 'N', 'contenu_list_items_item6', 'item', 5, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(27, 2, 'inner', 'N', 'contenu_list_items_item6_h4', 'content_h4', 26, NULL, '01/05/2013', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(28, 2, 'inner', 'N', 'contenu_list_items_item6_texte', 'content_texte', 26, NULL, 'Uniquely procrastinate diverse communities after interactive solutions.', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(29, 2, 'inner', 'N', 'contenu_list_items_item6_link', 'link', 26, NULL, 'En savoir plus', NULL, '/app/workspace/equinode/home', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(30, 2, 'inner', 'N', 'contenu_list_items_item7', 'item', 5, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(31, 2, 'inner', 'N', 'contenu_list_items_item7_h4', 'content_h4', 31, NULL, '31/04/2013', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(32, 2, 'inner', 'N', 'contenu_list_items_item7_texte', 'content_texte', 31, NULL, 'Collaboratively repurpose reliable outside.', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(33, 2, 'inner', 'N', 'contenu_list_items_item7_link', 'link', 31, NULL, 'En savoir plus', NULL, '/app/workspace/equinode/home', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(37, 2, 'inner', 'N', 'contenu_list_items_item8_link', 'link', 35, NULL, 'En savoir plus', NULL, '/app/workspace/equinode/home', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(36, 2, 'inner', 'N', 'contenu_list_items_item8_texte', 'content_texte', 35, NULL, 'Monotonectally disintermediate seamless sources with bricks-and-clicks infrastructures. ', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(34, 2, 'inner', 'N', 'contenu_list_items_item8', 'item', 5, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(35, 2, 'inner', 'N', 'contenu_list_items_item8_h4', 'content_h4', 35, NULL, '30/04/2013', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(40, 4, 'head', 'N', 'contenu_connexion_h2', 'content_h2', NULL, NULL, 'Connexion', '/app/src/view/img/picto_default.png', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(41, 4, 'inner', 'N', 'form_connexion', 'form', NULL, NULL, 'valeur', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(42, 4, 'inner', 'N', '', 'fieldset', 41, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(43, 4, 'inner', 'N', 'email', 'form_text', 42, 'form-row', NULL, 'Identifiant', NULL, NULL, NULL, 'exemple', 'Y', NULL, NULL, NULL, NULL),
(44, 4, 'inner', 'N', 'password', 'form_password', 42, 'form-row', NULL, 'Mot de passe', NULL, NULL, NULL, '**********', 'Y', NULL, NULL, NULL, NULL),
(45, 4, 'inner', 'N', '', 'form_submit', 42, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(46, 5, 'head', 'N', 'contenu_form_h2', 'content_h2', NULL, NULL, 'Formulaire', '/app/src/view/img/picto_default.png', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(47, 5, 'inner', 'N', '', 'form', NULL, NULL, 'valeur', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(48, 5, 'inner', 'N', '', 'fieldset', 47, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(49, 5, 'inner', 'N', '', 'form_text', 48, 'form-row', NULL, 'Identifiant', NULL, NULL, NULL, 'exemple', 'Y', NULL, NULL, NULL, NULL),
(50, 5, 'inner', 'N', '', 'form_password', 48, 'form-row', NULL, 'Mot de passe', NULL, NULL, NULL, '**********', 'Y', NULL, NULL, NULL, NULL),
(51, 5, 'inner', 'N', '', 'form_submit', 48, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(60, 13, 'head', 'N', 'saisie_h2', 'content_h2', NULL, NULL, 'Saisie de membre', '/app/src/view/img/picto_order.png', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(62, 13, 'inner', 'N', 'saisie_fieldset', 'fieldset', 118, NULL, 'Informations du membre', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(63, 13, 'inner', 'N', 'civility', 'form_radio', 62, 'form-row', '', 'Civilité', NULL, NULL, NULL, NULL, 'Y', NULL, NULL, NULL, NULL),
(64, 13, 'inner', 'N', 'civility_choix1', 'form_radio_input', 63, NULL, 'MME', 'Femme', NULL, NULL, NULL, NULL, NULL, 'Y', NULL, NULL, NULL),
(65, 13, 'inner', 'N', 'civility_choix2', 'form_radio_input', 63, NULL, 'MR', 'Homme', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(66, 13, 'inner', 'N', 'firstname', 'form_text', 62, 'form-row', '', 'Prenom', NULL, NULL, NULL, 'Exemple', 'Y', NULL, NULL, NULL, NULL),
(67, 13, 'inner', 'N', 'lastname', 'form_text', 62, 'form-row', '', 'Nom', NULL, NULL, NULL, 'Exemple', 'Y', NULL, NULL, NULL, NULL),
(68, 13, 'inner', 'N', 'address1', 'form_text', 62, 'form-row', NULL, 'Addresse', NULL, NULL, NULL, '1 (bis) Don-Ville', 'Y', NULL, NULL, NULL, NULL),
(69, 13, 'inner', 'N', 'address2', 'form_text', 62, 'form-row', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(70, 13, 'inner', 'N', 'country', 'form_country', 62, 'form-row', NULL, NULL, NULL, NULL, NULL, NULL, 'Y', NULL, NULL, NULL, NULL),
(71, 13, 'inner', 'N', 'phone', 'form_text', 62, 'form-row', NULL, 'Téléphone', NULL, NULL, NULL, '0606060606', NULL, NULL, NULL, NULL, NULL),
(72, 13, 'inner', 'Y', 'city', 'form_text', 60, 'form-row', NULL, 'Ville', NULL, NULL, NULL, 'Paris', NULL, NULL, NULL, NULL, NULL),
(73, 13, 'inner', 'N', 'email', 'form_text', 62, 'form-row', NULL, 'E-mail', NULL, NULL, NULL, 'exemple@domaine.tld', 'Y', NULL, NULL, NULL, NULL),
(74, 15, 'head', 'N', 'saisie_h2', 'content_h2', NULL, NULL, 'Récapitulatif', '/app/src/view/img/picto_default.png', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(75, 15, 'inner', 'N', 'saisie', 'form', NULL, 'edit', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(76, 15, 'inner', 'N', 'saisie_fieldset', 'fieldset', 75, NULL, 'Informations du membre', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(77, 15, 'inner', 'Y', 'civility', 'form_radio', 76, 'form-row', '', 'Civilité', NULL, NULL, NULL, NULL, 'Y', NULL, NULL, NULL, NULL),
(78, 15, 'inner', 'Y', 'civility_choix1', 'form_radio_input', 77, NULL, 'MME', 'Femme', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(79, 15, 'inner', 'Y', 'civility_choix2', 'form_radio_input', 77, NULL, 'MR', 'Homme', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(80, 15, 'inner', 'Y', 'firstname', 'form_text', 76, 'form-row', '', 'Prenom', NULL, NULL, NULL, NULL, 'Y', NULL, NULL, NULL, NULL),
(81, 15, 'inner', 'Y', 'lastname', 'form_text', 76, 'form-row', '', 'Nom', NULL, NULL, NULL, NULL, 'Y', NULL, NULL, NULL, NULL),
(82, 15, 'inner', 'Y', 'address1', 'form_text', 76, 'form-row', NULL, 'Addresse', NULL, NULL, NULL, NULL, 'Y', NULL, NULL, NULL, NULL),
(83, 15, 'inner', 'Y', 'address2', 'form_text', 76, 'form-row', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(84, 15, 'inner', 'Y', 'country', 'form_country', 76, 'form-row', NULL, NULL, NULL, NULL, NULL, NULL, 'Y', NULL, NULL, NULL, NULL),
(85, 15, 'inner', 'Y', 'phone', 'form_text', 76, 'form-row', NULL, 'Téléphone', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(87, 15, 'inner', 'Y', 'email', 'form_text', 76, 'form-row', NULL, 'E-mail', NULL, NULL, NULL, NULL, 'Y', NULL, NULL, NULL, NULL),
(92, 16, 'head', 'N', 'content_h2_contact', 'content_h2', NULL, NULL, 'Contact', '/app/src/view/img/picto_mail.png', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(93, 16, 'inner', 'N', 'form_contact', 'form', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(94, 16, 'inner', 'N', 'fieldset', 'fieldset', 93, NULL, 'Contacter par e-mail', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(95, 16, 'inner', 'N', 'subject', 'form_text', 94, 'form-row', NULL, 'Objet', NULL, NULL, NULL, 'Objet de prise de contact', 'Y', NULL, NULL, NULL, NULL),
(96, 16, 'inner', 'N', 'email', 'form_text', 94, 'form-row', NULL, 'E-mail', NULL, NULL, NULL, 'exemple@domaine.tld', 'Y', NULL, NULL, NULL, NULL),
(97, 16, 'inner', 'N', 'message', 'form_textarea', 94, 'form-row', NULL, 'Message', NULL, '60', '255', 'Votre message ici.', 'Y', NULL, '8', NULL, NULL),
(98, 16, 'inner', 'N', '', 'form_submit', 94, 'form-row', 'Envoyer', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(128, 2, 'inner', 'N', 'contenu_list_items_item10_texte', 'content_texte', 126, NULL, 'Continually transform business alignments before collaborative e-services.', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(126, 2, 'inner', 'N', 'contenu_list_items_item10', 'item', 5, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(125, 2, 'inner', 'N', 'contenu_list_items_item9_link', 'link', 122, NULL, 'En savoir plus', NULL, '/app/workspace/equinode/home', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(127, 2, 'inner', 'N', 'contenu_list_items_item10_h4', 'content_h4', 126, NULL, '12/03/2013', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(124, 2, 'inner', 'N', 'contenu_list_items_item9_texte', 'content_texte', 122, NULL, 'Dynamically aggregate collaborative architectures without enterprise-wide metrics.', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(123, 2, 'inner', 'N', 'contenu_list_items_item9_h4', 'content_h4', 122, NULL, '15/03/2013', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(122, 2, 'inner', 'N', 'contenu_list_items_item9', 'item', 5, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(118, 13, 'inner', 'N', 'saisie', 'form', NULL, 'edit', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(119, 13, 'inner', 'N', 'photo', 'form_image', 62, 'form-row', 'N', 'Photo', NULL, NULL, NULL, NULL, 'N', NULL, NULL, NULL, NULL),
(120, 13, 'inner', 'N', 'submit', 'form_submit', 62, 'form-row', 'CREER', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(99, 18, 'head', 'N', 'user_profil', 'content_h2', NULL, NULL, 'Profil utilisateur', '/app/src/view/img/picto_user_edit.png', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(129, 2, 'inner', 'N', 'contenu_list_items_item10_link', 'link', 126, NULL, 'En savoir plus', NULL, '/app/workspace/equinode/home', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Structure de la table `equinode_member`
--

CREATE TABLE IF NOT EXISTS `equinode_member` (
  `id_member` int(10) NOT NULL AUTO_INCREMENT,
  `id_md5` varchar(32) DEFAULT '',
  `password` varchar(6) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `civility` varchar(255) DEFAULT NULL,
  `firstname` varchar(255) DEFAULT NULL,
  `lastname` varchar(255) DEFAULT NULL,
  `title` varchar(255) DEFAULT NULL,
  `age` int(10) unsigned DEFAULT NULL,
  `gender` varchar(50) DEFAULT NULL,
  `company` varchar(255) DEFAULT NULL,
  `address1` varchar(100) DEFAULT NULL,
  `address2` varchar(100) DEFAULT NULL,
  `address3` varchar(100) DEFAULT NULL,
  `postalcode` varchar(15) DEFAULT NULL,
  `city` varchar(35) DEFAULT NULL,
  `state` varchar(30) DEFAULT NULL,
  `district` varchar(50) DEFAULT NULL,
  `country` char(2) DEFAULT NULL,
  `fax` varchar(50) DEFAULT NULL,
  `mobile` varchar(50) DEFAULT NULL,
  `phone` varchar(50) DEFAULT NULL,
  `phoneoffice` varchar(50) DEFAULT NULL,
  `other` varchar(50) DEFAULT NULL,
  `category` varchar(80) DEFAULT NULL,
  `type` varchar(80) DEFAULT NULL,
  `status` varchar(80) DEFAULT NULL,
  `language` char(3) DEFAULT NULL,
  `datecreate` datetime DEFAULT NULL,
  `datemodif` datetime DEFAULT NULL,
  `deleted` char(1) NOT NULL DEFAULT '',
  `photo` varchar(255) NOT NULL,
  PRIMARY KEY (`id_member`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=27 ;

--
-- Contenu de la table `equinode_member`
--

INSERT INTO `equinode_member` (`id_member`, `id_md5`, `password`, `email`, `civility`, `firstname`, `lastname`, `title`, `age`, `gender`, `company`, `address1`, `address2`, `address3`, `postalcode`, `city`, `state`, `district`, `country`, `fax`, `mobile`, `phone`, `phoneoffice`, `other`, `category`, `type`, `status`, `language`, `datecreate`, `datemodif`, `deleted`, `photo`) VALUES
(2, '5908175d297f7abf57c2765e5bf159ab', '000000', 'damien.vingrief@gmail.com', 'civility_choix2', 'damien', 'vingrief', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'administrator', NULL, NULL, 'fr', '2013-07-09 16:11:37', '2013-07-27 21:19:08', 'N', ''),
(26, '1b4d5d6f215ac1d9771c9caeb222ea52', '0', 'syncmarker@gmail.com', 'civility_choix2', 'sync', 'marker', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'member', NULL, NULL, 'fr', '2013-07-26 23:57:10', '2013-07-28 01:33:32', 'N', '');

-- --------------------------------------------------------

--
-- Structure de la table `equinode_product`
--

CREATE TABLE IF NOT EXISTS `equinode_product` (
  `id_product` int(10) NOT NULL AUTO_INCREMENT,
  `id_md5` varchar(32) DEFAULT '',
  `title` varchar(255) DEFAULT NULL,
  `description` varchar(255) DEFAULT NULL,
  `description1` varchar(100) DEFAULT NULL,
  `description2` varchar(100) DEFAULT NULL,
  `description3` varchar(100) DEFAULT NULL,
  `other` varchar(50) DEFAULT NULL,
  `category` varchar(80) DEFAULT NULL,
  `type` varchar(80) DEFAULT NULL,
  `status` varchar(80) DEFAULT NULL,
  `language` char(3) DEFAULT NULL,
  `datecreate` datetime DEFAULT NULL,
  `deleted` char(1) NOT NULL DEFAULT '',
  `photo` varchar(255) NOT NULL,
  `data0` varchar(255) NOT NULL,
  `data1` varchar(255) NOT NULL,
  `data2` varchar(255) NOT NULL,
  `data3` varchar(255) NOT NULL,
  `data4` varchar(255) NOT NULL,
  `data5` varchar(255) NOT NULL,
  `data6` varchar(255) NOT NULL,
  `data7` varchar(255) NOT NULL,
  `data8` varchar(255) NOT NULL,
  `data9` varchar(255) NOT NULL,
  PRIMARY KEY (`id_product`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=9 ;

-- --------------------------------------------------------

--
-- Structure de la table `front`
--

CREATE TABLE IF NOT EXISTS `front` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `front_label` varchar(255) DEFAULT NULL,
  `front_disabled` varchar(1) DEFAULT NULL,
  `front_nocache` int(10) DEFAULT NULL,
  `view` varchar(1) DEFAULT NULL,
  `front_users` varchar(255) DEFAULT NULL,
  `title` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=18 ;

--
-- Contenu de la table `front`
--

INSERT INTO `front` (`id`, `front_label`, `front_disabled`, `front_nocache`, `view`, `front_users`, `title`) VALUES
(14, 'test', 'N', NULL, 'N', NULL, 'Page de test'),
(2, 'liste', 'N', NULL, 'Y', NULL, 'Liste simple'),
(3, 'listedesmembres', 'N', NULL, 'Y', 'ADMINISTRATOR;MEMBER', 'Liste de surcharge'),
(4, 'connexion', 'N', NULL, 'Y', NULL, 'Page de Connexion'),
(6, 'home', 'N', NULL, 'Y', NULL, 'Accueil'),
(7, 'deconnexion', 'N', NULL, 'Y', NULL, 'Deconnexion'),
(8, 'listedesoffres', 'N', NULL, 'Y', NULL, 'Liste des offres'),
(9, 'saisiedemembre', 'N', NULL, 'Y', 'ADMINISTRATOR', 'Saisie de membre'),
(10, 'recapitulatif', 'N', NULL, 'Y', 'ADMINISTRATOR', 'Récapitulatif'),
(11, 'contact', 'N', NULL, 'Y', NULL, 'Contact'),
(12, 'elements', 'N', NULL, 'N', 'ADMINISTRATOR', 'Elements'),
(13, 'fichemembre', 'N', NULL, 'N', 'ADMINISTRATOR;MEMBER', 'Profil'),
(15, 'profil', 'N', NULL, 'Y', NULL, 'Offre'),
(16, 'editionoffre', 'N', NULL, 'N', NULL, 'Édition d''offre'),
(17, 'saisieoffre', 'N', NULL, 'Y', 'ADMINISTRATOR', 'Saisie offre');

-- --------------------------------------------------------

--
-- Structure de la table `member`
--

CREATE TABLE IF NOT EXISTS `member` (
  `idmember` int(10) NOT NULL AUTO_INCREMENT,
  `id_md5` varchar(32) DEFAULT '',
  `password` varchar(6) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `civility` varchar(255) DEFAULT NULL,
  `firstname` varchar(255) DEFAULT NULL,
  `lastname` varchar(255) DEFAULT NULL,
  `title` varchar(255) DEFAULT NULL,
  `age` int(10) unsigned DEFAULT NULL,
  `gender` varchar(50) DEFAULT NULL,
  `company` varchar(255) DEFAULT NULL,
  `address1` varchar(100) DEFAULT NULL,
  `address2` varchar(100) DEFAULT NULL,
  `address3` varchar(100) DEFAULT NULL,
  `postalcode` varchar(15) DEFAULT NULL,
  `city` varchar(35) DEFAULT NULL,
  `state` varchar(30) DEFAULT NULL,
  `district` varchar(50) DEFAULT NULL,
  `country` char(2) DEFAULT NULL,
  `fax` varchar(50) DEFAULT NULL,
  `mobile` varchar(50) DEFAULT NULL,
  `phone` varchar(50) DEFAULT NULL,
  `phoneoffice` varchar(50) DEFAULT NULL,
  `other` varchar(50) DEFAULT NULL,
  `category` varchar(80) DEFAULT NULL,
  `type` varchar(80) DEFAULT NULL,
  `status` varchar(80) DEFAULT NULL,
  `language` char(3) DEFAULT NULL,
  `datecreate` datetime DEFAULT NULL,
  `datemodif` datetime DEFAULT NULL,
  `deleted` char(1) NOT NULL DEFAULT '',
  `photo` varchar(255) NOT NULL,
  PRIMARY KEY (`idmember`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=73 ;

--
-- Contenu de la table `member`
--

INSERT INTO `member` (`idmember`, `id_md5`, `password`, `email`, `civility`, `firstname`, `lastname`, `title`, `age`, `gender`, `company`, `address1`, `address2`, `address3`, `postalcode`, `city`, `state`, `district`, `country`, `fax`, `mobile`, `phone`, `phoneoffice`, `other`, `category`, `type`, `status`, `language`, `datecreate`, `datemodif`, `deleted`, `photo`) VALUES
(1, 'a4fab9f5125946fcd3d6f86549b5968e', '000000', 'damien.vingrief@gmail.com', 'MR', 'VINGRIEF', 'Damien', 'WebDesigner', 30, 'M', 'EquiNode', 'rue dela rue', '', '', '2430', 'LUBUMBASHI', 'KATANGA', '12', 'cd', '0991177022', '0909090909', '0997477022', NULL, NULL, 'ADMINISTRATOR', 'test', '', 'FR', '2013-05-08 20:30:00', '2013-09-11 04:09:27', 'N', '/app/workspace/equinode/view/img/member/photo.jpg'),
(2, '530710bcb53a47dc88cd9bf44a68ce2b', '000000', 'lukusa_m@yahoo.fr', 'MR', 'ILUNGA', 'Marcel', '', 32, 'M', 'google', 'rue dela rue 1', '', '', '2430', 'LUBUMBASHI', 'PARIS', NULL, 'cd', NULL, NULL, NULL, NULL, NULL, 'ADMINISTRATOR', NULL, '', 'FR', '2013-05-08 20:30:00', '2013-06-23 02:59:17', 'N', ''),
(3, '11abc9f9f169d93a81f91bca46b64106', '000000', 'eric.kalala@bollore.com', 'MR', 'Eric', 'Kalala', '', 40, 'M', '', 'rue dela rue 3', '', '', '2430', 'LUBUMBASHI', 'LONDRES', NULL, 'cd', NULL, NULL, NULL, NULL, NULL, 'ADMINISTRATOR', NULL, '', 'GB', '2013-05-08 20:30:00', '2013-06-23 03:02:11', 'N', ''),
(4, '4c4ca4238a0b923820dcc509a6f75849', '4C4CA4', NULL, 'MME', 'Leroi2', 'Carole', '', 38, 'F', 'Société générale', 'rue dela rue 3', '', '', '2430', 'LUBUMBASHI', 'LONDRES', NULL, 'cd', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', 'GB', '2013-05-08 20:30:00', '0000-00-00 00:00:00', 'N', ''),
(5, '5c4ca4238a0b923820dcc509a6f75849', '5C4CA4', NULL, 'MR', 'Dupont5', 'Pascal', '', 50, 'M', 'HSBC', 'rue dela rue 5', '', '', '2430', 'LUBUMBASHI', 'NEW YORK', NULL, 'cd', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', '~FR', '2013-05-08 20:30:00', '0000-00-00 00:00:00', 'N', ''),
(6, '6c4ca4238a0b923820dcc509a6f75849', '6C4CA4', 'seb@yahoo.fr', 'MME', 'Dupont5', 'Pauline', '', 48, 'F', 'TNT group', 'rue dela rue 5', '', '', '2430', 'LUBUMBASHI', 'NEW YORK', NULL, 'cd', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', 'FR', '2013-05-08 20:30:00', '2013-06-18 01:25:46', 'N', ''),
(7, '7c4ca4238a0b923820dcc509a6f75849', '7C4CA4', NULL, 'MR', 'Leroi6', 'Pierre', '', 30, 'M', 'KPM', 'rue dela rue 7', '', '', '2430', 'LUBUMBASHI', 'LOS ANGELES', NULL, 'cd', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', 'GB', '2013-05-08 20:30:00', '0000-00-00 00:00:00', 'N', ''),
(8, '8c4ca4238a0b923820dcc509a6f75849', '8C4CA4', NULL, 'MME', 'Leroi6', 'Sandra', '', 28, 'F', 'Universal', 'rue dela rue 7', '', '', '2430', 'LUBUMBASHI', 'LOS ANGELES', NULL, 'cd', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', 'GB', '2013-05-08 20:30:00', '0000-00-00 00:00:00', 'N', ''),
(9, '9c4ca4238a0b923820dcc509a6f75849', '9C4CA4', NULL, 'MR', 'Dupont9', 'Yves', '', 40, 'M', 'Crédit Agricole', 'rue dela rue 9', '', '', '2430', 'LUBUMBASHI', 'PARIS', NULL, 'cd', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', 'FR', '2013-05-08 20:30:00', '0000-00-00 00:00:00', 'N', ''),
(10, '10c4ca4238a0b923820dcc509a6f7584', '10C4CA', NULL, 'MME', 'Dupont9', 'Carole', '', 38, 'F', 'BNP Paribas', 'rue dela rue 9', '', '', '2430', 'LUBUMBASHI', 'PARIS', NULL, 'cd', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', 'FR', '2013-05-08 20:30:00', '0000-00-00 00:00:00', 'N', ''),
(11, '11c4ca4238a0b923820dcc509a6f7584', '11C4CA', NULL, 'MR', 'Leroi10', 'Pascal', '', 50, 'M', 'Fortis', 'rue dela rue 11', '', '', '2430', 'LUBUMBASHI', 'LONDRES', NULL, 'cd', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', 'GB', '2013-05-08 20:30:00', '0000-00-00 00:00:00', 'N', ''),
(12, '12c4ca4238a0b923820dcc509a6f7584', '12C4CA', NULL, 'MME', 'Leroi10', 'Pauline', '', 48, 'F', 'Microsoft', 'rue dela rue 11', '', '', '2430', 'LUBUMBASHI', 'LONDRES', NULL, 'cd', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', 'GB', '2013-05-08 20:30:00', '0000-00-00 00:00:00', 'N', ''),
(13, '13c4ca4238a0b923820dcc509a6f7584', '13C4CA', NULL, 'MR', 'Dupont13', 'Pierre', '', 30, 'M', 'google', 'rue dela rue 13', '', '', '2430', 'LUBUMBASHI', 'NEW YORK', NULL, 'cd', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', '~FR', '2013-05-08 20:30:00', '0000-00-00 00:00:00', 'N', ''),
(14, '14c4ca4238a0b923820dcc509a6f7584', '14C4CA', NULL, 'MME', 'Dupont13', 'Sandra', '', 28, 'F', 'facebook', 'rue dela rue 13', '', '', '2430', 'LUBUMBASHI', 'NEW YORK', NULL, 'cd', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', 'FR', '2013-05-08 20:30:00', '0000-00-00 00:00:00', 'N', ''),
(15, '15c4ca4238a0b923820dcc509a6f7584', '15C4CA', NULL, 'MR', 'Leroi14', 'Yves', '', 40, 'M', 'Société générale', 'rue dela rue 15', '', '', '2430', 'LUBUMBASHI', 'LOS ANGELES', NULL, 'cd', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', 'GB', '2013-05-08 20:30:00', '0000-00-00 00:00:00', 'N', ''),
(16, '16c4ca4238a0b923820dcc509a6f7584', '16C4CA', NULL, 'MME', 'Leroi14', 'Carole', '', 38, 'F', 'HSBC', 'rue dela rue 15', '', '', '2430', 'LUBUMBASHI', 'LOS ANGELES', NULL, 'cd', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', 'GB', '2013-05-08 20:30:00', '0000-00-00 00:00:00', 'N', ''),
(17, '17c4ca4238a0b923820dcc509a6f7584', '17C4CA', NULL, 'MR', 'Dupont17', 'Pascal', '', 50, 'M', 'TNT group', 'rue dela rue 17', '', '', '2430', 'LUBUMBASHI', 'PARIS', NULL, 'cd', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', 'FR', '2013-05-08 20:30:00', '0000-00-00 00:00:00', 'N', ''),
(18, '18c4ca4238a0b923820dcc509a6f7584', '18C4CA', NULL, 'MME', 'Dupont17', 'Pauline', '', 48, 'F', 'KPM', 'rue dela rue 17', '', '', '2430', 'LUBUMBASHI', 'PARIS', NULL, 'cd', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', 'FR', '2013-05-08 20:30:00', '0000-00-00 00:00:00', 'N', ''),
(19, '19c4ca4238a0b923820dcc509a6f7584', '19C4CA', NULL, 'MR', 'Leroi18', 'Pierre', '', 30, 'M', 'Universal', 'rue dela rue 19', '', '', '2430', 'LUBUMBASHI', 'LONDRES', NULL, 'cd', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', 'GB', '2013-05-08 20:30:00', '2013-06-17 11:26:28', 'Y', ''),
(20, '20c4ca4238a0b923820dcc509a6f7584', '20C4CA', NULL, 'MME', 'Leroi18', 'Sandra', '', 28, 'F', 'Crédit Agricole', 'rue dela rue 19', '', '', '2430', 'LUBUMBASHI', 'LONDRES', NULL, 'cd', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', 'GB', '2013-05-08 20:30:00', '0000-00-00 00:00:00', 'N', ''),
(21, '21c4ca4238a0b923820dcc509a6f7584', '21C4CA', NULL, 'MR', 'Dupont21', 'Yves', '', 40, 'M', 'BNP Paribas', 'rue dela rue 21', '', '', '2430', 'LUBUMBASHI', 'NEW YORK', NULL, 'cd', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', '~FR', '2013-05-08 20:30:00', '0000-00-00 00:00:00', 'N', ''),
(22, '22c4ca4238a0b923820dcc509a6f7584', '22C4CA', NULL, 'MME', 'Dupont21', 'Carole', '', 38, 'F', 'Fortis', 'rue dela rue 21', '', '', '2430', 'LUBUMBASHI', 'NEW YORK', NULL, 'cd', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', 'FR', '2013-05-08 20:30:00', '0000-00-00 00:00:00', 'N', ''),
(23, '23c4ca4238a0b923820dcc509a6f7584', '23C4CA', NULL, 'MR', 'Leroi22', 'Pascal', '', 50, 'M', 'Microsoft', 'rue dela rue 23', '', '', '2430', 'LUBUMBASHI', 'LOS ANGELES', NULL, 'cd', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', 'GB', '2013-05-08 20:30:00', '0000-00-00 00:00:00', 'N', ''),
(24, '24c4ca4238a0b923820dcc509a6f7584', '24C4CA', NULL, 'MME', 'Leroi22', 'Pauline', '', 48, 'F', 'google', 'rue dela rue 23', '', '', '2430', 'LUBUMBASHI', 'LOS ANGELES', NULL, 'cd', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', 'GB', '2013-05-08 20:30:00', '0000-00-00 00:00:00', 'N', ''),
(25, '25c4ca4238a0b923820dcc509a6f7584', '25C4CA', NULL, 'MR', 'Dupont25', 'Pierre', '', 30, 'M', 'facebook', 'rue dela rue 25', '', '', '75015', 'PARIS', 'PARIS', NULL, 'Fr', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', 'FR', '2013-05-08 20:30:00', '0000-00-00 00:00:00', 'N', ''),
(26, '26c4ca4238a0b923820dcc509a6f7584', '26C4CA', NULL, 'MME', 'Dupont25', 'Sandra', '', 28, 'F', 'Société générale', 'rue dela rue 25', '', '', '75000', 'PARIS', 'PARIS', NULL, 'fr', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', 'FR', '2013-05-08 20:30:00', '0000-00-00 00:00:00', 'N', ''),
(27, '27c4ca4238a0b923820dcc509a6f7584', '27C4CA', NULL, 'MR', 'Leroi26', 'Yves', '', 40, 'M', 'HSBC', 'rue dela rue 27', '', '', '75000', 'PARIS', 'LONDRES', NULL, 'fr', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', 'GB', '2013-05-08 20:30:00', '0000-00-00 00:00:00', 'N', ''),
(28, '28c4ca4238a0b923820dcc509a6f7584', '28C4CA', NULL, 'MME', 'Leroi26', 'Carole', '', 38, 'F', 'TNT group', 'rue dela rue 27', '', '', '75000', 'PARIS', 'LONDRES', NULL, 'fr', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', 'GB', '2013-05-08 20:30:00', '0000-00-00 00:00:00', 'N', ''),
(29, '29c4ca4238a0b923820dcc509a6f7584', '29C4CA', NULL, 'MR', 'Dupont29', 'Pascal', '', 50, 'M', 'KPM', 'rue dela rue 29', '', '', '75000', 'PARIS', 'NEW YORK', NULL, 'fr', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', '~FR', '2013-05-08 20:30:00', '0000-00-00 00:00:00', 'N', ''),
(30, '30c4ca4238a0b923820dcc509a6f7584', '30C4CA', NULL, 'MME', 'Dupont29', 'Pauline', '', 48, 'F', 'Universal', 'rue dela rue 29', '', '', '75000', 'PARIS', 'NEW YORK', NULL, 'fr', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', 'FR', '2013-05-08 20:30:00', '0000-00-00 00:00:00', 'N', ''),
(31, '31c4ca4238a0b923820dcc509a6f7584', '31C4CA', NULL, 'MR', 'Leroi30', 'Pierre', '', 30, 'M', 'Crédit Agricole', 'rue dela rue 31', '', '', '75000', 'PARIS', 'LOS ANGELES', NULL, 'fr', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', 'GB', '2013-05-08 20:30:00', '0000-00-00 00:00:00', 'N', ''),
(32, '32c4ca4238a0b923820dcc509a6f7584', '32C4CA', NULL, 'MME', 'Leroi30', 'Sandra', '', 28, 'F', 'BNP Paribas', 'rue dela rue 31', '', '', '75000', 'PARIS', 'LOS ANGELES', NULL, 'fr', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', 'GB', '2013-05-08 20:30:00', '0000-00-00 00:00:00', 'N', ''),
(33, '33c4ca4238a0b923820dcc509a6f7584', '33C4CA', NULL, 'MR', 'Dupont33', 'Yves', '', 40, 'M', 'Fortis', 'rue dela rue 33', '', '', '75000', 'PARIS', 'PARIS', NULL, 'fr', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', 'FR', '2013-05-08 20:30:00', '0000-00-00 00:00:00', 'N', ''),
(34, '34c4ca4238a0b923820dcc509a6f7584', '34C4CA', NULL, 'MME', 'Dupont33', 'Carole', '', 38, 'F', 'Microsoft', 'rue dela rue 33', '', '', '75000', 'PARIS', 'PARIS', NULL, 'fr', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', 'FR', '2013-05-08 20:30:00', '0000-00-00 00:00:00', 'N', ''),
(35, '35c4ca4238a0b923820dcc509a6f7584', '35C4CA', NULL, 'MR', 'Leroi34', 'Pascal', '', 50, 'M', 'google', 'rue dela rue 35', '', '', '75000', 'PARIS', 'LONDRES', NULL, 'fr', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', 'GB', '2013-05-08 20:30:00', '0000-00-00 00:00:00', 'N', ''),
(36, '36c4ca4238a0b923820dcc509a6f7584', '36C4CA', NULL, 'MME', 'Leroi34', 'Pauline', '', 48, 'F', 'facebook', 'rue dela rue 35', '', '', '75000', 'PARIS', 'LONDRES', NULL, 'fr', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', 'GB', '2013-05-08 20:30:00', '0000-00-00 00:00:00', 'N', ''),
(37, '37c4ca4238a0b923820dcc509a6f7584', '37C4CA', NULL, 'MR', 'Dupont37', 'Pierre', '', 30, 'M', 'Société générale', 'rue dela rue 37', '', '', '75000', 'PARIS', 'NEW YORK', NULL, 'fr', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', '~FR', '2013-05-08 20:30:00', '0000-00-00 00:00:00', 'N', ''),
(38, '38c4ca4238a0b923820dcc509a6f7584', '38C4CA', NULL, 'MME', 'Dupont37', 'Sandra', '', 28, 'F', 'HSBC', 'rue dela rue 37', '', '', '75000', 'PARIS', 'NEW YORK', NULL, 'fr', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', 'FR', '2013-05-08 20:30:00', '0000-00-00 00:00:00', 'N', ''),
(39, '39c4ca4238a0b923820dcc509a6f7584', '39C4CA', NULL, 'MR', 'Leroi38', 'Yves', '', 40, 'M', 'TNT group', 'rue dela rue 39', '', '', '75000', 'PARIS', 'LOS ANGELES', NULL, 'fr', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', 'GB', '2013-05-08 20:30:00', '0000-00-00 00:00:00', 'N', ''),
(40, '40c4ca4238a0b923820dcc509a6f7584', '40C4CA', NULL, 'MME', 'Leroi38', 'Carole', '', 38, 'F', 'KPM', 'rue dela rue 39', '', '', '75000', 'PARIS', 'LOS ANGELES', NULL, 'fr', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', 'GB', '2013-05-08 20:30:00', '0000-00-00 00:00:00', 'N', ''),
(41, '41c4ca4238a0b923820dcc509a6f7584', '41C4CA', NULL, 'MR', 'Dupont41', 'Pascal', '', 50, 'M', 'Universal', 'rue dela rue 41', '', '', '75000', 'PARIS', 'PARIS', NULL, 'fr', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', 'FR', '2013-05-08 20:30:00', '0000-00-00 00:00:00', 'N', ''),
(42, '42c4ca4238a0b923820dcc509a6f7584', '42C4CA', NULL, 'MME', 'Dupont41', 'Pauline', '', 48, 'F', 'Crédit Agricole', 'rue dela rue 41', '', '', '75000', 'PARIS', 'PARIS', NULL, 'fr', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', 'FR', '2013-05-08 20:30:00', '0000-00-00 00:00:00', 'N', ''),
(43, '43c4ca4238a0b923820dcc509a6f7584', '43C4CA', NULL, 'MR', 'Leroi42', 'Pierre', '', 30, 'M', 'BNP Paribas', 'rue dela rue 43', '', '', '75000', 'PARIS', 'LONDRES', NULL, 'fr', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', 'GB', '2013-05-08 20:30:00', '0000-00-00 00:00:00', 'N', ''),
(44, '44c4ca4238a0b923820dcc509a6f7584', '44C4CA', NULL, 'MME', 'Leroi42', 'Sandra', '', 28, 'F', 'Fortis', 'rue dela rue 43', '', '', '75000', 'PARIS', 'LONDRES', NULL, 'fr', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', 'GB', '2013-05-08 20:30:00', '0000-00-00 00:00:00', 'N', ''),
(45, '45c4ca4238a0b923820dcc509a6f7584', '45C4CA', NULL, 'MR', 'Dupont45', 'Yves', '', 40, 'M', 'Microsoft', 'rue dela rue 45', '', '', '75000', 'PARIS', 'NEW YORK', NULL, 'fr', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', '~FR', '2013-05-08 20:30:00', '0000-00-00 00:00:00', 'N', ''),
(46, '46c4ca4238a0b923820dcc509a6f7584', '46C4CA', NULL, 'MME', 'Dupont45', 'Carole', '', 38, 'F', 'google', 'rue dela rue 45', '', '', '75000', 'PARIS', 'NEW YORK', NULL, 'fr', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', 'FR', '2013-05-08 20:30:00', '0000-00-00 00:00:00', 'N', ''),
(47, '47c4ca4238a0b923820dcc509a6f7584', '47C4CA', NULL, 'MR', 'Leroi46', 'Pascal', '', 50, 'M', 'facebook', 'rue dela rue 47', '', '', '75000', 'PARIS', 'LOS ANGELES', NULL, 'fr', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', 'GB', '2013-05-08 20:30:00', '0000-00-00 00:00:00', 'N', ''),
(48, '48c4ca4238a0b923820dcc509a6f7584', '48C4CA', NULL, 'MME', 'Leroi46', 'Pauline', '', 48, 'F', 'Société générale', 'rue dela rue 47', '', '', '75000', 'PARIS', 'LOS ANGELES', NULL, 'fr', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', 'GB', '2013-05-08 20:30:00', '0000-00-00 00:00:00', 'N', ''),
(49, '49c4ca4238a0b923820dcc509a6f7584', '49C4CA', NULL, 'MR', 'Dupont49', 'Pierre', '', 18, 'M', 'HSBC', 'rue dela rue 49', '', '', '75000', 'PARIS', 'PARIS', NULL, 'fr', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', 'FR', '2013-05-08 20:30:00', '0000-00-00 00:00:00', 'N', ''),
(50, '50c4ca4238a0b923820dcc509a6f7584', '50C4CA', NULL, 'MME', 'Dupont50', 'Sandra', '', 18, 'F', 'TNT group', 'rue dela rue 49', '', '', '75015', 'PARIS', 'PARIS', NULL, 'Fr', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', 'FR', '2013-05-08 20:30:00', '0000-00-00 00:00:00', 'N', ''),
(52, 'b25f4849e45dc902fb30416e393d7ef5', 'XDX5PW', 'damdam@gmail.com', 'F', 'DAMDAM', 'VINGRIEFAGAIN', NULL, NULL, NULL, NULL, 'RUE DE LA RUE', 'ZONE INDUSTIELLE', NULL, '444719', 'LONDRES', NULL, NULL, 'gb', NULL, NULL, '092637281920', NULL, NULL, NULL, NULL, NULL, 'FR', '2013-05-08 20:30:00', '0000-00-00 00:00:00', 'N', ''),
(53, 'd81d1672d5d9d4db151fd5eff9670c7b', '66PP2X', 'lukusa_i@yahoo.fr', 'F', 'YVES', 'BERTRAND', NULL, NULL, NULL, NULL, 'rue de la rue', NULL, NULL, '444719', 'LONDRES', NULL, NULL, 'gb', NULL, NULL, '876535732735', NULL, NULL, NULL, NULL, NULL, 'FR', '2013-05-08 20:30:00', '0000-00-00 00:00:00', 'N', ''),
(54, '3efd639388f6de8b6839d8f43489017f', '2SZ3Z7', 'test@test.fr', 'F', 'test', 'test', NULL, NULL, NULL, NULL, 'test', NULL, NULL, '444719', 'LONDRES', NULL, NULL, 'gb', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'FR', '2013-05-08 20:30:00', '0000-00-00 00:00:00', 'N', ''),
(55, 'a1d705b80f246b63b81b0e4ece2a4c25', 'GLZRGL', 'SANCHERZ@YAHOO;COM', 'F', 'HUGUO', 'SANCHEZ', NULL, NULL, NULL, NULL, 'BXL', NULL, NULL, '444719', 'LONDRES', NULL, NULL, 'gb', NULL, NULL, '0123242424', NULL, NULL, NULL, NULL, NULL, 'FR', '2013-05-08 20:30:00', '0000-00-00 00:00:00', 'N', ''),
(56, 'f71e8491b626e7f20747d09984844384', 'GLT7KM', 'test@test.fr', 'H', 'Charles', 'Henry', NULL, NULL, NULL, NULL, 'rue de la rue', NULL, NULL, '444719', 'LONDRES', NULL, NULL, 'gb', NULL, NULL, '0606060606', NULL, NULL, NULL, NULL, NULL, 'FR', '2013-05-08 20:30:00', '0000-00-00 00:00:00', 'N', ''),
(57, 'd63914093123e895dcafb71763188c36', 'LGCV55', 'test2@test2.fr', 'F', 'albert', 'einstein', NULL, NULL, NULL, NULL, 'rue de la rue', NULL, NULL, '444719', 'LONDRES', NULL, NULL, 'gb', NULL, NULL, '0909090909', NULL, NULL, NULL, NULL, NULL, 'FR', '2013-05-08 20:30:00', '0000-00-00 00:00:00', 'N', ''),
(58, '99c5f3656c57f2e9ee41fb2368355b59', 'SHEKPE', 'test2@test2.fr', 'F', 'albert', 'einstein', NULL, NULL, NULL, NULL, 'rue de la rue', NULL, NULL, '444719', 'LONDRES', NULL, NULL, 'gb', NULL, NULL, '0909090909', NULL, NULL, NULL, NULL, NULL, 'FR', '2013-05-08 20:30:00', '0000-00-00 00:00:00', 'N', ''),
(59, '78bac97e5e58f671c93b0ba1d897efc1', 'RYXDF2', 'test3@test3.fr', 'F', 'david', 'bowie', NULL, NULL, NULL, NULL, 'rue de la rue', NULL, NULL, '444719', 'LONDRES', NULL, NULL, 'gb', NULL, NULL, '0909090909', NULL, NULL, NULL, NULL, NULL, 'FR', '2013-05-08 20:30:00', '0000-00-00 00:00:00', 'N', ''),
(60, '044a52590b08930415564bcb9ff9b1a8', 'GY7GV3', 'damien.vingrief@gmail.com', 'F', 'VINGRIEF', 'Damien', NULL, NULL, NULL, NULL, 'rue dela rue 1', NULL, NULL, '444719', 'LONDRES', NULL, NULL, 'gb', NULL, NULL, '0606060606', NULL, NULL, NULL, NULL, NULL, 'FR', '2013-05-08 20:30:00', '2013-06-22 11:50:53', 'Y', ''),
(61, 'a179fcd0c31f8fafb09034aac5cd081a', 'TW8559', 'damien.vingrief@gmail.com', 'MR', 'VINGRIEF', 'Damien', NULL, NULL, NULL, NULL, 'rue dela rue 1', NULL, NULL, '444719', 'LONDRES', NULL, NULL, 'gb', NULL, NULL, '0606060606', NULL, NULL, NULL, NULL, NULL, 'FR', '2013-05-08 20:30:00', '2013-06-22 11:51:05', 'Y', ''),
(62, '3eab1e865690623989cf7c9a5c362435', 'K5GN8H', 'damien.vingrief@gmail.com', 'MR', 'VINGRIEF', 'Damien', NULL, NULL, NULL, NULL, 'rue dela rue 1', NULL, NULL, '444719', 'LONDRES', NULL, NULL, 'gb', NULL, NULL, '0606060606', NULL, NULL, NULL, NULL, NULL, 'FR', '2013-05-08 20:30:00', '2013-06-22 11:51:16', 'Y', ''),
(63, '1137fb9f5f024fcb972be140d0a29b8b', '749T78', 'test4@test4.fr', 'MME', 'Mona', 'Lisa', NULL, NULL, NULL, NULL, 'Louvre-Rivoli', NULL, NULL, '444719', 'LONDRES', NULL, NULL, 'gb', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'FR', '2013-05-08 20:30:00', NULL, 'N', ''),
(64, 'ff403651ae47b2701f55ce6919a23107', '7PKMUE', 'test5@test5.fr', 'MME', 'jean', 'edouard', NULL, NULL, NULL, NULL, 'rue de la rue', NULL, NULL, '444719', 'LONDRES', NULL, NULL, 'gb', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'FR', '2013-05-08 20:30:00', NULL, 'N', ''),
(65, '5108096500995ad799f8c2c1bba25dd1', 'JJEM8W', 'test5@test5.fr', 'MME', 'jean', 'edouard', NULL, NULL, NULL, NULL, 'rue de la rue', NULL, NULL, '444719', 'LONDRES', NULL, NULL, 'gb', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'FR', '2013-05-08 20:30:00', NULL, 'N', ''),
(66, '8cd099af24d51a6308eacdbff9eb03cd', '8MESKS', 'test5@test5.fr', 'MME', 'jean', 'edouard', NULL, NULL, NULL, NULL, 'rue de la rue', NULL, NULL, '444719', 'LONDRES', NULL, NULL, 'gb', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'FR', '2013-05-08 20:30:00', NULL, 'N', ''),
(67, 'ecd7dfa415c7d56ec4f28c072344e272', 'HXW8EV', 'nkninba@gmail.com', 'MME', 'Nouass', 'Kninba', NULL, NULL, NULL, NULL, 'rue de la rue', NULL, NULL, '444719', 'LONDRES', NULL, NULL, 'gb', NULL, NULL, '0112121212', NULL, NULL, NULL, NULL, NULL, 'FR', '2013-05-08 20:30:00', '2013-06-22 03:17:22', 'Y', ''),
(68, '00e679771e7de61ee9ed81485edafbf5', 'EUHCFD', 'seb@yahoo.fr', 'MME', 'Seb', 'Col', NULL, NULL, NULL, NULL, 'rue de la rue', NULL, NULL, '444719', 'LONDRES', NULL, NULL, 'gb', NULL, NULL, '011212121212', NULL, NULL, NULL, NULL, NULL, 'FR', '2013-05-08 20:30:00', '2013-06-18 01:23:15', 'Y', ''),
(69, '5a8ee4e65683bbe9542ae70333381dbc', 'PKJMVZ', 'test6@test6.fr', 'MME', 'Paulo', 'alberto', NULL, NULL, NULL, NULL, '1 rue de la rue', NULL, NULL, '444719', 'LONDRES', NULL, NULL, 'gb', NULL, NULL, NULL, NULL, NULL, 'MEMBER', NULL, NULL, 'FR', '2013-05-08 20:30:00', '2013-06-18 01:21:53', 'Y', ''),
(70, '7c1e380b42813838532453d7f7f6c42d', 'JUE9Y5', 'exemple@domaine.tld', 'MME', 'Exemple', 'Exemple', NULL, NULL, NULL, NULL, '1 (bis) Don-Ville', NULL, NULL, '444719', 'LONDRES', NULL, NULL, 'gb', NULL, NULL, '0606060606', NULL, NULL, 'MEMBER', NULL, NULL, 'FR', '2013-05-08 20:30:00', '2013-06-22 22:59:09', 'Y', ''),
(71, 'b6991bbac81a18b981c29823197207a9', 'RJSVDU', 'exemple@domaine.tld', 'MME', 'Exemple', 'Exemple', NULL, NULL, NULL, NULL, '1 (bis) Don-Ville', NULL, NULL, '444719', 'LONDRES', 'Exemple', 'Ile-de-France', 'gb', NULL, NULL, '0606060606', NULL, NULL, 'MEMBER', NULL, NULL, 'FR', '2013-05-08 20:30:00', '2013-06-22 23:01:04', 'N', ''),
(72, '9554e63581f6b5b700e8e35256ff61a8', '2GD8WE', 'qscqsc@zefzfez.fr', 'MME', 'qsc', 'qsc', NULL, NULL, NULL, NULL, 'jjj', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'MEMBER', NULL, NULL, 'FR', '2013-06-29 12:29:16', '2013-06-29 12:29:32', 'Y', '');

-- --------------------------------------------------------

--
-- Structure de la table `menu`
--

CREATE TABLE IF NOT EXISTS `menu` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `element_disabled` varchar(1) DEFAULT NULL,
  `element_label` varchar(80) NOT NULL,
  `type` varchar(80) DEFAULT NULL,
  `users` varchar(255) NOT NULL,
  `element_parent` int(10) DEFAULT NULL,
  `element_lvl` varchar(1) NOT NULL,
  `element_class` varchar(80) DEFAULT NULL,
  `title` varchar(80) NOT NULL,
  `value` varchar(255) DEFAULT NULL,
  `data0` varchar(255) DEFAULT NULL,
  `data1` varchar(255) DEFAULT NULL,
  `data2` varchar(255) DEFAULT NULL,
  `data3` varchar(255) DEFAULT NULL,
  `data4` varchar(255) DEFAULT NULL,
  `data5` varchar(255) DEFAULT NULL,
  `data6` varchar(255) DEFAULT NULL,
  `data7` varchar(255) DEFAULT NULL,
  `data8` varchar(255) DEFAULT NULL,
  `data9` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `type` (`type`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=8 ;

--
-- Contenu de la table `menu`
--

INSERT INTO `menu` (`id`, `element_disabled`, `element_label`, `type`, `users`, `element_parent`, `element_lvl`, `element_class`, `title`, `value`, `data0`, `data1`, `data2`, `data3`, `data4`, `data5`, `data6`, `data7`, `data8`, `data9`) VALUES
(1, 'N', 'home', 'link', '', 0, '1', 'left btn2 menu_link menu_home', 'Accueil', '', NULL, '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(2, 'N', 'connexion', 'link', '', 3, '1', 'left btn2 menu_link menu_connexion', 'Connexion', '', NULL, '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(3, 'N', 'contact', 'link', '', 4, '1', 'left btn2 menu_link menu_contact', 'Contact', '', NULL, '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(4, 'N', 'liste-des-membres', 'link', 'ADMINISTRATOR;MEMBER', 6, '1', 'left btn2 menu_link menu_list', 'Liste des membres', '', NULL, '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(5, 'N', 'saisie-de-membre', 'link', 'ADMINISTRATOR', 4, '2', 'left btn2 menu_link menu_inscription', 'Saisie membre', '', NULL, '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(6, 'N', 'liste-des-offres', 'link', '', 1, '1', 'left btn2 menu_link menu_list', 'Liste des offres', '', NULL, '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(7, 'N', 'saisie-offre', 'link', 'ADMINISTRATOR', 6, '2', 'left btn2 menu_link menu_inscription', 'Saisie offre', '', NULL, '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Structure de la table `product`
--

CREATE TABLE IF NOT EXISTS `product` (
  `idproduct` int(10) NOT NULL AUTO_INCREMENT,
  `id_md5` varchar(32) DEFAULT '',
  `title` varchar(255) DEFAULT NULL,
  `description` varchar(255) DEFAULT NULL,
  `description1` varchar(100) DEFAULT NULL,
  `description2` varchar(100) DEFAULT NULL,
  `description3` varchar(100) DEFAULT NULL,
  `other` varchar(50) DEFAULT NULL,
  `category` varchar(80) DEFAULT NULL,
  `type` varchar(80) DEFAULT NULL,
  `status` varchar(80) DEFAULT NULL,
  `language` varchar(80) DEFAULT NULL,
  `datecreate` datetime DEFAULT NULL,
  `datemodif` datetime NOT NULL,
  `datepublished` datetime NOT NULL,
  `published` varchar(1) NOT NULL,
  `deleted` char(1) NOT NULL DEFAULT '',
  `lieu` varchar(255) NOT NULL,
  `nature` varchar(255) NOT NULL,
  `experience` varchar(255) NOT NULL,
  `formation` varchar(255) NOT NULL,
  `domaine` varchar(255) NOT NULL,
  `secteur` varchar(255) NOT NULL,
  `permis` varchar(255) NOT NULL,
  `bureautique` varchar(255) NOT NULL,
  `qualification` varchar(255) NOT NULL,
  `salaire` varchar(255) NOT NULL,
  `photo` varchar(255) NOT NULL,
  `data0` varchar(255) NOT NULL,
  `data1` varchar(255) NOT NULL,
  `data2` varchar(255) NOT NULL,
  `data3` varchar(255) NOT NULL,
  `data4` varchar(255) NOT NULL,
  `data5` varchar(255) NOT NULL,
  `data6` varchar(255) NOT NULL,
  `data7` varchar(255) NOT NULL,
  `data8` varchar(255) NOT NULL,
  `data9` varchar(255) NOT NULL,
  PRIMARY KEY (`idproduct`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=10 ;

--
-- Contenu de la table `product`
--

INSERT INTO `product` (`idproduct`, `id_md5`, `title`, `description`, `description1`, `description2`, `description3`, `other`, `category`, `type`, `status`, `language`, `datecreate`, `datemodif`, `datepublished`, `published`, `deleted`, `lieu`, `nature`, `experience`, `formation`, `domaine`, `secteur`, `permis`, `bureautique`, `qualification`, `salaire`, `photo`, `data0`, `data1`, `data2`, `data3`, `data4`, `data5`, `data6`, `data7`, `data8`, `data9`) VALUES
(1, '02a952cbe20436c1cdeff0971da42d78', 'Webdesignerrrr', 'Monotonectally cultivate e-business value for quality "outside the box" thinking.', '4 ans d''expérience', NULL, NULL, NULL, 'Informatique', 'CDI', NULL, 'FR', '2013-05-18 00:00:00', '2013-07-18 15:04:19', '2013-06-24 13:11:23', 'Y', 'N', 'PACA', 'tout public', '4 ans', 'Bac+2, BTS', 'Informatique', '', 'A, B', 'suite adobe, office', '', '40000', '', 'Phosfluorescently formulate team driven leadership with wireless channels. \r\n\r\n\r\nCollaboratively revolutionize cross-media methods of empowerment through scalable alignments.', 'Proactively maximize state of the art opportunities through goal-oriented value. Uniquely myocardinate transparent infomediaries rather than 24/365 ROI.\r\n\r\nProactively maximize state of the art.', 'Intrinsicly promote clicks-and-mortar e-business and go forward portals. Holisticly administrate effective metrics before standardized infomediaries. Efficiently simplify accurate.', '', '', '', '', '', '', ''),
(2, 'arztsgsqhjhsxjdjdks', 'Ingenieur etudes r&amp;d (h/f)', 'Contrat : CDI', 'Expérience : Expérimenté', 'Localisation : Vincennes (94) (94300)', 'Fonction : Autres fonctions de la fabrication / production', 'Secteur : Luxe / Mode / Sport / Optique / Beauté', NULL, 'CDD', NULL, 'francais,anglais', '2013-05-18 00:00:00', '2013-06-23 20:37:53', '2013-06-23 20:37:53', 'Y', 'N', 'Aquitaine2', '', '2 à 5 ans', 'bac+5', 'Jurisprudence', 'Droit', 'A', '', '', '', '', 'Objectively brand virtual core competencies and distributed meta-services. Efficiently procrastinate prospective solutions through cooperative sources. Completely matrix vertical internal.', 'Objectively brand virtual core competencies and distributed meta-services. Efficiently procrastinate prospective solutions through cooperative sources. Completely matrix vertical internal.', 'Objectively brand virtual core competencies and distributed meta-services. Efficiently procrastinate prospective solutions through cooperative sources. Completely matrix vertical internal.', '', '', '', '', '', '', ''),
(3, 'arztssdfdgdhfjsksqqlzo', 'Architecture / Ingénierie et services associés', 'Contrat : CDI', 'Services administratifs et généraux', 'Banques / Organismes financiers', 'Le poste est basé à : LUBUMBASHI. Une mobilité est requise. ', 'Rattaché(e) au Directeur Administratif et Financie', NULL, NULL, NULL, NULL, '2013-05-20 00:00:00', '2013-06-22 04:09:37', '0000-00-00 00:00:00', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(4, 'adfgsteyzuisjdkflsmdmù', 'technicien sav machines', 'Poste : CDD Temps plein', 'Secteur d''activité : grande distribution/commerce de gros', 'Region : Katanga', 'Autres fonctions de la fabrication / production', '', NULL, NULL, NULL, NULL, '2013-05-22 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(5, 'arztqsdfghjjkllmmùù', 'AIDE CONDUCTEUR(TRICE) TRAVAUX VRD', 'Contrat : CDI', 'Expérience : Expérimenté', 'Localisation : LIKASI', 'Fonction : Autres fonctions de la fabrication / production', '- Prenez en charge la préparation du chantier au p', NULL, NULL, NULL, NULL, '2013-05-24 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(6, 'arzcdvkfvdddhfjsksqqlzo', 'Developpeur application logistique', 'Contrat : CDI', 'Grande distribution, logistique', 'Agro alimentaire', 'Le poste est basé à : LUBUMBASHI. Une mobilité est requise. ', '', NULL, NULL, NULL, NULL, '2013-05-25 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(7, 'ab4f63f9ac65152575886860dde480a1', 'Assistante de direction', 'Poste : CDD Temps plein', 'Secteur d''activité : mining', 'Region : Katanga', 'Fort interessement exigé', '', NULL, 'jhvljhv', NULL, NULL, '2013-05-25 00:00:00', '2013-06-22 03:51:41', '2013-06-22 03:51:41', 'Y', 'N', 'dajabd', 'ljvlvhv', '', '', '', '', '', '', '', '', '', 'jhvvh', '', '', '', '', '', '', '', '', ''),
(8, 'arztqsdfghjjksdsdsd', 'CHAUFFEUR POIDS LOURD', 'Contrat : CDI', 'Expérience : Expérimenté', 'Localisation : LIKASI', '', '', NULL, 'CDD', NULL, NULL, '2013-05-25 00:00:00', '2013-06-22 21:39:29', '2013-06-22 21:39:29', 'Y', 'N', 'Paris', '', '3 ans', 'bac', 'Civil', 'Transport', 'B', '', 'Salarié', 'selon profil', '', 'Compellingly redefine mission-critical e-markets through team driven processes. Credibly simplify enterprise architectures for goal-oriented total linkage. Phosfluorescently leverage existing.', 'Compellingly redefine mission-critical e-markets through team driven processes. Credibly simplify enterprise architectures for goal-oriented total linkage. Phosfluorescently leverage existing.', 'Compellingly redefine mission-critical e-markets through team driven processes. Credibly simplify enterprise architectures for goal-oriented total linkage. Phosfluorescently leverage existing.', '', '', '', '', '', '', ''),
(9, '1b54b0f5ea6a673dae0ffd0b137170c6', 'test', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2013-06-23 03:37:49', '2013-06-23 03:37:49', '0000-00-00 00:00:00', 'N', 'N', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '');

-- --------------------------------------------------------

--
-- Structure de la table `region`
--

CREATE TABLE IF NOT EXISTS `region` (
  `id_region` tinyint(4) NOT NULL AUTO_INCREMENT,
  `region` varchar(50) NOT NULL DEFAULT '',
  PRIMARY KEY (`id_region`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=23 ;

--
-- Contenu de la table `region`
--

INSERT INTO `region` (`id_region`, `region`) VALUES
(1, 'Alsace'),
(2, 'Aquitaine'),
(3, 'Auvergne'),
(4, 'Basse-Normandie'),
(5, 'Bourgogne'),
(6, 'Bretagne'),
(7, 'Centre'),
(8, 'Champagne'),
(9, 'Corse'),
(10, 'Franche-Comté'),
(11, 'Haute-Normandie'),
(12, 'Île-de-France'),
(13, 'Languedoc-Roussillon'),
(14, 'Limousin'),
(15, 'Lorraine'),
(16, 'Midi-Pyrénées'),
(17, 'Nord-pas-de-Calais'),
(18, 'Pays de la Loire'),
(19, 'Picardie'),
(20, 'Poitou-Charentes'),
(21, 'Provence-Alpes-Côte-d''Azur'),
(22, 'Rhône-Alpes');

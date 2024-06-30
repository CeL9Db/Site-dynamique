-- phpMyAdmin SQL Dump
-- version 4.2.7.1
-- http://www.phpmyadmin.net
--
-- Client :  localhost
-- Généré le :  Lun 06 Mai 2024 à 20:43
-- Version du serveur :  5.6.20-log
-- Version de PHP :  5.5.15

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de données :  `register`
--

-- --------------------------------------------------------

--
-- Structure de la table `a_pour_commande`
--

CREATE TABLE IF NOT EXISTS `a_pour_commande` (
  `id_produit` int(11) NOT NULL,
  `id_commande` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Structure de la table `a_pour_createur`
--

CREATE TABLE IF NOT EXISTS `a_pour_createur` (
  `id_createur` int(11) NOT NULL,
  `id_produit` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Structure de la table `a_pour_fournisseur`
--

CREATE TABLE IF NOT EXISTS `a_pour_fournisseur` (
  `id_fourn` int(11) NOT NULL,
  `id_produit` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Structure de la table `a_pour_type`
--

CREATE TABLE IF NOT EXISTS `a_pour_type` (
  `id_type` int(11) NOT NULL,
  `id_produit` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Structure de la table `clients`
--

CREATE TABLE IF NOT EXISTS `clients` (
`id_client` int(11) NOT NULL,
  `nickname` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=utf8mb4 AUTO_INCREMENT=27 ;

--
-- Contenu de la table `clients`
--

INSERT INTO `clients` (`id_client`, `nickname`, `email`, `password`) VALUES
(1, 'CeL9Db', 'azikvlad6@gmail.com', '81358831951djfsfdsqferahwj'),
(2, 'mathias_gebobo', 'ruatrair@gmail.com', 'f"hufÃ©"ifu"fif'),
(3, 'Alexandre', 'amayas@gmail.com', 'h35h35h3hgg'),
(4, 'azikvlad', 'azikvlad5@gmail.com', 's1958rvs'),
(6, 'realman', 'realman@orange.fr', '123123'),
(7, 'serg', 'svr859@gmail.com', '8811235ka'),
(11, 'mamobo', 'glibse@orange.fr', '124921kfab'),
(12, 'franccesco', 'couscous@gmail.com', 'gkaweoaljrqw,'),
(13, 'beliccimo224', 'beliccimo224@orange.fr', 'ghgasdgarfild2'),
(14, 'kurkuma511', 'kurkuma511@gmail.com', 'hq5l4n'),
(15, 'dreams_x', 'ilies@orange.fr', 's1958rjkksqweroov'),
(16, 'gorin2801', 'gorinmiha@gmail.com', 'goringorin228822'),
(17, 'borntogive', 'btg12410@orange.fr', 'btgforlife'),
(18, 'nickname@gmail.com', 'niconiconiiiiii@gmail.com', 'nick2002'),
(19, 'onetwothree@gmail.com', 'numbers@gmail.com', 'onetwothree'),
(20, 'whosaidno?', 'whosaidno@gmail.com', 'whoareyou'),
(21, 'idontspeekenglish', 'idse@orange.fr', 'idseonetime'),
(22, 'Homegirl', 'Homegirl@gmail.com', 'Homegirlfaoei'),
(23, 'Lovebug', 'lb@gmail.com', 'Loasdasfg'),
(24, 'Poulet', 'Poulet228@gmail.com', 'poupoupoupou'),
(25, 'naranja', 'naranjaawfaf@gmail.com', 'naranjamenforreal'),
(26, 'bobobobob', 'aefafab@gmail.com', 'jafkwbakfb');

-- --------------------------------------------------------

--
-- Structure de la table `commandes`
--

CREATE TABLE IF NOT EXISTS `commandes` (
`id_commande` int(11) NOT NULL,
  `date_commande` datetime NOT NULL,
  `id_client` int(11) NOT NULL,
  `montant` int(11) NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=utf8mb4 AUTO_INCREMENT=2 ;

--
-- Contenu de la table `commandes`
--

INSERT INTO `commandes` (`id_commande`, `date_commande`, `id_client`, `montant`) VALUES
(1, '0000-00-00 00:00:00', 1, 92);

-- --------------------------------------------------------

--
-- Structure de la table `commentaire`
--

CREATE TABLE IF NOT EXISTS `commentaire` (
`id_commentaire` int(11) NOT NULL,
  `commentaire_jeu` varchar(100) DEFAULT NULL,
  `commentaire_site` varchar(100) DEFAULT NULL,
  `code_commentaire` int(11) DEFAULT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=utf8mb4 AUTO_INCREMENT=79 ;

--
-- Contenu de la table `commentaire`
--

INSERT INTO `commentaire` (`id_commentaire`, `commentaire_jeu`, `commentaire_site`, `code_commentaire`) VALUES
(1, 'le meilleure jeu forever pour moi !!!', NULL, 6446),
(2, NULL, 'site bien fait avec le style original', NULL),
(10, 'le jeu est vraiment pas mal. Il coûte vraiment ces 30 euros que j''ai payé !', NULL, 6446),
(30, 'cool', NULL, 2461),
(31, 'as good as smth created by the god', NULL, 2461),
(37, 'parfois, je me pose la question: pourquoi je lai pas acheter avant?', NULL, 4951),
(38, 'a game to escape from reality', NULL, 5123),
(39, NULL, 'un bon concurrent dans tout le marketplace :)', NULL),
(40, NULL, 'les jeux chez vous sont pas si chers que chez les autres ! Alors 5/5 !!!', NULL),
(42, NULL, '4/5 car search ne marche pas :(', NULL),
(43, NULL, 'bien', NULL),
(44, 'I was so immersed in exploring the world that I almost forgot there was a main story', NULL, 5123),
(45, 'For better, and for worse, Dragon''s Dogma 2 is a faithful sequel to its predecessor.', NULL, 5123),
(46, 'You''ll never wonder where a ladder is again', NULL, 5123),
(47, 'If I set the graphics to look worse than the first game, I can achieve framerate worse than the firs', NULL, 2461),
(48, 'Crapcom is back Taking the crown from Jedi Survivor, Dragon&#39;s CPU 2', NULL, 2461),
(50, 'Shocked I never wrote a review for this.  The Witcher 3 became my favourite game and then this chad ', NULL, 6592),
(51, 'For a single playthrough the story is really cool and engaging; however after you have done all the ', NULL, 1436),
(52, NULL, 'I like the style of your site', NULL),
(54, 'who did make this perfect game', NULL, 5123),
(56, 'if you wanna try to kill 2 monkeys for only 1 try, it will be the last thing you will say in your wh', NULL, 8812),
(57, 'I liked what I played of this game. It triggered motion sickness for me and I had to refund it.', NULL, 4951),
(58, 'This aint your typical driving game. Your car is your lifeline, your guardian. Pacific Drive is', NULL, 4951),
(59, 'The best Metro series  -The gameplay is amazing - The story is wholesome. Crafting system is good', NULL, 6446),
(60, 'wife-hugging simulator', NULL, 6446),
(61, 'i goon to anna', NULL, 6446),
(62, 'Great game by devs. Shame that it took one year to fix the bug that made it unavailable.', NULL, 6446),
(63, 'For a single playthrough the story is really cool and engaging', NULL, 1436),
(64, 'I belong to Hufflepuff because Im Loyal to my master and also because Im kind & trustworth', NULL, 1436),
(65, 'I want more.', NULL, 1436),
(66, 'Loved the game.  Cant bring up the grind for all collectible achievements though ;)', NULL, 5123),
(67, NULL, 'en un mot; rapidite', NULL),
(68, NULL, 'TOP', NULL),
(69, NULL, 'Excellent !!', NULL),
(70, NULL, 'bjr jai rentre ma cle sur steam mais je ne trouve pas le jeu comment faire ?', NULL),
(71, NULL, 'nickel', NULL),
(72, NULL, 'Great thx !', NULL),
(73, NULL, 'impatient de terminer le dlc druides et Paris pour dÃ©buter celui-ci', NULL),
(74, NULL, 'mon jeu ne se lance pas jaimerais un remboursement au plus vite sil vous plait', NULL),
(75, NULL, '5/5 recommende !', NULL),
(76, NULL, 'site unique pour ce domain la', NULL),
(77, 'very good product', NULL, 4951),
(78, 'very good game', NULL, 6446);

-- --------------------------------------------------------

--
-- Structure de la table `createurs`
--

CREATE TABLE IF NOT EXISTS `createurs` (
`id_createur` int(11) NOT NULL,
  `nom_createur` varchar(50) NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=utf8mb4 AUTO_INCREMENT=9 ;

--
-- Contenu de la table `createurs`
--

INSERT INTO `createurs` (`id_createur`, `nom_createur`) VALUES
(1, '4A Games'),
(2, 'Techland'),
(3, 'CD PROJEKT RED'),
(4, 'Avalanche Software'),
(5, 'Tuxedo Labs'),
(6, 'FromSoftware Inc'),
(7, 'CAPCOM Co'),
(8, 'Ironwood Studios');

-- --------------------------------------------------------

--
-- Structure de la table `fournisseurs`
--

CREATE TABLE IF NOT EXISTS `fournisseurs` (
`id_fourn` int(11) NOT NULL,
  `nom_fourn` varchar(50) NOT NULL,
  `telephone_num_fourn` int(11) NOT NULL,
  `email_fourn` varchar(50) NOT NULL,
  `ville_fourn` varchar(20) NOT NULL,
  `adresse_fourn` varchar(25) NOT NULL,
  `url_fourn` varchar(100) NOT NULL,
  `img_fourn` varchar(100) NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=utf8mb4 AUTO_INCREMENT=4 ;

--
-- Contenu de la table `fournisseurs`
--

INSERT INTO `fournisseurs` (`id_fourn`, `nom_fourn`, `telephone_num_fourn`, `email_fourn`, `ville_fourn`, `adresse_fourn`, `url_fourn`, `img_fourn`) VALUES
(1, 'Ubisoft', 148185000, 'ubisoft-contact@ubisupport.fr', 'Paris', '126 rue de Lagny', 'https://www.ubisoft.com/fr-fr/', 'https://svgshare.com/i/15kE.svg'),
(2, 'Steam', 161043464, 'steam-contact@steamsupport.fr', 'Houilles', '66 Rue Camille Pelletan', 'https://store.steampowered.com/', 'https://svgshare.com/i/15jg.svg'),
(3, 'GOG', 262185512, 'gog-contact@steamsupport.fr', 'Nice', '74 rue JAGIELLOŃSKA', 'https://www.gog.com/', 'https://svgshare.com/i/15j2.svg');

-- --------------------------------------------------------

--
-- Structure de la table `produits`
--

CREATE TABLE IF NOT EXISTS `produits` (
`id_produit` int(11) NOT NULL,
  `nom_produit` varchar(50) NOT NULL,
  `code_type_produit` int(11) NOT NULL,
  `prix_produit` float NOT NULL,
  `restriction_age` varchar(50) NOT NULL,
  `date_sortie` varchar(50) NOT NULL,
  `code_fourn` int(11) NOT NULL,
  `code_createur` int(11) NOT NULL,
  `img` varchar(50) NOT NULL,
  `url` varchar(80) CHARACTER SET utf8 NOT NULL,
  `video` varchar(80) CHARACTER SET utf8 NOT NULL,
  `code_commentaire` int(11) NOT NULL,
  `grid_placement` varchar(50) DEFAULT NULL,
  `link_telechargement` varchar(80) NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=utf8mb4 AUTO_INCREMENT=9 ;

--
-- Contenu de la table `produits`
--

INSERT INTO `produits` (`id_produit`, `nom_produit`, `code_type_produit`, `prix_produit`, `restriction_age`, `date_sortie`, `code_fourn`, `code_createur`, `img`, `url`, `video`, `code_commentaire`, `grid_placement`, `link_telechargement`) VALUES
(1, 'Metro Exodus', 2, 39.99, 'PEGI 18', '14 fevrier 2019', 2, 1, 'https://i.imgur.com/JYOyUcg.jpg', 'http://localhost/myhost-exemple/metro_exodus_page.php', 'https://i.imgur.com/6vtMMao.mp4', 6446, 'left_side_main', 'https://drive.google.com/file/d/1GDpXMlR6ecE3LOOZMWUWMHHyneEznnCF/view?usp=drive'),
(2, 'Dying Light', 2, 29.99, 'PEGI 18', '21 avril 2016', 2, 2, 'https://i.imgur.com/JdSedE6.jpg', 'http://localhost/myhost-exemple/dying_light_page.php', 'https://i.imgur.com/4EsyNVw.mp4', 2461, 'middle_side_main', 'https://drive.google.com/file/d/1KAKKEQvU2yUgwOP8hwFw5oufrSM20vaW/view?usp=drive'),
(3, 'Cyberpunk 2077', 2, 59.99, 'PEGI 18', '10 decembre 2020', 2, 3, 'https://i.imgur.com/8mDtamD.jpg', 'http://localhost/myhost-exemple/cyberpunk_page.php', 'https://i.imgur.com/NLQ1Ze7.mp4', 6592, 'right_side_main', 'https://drive.google.com/file/d/1XXz9g6sZdwjpZW8PhTvB2brs9y8XN_TB/view?usp=drive'),
(4, 'Hogwarz Legacy', 4, 69.99, 'PEGI 12', '10 fevrier 2023', 2, 4, 'https://i.imgur.com/VXoBlMA.jpg', 'http://localhost/myhost-exemple/hogwarz_page.php', 'https://i.imgur.com/l3qwtp4.mp4', 1436, 'sous_left_side_main', 'https://drive.google.com/file/d/1stJYNb8K2H5ZE6kSptDYTExM3lyuOcSs/view?usp=drive'),
(5, 'Teardown', 3, 29.99, 'PEGI 7', '21 avril 2022', 2, 5, 'https://i.imgur.com/81JjhR5.jpg', 'http://localhost/myhost-exemple/teardown_page.php', 'https://i.imgur.com/CSQIVEf.mp4', 9501, 'sous_middle_side_main', 'https://drive.google.com/file/d/1QqyRs8Madgxl-E26ETmfFfgBBBhQ8YVx/view?usp=drive'),
(6, 'Elden Ring', 1, 59.99, 'PEGI 16', '25 fevrier 2022', 2, 6, 'https://i.imgur.com/dW3aT1V.jpg', 'http://localhost/myhost-exemple/elden_ring_page.php', 'https://i.imgur.com/rS1df8G.mp4', 8812, 'sous_right_side_main', 'https://drive.google.com/file/d/1DE35vD-irCLJDmSXs8CbvEWjEklOAUGZ/view?usp=drive'),
(7, 'Dragons Dogma 2', 15, 65, 'PEGI 18', '22 mars 2024', 3, 3, 'https://i.imgur.com/ximMDTg.jpeg', 'http://localhost/myhost-exemple/dragons_dogma_2_page.php', 'https://i.imgur.com/ejD92iP.mp4', 5123, NULL, 'https://drive.google.com/file/d/1R8NCl5EbuDb-sNL0tIPANlgGujhORUk6/view?usp=drive'),
(8, 'Pacific Drive', 3, 34.99, 'PEGI 3', '22 fevrier 2024', 3, 8, 'https://i.imgur.com/BMaB2Ke.jpeg', 'http://localhost/myhost-exemple/pacific_drive_page.php', 'https://i.imgur.com/ILWnmmj.mp4', 4951, NULL, 'https://drive.google.com/file/d/1jRuf3cUSE4fKavocrBNurUMZEQYuUWmg/view?usp=drive');

-- --------------------------------------------------------

--
-- Structure de la table `type_produit`
--

CREATE TABLE IF NOT EXISTS `type_produit` (
`id_type` int(11) NOT NULL,
  `nom` varchar(50) NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=utf8mb4 AUTO_INCREMENT=19 ;

--
-- Contenu de la table `type_produit`
--

INSERT INTO `type_produit` (`id_type`, `nom`) VALUES
(1, 'RPG'),
(2, 'Action'),
(3, 'Simulation'),
(4, 'Avanture'),
(5, 'Fps'),
(6, 'Survival'),
(7, 'Stratégie'),
(8, 'Sport'),
(9, 'Rythme'),
(10, 'Party–Games'),
(11, 'Jeux de cartes'),
(12, 'Monopoly'),
(13, 'Reflexion'),
(14, 'Fighting'),
(15, 'MMO'),
(16, 'Platformer'),
(17, 'Rogue-like'),
(18, 'Sandbox');

-- --------------------------------------------------------

--
-- Structure de la table `visuel`
--

CREATE TABLE IF NOT EXISTS `visuel` (
`id` int(11) NOT NULL,
  `jeu` varchar(50) NOT NULL,
  `highlight` varchar(100) NOT NULL,
  `icon` varchar(100) NOT NULL,
  `video` varchar(100) NOT NULL,
  `img_1` varchar(100) NOT NULL,
  `img_2` varchar(100) NOT NULL,
  `img_3` varchar(100) NOT NULL,
  `img_4` varchar(100) NOT NULL,
  `img_5` varchar(100) NOT NULL,
  `actualite_1` varchar(100) NOT NULL,
  `actualite_2` varchar(100) NOT NULL,
  `actualite_3` varchar(100) NOT NULL
) ENGINE=MyISAM  DEFAULT CHARSET=utf8mb4 AUTO_INCREMENT=9 ;

--
-- Contenu de la table `visuel`
--

INSERT INTO `visuel` (`id`, `jeu`, `highlight`, `icon`, `video`, `img_1`, `img_2`, `img_3`, `img_4`, `img_5`, `actualite_1`, `actualite_2`, `actualite_3`) VALUES
(1, 'metro_exodus', 'https://i.imgur.com/bQo5tlx.jpeg', 'https://i.imgur.com/leUqr1b.jpeg', 'https://i.imgur.com/snrK7r3.mp4', 'https://i.imgur.com/nZ3VhZg.jpeg', 'https://i.imgur.com/8tiAFfK.jpeg', 'https://i.imgur.com/Bifup5X.jpeg', 'https://i.imgur.com/z8nY6yC.jpeg', 'https://i.imgur.com/NIrwU7K.jpeg', 'https://i.imgur.com/rr3QDiy.jpeg', 'https://i.imgur.com/USIxXRU.jpeg', 'https://i.imgur.com/yI1Pe7R.jpeg'),
(2, 'dying_light', 'https://i.imgur.com/aTDuhGH.jpeg', 'https://i.imgur.com/nNxRepI.jpeg', 'https://i.imgur.com/aBpm2lN.mp4', 'https://i.imgur.com/r7yraDR.jpeg', 'https://i.imgur.com/Nci3JM3.jpeg', 'https://i.imgur.com/m6e6YSQ.jpeg', 'https://i.imgur.com/qGnMckm.jpeg', 'https://i.imgur.com/DKwJfFU.jpeg', 'https://i.imgur.com/oJ8dc7K.jpeg', 'https://i.imgur.com/IZAEndS.jpeg', 'https://i.imgur.com/i3NKmpY.jpeg'),
(3, 'cyberpunk', 'https://i.imgur.com/AX9uzxY.jpeg', 'https://i.imgur.com/9PmyR1s.jpeg', 'https://i.imgur.com/O5L1gVA.mp4', 'https://i.imgur.com/KsQfz7z.jpeg', 'https://i.imgur.com/2fEZtJ7.jpeg', 'https://i.imgur.com/f5itY3t.jpeg', 'https://i.imgur.com/KhFkxV8.jpeg', 'https://i.imgur.com/qTcVo9o.jpeg', 'https://i.imgur.com/nxoCOhP.jpeg', 'https://i.imgur.com/iSEfexs.jpeg', 'https://i.imgur.com/BKSHn95.jpeg'),
(4, 'hogwarz_legacy', 'https://i.imgur.com/Jfn27Ns.jpeg', 'https://i.imgur.com/WjY67sL.jpeg', 'https://i.imgur.com/oQhu45c.mp4', 'https://i.imgur.com/rDXCzni.jpeg', 'https://i.imgur.com/3TOEjW5.jpeg', 'https://i.imgur.com/yamBWHU.jpeg', 'https://i.imgur.com/yX0vpLC.jpeg', 'https://i.imgur.com/Bg5mps5.jpeg', 'https://i.imgur.com/zG6SS5F.jpeg', 'https://i.imgur.com/8bSzqk5.jpeg', 'https://i.imgur.com/r0ZsX61.jpeg'),
(5, 'teardown', 'https://i.imgur.com/ctLjeBU.jpeg', 'https://i.imgur.com/4yGaiWx.jpeg', 'https://i.imgur.com/BMrDry0.mp4', 'https://i.imgur.com/CMcJJR6.jpeg', 'https://i.imgur.com/qOex0Am.jpeg', 'https://i.imgur.com/mqRdUHF.jpeg', 'https://i.imgur.com/EwcqtvA.jpeg', 'https://i.imgur.com/eXJ2sHl.jpeg', 'https://i.imgur.com/NAQBIA1.jpeg', 'https://i.imgur.com/yPx7Gpz.jpeg', 'https://i.imgur.com/91zpZWN.jpeg'),
(6, 'elden_ring', 'https://i.imgur.com/bS96Zku.jpeg', 'https://i.imgur.com/1mzPbD4.jpeg', 'https://i.imgur.com/JoE72hw.mp4', 'https://i.imgur.com/36z2NjW.jpeg', 'https://i.imgur.com/InudMot.jpeg', 'https://i.imgur.com/5ff7qT1.jpeg', 'https://i.imgur.com/SfGp3Id.jpeg', 'https://i.imgur.com/TCadWQI.jpeg', 'https://i.imgur.com/GIpnLth.jpeg', 'https://i.imgur.com/26tRVPA.jpeg', 'https://i.imgur.com/pe6TaKQ.jpeg'),
(7, 'dragons_dogma_2', 'https://i.imgur.com/RkYb4Br.jpeg', 'https://i.imgur.com/eZLAmKQ.jpeg', 'https://i.imgur.com/ejD92iP.mp4', 'https://i.imgur.com/9wuqcpp.jpeg', 'https://i.imgur.com/W9MhZIL.jpeg', 'https://i.imgur.com/bOMN4dq.jpeg', 'https://i.imgur.com/jVdsXtk.jpeg', 'https://i.imgur.com/53PFrPU.jpeg', 'https://i.imgur.com/RAmXDne.jpeg', 'https://i.imgur.com/0HUfd7s.jpeg', 'https://i.imgur.com/T5GPk0Q.jpeg'),
(8, 'pacific_drive', 'https://i.imgur.com/sWo7yYR.jpeg', 'https://i.imgur.com/eWNCoyS.jpeg', 'https://i.imgur.com/lSuuq5C.mp4', 'https://i.imgur.com/9CVTrhp.jpeg', 'https://i.imgur.com/hkl0lJr.jpeg', 'https://i.imgur.com/uzydK16.jpeg', 'https://i.imgur.com/zSAkMID.jpeg', 'https://i.imgur.com/js5M2s7.jpeg', 'https://i.imgur.com/ULjlS5T.jpeg', 'https://i.imgur.com/dgPrPt5.jpeg', 'https://i.imgur.com/agHLNZo.jpeg');

--
-- Index pour les tables exportées
--

--
-- Index pour la table `a_pour_commande`
--
ALTER TABLE `a_pour_commande`
 ADD PRIMARY KEY (`id_produit`,`id_commande`), ADD KEY `a_pour_commande_commandes0_FK` (`id_commande`);

--
-- Index pour la table `a_pour_createur`
--
ALTER TABLE `a_pour_createur`
 ADD PRIMARY KEY (`id_createur`,`id_produit`), ADD KEY `a_pour_createur_produits0_FK` (`id_produit`);

--
-- Index pour la table `a_pour_fournisseur`
--
ALTER TABLE `a_pour_fournisseur`
 ADD PRIMARY KEY (`id_fourn`,`id_produit`), ADD KEY `a_pour_fournisseur_produits0_FK` (`id_produit`);

--
-- Index pour la table `a_pour_type`
--
ALTER TABLE `a_pour_type`
 ADD PRIMARY KEY (`id_type`,`id_produit`), ADD KEY `a_pour_type_produits0_FK` (`id_produit`);

--
-- Index pour la table `clients`
--
ALTER TABLE `clients`
 ADD PRIMARY KEY (`id_client`);

--
-- Index pour la table `commandes`
--
ALTER TABLE `commandes`
 ADD PRIMARY KEY (`id_commande`), ADD KEY `commandes_clients_FK` (`id_client`);

--
-- Index pour la table `commentaire`
--
ALTER TABLE `commentaire`
 ADD PRIMARY KEY (`id_commentaire`);

--
-- Index pour la table `createurs`
--
ALTER TABLE `createurs`
 ADD PRIMARY KEY (`id_createur`);

--
-- Index pour la table `fournisseurs`
--
ALTER TABLE `fournisseurs`
 ADD PRIMARY KEY (`id_fourn`);

--
-- Index pour la table `produits`
--
ALTER TABLE `produits`
 ADD PRIMARY KEY (`id_produit`);

--
-- Index pour la table `type_produit`
--
ALTER TABLE `type_produit`
 ADD PRIMARY KEY (`id_type`);

--
-- Index pour la table `visuel`
--
ALTER TABLE `visuel`
 ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT pour les tables exportées
--

--
-- AUTO_INCREMENT pour la table `clients`
--
ALTER TABLE `clients`
MODIFY `id_client` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=27;
--
-- AUTO_INCREMENT pour la table `commandes`
--
ALTER TABLE `commandes`
MODIFY `id_commande` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT pour la table `commentaire`
--
ALTER TABLE `commentaire`
MODIFY `id_commentaire` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=79;
--
-- AUTO_INCREMENT pour la table `createurs`
--
ALTER TABLE `createurs`
MODIFY `id_createur` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT pour la table `fournisseurs`
--
ALTER TABLE `fournisseurs`
MODIFY `id_fourn` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT pour la table `produits`
--
ALTER TABLE `produits`
MODIFY `id_produit` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT pour la table `type_produit`
--
ALTER TABLE `type_produit`
MODIFY `id_type` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=19;
--
-- AUTO_INCREMENT pour la table `visuel`
--
ALTER TABLE `visuel`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=9;
--
-- Contraintes pour les tables exportées
--

--
-- Contraintes pour la table `a_pour_commande`
--
ALTER TABLE `a_pour_commande`
ADD CONSTRAINT `a_pour_commande_commandes0_FK` FOREIGN KEY (`id_commande`) REFERENCES `commandes` (`id_commande`),
ADD CONSTRAINT `a_pour_commande_produits_FK` FOREIGN KEY (`id_produit`) REFERENCES `produits` (`id_produit`);

--
-- Contraintes pour la table `a_pour_createur`
--
ALTER TABLE `a_pour_createur`
ADD CONSTRAINT `a_pour_createur_createurs_FK` FOREIGN KEY (`id_createur`) REFERENCES `createurs` (`id_createur`),
ADD CONSTRAINT `a_pour_createur_produits0_FK` FOREIGN KEY (`id_produit`) REFERENCES `produits` (`id_produit`);

--
-- Contraintes pour la table `a_pour_fournisseur`
--
ALTER TABLE `a_pour_fournisseur`
ADD CONSTRAINT `a_pour_fournisseur_fournisseurs_FK` FOREIGN KEY (`id_fourn`) REFERENCES `fournisseurs` (`id_fourn`),
ADD CONSTRAINT `a_pour_fournisseur_produits0_FK` FOREIGN KEY (`id_produit`) REFERENCES `produits` (`id_produit`);

--
-- Contraintes pour la table `a_pour_type`
--
ALTER TABLE `a_pour_type`
ADD CONSTRAINT `a_pour_type_produits0_FK` FOREIGN KEY (`id_produit`) REFERENCES `produits` (`id_produit`),
ADD CONSTRAINT `a_pour_type_type_produit_FK` FOREIGN KEY (`id_type`) REFERENCES `type_produit` (`id_type`);

--
-- Contraintes pour la table `commandes`
--
ALTER TABLE `commandes`
ADD CONSTRAINT `commandes_clients_FK` FOREIGN KEY (`id_client`) REFERENCES `clients` (`id_client`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

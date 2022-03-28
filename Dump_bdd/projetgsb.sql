-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Hôte : localhost:8889
-- Généré le : lun. 28 mars 2022 à 16:36
-- Version du serveur :  5.7.34
-- Version de PHP : 7.4.21

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `projetgsb`
--

-- --------------------------------------------------------

--
-- Structure de la table `compterendu`
--

CREATE TABLE `compterendu` (
  `id` int(11) NOT NULL,
  `Datevisite` date DEFAULT NULL,
  `DateCR` date NOT NULL,
  `ImpacteVisite` int(11) NOT NULL,
  `MotifVisite` int(11) NOT NULL,
  `CoefConf` int(11) NOT NULL,
  `Praticien` int(11) NOT NULL,
  `Remplacant` int(11) DEFAULT NULL,
  `fkUsers` int(11) NOT NULL,
  `texte` varchar(255) NOT NULL,
  `idRdv` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `compterendu`
--

INSERT INTO `compterendu` (`id`, `Datevisite`, `DateCR`, `ImpacteVisite`, `MotifVisite`, `CoefConf`, `Praticien`, `Remplacant`, `fkUsers`, `texte`, `idRdv`) VALUES
(32, '2022-03-25', '2022-03-28', 10, 4, 6, 35, 1, 58, 'Le praticien m\'a très bien accueilli, ma visite ne l\'a pas surpris. Même s\'il est assez ouvert, il n\'a pas était entièrement convaincu.', 8);

-- --------------------------------------------------------

--
-- Structure de la table `listeMedicament`
--

CREATE TABLE `listeMedicament` (
  `id` int(11) NOT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `MED_DEPOTLEGAL` varchar(255) NOT NULL,
  `MED_NOMCOMMERCIAL` varchar(255) NOT NULL,
  `FAM_CODE` varchar(255) NOT NULL,
  `MED_COMPOSITION` varchar(255) NOT NULL,
  `MED_EFFETS` varchar(255) NOT NULL,
  `MED_CONTREINDIC` varchar(255) NOT NULL,
  `MED_PRIXECHANTILLON` int(11) DEFAULT NULL,
  `MED_NOMBRECHANTILLON` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `listeMedicament`
--

INSERT INTO `listeMedicament` (`id`, `created_at`, `updated_at`, `MED_DEPOTLEGAL`, `MED_NOMCOMMERCIAL`, `FAM_CODE`, `MED_COMPOSITION`, `MED_EFFETS`, `MED_CONTREINDIC`, `MED_PRIXECHANTILLON`, `MED_NOMBRECHANTILLON`) VALUES
(3, NULL, '2022-03-03 08:23:06', '3MYC7', 'TRIMYCINE', 'CRT', 'Triamcinolone (acétonide) + Néomycine + Nystatine', 'Ce médicament est utilisé pour traiter les infections oculaires de la surface de l\'oeil.', 'Ce médicament est contre-indiqué en cas d\'allergie à  l\'un des constituants, d\'infections de la peau ou de parasitisme non traités, d\'acné. Ne pas appliquer sur une plaie, ni sous un pansement occlusif.', 1, 1),
(4, NULL, NULL, 'ADIMOL9', 'ADIMOL', 'ABP', 'Amoxicilline + Acide clavulanique', 'Ce médicament, plus puissant que les pénicillines simples, est utilisé pour traiter des infections bactériennes spécifiques.', 'Ce médicament est contre-indiqué en cas d\'allergie aux pénicillines ou aux céphalosporines.', NULL, 0),
(5, NULL, NULL, 'AMOPIL7', 'AMOPIL', 'ABP', 'Amoxicilline', 'Ce médicament, plus puissant que les pénicillines simples, est utilisé pour traiter des infections bactériennes spécifiques.', 'Ce médicament est contre-indiqué en cas d\'allergie aux pénicillines. Il doit être administré avec prudence en cas d\'allergie aux céphalosporines.', NULL, 0),
(6, NULL, NULL, 'AMOX45', 'AMOXAR', 'ABP', 'Amoxicilline', 'Ce médicament, plus puissant que les pénicillines simples, est utilisé pour traiter des infections bactériennes spécifiques.', 'La prise de ce médicament peut rendre positifs les tests de dépistage du dopage.', NULL, 0),
(7, NULL, NULL, 'AMOXIG12', 'AMOXI Gé', 'ABP', 'Amoxicilline', 'Ce médicament, plus puissant que les pénicillines simples, est utilisé pour traiter des infections bactériennes spécifiques.', 'Ce médicament est contre-indiqué en cas d\'allergie aux pénicillines. Il doit être administré avec prudence en cas d\'allergie aux céphalosporines.', NULL, 0),
(8, NULL, NULL, 'APATOUX22', 'APATOUX Vitamine C', 'ALO', 'Tyrothricine + Tétracaïne + Acide ascorbique (Vitamine C)', 'Ce médicament est utilisé pour traiter les affections de la bouche et de la gorge.', 'Ce médicament est contre-indiqué en cas d\'allergie à  l\'un des constituants, en cas de phénylcétonurie et chez l\'enfant de moins de 6 ans.', NULL, 0),
(9, NULL, NULL, 'BACTIG10', 'BACTIGEL', 'ABC', 'Erythromycine', 'Ce médicament est utilisé en application locale pour traiter l\'acné et les infections cutanées bactériennes associées.', 'Ce médicament est contre-indiqué en cas d\'allergie aux antibiotiques de la famille des macrolides ou des lincosanides.', NULL, 0),
(10, NULL, NULL, 'BACTIV13', 'BACTIVIL', 'AFM', 'Erythromycine', 'Ce médicament est utilisé pour traiter des infections bactériennes spécifiques.', 'Ce médicament est contre-indiqué en cas d\'allergie aux macrolides (dont le chef de file est l\'érythromycine).', NULL, 0),
(11, NULL, NULL, 'BITALV', 'BIVALIC', 'AAA', 'Dextropropoxyphène + Paracétamol', 'Ce médicament est utilisé pour traiter les douleurs d\'intensité modérée ou intense.', 'Ce médicament est contre-indiqué en cas d\'allergie aux médicaments de cette famille, d\'insuffisance hépatique ou d\'insuffisance rénale.', NULL, 0),
(12, NULL, NULL, 'CARTION6', 'CARTION', 'AAA', 'Acide acétylsalicylique (aspirine) + Acide ascorbique (Vitamine C) + Paracétamol', 'Ce médicament est utilisé dans le traitement symptomatique de la douleur ou de la fièvre.', 'Ce médicament est contre-indiqué en cas de troubles de la coagulation (tendances aux hémorragies), d\'ulcère gastroduodénal, maladies graves du foie.', NULL, 0),
(13, NULL, NULL, 'CLAZER6', 'CLAZER', 'AFM', 'Clarithromycine', 'Ce médicament est utilisé pour traiter des infections bactériennes spécifiques. Il est également utilisé dans le traitement de l\'ulcère gastro-duodénal, en association avec d\'autres médicaments.', 'Ce médicament est contre-indiqué en cas d\'allergie aux macrolides (dont le chef de file est l\'érythromycine).', NULL, 0),
(14, NULL, NULL, 'DEPRIL9', 'DEPRAMIL', 'AIM', 'Clomipramine', 'Ce médicament est utilisé pour traiter les épisodes dépressifs sévères, certaines douleurs rebelles, les troubles obsessionnels compulsifs et certaines énurésies chez l\'enfant.', 'Ce médicament est contre-indiqué en cas de glaucome ou d\'adénome de la prostate, d\'infarctus récent, ou si vous avez reà§u un traitement par IMAO durant les 2 semaines précédentes ou en cas d\'allergie aux antidépresseurs imipraminiques.', NULL, 0),
(15, NULL, NULL, 'DIMIRTAM6', 'DIMIRTAM', 'AAC', 'Mirtazapine', 'Ce médicament est utilisé pour traiter les épisodes dépressifs sévères.', 'La prise de ce produit est contre-indiquée en cas de d\'allergie à  l\'un des constituants.', NULL, 0),
(16, NULL, NULL, 'DOLRIL7', 'DOLORIL', 'AAA', 'Acide acétylsalicylique (aspirine) + Acide ascorbique (Vitamine C) + Paracétamol', 'Ce médicament est utilisé dans le traitement symptomatique de la douleur ou de la fièvre.', 'Ce médicament est contre-indiqué en cas d\'allergie au paracétamol ou aux salicylates.', NULL, 0),
(17, NULL, NULL, 'DORNOM8', 'NORMADOR', 'HYP', 'Doxylamine', 'Ce médicament est utilisé pour traiter l\'insomnie chez l\'adulte.', 'Ce médicament est contre-indiqué en cas de glaucome, de certains troubles urinaires (rétention urinaire) et chez l\'enfant de moins de 15 ans.', NULL, 0),
(18, NULL, NULL, 'EQUILARX6', 'EQUILAR', 'AAH', 'Méclozine', 'Ce médicament est utilisé pour traiter les vertiges et pour prévenir le mal des transports.', 'Ce médicament ne doit pas être utilisé en cas d\'allergie au produit, en cas de glaucome ou de rétention urinaire.', NULL, 0),
(19, NULL, NULL, 'EVILR7', 'EVEILLOR', 'PSA', 'Adrafinil', 'Ce médicament est utilisé pour traiter les troubles de la vigilance et certains symptomes neurologiques chez le sujet agé.', 'Ce médicament est contre-indiqué en cas d\'allergie à  l\'un des constituants.', NULL, 0),
(20, NULL, NULL, 'INSXT5', 'INSECTIL', 'AH', 'Diphénydramine', 'Ce médicament est utilisé en application locale sur les piqûres d\'insecte et l\'urticaire.', 'Ce médicament est contre-indiqué en cas d\'allergie aux antihistaminiques.', NULL, 0),
(21, NULL, NULL, 'JOVAI8', 'JOVENIL', 'AFM', 'Josamycine', 'Ce médicament est utilisé pour traiter des infections bactériennes spécifiques.', 'Ce médicament est contre-indiqué en cas d\'allergie aux macrolides (dont le chef de file est l\'érythromycine).', NULL, 0),
(22, NULL, NULL, 'LIDOXY23', 'LIDOXYTRACINE', 'AFC', 'Oxytétracycline +Lidocaïne', 'Ce médicament est utilisé en injection intramusculaire pour traiter certaines infections spécifiques.', 'Ce médicament est contre-indiqué en cas d\'allergie à  l\'un des constituants. Il ne doit pas être associé aux rétinoïdes.', NULL, 0),
(23, NULL, NULL, 'LITHOR12', 'LITHORINE', 'AP', 'Lithium', 'Ce médicament est indiqué dans la prévention des psychoses maniaco-dépressives ou pour traiter les états maniaques.', 'Ce médicament ne doit pas être utilisé si vous êtes allergique au lithium. Avant de prendre ce traitement, signalez à  votre médecin traitant si vous souffrez d\'insuffisance rénale, ou si vous avez un régime sans sel.', NULL, 0),
(24, NULL, NULL, 'PARMOL16', 'PARMOCODEINE', 'AA', 'Codéine + Paracétamol', 'Ce médicament est utilisé pour le traitement des douleurs lorsque des antalgiques simples ne sont pas assez efficaces.', 'Ce médicament est contre-indiqué en cas d\'allergie à  l\'un des constituants, chez l\'enfant de moins de 15 Kg, en cas d\'insuffisance hépatique ou respiratoire, d\'asthme, de phénylcétonurie et chez la femme qui allaite.', NULL, 0),
(25, NULL, NULL, 'PHYSOI8', 'PHYSICOR', 'PSA', 'Sulbutiamine', 'Ce médicament est utilisé pour traiter les baisses d\'activité physique ou psychique, souvent dans un contexte de dépression.', 'Ce médicament est contre-indiqué en cas d\'allergie à  l\'un des constituants.', NULL, 0),
(26, NULL, NULL, 'PIRIZ8', 'PIRIZAN', 'ABA', 'Pyrazinamide', 'Ce médicament est utilisé, en association à  d\'autres antibiotiques, pour traiter la tuberculose.', 'Ce médicament est contre-indiqué en cas d\'allergie à  l\'un des constituants, d\'insuffisance rénale ou hépatique, d\'hyperuricémie ou de porphyrie.', NULL, 0),
(27, NULL, NULL, 'POMDI20', 'POMADINE', 'AO', 'Bacitracine', 'Ce médicament est utilisé pour traiter les infections oculaires de la surface de l\'oeil.', 'Ce médicament est contre-indiqué en cas d\'allergie aux antibiotiques appliqués localement.', NULL, 0),
(28, NULL, NULL, 'TROXT21', 'TROXADET', 'AIN', 'Paroxétine', 'Ce médicament est utilisé pour traiter la dépression et les troubles obsessionnels compulsifs. Il peut également être utilisé en prévention des crises de panique avec ou sans agoraphobie.', 'Ce médicament est contre-indiqué en cas d\'allergie au produit.', NULL, 0),
(29, NULL, NULL, 'TXISOL22', 'TOUXISOL Vitamine C', 'ALO', 'Tyrothricine + Acide ascorbique (Vitamine C)', 'Ce médicament est utilisé pour traiter les affections de la bouche et de la gorge.', 'Ce médicament est contre-indiqué en cas d\'allergie à  l\'un des constituants et chez l\'enfant de moins de 6 ans.', NULL, 0),
(30, NULL, NULL, 'URIEG6', 'URIREGUL', 'AUM', 'Fosfomycine trométamol', 'Ce médicament est utilisé pour traiter les infections urinaires simples chez la femme de moins de 65 ans.', 'La prise de ce médicament est contre-indiquée en cas d\'allergie à  l\'un des constituants et d\'insuffisance rénale.', NULL, 0);

-- --------------------------------------------------------

--
-- Structure de la table `listeMotifVisite`
--

CREATE TABLE `listeMotifVisite` (
  `id` int(11) NOT NULL,
  `motif` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `listeMotifVisite`
--

INSERT INTO `listeMotifVisite` (`id`, `motif`) VALUES
(4, 'Périodicité'),
(5, 'Nouveautés / actualisation'),
(6, 'Solicitation praticien'),
(7, 'autres motifs');

-- --------------------------------------------------------

--
-- Structure de la table `listePraticien`
--

CREATE TABLE `listePraticien` (
  `id` int(11) NOT NULL,
  `nom` varchar(200) NOT NULL,
  `prenom` varchar(100) NOT NULL,
  `adresse` varchar(255) NOT NULL,
  `codePostal` int(5) NOT NULL,
  `numero` int(10) NOT NULL,
  `email` varchar(100) NOT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `listePraticien`
--

INSERT INTO `listePraticien` (`id`, `nom`, `prenom`, `adresse`, `codePostal`, `numero`, `email`, `created_at`, `updated_at`) VALUES
(30, 'Bellelune', 'Pierrette', '60, rue de la Mare aux Carats', 34070, 476964247, 'PierretteBeausoleil@armyspy.com', '2022-03-28 07:17:23', '2022-03-28 11:00:24'),
(31, 'Duhamel', 'Gaetan', '7, rue des Soeurs 13600 ', 13600, 498201176, 'GaetanDuhamel@jourrapide.com', '2022-03-28 07:19:46', '2022-03-28 08:04:32'),
(32, 'Laforge', 'Tanguy', '57, rue Sébastopol', 17100, 567695496, 'TanguyLaforge@dayrep.com', '2022-03-28 07:20:46', '2022-03-28 07:20:46'),
(33, 'Auclair', 'Pauline', '34, Avenue des Tuileries ', 78280, 133579042, 'PaulineAuclair@dayrep.com', '2022-03-28 07:21:39', '2022-03-28 07:21:39'),
(35, 'Duperré', 'Laurent', '1, rue du Clair Bocage ', 83500, 410356834, 'LaurentDuperre@armyspy.com', '2022-03-28 09:56:55', '2022-03-28 09:56:55');

-- --------------------------------------------------------

--
-- Structure de la table `listeRegion`
--

CREATE TABLE `listeRegion` (
  `id` int(11) NOT NULL,
  `nom` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `listeRegion`
--

INSERT INTO `listeRegion` (`id`, `nom`) VALUES
(1, 'Auvergne-Rhone-Alpes'),
(2, 'Bourgogne-Franche-Comte'),
(3, 'Bretagne'),
(4, 'Centre-Val de Loire'),
(5, 'Corse'),
(6, 'Grand Est'),
(7, 'Hauts-de-France'),
(8, 'Île-de-France'),
(9, 'Normandie'),
(10, 'Nouvelle-Aquitaine'),
(11, 'Occitanie'),
(12, 'Pays de la Loire'),
(13, 'Provence-Alpes-Côte d\'Azur');

-- --------------------------------------------------------

--
-- Structure de la table `listeRemplacant`
--

CREATE TABLE `listeRemplacant` (
  `id` int(11) NOT NULL,
  `nomRemplacant` varchar(255) DEFAULT NULL,
  `prenomRemplacant` varchar(100) DEFAULT NULL,
  `adresseRemplacant` varchar(255) DEFAULT NULL,
  `codePostalRemplacant` int(5) DEFAULT NULL,
  `numeroRemplacant` int(10) DEFAULT NULL,
  `emailRemplacant` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `listeRemplacant`
--

INSERT INTO `listeRemplacant` (`id`, `nomRemplacant`, `prenomRemplacant`, `adresseRemplacant`, `codePostalRemplacant`, `numeroRemplacant`, `emailRemplacant`) VALUES
(1, 'aucun', NULL, NULL, NULL, NULL, NULL),
(3, 'Gowdy', 'Grace', '63 rue danaudon', 69007, 74839653, 'Gowdy.Grace@gmail.com'),
(4, 'Hartman', 'Annie', '13 avenue des tuileries ', 91350, 729796332, 'Hartman.Annie@orange.fr');

-- --------------------------------------------------------

--
-- Structure de la table `liste_metiers`
--

CREATE TABLE `liste_metiers` (
  `pk_liste_metiers` int(11) NOT NULL,
  `metiers` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `liste_metiers`
--

INSERT INTO `liste_metiers` (`pk_liste_metiers`, `metiers`) VALUES
(1, 'Aéronautique Et Espace'),
(2, 'Agriculture - Agroalimentaire'),
(3, 'Artisanat'),
(4, 'Audiovisuel, Cinéma'),
(5, 'Audit, Comptabilité, Gestion'),
(6, 'Automobile'),
(7, 'Banque, Assurance'),
(8, 'Bâtiment, Travaux Publics'),
(9, 'Biologie, Chimie, Pharmacie'),
(10, 'Commerce, Distribution'),
(11, 'Communication'),
(12, 'Création, Métiers D\'art'),
(13, 'Culture, Patrimoine'),
(14, 'Défense, Sécurité, Armée'),
(15, 'Documentation, Bibliothèque'),
(16, 'Droit'),
(17, 'Edition, Livre'),
(18, 'Enseignement'),
(19, 'Environnement'),
(39, 'Ferroviaire'),
(40, 'Foires, Salons Et Congrès'),
(41, 'Fonction Publique'),
(42, 'Hôtellerie, Restauration'),
(43, 'Humanitaire'),
(44, 'Immobilier'),
(45, 'Industrie'),
(46, 'Informatique, Télécoms, Web'),
(47, 'Jeu Vidéo'),
(48, 'Journalisme'),
(49, 'Langues'),
(50, 'Marketing, Publicité'),
(51, 'Médical'),
(52, 'Mode-Textile'),
(53, 'Paramédical'),
(54, 'Propreté Et Services Associés'),
(55, 'Psychologie'),
(56, 'Ressources Humaines'),
(57, 'Sciences Humaines Et Sociales'),
(58, 'Secrétariat'),
(59, 'Social'),
(60, 'Spectacle - Métiers De La Scène'),
(61, 'Sport'),
(62, 'Tourisme'),
(63, 'Transport-Logistique');

-- --------------------------------------------------------

--
-- Structure de la table `rdv`
--

CREATE TABLE `rdv` (
  `id` int(11) NOT NULL,
  `date_rdv` date NOT NULL,
  `heure_rdv` int(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `rdv`
--

INSERT INTO `rdv` (`id`, `date_rdv`, `heure_rdv`) VALUES
(6, '2022-05-23', 15),
(7, '2022-05-10', 11),
(8, '2022-05-16', 14);

-- --------------------------------------------------------

--
-- Structure de la table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `role_id` varchar(255) NOT NULL,
  `name` varchar(150) DEFAULT NULL,
  `prenom` varchar(100) NOT NULL,
  `email` varchar(150) DEFAULT NULL,
  `password` varchar(150) DEFAULT NULL,
  `telephone` int(10) NOT NULL,
  `adresse` varchar(100) NOT NULL,
  `cp` int(5) NOT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` datetime DEFAULT NULL,
  `idRegion` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `users`
--

INSERT INTO `users` (`id`, `role_id`, `name`, `prenom`, `email`, `password`, `telephone`, `adresse`, `cp`, `created_at`, `updated_at`, `idRegion`) VALUES
(58, '', 'Alix', 'Syrill', 'Syrill@gsb.com', '$2y$10$92HV024b5bBNrXcIBVYVxOTZ0jheDerr0Xko01BhzTQjucebNaY7.', 0, '', 0, '2022-02-11 06:35:33', '2022-02-11 07:35:33', NULL),
(64, '', 'Recette', 'Test', 'Recette@Test.com', '$2y$10$B/qwdCGWFi0P4TX9O/Bxtub8bkX4pGniGSz8I/e/7.jH7ULs6Aray', 0, '', 0, '2022-03-28 09:32:27', '2022-03-28 11:32:27', NULL);

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `compterendu`
--
ALTER TABLE `compterendu`
  ADD PRIMARY KEY (`id`),
  ADD KEY `FK_users` (`fkUsers`),
  ADD KEY `FK_idRdv` (`idRdv`),
  ADD KEY `FK_idRemplacant` (`Remplacant`),
  ADD KEY `FK_idPraticien` (`Praticien`),
  ADD KEY `FK_idMotifVisite` (`MotifVisite`);

--
-- Index pour la table `listeMedicament`
--
ALTER TABLE `listeMedicament`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `listeMotifVisite`
--
ALTER TABLE `listeMotifVisite`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `listePraticien`
--
ALTER TABLE `listePraticien`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `listeRegion`
--
ALTER TABLE `listeRegion`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `listeRemplacant`
--
ALTER TABLE `listeRemplacant`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `liste_metiers`
--
ALTER TABLE `liste_metiers`
  ADD PRIMARY KEY (`pk_liste_metiers`);

--
-- Index pour la table `rdv`
--
ALTER TABLE `rdv`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD KEY `idRegion` (`idRegion`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `compterendu`
--
ALTER TABLE `compterendu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT pour la table `listeMedicament`
--
ALTER TABLE `listeMedicament`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT pour la table `listeMotifVisite`
--
ALTER TABLE `listeMotifVisite`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT pour la table `listePraticien`
--
ALTER TABLE `listePraticien`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;

--
-- AUTO_INCREMENT pour la table `listeRegion`
--
ALTER TABLE `listeRegion`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT pour la table `listeRemplacant`
--
ALTER TABLE `listeRemplacant`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT pour la table `liste_metiers`
--
ALTER TABLE `liste_metiers`
  MODIFY `pk_liste_metiers` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=64;

--
-- AUTO_INCREMENT pour la table `rdv`
--
ALTER TABLE `rdv`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT pour la table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=65;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `compterendu`
--
ALTER TABLE `compterendu`
  ADD CONSTRAINT `FK_idMotifVisite` FOREIGN KEY (`MotifVisite`) REFERENCES `listemotifvisite` (`id`),
  ADD CONSTRAINT `FK_idPraticien` FOREIGN KEY (`Praticien`) REFERENCES `listepraticien` (`id`),
  ADD CONSTRAINT `FK_idRdv` FOREIGN KEY (`idRdv`) REFERENCES `rdv` (`id`),
  ADD CONSTRAINT `FK_idRemplacant` FOREIGN KEY (`Remplacant`) REFERENCES `listeremplacant` (`id`),
  ADD CONSTRAINT `FK_users` FOREIGN KEY (`fkUsers`) REFERENCES `users` (`id`);

--
-- Contraintes pour la table `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `users_ibfk_1` FOREIGN KEY (`idRegion`) REFERENCES `listeRegion` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

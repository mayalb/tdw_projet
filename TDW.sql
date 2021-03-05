-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le : Dim 21 fév. 2021 à 21:53
-- Version du serveur :  10.4.16-MariaDB
-- Version de PHP : 7.4.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `tdw_projet`
--

-- --------------------------------------------------------

--
-- Structure de la table `article`
--

CREATE TABLE `article` (
  `id` int(11) NOT NULL,
  `titre` varchar(256) NOT NULL,
  `description` varchar(512) NOT NULL,
  `lien_image` varchar(512) NOT NULL,
  `aud` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `article`
--

INSERT INTO `article` (`id`, `titre`, `description`, `lien_image`, `aud`) VALUES
(1, ':title', ':description', ':lien_image', ':aud'),
(2, 'T5', 'c\'est un article', '../../images/article/quitt.jpg', '1'),
(3, 'T5', 'c\'est un article', '../../images/article/quitt.jpg', '1'),
(4, 'article 2', 'c\'est un article', '../../images/article/gh.jpg', '3'),
(5, 'article 2', 'c\'est un article', '../../images/article/gh.jpg', '3'),
(6, 'ARTIcl 3', 'NON', '../../images/article/', '2'),
(7, 'un new article', 'comment on met', '../../images/article/4.png', '3'),
(8, 'voila ceci', 'est un', '../../images/article/1.png', '4'),
(9, 'pourquoi les animaux sont interdits', 'psq on est pas donné', '../../images/article/7.png', '1'),
(10, 'izan', 'izz', '../../images/article/3.png', '6'),
(11, 'un new article', 'c\'est un article', '../../images/article/office.jpg', '3'),
(12, 'oui', 'o', '../../images/article/7.png', '2'),
(13, 'un new article', 'comment on met', '../../images/article/4.png', '4'),
(14, 'article 2', 'deuxieme article', '../../images/article/4.png', '2'),
(15, 'patron de conception', 'prof', '../../images/article/3.png', '1');

-- --------------------------------------------------------

--
-- Structure de la table `cadre`
--

CREATE TABLE `cadre` (
  `id` int(11) NOT NULL,
  `titre` varchar(70) NOT NULL,
  `lien_image` varchar(256) NOT NULL,
  `id_article` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Structure de la table `classe`
--

CREATE TABLE `classe` (
  `id` int(11) NOT NULL,
  `annee` varchar(15) NOT NULL,
  `cycle` varchar(11) NOT NULL,
  `nom` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `classe`
--

INSERT INTO `classe` (`id`, `annee`, `cycle`, `nom`) VALUES
(1, '1erannee', 'moyen', '1m2'),
(2, '3', 'primaire', '3P2'),
(3, '3', 'Moyen', '2');

-- --------------------------------------------------------

--
-- Structure de la table `contact`
--

CREATE TABLE `contact` (
  `numero` varchar(50) NOT NULL,
  `fix` varchar(50) NOT NULL,
  `adresse` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Structure de la table `edt`
--

CREATE TABLE `edt` (
  `id` int(11) NOT NULL,
  `id_classe` int(11) NOT NULL,
  `id_seance` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `edt`
--

INSERT INTO `edt` (`id`, `id_classe`, `id_seance`) VALUES
(1, 3, 18),
(2, 3, 19),
(3, 2, 20),
(4, 3, 21),
(5, 2, 22);

-- --------------------------------------------------------

--
-- Structure de la table `eleve`
--

CREATE TABLE `eleve` (
  `id` int(11) NOT NULL,
  `date_naissance` varchar(20) NOT NULL,
  `annee` int(11) NOT NULL,
  `classe` varchar(20) NOT NULL,
  `activite_extrascol` varchar(256) NOT NULL,
  `id_parent` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Structure de la table `enseignant`
--

CREATE TABLE `enseignant` (
  `id_ens` int(11) NOT NULL,
  `nom` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `enseignant`
--

INSERT INTO `enseignant` (`id_ens`, `nom`) VALUES
(1, 'HAMOUDA'),
(3, 'hadim');

-- --------------------------------------------------------

--
-- Structure de la table `ens_classe`
--

CREATE TABLE `ens_classe` (
  `id` int(11) NOT NULL,
  `id_ens` int(11) NOT NULL,
  `id_classe` int(11) NOT NULL,
  `heure_travail` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `ens_classe`
--

INSERT INTO `ens_classe` (`id`, `id_ens`, `id_classe`, `heure_travail`) VALUES
(1, 1, 2, ''),
(2, 3, 1, ''),
(3, 1, 3, ''),
(4, 3, 3, ''),
(5, 3, 2, '');

-- --------------------------------------------------------

--
-- Structure de la table `heure`
--

CREATE TABLE `heure` (
  `id` int(11) NOT NULL,
  `type` int(11) NOT NULL,
  `id_ens` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Structure de la table `note`
--

CREATE TABLE `note` (
  `id` int(11) NOT NULL,
  `id_eleve` int(11) NOT NULL,
  `id_matiere` int(11) NOT NULL,
  `note` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Structure de la table `paragraphe`
--

CREATE TABLE `paragraphe` (
  `id` int(11) NOT NULL,
  `paragraphe` varchar(1000) NOT NULL,
  `lien_img` varchar(256) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `paragraphe`
--

INSERT INTO `paragraphe` (`id`, `paragraphe`, `lien_img`) VALUES
(1, 'fffffffffffffff', '../../images/paragraphe/prog.jpg'),
(2, 'paragraphe serieux', '../../images/paragraphe/packages.png'),
(3, 'IZAN', '../../images/paragraphe/'),
(4, 'Etude du système existant', '../../images/paragraphe/'),
(5, 'les classes préparatoires', '../../images/paragraphe/'),
(6, 'BZF', '../../images/paragraphe/'),
(7, 'présentation de l\'ecole', '../../images/paragraphe/');

-- --------------------------------------------------------

--
-- Structure de la table `restau`
--

CREATE TABLE `restau` (
  `id_repas` int(11) NOT NULL,
  `nom_repas` varchar(50) NOT NULL,
  `jour` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Structure de la table `seance`
--

CREATE TABLE `seance` (
  `id` int(11) NOT NULL,
  `heure_debut` varchar(50) NOT NULL,
  `heure_fin` varchar(50) NOT NULL,
  `id_ens` int(11) NOT NULL,
  `id_classe` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `seance`
--

INSERT INTO `seance` (`id`, `heure_debut`, `heure_fin`, `id_ens`, `id_classe`) VALUES
(2, '14', '13', 3, 1),
(5, '9', '3', 3, 1),
(14, '12', '13', 3, 1),
(15, '5', '6', 1, 3),
(16, '8', '9', 1, 3),
(20, '0', '1', 3, 2);

-- --------------------------------------------------------

--
-- Structure de la table `utilisateur`
--

CREATE TABLE `utilisateur` (
  `id` int(11) NOT NULL,
  `nom` varchar(30) NOT NULL,
  `prenom` varchar(30) NOT NULL,
  `adresse` varchar(50) NOT NULL,
  `tel1` int(11) NOT NULL,
  `tel2` int(11) NOT NULL,
  `tel3` int(11) NOT NULL,
  `email` varchar(50) NOT NULL,
  `type` varchar(10) NOT NULL,
  `mdp` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `utilisateur`
--

INSERT INTO `utilisateur` (`id`, `nom`, `prenom`, `adresse`, `tel1`, `tel2`, `tel3`, `email`, `type`, `mdp`) VALUES
(1, '', '', '', 0, 0, 0, 'admin', '0', 'admin');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `article`
--
ALTER TABLE `article`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `cadre`
--
ALTER TABLE `cadre`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `classe`
--
ALTER TABLE `classe`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `edt`
--
ALTER TABLE `edt`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `eleve`
--
ALTER TABLE `eleve`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `enseignant`
--
ALTER TABLE `enseignant`
  ADD PRIMARY KEY (`id_ens`);

--
-- Index pour la table `ens_classe`
--
ALTER TABLE `ens_classe`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `heure`
--
ALTER TABLE `heure`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `note`
--
ALTER TABLE `note`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `paragraphe`
--
ALTER TABLE `paragraphe`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `restau`
--
ALTER TABLE `restau`
  ADD PRIMARY KEY (`id_repas`);

--
-- Index pour la table `seance`
--
ALTER TABLE `seance`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `utilisateur`
--
ALTER TABLE `utilisateur`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `article`
--
ALTER TABLE `article`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT pour la table `cadre`
--
ALTER TABLE `cadre`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `classe`
--
ALTER TABLE `classe`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT pour la table `edt`
--
ALTER TABLE `edt`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT pour la table `eleve`
--
ALTER TABLE `eleve`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `enseignant`
--
ALTER TABLE `enseignant`
  MODIFY `id_ens` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT pour la table `ens_classe`
--
ALTER TABLE `ens_classe`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT pour la table `heure`
--
ALTER TABLE `heure`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `note`
--
ALTER TABLE `note`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `paragraphe`
--
ALTER TABLE `paragraphe`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT pour la table `restau`
--
ALTER TABLE `restau`
  MODIFY `id_repas` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `seance`
--
ALTER TABLE `seance`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT pour la table `utilisateur`
--
ALTER TABLE `utilisateur`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

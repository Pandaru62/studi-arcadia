-- phpMyAdmin SQL Dump
-- version 5.1.2
-- https://www.phpmyadmin.net/
--
-- Hôte : localhost:3307
-- Généré le : dim. 19 mai 2024 à 07:04
-- Version du serveur : 5.7.24
-- Version de PHP : 8.3.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `arcadia`
--

-- --------------------------------------------------------

--
-- Structure de la table `animals`
--

CREATE TABLE `animals` (
  `id` int(11) NOT NULL,
  `first_name` varchar(255) NOT NULL,
  `species_id` int(11) NOT NULL,
  `image` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `animals`
--

INSERT INTO `animals` (`id`, `first_name`, `species_id`, `image`) VALUES
(1, 'Perceval', 1, 'perceval.jpg'),
(2, 'Blanchefleur', 1, 'blanchefleur.jpg'),
(3, 'Iseult', 2, 'iseult.jpg'),
(4, 'Tristan', 2, 'tristan.jpg'),
(5, 'Arthur', 3, 'arthur.jpg'),
(6, 'Guenièvre', 3, 'guenievre.jpg'),
(7, 'Laudine', 4, 'laudine.jpg'),
(8, 'Yvain', 4, 'yvain.jpg'),
(9, 'Corneval', 5, 'corneval.jpg'),
(10, 'Croquetonne', 5, 'croquetonne.jpg'),
(11, 'Apolline', 6, 'apolline.jpg'),
(12, 'Napoléon', 6, 'napoleon.jpg'),
(13, 'Polux', 6, 'polux.jpg'),
(14, 'Courte', 7, 'courte.jpg'),
(15, 'Excalibur', 7, 'excalibur.jpg'),
(16, 'Durandal', 7, 'durandal.jpg'),
(17, 'Galatyn', 7, 'galatyn.jpg'),
(18, 'Joyeuse', 7, 'joyeuse.jpg'),
(19, 'Archimede', 8, 'archimede.jpg'),
(20, 'Merlin', 8, 'merlin.jpg'),
(21, 'Mauve', 9, 'flamands.jpg'),
(22, 'Prune', 9, 'flamands.jpg'),
(23, 'Rosy', 9, 'flamands.jpg'),
(24, 'Violette', 9, 'flamands.jpg'),
(25, 'Mélusine', 10, 'melusine.jpg'),
(26, 'Viviane', 11, 'viviane.jpg'),
(27, 'Morgane', 12, 'morgane.jpg'),
(28, 'Veuve', 13, 'veuve.jpg'),
(29, 'Orphelin', 13, 'orphelin.jpg'),
(30, 'Brigitte', 14, 'brigitte.jpg'),
(31, 'Loris', 14, 'loris.jpg'),
(32, 'Anthony', 15, 'anthony.jpg'),
(33, 'Bénédicte', 15, 'benedicte.png'),
(34, 'Colin', 15, 'colin.jpg'),
(35, 'Daphné', 15, 'daphne.jpg'),
(36, 'Eloïse', 15, 'eloise.jpg'),
(37, 'Francesca', 15, 'francesca.jpg'),
(38, 'Grégory', 15, 'gregory.jpg'),
(39, 'Hyacinthe', 15, 'hyacinthe.jpg'),
(40, 'Gildas', 16, 'gildas.jpg'),
(41, 'Gwen', 16, 'gwen.jpg'),
(42, 'Gandalf', 16, 'gwen.jpg'),
(43, 'Bucéphale', 17, 'bucephale.jpg'),
(44, 'Gringalet', 17, 'gringalet.jpg'),
(45, 'Lion', 17, 'lion.jpg'),
(46, 'Veillantif', 17, 'veillantif.jpg'),
(47, 'Atchoum', 18, 'suricates.jpg'),
(48, 'Dormeur', 18, 'suricates.jpg'),
(49, 'Grincheux', 18, 'suricates.jpg'),
(50, 'Joyeux', 18, 'suricates.jpg'),
(51, 'Prof', 18, 'suricates.jpg'),
(52, 'Simplet', 18, 'suricates.jpg'),
(53, 'Timide', 18, 'suricates.jpg'),
(54, 'Simba', 19, 'simba.jpg'),
(55, 'Nala', 19, 'nala.jpg'),
(56, 'Kiara', 19, 'kiara.jpg');

-- --------------------------------------------------------

--
-- Structure de la table `feeding`
--

CREATE TABLE `feeding` (
  `id` int(11) NOT NULL,
  `animal_id` int(11) NOT NULL,
  `date` date NOT NULL,
  `time` time NOT NULL,
  `food` varchar(255) NOT NULL,
  `quantity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `feeding`
--

INSERT INTO `feeding` (`id`, `animal_id`, `date`, `time`, `food`, `quantity`) VALUES
(1, 1, '2024-04-20', '08:00:00', 'Granulés', 100),
(2, 2, '2024-04-20', '08:00:00', 'Foin', 200),
(3, 3, '2024-04-20', '08:00:00', 'Légumes', 150),
(4, 4, '2024-04-20', '08:00:00', 'Herbe', 120),
(5, 5, '2024-04-20', '08:00:00', 'Fruits', 80),
(6, 6, '2024-04-20', '08:00:00', 'Granulés', 100),
(7, 7, '2024-04-20', '08:00:00', 'Foin', 200),
(8, 8, '2024-04-20', '08:00:00', 'Légumes', 150),
(9, 9, '2024-04-20', '08:00:00', 'Herbe', 120),
(10, 10, '2024-04-20', '08:00:00', 'Fruits', 80),
(11, 11, '2024-04-20', '08:00:00', 'Granulés', 100),
(12, 12, '2024-04-20', '08:00:00', 'Foin', 200),
(13, 13, '2024-04-20', '08:00:00', 'Légumes', 150),
(14, 14, '2024-04-20', '08:00:00', 'Herbe', 120),
(15, 15, '2024-04-20', '08:00:00', 'Fruits', 80),
(16, 16, '2024-04-20', '08:00:00', 'Granulés', 100),
(17, 17, '2024-04-20', '08:00:00', 'Foin', 200),
(18, 18, '2024-04-20', '08:00:00', 'Légumes', 150),
(19, 19, '2024-04-20', '08:00:00', 'Herbe', 120),
(20, 20, '2024-04-20', '08:00:00', 'Fruits', 80),
(21, 21, '2024-04-20', '08:00:00', 'Granulés', 100),
(22, 22, '2024-04-20', '08:00:00', 'Foin', 200),
(23, 23, '2024-04-20', '08:00:00', 'Légumes', 150),
(24, 24, '2024-04-20', '08:00:00', 'Herbe', 120),
(25, 25, '2024-04-20', '08:00:00', 'Fruits', 80),
(26, 26, '2024-04-20', '08:00:00', 'Granulés', 100),
(27, 27, '2024-04-20', '08:00:00', 'Foin', 200),
(28, 28, '2024-04-20', '08:00:00', 'Légumes', 150),
(29, 29, '2024-04-20', '08:00:00', 'Herbe', 120),
(30, 30, '2024-04-20', '08:00:00', 'Fruits', 80),
(31, 31, '2024-04-20', '08:00:00', 'Granulés', 100),
(32, 32, '2024-04-20', '08:00:00', 'Foin', 200),
(33, 33, '2024-04-20', '08:00:00', 'Légumes', 150),
(34, 34, '2024-04-20', '08:00:00', 'Herbe', 120),
(35, 35, '2024-04-20', '08:00:00', 'Fruits', 80),
(36, 36, '2024-04-20', '08:00:00', 'Granulés', 100),
(37, 37, '2024-04-20', '08:00:00', 'Foin', 200),
(38, 38, '2024-04-20', '08:00:00', 'Légumes', 150),
(39, 39, '2024-04-20', '08:00:00', 'Herbe', 120),
(40, 40, '2024-04-20', '08:00:00', 'Fruits', 80),
(41, 41, '2024-04-20', '08:00:00', 'Granulés', 100),
(42, 42, '2024-04-20', '08:00:00', 'Foin', 200),
(43, 43, '2024-04-20', '08:00:00', 'Légumes', 150),
(44, 44, '2024-04-20', '08:00:00', 'Herbe', 120),
(45, 45, '2024-04-20', '08:00:00', 'Fruits', 80),
(46, 46, '2024-04-20', '08:00:00', 'Granulés', 100),
(47, 47, '2024-04-20', '08:00:00', 'Foin', 200),
(48, 48, '2024-04-20', '08:00:00', 'Légumes', 150),
(49, 49, '2024-04-20', '08:00:00', 'Herbe', 120),
(50, 50, '2024-04-20', '08:00:00', 'Fruits', 80),
(51, 51, '2024-04-20', '08:00:00', 'Granulés', 100),
(52, 52, '2024-04-20', '08:00:00', 'Foin', 200),
(53, 53, '2024-04-20', '08:00:00', 'Légumes', 150),
(54, 54, '2024-04-20', '08:00:00', 'Herbe', 120),
(55, 55, '2024-04-20', '08:00:00', 'Fruits', 80),
(56, 56, '2024-04-20', '08:00:00', 'Granulés', 100),
(57, 1, '2024-04-20', '15:00:00', 'Granulés', 100),
(58, 2, '2024-04-20', '08:00:00', 'Foin', 200),
(59, 3, '2024-04-20', '08:00:00', 'Légumes', 150),
(60, 4, '2024-04-20', '08:00:00', 'Herbe', 120),
(61, 5, '2024-04-20', '08:00:00', 'Fruits', 80),
(62, 6, '2024-04-20', '08:00:00', 'Granulés', 100),
(63, 7, '2024-04-20', '08:00:00', 'Foin', 200),
(64, 8, '2024-04-20', '08:00:00', 'Légumes', 150),
(65, 9, '2024-04-20', '08:00:00', 'Herbe', 120),
(66, 10, '2024-04-20', '08:00:00', 'Fruits', 80),
(67, 11, '2024-04-20', '08:00:00', 'Granulés', 100),
(68, 12, '2024-04-20', '08:00:00', 'Foin', 200),
(69, 13, '2024-04-20', '08:00:00', 'Légumes', 150),
(70, 14, '2024-04-20', '08:00:00', 'Herbe', 120),
(71, 15, '2024-04-20', '08:00:00', 'Fruits', 80),
(72, 16, '2024-04-20', '08:00:00', 'Granulés', 100),
(73, 17, '2024-04-20', '08:00:00', 'Foin', 200),
(74, 18, '2024-04-20', '08:00:00', 'Légumes', 150),
(75, 19, '2024-04-20', '08:00:00', 'Herbe', 120),
(76, 20, '2024-04-20', '08:00:00', 'Fruits', 80),
(77, 21, '2024-04-20', '08:00:00', 'Granulés', 100),
(78, 22, '2024-04-20', '08:00:00', 'Foin', 200),
(79, 23, '2024-04-20', '08:00:00', 'Légumes', 150),
(80, 24, '2024-04-20', '08:00:00', 'Herbe', 120),
(81, 25, '2024-04-20', '08:00:00', 'Fruits', 80),
(82, 26, '2024-04-20', '08:00:00', 'Granulés', 100),
(83, 27, '2024-04-20', '08:00:00', 'Foin', 200),
(84, 28, '2024-04-20', '08:00:00', 'Légumes', 150),
(85, 29, '2024-04-20', '08:00:00', 'Herbe', 120),
(86, 30, '2024-04-20', '08:00:00', 'Fruits', 80),
(87, 31, '2024-04-20', '08:00:00', 'Granulés', 100),
(88, 32, '2024-04-20', '08:00:00', 'Foin', 200),
(89, 33, '2024-04-20', '08:00:00', 'Légumes', 150),
(90, 34, '2024-04-20', '08:00:00', 'Herbe', 120),
(91, 35, '2024-04-20', '08:00:00', 'Fruits', 80),
(92, 36, '2024-04-20', '08:00:00', 'Granulés', 100),
(93, 37, '2024-04-20', '08:00:00', 'Foin', 200),
(94, 38, '2024-04-20', '08:00:00', 'Légumes', 150),
(95, 39, '2024-04-20', '08:00:00', 'Herbe', 120),
(96, 40, '2024-04-20', '08:00:00', 'Fruits', 80),
(97, 41, '2024-04-20', '08:00:00', 'Granulés', 100),
(98, 42, '2024-04-20', '08:00:00', 'Foin', 200),
(99, 43, '2024-04-20', '08:00:00', 'Légumes', 150),
(100, 44, '2024-04-20', '08:00:00', 'Herbe', 120),
(101, 45, '2024-04-20', '08:00:00', 'Fruits', 80),
(102, 46, '2024-04-20', '08:00:00', 'Granulés', 100),
(103, 47, '2024-04-20', '08:00:00', 'Foin', 200),
(104, 48, '2024-04-20', '08:00:00', 'Légumes', 150),
(105, 49, '2024-04-20', '08:00:00', 'Herbe', 120),
(106, 50, '2024-04-20', '08:00:00', 'Fruits', 80),
(107, 51, '2024-04-20', '08:00:00', 'Granulés', 100),
(108, 52, '2024-04-20', '08:00:00', 'Foin', 200),
(109, 53, '2024-04-20', '08:00:00', 'Légumes', 150),
(110, 54, '2024-04-20', '08:00:00', 'Herbe', 120),
(111, 55, '2024-04-20', '08:00:00', 'Fruits', 80),
(112, 56, '2024-04-20', '08:00:00', 'Granulés', 100),
(113, 1, '2024-04-21', '05:00:00', 'Granulés', 100),
(114, 5, '2024-05-02', '10:52:00', 'viande', 1000),
(115, 5, '2024-04-25', '12:02:00', 'viande', 1000),
(116, 5, '2024-04-26', '08:02:00', 'poisson', 1000),
(117, 5, '2024-05-02', '10:03:00', 'viande', 1000);

-- --------------------------------------------------------

--
-- Structure de la table `habitatcomments`
--

CREATE TABLE `habitatcomments` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `habitat_id` int(11) NOT NULL,
  `comment` varchar(1000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `habitatcomments`
--

INSERT INTO `habitatcomments` (`id`, `user_id`, `habitat_id`, `comment`) VALUES
(1, 10, 1, 'Tapez une description ici'),
(2, 9, 1, 'Tapez une description ici');

-- --------------------------------------------------------

--
-- Structure de la table `habitats`
--

CREATE TABLE `habitats` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `image` varchar(255) NOT NULL,
  `description` varchar(1000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `habitats`
--

INSERT INTO `habitats` (`id`, `name`, `image`, `description`) VALUES
(1, 'Les Marais de la Légende', 'marais.jpg', ' Crocodiles et hippopotames se partagent les eaux sauvages bordant une majestueuse volière des faucons.'),
(2, 'La Jungle aux Merveilles', 'jungle.jpg', 'Au cœur de la forêt luxuriante, panthères, pandas roux et lémuriens cohabitent près d\'un imposant vivarium.'),
(3, 'La Savane des Obis', 'savane.jpg', 'Plongez au cœur d\'un monde aride où girafes, zèbres, suricates et lions trônent et n\'attendent que vous.');

-- --------------------------------------------------------

--
-- Structure de la table `reports`
--

CREATE TABLE `reports` (
  `id` int(11) NOT NULL,
  `vet_id` int(11) NOT NULL,
  `animal_id` int(11) NOT NULL,
  `health` varchar(1000) NOT NULL,
  `food` varchar(255) NOT NULL,
  `food_quantity` int(11) NOT NULL,
  `date` date NOT NULL,
  `opinion` varchar(1000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `reports`
--

INSERT INTO `reports` (`id`, `vet_id`, `animal_id`, `health`, `food`, `food_quantity`, `date`, `opinion`) VALUES
(1, 10, 5, 'en grande forme', 'viande', 1000, '2024-05-01', 'RAS'),
(2, 10, 10, 'Malade', 'Poisson', 500, '2024-05-01', 'Soins dispensés toutes les 4h'),
(3, 10, 10, 'Vaseux', 'Poisson', 500, '2024-04-30', 'Soins dispensés toutes les 6h'),
(9, 10, 1, 'En bonne santé', 'Croquettes', 100, '2024-04-25', 'Tout va bien avec ce chat.'),
(10, 10, 15, 'En bonne santé', 'Poisson', 150, '2024-04-26', ' '),
(11, 10, 30, 'En bonne santé', 'Foin', 200, '2024-04-27', 'L\'animal semble heureux.'),
(12, 10, 45, 'En bonne santé', 'Herbe', 50, '2024-04-28', ' '),
(13, 10, 58, 'En bonne santé', 'Légumes', 120, '2024-04-29', 'Rien à signaler.'),
(15, 10, 1, 'En bonne santé', 'Croquettes', 100, '2024-04-25', 'Tout va bien avec ce chat.'),
(16, 10, 15, 'En bonne santé', 'Poisson', 150, '2024-04-26', ' '),
(17, 10, 30, 'En bonne santé', 'Foin', 200, '2024-04-27', 'L\'animal semble heureux.'),
(18, 10, 45, 'En bonne santé', 'Herbe', 50, '2024-04-28', ' '),
(19, 10, 58, 'En bonne santé', 'Légumes', 120, '2024-04-29', 'Rien à signaler.'),
(20, 10, 37, 'En mauvaise santé', 'Poisson', 253, '2024-04-19', 'Tout va bien.'),
(21, 10, 28, 'En mauvaise santé', 'Poisson', 162, '2024-04-09', ' '),
(22, 10, 28, 'En mauvaise santé', 'Croquettes', 119, '2024-04-04', 'Tout va bien.'),
(23, 10, 36, 'En mauvaise santé', 'Poisson', 118, '2024-04-26', ' '),
(24, 10, 19, 'En mauvaise santé', 'Croquettes', 77, '2024-04-20', ' '),
(25, 10, 5, 'En mauvaise santé', 'Croquettes', 120, '2024-05-01', ' '),
(26, 10, 41, 'En bonne santé', 'Croquettes', 341, '2024-04-11', 'Le vétérinaire doit revenir.'),
(27, 10, 17, 'En bonne santé', 'Poisson', 242, '2024-04-25', 'Le vétérinaire doit revenir.'),
(28, 10, 51, 'En mauvaise santé', 'Foin', 55, '2024-04-12', ' '),
(29, 10, 40, 'En bonne santé', 'Croquettes', 162, '2024-04-18', ' '),
(30, 10, 47, 'En mauvaise santé', 'Croquettes', 180, '2024-04-19', 'Le vétérinaire doit revenir.'),
(31, 10, 6, 'En bonne santé', 'Foin', 122, '2024-04-29', 'Le vétérinaire doit revenir.'),
(32, 10, 25, 'En bonne santé', 'Foin', 311, '2024-04-10', 'Tout va bien.'),
(33, 10, 23, 'En mauvaise santé', 'Poisson', 51, '2024-04-25', 'Tout va bien.'),
(34, 10, 10, 'En bonne santé', 'Croquettes', 172, '2024-04-08', 'Le vétérinaire doit revenir.'),
(35, 10, 1, 'En mauvaise santé', 'Foin', 262, '2024-04-08', 'Le vétérinaire doit revenir.'),
(36, 10, 3, 'En bonne santé', 'Croquettes', 183, '2024-04-07', 'Le vétérinaire doit revenir.'),
(37, 10, 56, 'En mauvaise santé', 'Croquettes', 343, '2024-04-20', 'Tout va bien.'),
(38, 10, 35, 'En bonne santé', 'Foin', 259, '2024-04-23', ' '),
(39, 10, 9, 'En bonne santé', 'Poisson', 269, '2024-04-09', ' '),
(40, 10, 49, 'En mauvaise santé', 'Croquettes', 293, '2024-04-12', 'Tout va bien.'),
(41, 10, 9, 'En mauvaise santé', 'Foin', 73, '2024-04-25', 'Tout va bien.'),
(42, 10, 31, 'En bonne santé', 'Poisson', 140, '2024-04-15', 'Tout va bien.'),
(43, 10, 33, 'En mauvaise santé', 'Poisson', 110, '2024-04-08', ' '),
(44, 10, 46, 'En bonne santé', 'Poisson', 240, '2024-04-28', ' '),
(45, 10, 29, 'En bonne santé', 'Foin', 287, '2024-04-26', 'Le vétérinaire doit revenir.'),
(46, 10, 49, 'En bonne santé', 'Croquettes', 126, '2024-04-05', 'Le vétérinaire doit revenir.'),
(47, 10, 5, 'En bonne santé', 'Foin', 193, '2024-04-22', ' '),
(48, 10, 21, 'En bonne santé', 'Croquettes', 175, '2024-04-13', ' '),
(49, 10, 25, 'En mauvaise santé', 'Poisson', 250, '2024-04-28', ' '),
(50, 10, 55, 'En mauvaise santé', 'Poisson', 321, '2024-04-23', ' '),
(51, 10, 44, 'En bonne santé', 'Foin', 248, '2024-04-20', 'Tout va bien.'),
(52, 10, 54, 'En mauvaise santé', 'Poisson', 240, '2024-04-27', 'Tout va bien.'),
(53, 10, 49, 'En mauvaise santé', 'Croquettes', 230, '2024-04-09', 'Tout va bien.'),
(54, 10, 30, 'En mauvaise santé', 'Poisson', 341, '2024-04-10', 'Le vétérinaire doit revenir.'),
(55, 10, 40, 'En mauvaise santé', 'Poisson', 141, '2024-04-04', ' '),
(56, 10, 27, 'En bonne santé', 'Poisson', 91, '2024-04-13', ' '),
(57, 10, 33, 'En mauvaise santé', 'Poisson', 300, '2024-04-04', 'Le vétérinaire doit revenir.'),
(58, 10, 30, 'En mauvaise santé', 'Poisson', 208, '2024-04-09', ' '),
(59, 10, 31, 'En bonne santé', 'Poisson', 122, '2024-04-29', 'Le vétérinaire doit revenir.'),
(60, 10, 58, 'En mauvaise santé', 'Poisson', 52, '2024-04-26', 'Tout va bien.'),
(61, 10, 36, 'En mauvaise santé', 'Foin', 88, '2024-04-30', ' '),
(62, 10, 35, 'En mauvaise santé', 'Foin', 320, '2024-04-06', ' '),
(63, 10, 34, 'En bonne santé', 'Foin', 135, '2024-04-04', ' '),
(64, 10, 46, 'En bonne santé', 'Croquettes', 291, '2024-04-23', 'Le vétérinaire doit revenir.'),
(65, 10, 41, 'En bonne santé', 'Poisson', 62, '2024-04-21', 'Le vétérinaire doit revenir.'),
(66, 10, 51, 'En bonne santé', 'Poisson', 301, '2024-04-17', 'Tout va bien.'),
(67, 10, 45, 'En mauvaise santé', 'Foin', 104, '2024-04-18', ' '),
(68, 10, 41, 'En mauvaise santé', 'Foin', 210, '2024-04-26', 'Le vétérinaire doit revenir.'),
(69, 10, 24, 'En mauvaise santé', 'Poisson', 299, '2024-04-21', 'Le vétérinaire doit revenir.'),
(70, 10, 3, 'En mauvaise santé', 'Foin', 108, '2024-04-24', 'Le vétérinaire doit revenir.'),
(71, 10, 11, 'En mauvaise santé', 'Foin', 129, '2024-05-02', ' '),
(72, 10, 10, 'En mauvaise santé', 'Poisson', 154, '2024-04-11', 'Le vétérinaire doit revenir.'),
(73, 10, 47, 'En bonne santé', 'Croquettes', 182, '2024-05-02', ' '),
(74, 10, 38, 'En mauvaise santé', 'Poisson', 211, '2024-04-26', ' '),
(75, 10, 53, 'En mauvaise santé', 'Croquettes', 232, '2024-04-06', 'Le vétérinaire doit revenir.'),
(76, 10, 1, 'En mauvaise santé', 'Croquettes', 138, '2024-04-11', 'Le vétérinaire doit revenir.'),
(77, 10, 18, 'En mauvaise santé', 'Poisson', 160, '2024-04-03', ' '),
(78, 10, 36, 'En bonne santé', 'Poisson', 162, '2024-04-11', 'Le vétérinaire doit revenir.'),
(79, 10, 25, 'En mauvaise santé', 'Foin', 66, '2024-04-10', ' '),
(80, 10, 37, 'En mauvaise santé', 'Croquettes', 94, '2024-04-20', 'Le vétérinaire doit revenir.'),
(81, 10, 3, 'En bonne santé', 'Croquettes', 155, '2024-04-10', ' '),
(82, 10, 49, 'En bonne santé', 'Croquettes', 164, '2024-05-02', 'Tout va bien.'),
(83, 10, 54, 'En mauvaise santé', 'Croquettes', 173, '2024-04-23', 'Le vétérinaire doit revenir.'),
(84, 10, 54, 'En mauvaise santé', 'Poisson', 240, '2024-04-26', 'Tout va bien.'),
(85, 10, 51, 'En bonne santé', 'Poisson', 249, '2024-04-16', 'Le vétérinaire doit revenir.'),
(86, 10, 2, 'En bonne santé', 'Croquettes', 169, '2024-04-24', ' '),
(87, 10, 37, 'En mauvaise santé', 'Poisson', 239, '2024-04-06', 'Le vétérinaire doit revenir.'),
(88, 10, 31, 'En mauvaise santé', 'Poisson', 238, '2024-04-12', ' '),
(89, 10, 54, 'En bonne santé', 'Foin', 157, '2024-04-13', 'Le vétérinaire doit revenir.'),
(90, 10, 2, 'En mauvaise santé', 'Foin', 254, '2024-04-22', ' '),
(91, 10, 35, 'En mauvaise santé', 'Croquettes', 222, '2024-05-01', 'Le vétérinaire doit revenir.'),
(92, 10, 16, 'En mauvaise santé', 'Croquettes', 285, '2024-04-19', ' '),
(93, 10, 29, 'En mauvaise santé', 'Poisson', 182, '2024-04-20', ' '),
(94, 10, 2, 'En mauvaise santé', 'Poisson', 255, '2024-04-14', ' '),
(95, 10, 1, 'En bonne santé', 'Poisson', 320, '2024-04-23', ' '),
(96, 10, 33, 'En bonne santé', 'Foin', 206, '2024-04-14', ' '),
(97, 10, 39, 'En bonne santé', 'Croquettes', 348, '2024-04-28', ' '),
(98, 10, 46, 'En mauvaise santé', 'Foin', 70, '2024-04-28', 'Le vétérinaire doit revenir.'),
(99, 10, 50, 'En bonne santé', 'Poisson', 100, '2024-04-20', ' '),
(100, 10, 56, 'En mauvaise santé', 'Croquettes', 115, '2024-04-11', ' '),
(101, 10, 2, 'En mauvaise santé', 'Poisson', 55, '2024-04-17', ' '),
(102, 10, 49, 'En mauvaise santé', 'Foin', 198, '2024-04-25', 'Le vétérinaire doit revenir.'),
(103, 10, 57, 'En mauvaise santé', 'Foin', 60, '2024-04-28', ' '),
(104, 10, 28, 'En bonne santé', 'Poisson', 196, '2024-04-26', ' '),
(105, 10, 24, 'En mauvaise santé', 'Croquettes', 64, '2024-04-16', ' '),
(106, 10, 21, 'En mauvaise santé', 'Foin', 157, '2024-04-24', ' '),
(107, 10, 20, 'En bonne santé', 'Croquettes', 154, '2024-04-08', 'Tout va bien.'),
(108, 10, 50, 'En bonne santé', 'Foin', 113, '2024-04-26', ' '),
(109, 10, 54, 'En mauvaise santé', 'Croquettes', 91, '2024-04-12', 'Tout va bien.'),
(110, 10, 1, 'En bonne santé', 'Croquettes', 141, '2024-04-23', 'Le vétérinaire doit revenir.'),
(111, 10, 27, 'En bonne santé', 'Croquettes', 108, '2024-05-02', 'Le vétérinaire doit revenir.'),
(112, 10, 29, 'En bonne santé', 'Croquettes', 101, '2024-04-08', 'Le vétérinaire doit revenir.'),
(113, 10, 2, 'En bonne santé', 'Poisson', 241, '2024-04-28', 'Le vétérinaire doit revenir.'),
(114, 10, 31, 'En bonne santé', 'Poisson', 308, '2024-05-02', 'Le vétérinaire doit revenir.'),
(115, 10, 20, 'En mauvaise santé', 'Poisson', 308, '2024-04-09', ' '),
(116, 10, 12, 'En mauvaise santé', 'Croquettes', 265, '2024-04-25', 'Tout va bien.'),
(117, 10, 51, 'En mauvaise santé', 'Foin', 175, '2024-05-01', ' '),
(118, 10, 57, 'En mauvaise santé', 'Foin', 128, '2024-04-11', ' '),
(119, 10, 43, 'En bonne santé', 'Poisson', 244, '2024-05-02', 'Tout va bien.'),
(120, 10, 25, 'En mauvaise santé', 'Foin', 331, '2024-04-13', 'Le vétérinaire doit revenir.'),
(121, 10, 47, 'En bonne santé', 'Poisson', 208, '2024-04-30', ' '),
(122, 10, 22, 'En mauvaise santé', 'Poisson', 135, '2024-04-25', ' '),
(123, 10, 33, 'En bonne santé', 'Foin', 54, '2024-05-01', 'Tout va bien.'),
(124, 10, 40, 'En mauvaise santé', 'Foin', 147, '2024-04-22', ' '),
(125, 10, 34, 'En bonne santé', 'Poisson', 308, '2024-05-01', ' '),
(126, 10, 50, 'En bonne santé', 'Poisson', 50, '2024-04-14', 'Tout va bien.'),
(127, 10, 33, 'En mauvaise santé', 'Croquettes', 306, '2024-04-04', 'Le vétérinaire doit revenir.'),
(128, 10, 52, 'En bonne santé', 'Poisson', 165, '2024-04-14', 'Le vétérinaire doit revenir.'),
(129, 10, 16, 'En bonne santé', 'Croquettes', 326, '2024-04-13', 'Le vétérinaire doit revenir.'),
(130, 10, 16, 'En bonne santé', 'Croquettes', 103, '2024-04-11', 'Tout va bien.'),
(131, 10, 7, 'En bonne santé', 'Foin', 346, '2024-05-02', 'Tout va bien.'),
(132, 10, 23, 'En mauvaise santé', 'Croquettes', 279, '2024-04-21', ' '),
(133, 10, 49, 'En bonne santé', 'Croquettes', 138, '2024-04-13', 'Le vétérinaire doit revenir.'),
(134, 10, 24, 'En mauvaise santé', 'Poisson', 74, '2024-04-09', ' '),
(135, 10, 58, 'En mauvaise santé', 'Croquettes', 297, '2024-04-11', 'Tout va bien.'),
(136, 10, 32, 'En bonne santé', 'Foin', 262, '2024-04-19', 'Tout va bien.'),
(137, 10, 10, 'En mauvaise santé', 'Croquettes', 52, '2024-04-12', 'Le vétérinaire doit revenir.'),
(138, 10, 51, 'En mauvaise santé', 'Poisson', 116, '2024-04-26', 'Le vétérinaire doit revenir.'),
(139, 10, 38, 'En mauvaise santé', 'Croquettes', 342, '2024-04-13', ' '),
(140, 10, 45, 'En bonne santé', 'Foin', 78, '2024-04-26', 'Le vétérinaire doit revenir.'),
(141, 10, 50, 'En mauvaise santé', 'Poisson', 267, '2024-04-30', ' '),
(142, 10, 35, 'En bonne santé', 'Foin', 221, '2024-04-16', 'Tout va bien.'),
(143, 10, 49, 'En mauvaise santé', 'Poisson', 321, '2024-04-17', ' '),
(144, 10, 2, 'En mauvaise santé', 'Poisson', 343, '2024-04-25', 'Le vétérinaire doit revenir.'),
(145, 10, 35, 'En mauvaise santé', 'Poisson', 225, '2024-04-30', ' '),
(146, 10, 46, 'En mauvaise santé', 'Foin', 342, '2024-04-16', ' '),
(147, 10, 53, 'En bonne santé', 'Poisson', 94, '2024-04-26', 'Le vétérinaire doit revenir.'),
(148, 10, 3, 'En bonne santé', 'Poisson', 174, '2024-04-18', ' '),
(149, 10, 5, 'En mauvaise santé', 'Poisson', 53, '2024-04-22', ' '),
(150, 10, 51, 'En bonne santé', 'Foin', 285, '2024-04-24', 'Tout va bien.'),
(151, 10, 28, 'En bonne santé', 'Foin', 280, '2024-04-23', ' '),
(152, 10, 46, 'En bonne santé', 'Croquettes', 218, '2024-04-15', 'Tout va bien.'),
(153, 10, 4, 'En mauvaise santé', 'Poisson', 201, '2024-04-20', ' '),
(154, 10, 44, 'En bonne santé', 'Poisson', 63, '2024-05-01', 'Tout va bien.'),
(155, 10, 37, 'En mauvaise santé', 'Poisson', 246, '2024-04-12', 'Le vétérinaire doit revenir.'),
(156, 10, 28, 'En bonne santé', 'Poisson', 301, '2024-04-04', 'Tout va bien.'),
(157, 10, 57, 'En bonne santé', 'Croquettes', 266, '2024-05-02', 'Le vétérinaire doit revenir.'),
(158, 10, 58, 'En bonne santé', 'Croquettes', 253, '2024-04-05', 'Le vétérinaire doit revenir.'),
(159, 10, 16, 'En mauvaise santé', 'Foin', 173, '2024-04-09', 'Le vétérinaire doit revenir.'),
(160, 10, 36, 'En mauvaise santé', 'Poisson', 321, '2024-04-11', 'Le vétérinaire doit revenir.'),
(161, 10, 30, 'En mauvaise santé', 'Poisson', 309, '2024-04-13', 'Le vétérinaire doit revenir.'),
(162, 10, 32, 'En mauvaise santé', 'Croquettes', 248, '2024-04-28', 'Le vétérinaire doit revenir.'),
(163, 10, 47, 'En bonne santé', 'Poisson', 135, '2024-04-15', 'Tout va bien.'),
(164, 10, 23, 'En mauvaise santé', 'Croquettes', 121, '2024-04-12', ' '),
(165, 10, 51, 'En mauvaise santé', 'Poisson', 184, '2024-04-20', ' '),
(166, 10, 29, 'En bonne santé', 'Poisson', 150, '2024-04-21', ' '),
(167, 10, 50, 'En mauvaise santé', 'Poisson', 163, '2024-04-13', 'Tout va bien.'),
(168, 10, 25, 'En mauvaise santé', 'Croquettes', 104, '2024-04-20', 'Le vétérinaire doit revenir.'),
(169, 10, 22, 'En bonne santé', 'Poisson', 286, '2024-04-08', 'Le vétérinaire doit revenir.'),
(170, 10, 21, 'En mauvaise santé', 'Poisson', 206, '2024-04-05', 'Le vétérinaire doit revenir.'),
(171, 10, 36, 'En mauvaise santé', 'Croquettes', 262, '2024-04-17', 'Le vétérinaire doit revenir.'),
(172, 10, 36, 'En mauvaise santé', 'Croquettes', 124, '2024-04-28', 'Le vétérinaire doit revenir.'),
(173, 10, 15, 'En mauvaise santé', 'Poisson', 91, '2024-04-08', ' '),
(174, 10, 48, 'En mauvaise santé', 'Poisson', 132, '2024-04-13', ' '),
(175, 10, 11, 'En bonne santé', 'Foin', 114, '2024-04-30', ' '),
(176, 10, 36, 'En mauvaise santé', 'Croquettes', 202, '2024-04-11', 'Tout va bien.'),
(177, 10, 4, 'En bonne santé', 'Poisson', 343, '2024-04-08', 'Tout va bien.'),
(178, 10, 30, 'En mauvaise santé', 'Croquettes', 327, '2024-04-26', ' '),
(179, 10, 50, 'En mauvaise santé', 'Croquettes', 134, '2024-04-19', ' '),
(180, 10, 2, 'En mauvaise santé', 'Foin', 335, '2024-04-11', ' '),
(181, 10, 58, 'En mauvaise santé', 'Croquettes', 176, '2024-04-24', 'Tout va bien.'),
(182, 10, 4, 'En mauvaise santé', 'Poisson', 78, '2024-04-08', 'Le vétérinaire doit revenir.'),
(183, 10, 10, 'En bonne santé', 'Foin', 332, '2024-04-16', 'Le vétérinaire doit revenir.'),
(184, 10, 29, 'En bonne santé', 'Poisson', 139, '2024-04-20', ' '),
(185, 10, 54, 'En mauvaise santé', 'Poisson', 95, '2024-05-01', ' '),
(186, 10, 55, 'En bonne santé', 'Poisson', 260, '2024-04-29', 'Le vétérinaire doit revenir.'),
(187, 10, 11, 'En mauvaise santé', 'Poisson', 276, '2024-05-02', 'Le vétérinaire doit revenir.'),
(188, 10, 38, 'En mauvaise santé', 'Poisson', 331, '2024-05-02', ' '),
(189, 10, 23, 'En mauvaise santé', 'Poisson', 256, '2024-04-09', ' '),
(190, 10, 6, 'En bonne santé', 'Foin', 296, '2024-04-23', 'Tout va bien.'),
(191, 10, 21, 'En mauvaise santé', 'Croquettes', 254, '2024-05-01', 'Tout va bien.'),
(192, 10, 44, 'En bonne santé', 'Poisson', 215, '2024-04-06', 'Le vétérinaire doit revenir.'),
(193, 10, 10, 'En mauvaise santé', 'Poisson', 269, '2024-04-19', 'Tout va bien.'),
(194, 10, 41, 'En mauvaise santé', 'Poisson', 183, '2024-04-14', ' '),
(195, 10, 10, 'En bonne santé', 'Poisson', 201, '2024-04-16', ' '),
(196, 10, 16, 'En mauvaise santé', 'Croquettes', 95, '2024-04-09', 'Le vétérinaire doit revenir.'),
(197, 10, 46, 'En mauvaise santé', 'Poisson', 165, '2024-04-11', ' '),
(198, 10, 56, 'En bonne santé', 'Poisson', 313, '2024-04-27', 'Le vétérinaire doit revenir.'),
(199, 10, 15, 'En bonne santé', 'Poisson', 118, '2024-04-14', ' '),
(200, 10, 8, 'En bonne santé', 'Foin', 181, '2024-04-27', 'Le vétérinaire doit revenir.'),
(201, 10, 15, 'En mauvaise santé', 'Poisson', 54, '2024-05-02', 'Tout va bien.'),
(202, 10, 21, 'En mauvaise santé', 'Foin', 239, '2024-04-10', ' '),
(203, 10, 13, 'En bonne santé', 'Poisson', 156, '2024-04-21', ' '),
(204, 10, 26, 'En mauvaise santé', 'Poisson', 340, '2024-04-12', 'Le vétérinaire doit revenir.'),
(205, 10, 58, 'En bonne santé', 'Foin', 338, '2024-04-08', 'Tout va bien.'),
(206, 10, 31, 'En bonne santé', 'Poisson', 264, '2024-04-09', 'Le vétérinaire doit revenir.'),
(207, 10, 35, 'En mauvaise santé', 'Poisson', 262, '2024-04-03', ' '),
(208, 10, 37, 'En mauvaise santé', 'Poisson', 100, '2024-04-30', ' '),
(209, 10, 13, 'En mauvaise santé', 'Foin', 273, '2024-04-09', ' '),
(210, 10, 44, 'En mauvaise santé', 'Croquettes', 200, '2024-04-09', ' '),
(211, 10, 18, 'En mauvaise santé', 'Poisson', 132, '2024-04-13', ' '),
(212, 10, 48, 'En mauvaise santé', 'Croquettes', 295, '2024-04-18', 'Le vétérinaire doit revenir.'),
(213, 10, 57, 'En mauvaise santé', 'Poisson', 196, '2024-04-09', 'Le vétérinaire doit revenir.'),
(214, 10, 46, 'En bonne santé', 'Croquettes', 304, '2024-04-26', ' '),
(215, 10, 46, 'En bonne santé', 'Poisson', 211, '2024-04-19', 'Le vétérinaire doit revenir.'),
(216, 10, 14, 'En mauvaise santé', 'Croquettes', 53, '2024-04-18', ' '),
(217, 10, 52, 'En mauvaise santé', 'Croquettes', 335, '2024-04-21', 'Tout va bien.'),
(218, 10, 8, 'En bonne santé', 'Poisson', 293, '2024-04-30', ' '),
(219, 10, 27, 'En mauvaise santé', 'Croquettes', 261, '2024-04-14', 'Le vétérinaire doit revenir.'),
(220, 10, 24, 'En mauvaise santé', 'Foin', 185, '2024-04-07', 'Le vétérinaire doit revenir.'),
(221, 10, 2, 'En mauvaise santé', 'Croquettes', 132, '2024-04-24', 'Le vétérinaire doit revenir.'),
(222, 10, 29, 'En bonne santé', 'Croquettes', 323, '2024-05-02', ' '),
(223, 10, 27, 'En bonne santé', 'Poisson', 98, '2024-04-04', 'Le vétérinaire doit revenir.'),
(224, 10, 47, 'En bonne santé', 'Croquettes', 117, '2024-04-08', ' '),
(225, 10, 56, 'En mauvaise santé', 'Poisson', 144, '2024-04-06', ' '),
(226, 10, 3, 'En bonne santé', 'Foin', 280, '2024-04-05', ' '),
(227, 10, 35, 'En bonne santé', 'Croquettes', 298, '2024-04-04', 'Le vétérinaire doit revenir.'),
(228, 10, 8, 'En mauvaise santé', 'Croquettes', 148, '2024-04-28', 'Le vétérinaire doit revenir.'),
(229, 10, 10, 'En mauvaise santé', 'Foin', 92, '2024-04-25', ' '),
(230, 10, 17, 'En mauvaise santé', 'Poisson', 50, '2024-04-17', 'Le vétérinaire doit revenir.'),
(231, 10, 42, 'En bonne santé', 'Poisson', 282, '2024-04-03', ' '),
(232, 10, 53, 'En mauvaise santé', 'Croquettes', 119, '2024-04-07', ' '),
(233, 10, 23, 'En bonne santé', 'Croquettes', 62, '2024-04-29', ' '),
(234, 10, 26, 'En bonne santé', 'Poisson', 274, '2024-04-03', ' '),
(235, 10, 13, 'En bonne santé', 'Foin', 276, '2024-05-02', ' '),
(236, 10, 3, 'En mauvaise santé', 'Foin', 158, '2024-04-09', 'Le vétérinaire doit revenir.'),
(237, 10, 37, 'En mauvaise santé', 'Croquettes', 118, '2024-05-02', 'Le vétérinaire doit revenir.'),
(238, 10, 5, 'En bonne santé', 'Poisson', 315, '2024-04-20', ' '),
(239, 10, 14, 'En bonne santé', 'Poisson', 206, '2024-04-08', ' '),
(240, 10, 19, 'En bonne santé', 'Foin', 290, '2024-04-10', ' '),
(241, 10, 46, 'En bonne santé', 'Poisson', 247, '2024-04-09', ' '),
(242, 10, 24, 'En mauvaise santé', 'Croquettes', 282, '2024-04-21', ' '),
(243, 10, 24, 'En bonne santé', 'Croquettes', 210, '2024-04-30', 'Le vétérinaire doit revenir.'),
(244, 10, 37, 'En bonne santé', 'Croquettes', 51, '2024-04-21', ' '),
(245, 10, 28, 'En bonne santé', 'Poisson', 316, '2024-04-27', ' '),
(246, 10, 58, 'En bonne santé', 'Poisson', 269, '2024-04-07', 'Tout va bien.'),
(247, 10, 42, 'En bonne santé', 'Poisson', 306, '2024-05-02', ' '),
(248, 10, 31, 'En mauvaise santé', 'Croquettes', 218, '2024-04-23', ' '),
(249, 10, 2, 'En mauvaise santé', 'Foin', 65, '2024-04-18', 'Le vétérinaire doit revenir.'),
(250, 10, 13, 'En bonne santé', 'Poisson', 338, '2024-04-24', ' '),
(251, 10, 35, 'En bonne santé', 'Poisson', 199, '2024-04-28', 'Le vétérinaire doit revenir.'),
(252, 10, 16, 'En bonne santé', 'Croquettes', 325, '2024-04-13', ' '),
(253, 10, 36, 'En mauvaise santé', 'Poisson', 246, '2024-04-29', ' '),
(254, 10, 36, 'En bonne santé', 'Croquettes', 147, '2024-04-09', 'Le vétérinaire doit revenir.'),
(255, 10, 23, 'En bonne santé', 'Croquettes', 222, '2024-04-03', 'Le vétérinaire doit revenir.'),
(256, 10, 51, 'En bonne santé', 'Croquettes', 219, '2024-04-18', ' '),
(257, 10, 1, 'En mauvaise santé', 'Poisson', 146, '2024-04-08', 'Tout va bien.'),
(258, 10, 13, 'En mauvaise santé', 'Poisson', 308, '2024-04-06', 'Le vétérinaire doit revenir.'),
(259, 10, 13, 'En bonne santé', 'Poisson', 295, '2024-04-29', 'Tout va bien.'),
(260, 10, 28, 'En mauvaise santé', 'Poisson', 325, '2024-04-29', ' '),
(261, 10, 46, 'En bonne santé', 'Poisson', 126, '2024-04-09', 'Tout va bien.'),
(262, 10, 10, 'En mauvaise santé', 'Croquettes', 293, '2024-04-07', ' '),
(263, 10, 20, 'En mauvaise santé', 'Foin', 258, '2024-04-12', ' '),
(264, 10, 37, 'En mauvaise santé', 'Poisson', 60, '2024-05-01', 'Tout va bien.'),
(265, 10, 28, 'En mauvaise santé', 'Poisson', 243, '2024-04-24', ' '),
(266, 10, 53, 'En mauvaise santé', 'Croquettes', 118, '2024-04-07', ' '),
(267, 10, 25, 'En bonne santé', 'Poisson', 60, '2024-04-08', 'Tout va bien.'),
(268, 10, 38, 'En bonne santé', 'Poisson', 97, '2024-04-03', 'Le vétérinaire doit revenir.'),
(269, 10, 42, 'En bonne santé', 'Poisson', 272, '2024-04-05', 'Le vétérinaire doit revenir.'),
(270, 10, 43, 'En bonne santé', 'Poisson', 67, '2024-04-04', ' '),
(271, 10, 3, 'En bonne santé', 'Foin', 88, '2024-04-13', ' '),
(272, 10, 25, 'En mauvaise santé', 'Croquettes', 302, '2024-04-04', 'Tout va bien.'),
(273, 10, 4, 'En mauvaise santé', 'Poisson', 212, '2024-04-20', 'Le vétérinaire doit revenir.'),
(274, 10, 11, 'En mauvaise santé', 'Foin', 219, '2024-05-02', 'Le vétérinaire doit revenir.'),
(275, 10, 48, 'En bonne santé', 'Foin', 75, '2024-04-06', 'Tout va bien.'),
(276, 10, 52, 'En bonne santé', 'Poisson', 312, '2024-04-12', ' '),
(277, 10, 37, 'En bonne santé', 'Poisson', 322, '2024-04-24', ' '),
(278, 10, 4, 'En mauvaise santé', 'Croquettes', 133, '2024-04-15', 'Tout va bien.'),
(279, 10, 42, 'En bonne santé', 'Croquettes', 128, '2024-04-12', ' '),
(280, 10, 35, 'En bonne santé', 'Croquettes', 52, '2024-04-24', ' '),
(281, 10, 51, 'En mauvaise santé', 'Croquettes', 125, '2024-04-16', 'Tout va bien.'),
(282, 10, 36, 'En mauvaise santé', 'Poisson', 187, '2024-04-06', 'Tout va bien.'),
(283, 10, 24, 'En bonne santé', 'Poisson', 242, '2024-04-18', ' '),
(284, 10, 2, 'En bonne santé', 'Croquettes', 311, '2024-04-15', 'Le vétérinaire doit revenir.'),
(285, 10, 57, 'En mauvaise santé', 'Poisson', 135, '2024-04-06', 'Le vétérinaire doit revenir.'),
(286, 10, 1, 'En mauvaise santé', 'Croquettes', 197, '2024-04-25', 'Le vétérinaire doit revenir.'),
(287, 10, 3, 'En bonne santé', 'Foin', 286, '2024-04-26', ' '),
(288, 10, 37, 'En mauvaise santé', 'Foin', 316, '2024-04-25', 'Le vétérinaire doit revenir.'),
(289, 10, 2, 'En mauvaise santé', 'Foin', 64, '2024-04-11', 'Le vétérinaire doit revenir.'),
(290, 10, 7, 'En bonne santé', 'Croquettes', 311, '2024-04-06', ' '),
(291, 10, 5, 'En mauvaise santé', 'Poisson', 306, '2024-04-06', ' '),
(292, 10, 2, 'En bonne santé', 'Croquettes', 175, '2024-05-01', ' '),
(293, 10, 58, 'En mauvaise santé', 'Croquettes', 162, '2024-04-10', 'Le vétérinaire doit revenir.'),
(294, 10, 26, 'En mauvaise santé', 'Foin', 278, '2024-04-05', ' '),
(295, 10, 36, 'En mauvaise santé', 'Croquettes', 193, '2024-04-29', ' '),
(296, 10, 48, 'En bonne santé', 'Poisson', 223, '2024-04-14', ' '),
(297, 10, 6, 'En bonne santé', 'Poisson', 67, '2024-04-16', 'Le vétérinaire doit revenir.'),
(298, 10, 4, 'En bonne santé', 'Foin', 290, '2024-05-01', 'Le vétérinaire doit revenir.'),
(299, 10, 6, 'En bonne santé', 'Poisson', 332, '2024-04-26', ' '),
(300, 10, 26, 'En bonne santé', 'Croquettes', 277, '2024-04-20', ' '),
(301, 10, 38, 'En bonne santé', 'Foin', 204, '2024-04-15', ' '),
(302, 10, 42, 'En mauvaise santé', 'Foin', 306, '2024-04-21', ' '),
(303, 10, 39, 'En bonne santé', 'Croquettes', 99, '2024-04-11', 'Tout va bien.'),
(304, 10, 31, 'En bonne santé', 'Croquettes', 328, '2024-04-09', 'Tout va bien.'),
(305, 10, 19, 'En bonne santé', 'Croquettes', 344, '2024-04-17', ' '),
(306, 10, 55, 'En bonne santé', 'Poisson', 150, '2024-04-25', ' '),
(307, 10, 49, 'En mauvaise santé', 'Croquettes', 191, '2024-04-25', ' '),
(308, 10, 31, 'En bonne santé', 'Poisson', 83, '2024-04-16', ' '),
(309, 10, 12, 'En mauvaise santé', 'Poisson', 136, '2024-04-05', ' '),
(310, 10, 43, 'En bonne santé', 'Foin', 208, '2024-04-30', ' '),
(311, 10, 7, 'En bonne santé', 'Croquettes', 110, '2024-04-15', 'Le vétérinaire doit revenir.'),
(312, 10, 16, 'En bonne santé', 'Foin', 166, '2024-04-14', ' '),
(313, 10, 2, 'En mauvaise santé', 'Foin', 72, '2024-04-06', 'Tout va bien.'),
(314, 10, 5, 'En mauvaise santé', 'Poisson', 334, '2024-04-06', 'Le vétérinaire doit revenir.'),
(315, 10, 41, 'En bonne santé', 'Poisson', 196, '2024-05-02', ' '),
(316, 10, 45, 'En bonne santé', 'Croquettes', 191, '2024-04-05', 'Le vétérinaire doit revenir.'),
(317, 10, 34, 'En bonne santé', 'Croquettes', 263, '2024-04-19', 'Tout va bien.'),
(318, 10, 31, 'En bonne santé', 'Poisson', 258, '2024-04-14', ' '),
(319, 10, 10, 'En mauvaise santé', 'Poisson', 145, '2024-04-26', 'Tout va bien.'),
(320, 10, 51, 'En bonne santé', 'Foin', 78, '2024-04-18', 'Tout va bien.'),
(321, 10, 23, 'En bonne santé', 'Poisson', 188, '2024-04-14', ' '),
(322, 10, 20, 'En mauvaise santé', 'Poisson', 224, '2024-04-22', 'Tout va bien.'),
(323, 10, 15, 'En bonne santé', 'Foin', 293, '2024-04-26', ' '),
(324, 10, 7, 'En mauvaise santé', 'Poisson', 58, '2024-04-25', 'Tout va bien.'),
(325, 10, 11, 'En bonne santé', 'Croquettes', 85, '2024-04-06', 'Le vétérinaire doit revenir.'),
(326, 10, 39, 'En bonne santé', 'Foin', 169, '2024-04-09', 'Le vétérinaire doit revenir.'),
(327, 10, 42, 'En bonne santé', 'Poisson', 325, '2024-04-15', 'Tout va bien.'),
(328, 10, 12, 'En bonne santé', 'Foin', 257, '2024-04-28', ' '),
(329, 10, 2, 'Bonne santé', 'Croquettes', 150, '2024-05-01', 'Aucun problème de santé détecté. L\'animal semble en bonne forme.'),
(330, 10, 2, 'Santé acceptable', 'Pâtée', 100, '2024-05-02', 'Un léger problème de digestion. Surveiller l\'alimentation.'),
(331, 10, 2, 'Santé préoccupante', 'Viande crue', 200, '2024-05-03', 'Problème de santé identifié. Consultation vétérinaire nécessaire.'),
(332, 10, 2, 'Bonne santé', 'Riz et poulet', 120, '2024-05-04', 'Aucun problème de santé détecté. L\'animal semble en bonne forme.'),
(333, 10, 2, 'Santé acceptable', 'Croquettes', 80, '2024-05-05', 'Un léger problème de surpoids. Contrôler la quantité de nourriture.'),
(334, 10, 2, 'Bonne santé', 'Pâtée', 90, '2024-05-06', 'Aucun problème de santé détecté. L\'animal semble en bonne forme.'),
(335, 10, 2, 'Santé préoccupante', 'Viande crue', 180, '2024-05-07', 'Problème de santé identifié. Consultation vétérinaire nécessaire.'),
(336, 10, 2, 'Bonne santé', 'Croquettes', 200, '2024-05-08', 'Aucun problème de santé détecté. L\'animal semble en bonne forme.'),
(337, 10, 2, 'Santé acceptable', 'Pâtée', 110, '2024-05-09', 'Un léger problème de digestion. Surveiller l\'alimentation.'),
(338, 10, 2, 'Santé préoccupante', 'Riz et poulet', 130, '2024-05-10', 'Problème de santé identifié. Consultation vétérinaire nécessaire.'),
(339, 11, 5, 'OK', 'ok', 100, '2024-05-14', 'çava');

-- --------------------------------------------------------

--
-- Structure de la table `reviews`
--

CREATE TABLE `reviews` (
  `id` int(11) NOT NULL,
  `pseudo` varchar(255) NOT NULL,
  `message` text NOT NULL,
  `isChecked` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `reviews`
--

INSERT INTO `reviews` (`id`, `pseudo`, `message`, `isChecked`) VALUES
(1, 'Jean123', 'J\'ai adoré ma visite au zoo ! Les animaux sont très bien entretenus.', 1),
(2, 'MarieZoo', 'Une expérience incroyable ! Mes enfants étaient ravis de voir tous les animaux.', 1),
(3, 'Paulo83', 'Le zoo est magnifique, mais il y avait trop de monde lors de ma visite.', 1),
(4, 'Camille', 'J\'ai été déçue par l\'état de certains enclos. Les animaux semblaient malheureux.', 1),
(5, 'Lucas76', 'Superbe journée au zoo ! Les spectacles étaient fantastiques.', 1),
(6, 'NathalieP', 'Les prix sont un peu élevés, mais la qualité de la visite vaut le coup.', 1),
(7, 'Zoé_L', 'Les installations sont bien entretenues, mais j\'aurais aimé plus d\'informations sur les animaux.', 1),
(8, 'Antoine123', 'Je recommande vivement ce zoo ! La variété d\'espèces est impressionnante.', 1),
(9, 'JulietteB', 'Une visite instructive pour toute la famille ! Les soigneurs sont passionnés.', 0),
(10, 'SimonC', 'Je suis venu plusieurs fois et je ne m\'en lasse pas. Toujours une expérience enrichissante.', 0),
(11, 'Marc36', 'Quelle journée incroyable au zoo ! Les animaux étaient si fascinants à observer, et j\'ai tellement appris sur la diversité de notre belle planète. C\'était une expérience qui a vraiment égayé ma journée et renforcé mon amour pour la nature. #Gratitude #BelleJournée', 1),
(26, 'Paul', 'J\'ai adoré cette visite. L\'équipe est au top, mes enfants sont ravis. Merci !!', 0),
(29, 'Hello', 'C&#039;était top', 0),
(30, 'Test2', 'Voilà c&#039;était cool', 0);

-- --------------------------------------------------------

--
-- Structure de la table `role`
--

CREATE TABLE `role` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `role`
--

INSERT INTO `role` (`id`, `name`) VALUES
(1, 'admin'),
(2, 'vétérinaire'),
(3, 'employé');

-- --------------------------------------------------------

--
-- Structure de la table `services`
--

CREATE TABLE `services` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `image` varchar(255) NOT NULL,
  `isFree` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `services`
--

INSERT INTO `services` (`id`, `name`, `description`, `image`, `isFree`) VALUES
(1, 'Petit train', 'Explorez notre parc à bord de notre charmant petit train, une manière relaxante et divertissante de découvrir les trésors cachés de la forêt de Brocéliande et d\'admirer nos merveilleux pensionnaires sous un nouvel angle.\r\n', 'train.jpg', '0'),
(2, 'Visites guidées', 'Pour une expérience encore plus enrichissante, nos visites guidées vous emmènent dans un voyage captivant à travers les différents habitats de nos animaux. Nos guides passionnés partageront avec vous des connaissances fascinantes sur nos résidents, tout en mettant l\'accent sur notre engagement envers le respect de l\'environnement et le bien-être animal. Rejoignez-nous pour une aventure mémorable, où chaque moment est une découverte.', 'fauconnier.jpg', '1'),
(3, 'Restauration', 'Plongez dans une aventure unique au zoo Arcadia, où chaque visiteur est choyé avec une gamme de services exceptionnels. Notre espace de restauration propose une variété de délices culinaires, allant des snacks rapides aux repas gastronomiques, pour ravir les papilles des petits et des grands aventuriers.', 'restaurant.jpg', '0'),
(7, 'Nourrissage des lémuriens', 'Venez donner à manger aux singes !', '662d0b2f6ab90-lemuriens.jpg', '0');

-- --------------------------------------------------------

--
-- Structure de la table `species`
--

CREATE TABLE `species` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `image` varchar(255) DEFAULT NULL,
  `habitat_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `species`
--

INSERT INTO `species` (`id`, `name`, `image`, `habitat_id`) VALUES
(1, 'Faucon pélerin', 'faucon.jpg', 1),
(2, 'Buse à queue rousse', 'buse.jpg', 1),
(3, 'Aigle royal', 'aigle.jpg', 1),
(4, 'Epervier d\'Europe', 'epervier.jpg', 1),
(5, 'Crocodile', 'crocodile.jpg', 1),
(6, 'Hippopotame', 'hippopotame.jpg', 1),
(7, 'Castor', 'castor.jpg', 1),
(8, 'Héron', 'heron.jpg', 1),
(9, 'Flamand Rose', 'flamand.jpg', 1),
(10, 'Couleuvre vipérine', 'couleuvre.jpg', 2),
(11, 'Boa constrictor', 'boa.jpg', 2),
(12, 'Python', 'python.jpg', 2),
(13, 'Panthère noire', 'panthere.jpg', 2),
(14, 'Panda roux', 'pandaroux.jpg', 2),
(15, 'Lémurien', 'lemurien.jpg', 2),
(16, 'Girafe', 'girafe.jpg', 3),
(17, 'Zèbre', 'zebre.jpg', 3),
(18, 'Suricate', 'suricate.jpg', 3),
(19, 'Lion', 'lion.jpg', 3);

-- --------------------------------------------------------

--
-- Structure de la table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `email` varchar(255) NOT NULL,
  `first_name` varchar(255) NOT NULL,
  `last_name` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `role_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `user`
--

INSERT INTO `user` (`id`, `email`, `first_name`, `last_name`, `password`, `role_id`) VALUES
(9, 'admin@email.com', 'Admini', 'Strator', '$2y$10$EETQwKXm8oFsvBhSqtQHGOVkHCE5pIscCslXUvKCu1dliJFjF0YBG', 1),
(10, 'veto.jean@email.com', 'Jean', 'Veto', '$2y$10$kHcAHfIaTArtGX1b1cMaP.wOaoJswyP.JDBGM4Y/5Q.SMlavHpCJC', 2),
(11, 'employee.dany@email.com', 'Daenerys', 'Targaryen', '$2y$10$zgiWimPrbSg0tRIhLZ9ez.o6a3IbaVk9739lqtQja3arPbE17YKqS', 3);

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `animals`
--
ALTER TABLE `animals`
  ADD PRIMARY KEY (`id`),
  ADD KEY `species_id` (`species_id`);

--
-- Index pour la table `feeding`
--
ALTER TABLE `feeding`
  ADD PRIMARY KEY (`id`),
  ADD KEY `animal_id` (`animal_id`);

--
-- Index pour la table `habitatcomments`
--
ALTER TABLE `habitatcomments`
  ADD PRIMARY KEY (`id`),
  ADD KEY `habitat_id` (`habitat_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Index pour la table `habitats`
--
ALTER TABLE `habitats`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `reports`
--
ALTER TABLE `reports`
  ADD PRIMARY KEY (`id`),
  ADD KEY `animal_id` (`animal_id`),
  ADD KEY `vet_id` (`vet_id`);

--
-- Index pour la table `reviews`
--
ALTER TABLE `reviews`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `role`
--
ALTER TABLE `role`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `services`
--
ALTER TABLE `services`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `species`
--
ALTER TABLE `species`
  ADD PRIMARY KEY (`id`),
  ADD KEY `habitat_id` (`habitat_id`);

--
-- Index pour la table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`),
  ADD KEY `role_id` (`role_id`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `animals`
--
ALTER TABLE `animals`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=59;

--
-- AUTO_INCREMENT pour la table `feeding`
--
ALTER TABLE `feeding`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=118;

--
-- AUTO_INCREMENT pour la table `habitatcomments`
--
ALTER TABLE `habitatcomments`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT pour la table `habitats`
--
ALTER TABLE `habitats`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT pour la table `reports`
--
ALTER TABLE `reports`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=340;

--
-- AUTO_INCREMENT pour la table `reviews`
--
ALTER TABLE `reviews`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT pour la table `role`
--
ALTER TABLE `role`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT pour la table `services`
--
ALTER TABLE `services`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT pour la table `species`
--
ALTER TABLE `species`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT pour la table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `animals`
--
ALTER TABLE `animals`
  ADD CONSTRAINT `animals_ibfk_1` FOREIGN KEY (`species_id`) REFERENCES `species` (`id`);

--
-- Contraintes pour la table `feeding`
--
ALTER TABLE `feeding`
  ADD CONSTRAINT `feeding_ibfk_1` FOREIGN KEY (`animal_id`) REFERENCES `animals` (`id`);

--
-- Contraintes pour la table `habitatcomments`
--
ALTER TABLE `habitatcomments`
  ADD CONSTRAINT `habitatcomments_ibfk_1` FOREIGN KEY (`habitat_id`) REFERENCES `habitats` (`id`),
  ADD CONSTRAINT `habitatcomments_ibfk_2` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`);

--
-- Contraintes pour la table `reports`
--
ALTER TABLE `reports`
  ADD CONSTRAINT `reports_ibfk_1` FOREIGN KEY (`animal_id`) REFERENCES `animals` (`id`),
  ADD CONSTRAINT `reports_ibfk_2` FOREIGN KEY (`vet_id`) REFERENCES `user` (`id`);

--
-- Contraintes pour la table `species`
--
ALTER TABLE `species`
  ADD CONSTRAINT `species_ibfk_1` FOREIGN KEY (`habitat_id`) REFERENCES `habitats` (`id`);

--
-- Contraintes pour la table `user`
--
ALTER TABLE `user`
  ADD CONSTRAINT `user_ibfk_1` FOREIGN KEY (`role_id`) REFERENCES `role` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

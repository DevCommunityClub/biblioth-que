-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le : mar. 02 mars 2021 à 23:39
-- Version du serveur :  5.7.31
-- Version de PHP : 7.3.21

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `library`
--

-- --------------------------------------------------------

--
-- Structure de la table `media`
--

DROP TABLE IF EXISTS `media`;
CREATE TABLE IF NOT EXISTS `media` (
  `id` smallint(5) UNSIGNED NOT NULL AUTO_INCREMENT,
  `Titre` varchar(50) COLLATE utf8_bin NOT NULL,
  `Auteur` varchar(50) COLLATE utf8_bin NOT NULL,
  `Type` varchar(40) COLLATE utf8_bin NOT NULL,
  `Description` text COLLATE utf8_bin NOT NULL,
  `Etat` varchar(40) COLLATE utf8_bin NOT NULL,
  `Date_emprunt` date DEFAULT NULL,
  `Date_rendu` date DEFAULT NULL,
  `Lien_image` text COLLATE utf8_bin NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Déchargement des données de la table `media`
--

INSERT INTO `media` (`id`, `Titre`, `Auteur`, `Type`, `Description`, `Etat`, `Date_emprunt`, `Date_rendu`, `Lien_image`) VALUES
(1, 'Max et Lili ont peur du noir. 122', 'Dominique de Saint Mars', 'BD', 'L\'histoire : Max et Lili ne veulent pas se l\'avouer, mais ils ont peur dans le noir ! Ils essaient plein de méthodes : la veilleuse, les doudous, le jeu dans l\'obscurité... Le sujet : Ce livre de Max et Lili parle de la très ancienne peur du noir des enfants ou des adultes ! On se sent aveugle, fragile, seul. On ne reconnaît plus ce qu\'on touche, ce qu\'on entend. On a peur de la moindre ombre, et sous son lit, on imagine toutes sortes de monstres... ! La réflexion : Une histoire pour comprendre que le cerveau met l\'imagination en alerte dès qu\'il n\'arrive plus à contrôler son environnement avec ses cinq sens. Il est prêt à croire n\'importe quoi ! On peut se rassurer en expliquant ses peurs et en occupant son imaginaire avec des pensées agréables, des monstres gentils et des livres drô', 'Mauvais Etat', NULL, NULL, 'https://static.fnac-static.com/multimedia/Images/FR/NR/4a/dd/ae/11459914/1507-1/tsp20200130165132/Max-et-Lili-ont-peur-du-noir.jpg'),
(2, 'Star à domicile. 4', 'Nob', 'BD', 'Ce n\'est pas tous les jours facile de s\'occuper de quatre filles fortes en caractère, et Dad est bien placé pour le savoir. Entre l\'émancipation grandissante de son aînée Pandora, les questionnements amoureux d\'Ondine, les prises de position éthiques d\'une Roxane survoltée et les demandes d\'attention constantes de Bébérenice, la petite dernière, ce comédien au chômage aura au moins trouvé un rôle à la mesure de son talent : celui d\'un père comblé.', 'Etat Normal', NULL, NULL, 'http://mediatheques.drancydugnylebourget.fr/Ils/digitalCollection/DigitalCollectionThumbnailHandler.ashx?documentId=1494005&size=LARGE&fallback=https%3a%2f%2fcovers.archimed.fr%2fCover%2fCAAEB%2fMONO%2fGgnNk8mcqxnDl07dJUr7lQ2%2f9782800170336%2fLARGE%3ffallback%3dhttp%253a%252f%252fmediatheques.drancydugnylebourget.fr%252fui%252fskins%252fdefault%252fportal%252ffront%252fimages%252fGeneral%252fDocType%252fMONO_LARGE.png'),
(3, 'Max et Lili ont peur des images violentes. 109 ', 'Dominique de Saint Mars', 'BD', 'Max est accro aux jeux vidéo, mais la nuit, il fait des cauchemars. Lili ne supporte pas les images violentes. Un jour, à la bibliothèque, ils sont témoins d\'une scène de violence, pour de vrai... Comment vont-ils réagir ?', 'Bon Etat', NULL, NULL, 'https://static.fnac-static.com/multimedia/Images/FR/NR/3b/33/65/6632251/1507-1/tsp20150630112325/Max-et-Lili-ont-peur-des-images-violentes.jpg'),
(4, 'L\'Attaque des Titans. 29', 'Isayama Hajime ', 'Manga', 'Déterminés à déclencher le  Grand  Terrassement, les pro-Jäger  passent à l\'action. Après avoir assassiné le général  Zackley  et neutralisé l\'ensemble de l\'État-major, ils partent rejoindre Sieg, dont  Livaï  s\'apprête à découvrir les véritables intentions...', 'Bon Etat', NULL, NULL, 'https://static.fnac-static.com/multimedia/Images/FR/NR/02/ca/ab/11258370/1507-1/tsp20191127144213/L-Attaque-des-Titans.jpg'),
(5, 'Naruto. 3 ', 'Masashi Kishimoto', 'Manga', 'Avec Sasuke et Sakura, Naruto, le pire garnement de l\'école de ninjas de Konoha, un village caché, réussit avec brio le test de survie imposé par maître Kakashi. Les trois jeunes gens forment une vraie équipe, mais ils ne sont encore que des ninjas de rang inférieur.', 'Bon Etat', NULL, NULL, 'https://static.fnac-static.com/multimedia/Images/FR/NR/48/16/14/1316424/1507-1/tsp20210216180555/Naruto.jpg');

-- --------------------------------------------------------

--
-- Structure de la table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `id` smallint(5) UNSIGNED NOT NULL AUTO_INCREMENT,
  `username` varchar(40) COLLATE utf8_bin NOT NULL,
  `nom` varchar(80) COLLATE utf8_bin NOT NULL,
  `prenom` varchar(80) COLLATE utf8_bin NOT NULL,
  `password` varchar(40) COLLATE utf8_bin NOT NULL,
  `mail` varchar(255) COLLATE utf8_bin NOT NULL,
  `role` tinyint(3) UNSIGNED NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Déchargement des données de la table `users`
--

INSERT INTO `users` (`id`, `username`, `nom`, `prenom`, `password`, `mail`, `role`) VALUES
(1, 'root', 'admin', 'admin', '$2y$10$URo3QfpImdij6fiPk2WimeEtpN7ZRIEI0', 'admin@lprs.fr', 1),
(2, 'Retr0', 'Francisco', 'Benjamin', '$2y$10$ifo9ZU/Bx6q15t6gNqhyneP3hOojNDYtc', 'b.francisco@lprs.fr', 2);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

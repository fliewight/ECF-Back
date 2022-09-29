-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le : jeu. 29 sep. 2022 à 10:57
-- Version du serveur : 10.4.24-MariaDB
-- Version de PHP : 8.0.19

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `ecf-back`
--

-- --------------------------------------------------------

--
-- Structure de la table `category`
--

CREATE TABLE `category` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `slug` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `category`
--

INSERT INTO `category` (`id`, `name`, `slug`) VALUES
(1, 'iPhone', 'iphone'),
(2, 'Huawei', 'huawei'),
(3, 'Nokia', 'nokia');

-- --------------------------------------------------------

--
-- Structure de la table `color`
--

CREATE TABLE `color` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `hexa_code` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `product`
--

CREATE TABLE `product` (
  `id` int(15) NOT NULL,
  `name` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `price` float NOT NULL,
  `slug` varchar(255) NOT NULL,
  `creation_date` date NOT NULL,
  `crush` tinyint(1) DEFAULT NULL,
  `colors_list` varchar(255) NOT NULL,
  `image` varchar(255) NOT NULL,
  `promotion` int(11) DEFAULT NULL,
  `category_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `product`
--

INSERT INTO `product` (`id`, `name`, `description`, `price`, `slug`, `creation_date`, `crush`, `colors_list`, `image`, `promotion`, `category_id`) VALUES
(2, 'iPhone 12', 'L\'iPhone 12 est le modèle principal de la 14e génération de smartphone d\'Apple annoncé le 13 octobre 2020. Il est équipé d\'un écran de 6,1 pouces OLED HDR 60 Hz, d\'un double capteur photo avec ultra grand-angle et d\'un SoC Apple A14 Bionic compatible 5G (sub-6 GHz)', 1300, 'iphone-12', '2022-09-01', 1, '#ff0000', 'https://store.storeimages.cdn-apple.com/4668/as-images.apple.com/is/iphone-12-finish-select-202207-purple?wid=2560&hei=1440&fmt=jpeg&qlt=95&.v=1662150036753', 5, 1),
(3, 'Huawei P20', 'Le Huawei P20 Pro est la version grand format du nouveau flagship de Huawei annoncé le 27 Mars 2018 à Paris. Il dispose d\'un SoC Kirin 970 et d\'un triple capteur photo arrière de 40+20+8 mégapixels et d\'un écran borderless AMOLED de 6,1 pouces', 430, 'huawei-p20-pro', '2019-09-10', 1, '#3383FF', 'https://images.frandroid.com/wp-content/uploads/2019/04/huawei-p20-pro.png', 15, 2),
(4, 'Huawei P30 Pro', 'Le Huawei P30 Pro est un smartphone haut de gamme annoncé par Huawei en mars 2019. Équipé d\'une puce Kirin 980, il dispose d\'un quadruple capteur photo compatible zoom 10x, d\'un SoC Kirin 980 et d\'un écran de 6,47 pouces borderless avec une petite encoche', 600, 'huawei-p30-pro', '2020-09-19', NULL, '#C133FF', 'https://d1eh9yux7w8iql.cloudfront.net/product_images/283569_f9e62212-d422-4387-9d5d-6a9a6e3b6a41.jpg', 20, 2),
(5, 'Nokia 3310', 'Le nouveau Nokia 3310 emprunte la silhouette emblématique de l\'original et la réinvente pour 2017. L\'interface utilisateur conçue sur mesure renouvelle son aspect', 1000, 'nokia-3310', '2022-09-14', NULL, '#0000ff', 'https://www.cdiscount.com/pdt2/0/3/2/1/700x700/nok3700968000032/rw/nokia-3310.jpg', NULL, 3),
(6, 'Nokia 3410', 'Le Nokia 3410 est un téléphone mobile créé et commercialisé par Nokia en 2002', 2000, 'nokia-3410', '2022-09-14', 1, '#00ff55', 'https://www.picclickimg.com/hv0AAOSwnaBhCmCl/Telephone-Mobile-Nokia-3410-debloque-tout-operateur-et.jpg', NULL, 3),
(7, 'iPhone 3S', 'L\'iPhone 3GS est un smartphone, modèle de la 3e génération d\'iPhone, de la marque Apple. Il est dévoilé le 8 juin 2009 lors de la WWDC au Moscone Center à San Francisco', 550, 'iphone-4s', '2022-09-18', NULL, '#ff0099', 'https://upload.wikimedia.org/wikipedia/commons/thumb/b/b3/Iphone_3GS-1.jpg/200px-Iphone_3GS-1.jpg', NULL, 1),
(8, 'iPhone 4S', 'L\'iPhone 4S est un smartphone, modèle de la 5e génération d\'iPhone de la marque Apple. Il suit l\'iPhone 4 et précède l\'iPhone 5', 655, 'iphone-4S', '2022-09-22', 1, '#ff0088', 'https://upload.wikimedia.org/wikipedia/commons/thumb/d/d2/IPhone_4S_No_shadow.png/200px-IPhone_4S_No_shadow.png', 12, 1),
(12, 'name', 'desc', 50, 'slug', '2022-09-13', NULL, 'color', 'image', 20, 1);

-- --------------------------------------------------------

--
-- Structure de la table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `color`
--
ALTER TABLE `color`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`id`),
  ADD KEY `category_id` (`category_id`);

--
-- Index pour la table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `category`
--
ALTER TABLE `category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT pour la table `color`
--
ALTER TABLE `color`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `product`
--
ALTER TABLE `product`
  MODIFY `id` int(15) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT pour la table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `product`
--
ALTER TABLE `product`
  ADD CONSTRAINT `product_ibfk_1` FOREIGN KEY (`category_id`) REFERENCES `category` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

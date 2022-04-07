-- phpMyAdmin SQL Dump
-- version 4.3.11
-- http://www.phpmyadmin.net
--
-- Client :  127.0.0.1
-- Généré le :  Mar 22 Mai 2018 à 16:18
-- Version du serveur :  5.6.24
-- Version de PHP :  5.6.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de données :  `magasin`
--


CREATE DATABASE magasin;

USE magasin;

-- --------------------------------------------------------

--
-- Structure de la table `t_categories`
--

CREATE TABLE IF NOT EXISTS `t_categories` (
  `id_cat` int(10) unsigned NOT NULL,
  `nom_cat` varchar(30) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=latin1 COMMENT='tables des catégories';

--
-- Contenu de la table `t_categories`
--

INSERT INTO `t_categories` (`id_cat`, `nom_cat`) VALUES
(1, 'Fruits'),
(2, 'Legumes'),
(3, 'Films'),
(4, 'Livres pour enfants'),
(5, 'Posters'),
(6, 'Figurines'),
(7, 'Comestible');

-- --------------------------------------------------------

--
-- Structure de la table `t_cat_prd`
--

CREATE TABLE IF NOT EXISTS `t_cat_prd` (
  `id_cat` int(10) unsigned NOT NULL,
  `id_prd` int(10) unsigned NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Contenu de la table `t_cat_prd`
--

INSERT INTO `t_cat_prd` (`id_cat`, `id_prd`) VALUES
(1, 1),
(1, 2);

-- --------------------------------------------------------

--
-- Structure de la table `t_produits`
--

CREATE TABLE IF NOT EXISTS `t_produits` (
  `id_prd` int(10) unsigned NOT NULL,
  `nom_prd` varchar(20) NOT NULL,
  `cat_prd` int(10) unsigned NOT NULL,
  `description_prd` text NOT NULL,
  `prix_prd` float unsigned NOT NULL,
  `url_prd` tinytext NOT NULL,
  `stock_prd` tinyint(4) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

--
-- Contenu de la table `t_produits`
--

INSERT INTO `t_produits` (`id_prd`, `nom_prd`, `cat_prd`, `description_prd`, `prix_prd`, `url_prd`, `stock_prd`) VALUES
(1, 'Pommes', 0, 'Golden', 4.9, '', 1),
(2, 'Poires', 0, 'Conférence', 5.1, '', 1),
(3, 'Anakin Skywalker', 0, 'Figurine datant d''avant 2015', 15.9, '', 1),
(4, 'Babar contre Rataxes', 0, 'Livre de 1960', 60.5, '', 1),
(5, 'Recettes amusantes', 0, 'Livre de recettes pour enfants ', 22.8, '', 1);

--
-- Index pour les tables exportées
--

--
-- Index pour la table `t_categories`
--
ALTER TABLE `t_categories`
  ADD PRIMARY KEY (`id_cat`), ADD KEY `id_cat` (`id_cat`);

--
-- Index pour la table `t_cat_prd`
--
ALTER TABLE `t_cat_prd`
  ADD UNIQUE KEY `id_cat_2` (`id_cat`,`id_prd`), ADD KEY `id_cat` (`id_cat`), ADD KEY `id_prd` (`id_prd`);

--
-- Index pour la table `t_produits`
--
ALTER TABLE `t_produits`
  ADD PRIMARY KEY (`id_prd`), ADD KEY `id_prd` (`id_prd`);

--
-- AUTO_INCREMENT pour les tables exportées
--

--
-- AUTO_INCREMENT pour la table `t_categories`
--
ALTER TABLE `t_categories`
  MODIFY `id_cat` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT pour la table `t_produits`
--
ALTER TABLE `t_produits`
  MODIFY `id_prd` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=6;
--
-- Contraintes pour les tables exportées
--

--
-- Contraintes pour la table `t_cat_prd`
--
ALTER TABLE `t_cat_prd`
ADD CONSTRAINT `t_cat_prd_ibfk_1` FOREIGN KEY (`id_cat`) REFERENCES `t_categories` (`id_cat`) ON DELETE CASCADE ON UPDATE CASCADE,
ADD CONSTRAINT `t_cat_prd_ibfk_2` FOREIGN KEY (`id_prd`) REFERENCES `t_produits` (`id_prd`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

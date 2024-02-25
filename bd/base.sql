-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le : lun. 12 fév. 2024 à 12:25
-- Version du serveur : 8.2.0
-- Version de PHP : 8.2.13

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `laravel`
--

-- --------------------------------------------------------

--
-- Structure de la table `avis_produits`
--

DROP TABLE IF EXISTS `avis_produits`;
CREATE TABLE IF NOT EXISTS `avis_produits` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `commentaire` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `note` int NOT NULL,
  `id_users` int NOT NULL,
  `id_produit` int NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `categories`
--

DROP TABLE IF EXISTS `categories`;
CREATE TABLE IF NOT EXISTS `categories` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `nom` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `commandes`
--

DROP TABLE IF EXISTS `commandes`;
CREATE TABLE IF NOT EXISTS `commandes` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `id_users` int NOT NULL,
  `date_commande` date NOT NULL,
  `status` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `detailscommandes`
--

DROP TABLE IF EXISTS `detailscommandes`;
CREATE TABLE IF NOT EXISTS `detailscommandes` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `id_commande` int NOT NULL,
  `id_produit` int NOT NULL,
  `quantite` int NOT NULL,
  `prix_unitaire` decimal(10,2) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `factures`
--

DROP TABLE IF EXISTS `factures`;
CREATE TABLE IF NOT EXISTS `factures` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `id_commande` int NOT NULL,
  `id_type` int NOT NULL,
  `montant_total` decimal(10,2) NOT NULL,
  `statut_paiement` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `date_facturation` date NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `livraisons`
--

DROP TABLE IF EXISTS `livraisons`;
CREATE TABLE IF NOT EXISTS `livraisons` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `id_users` int NOT NULL,
  `adresse` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `ville` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `code_postal` int NOT NULL,
  `pays` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `migrations`
--

DROP TABLE IF EXISTS `migrations`;
CREATE TABLE IF NOT EXISTS `migrations` (
  `id` int UNSIGNED NOT NULL AUTO_INCREMENT,
  `migration` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(2, '2024_02_12_110306_create_categories_table', 1),
(3, '2024_02_12_110947_create_commandes_table', 1),
(4, '2024_02_12_111025_create_factures_table', 2),
(5, '2024_02_12_112037_create_detailscommandes_table', 2),
(6, '2024_02_12_112050_create_livraisons_table', 2),
(7, '2024_02_12_112129_create_avis_produits_table', 2),
(8, '2024_02_12_112145_create_typepaiements_table', 2),
(9, '2024_02_12_112936_create_produit_table', 2),
(10, '2024_02_12_122142_create_users_table', 2);

-- --------------------------------------------------------

--
-- Structure de la table `personal_access_tokens`
--

DROP TABLE IF EXISTS `personal_access_tokens`;
CREATE TABLE IF NOT EXISTS `personal_access_tokens` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `tokenable_type` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `produit`
--

DROP TABLE IF EXISTS `produit`;
CREATE TABLE IF NOT EXISTS `produit` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `nom_produit` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `prix` decimal(10,2) NOT NULL,
  `stock` int NOT NULL,
  `moq` decimal(10,2) NOT NULL,
  `type_unite` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `id_categorie` int NOT NULL,
  `id_users` int NOT NULL,
  `etat` int NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `typepaiements`
--

DROP TABLE IF EXISTS `typepaiements`;
CREATE TABLE IF NOT EXISTS `typepaiements` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `nom` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `logo` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `id_users` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `nom` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `prenoms` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `adresse` varchar(120) COLLATE utf8mb4_unicode_ci NOT NULL,
  `role` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `photo` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id_users`),
  UNIQUE KEY `users_email_unique` (`email`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
---Vue Produit avec categorie---
SELECT
p.nom_produit as nom_produit, p.id_categorie as id_categorie, p.description as description,p.prix as prix,p.peremption as peremption,p.type_unite as type_unite,p.stock as stock,p.created_at as created_at,p.etat as etat,c.nom as categorie
FROM
    categories AS ca
JOIN produits AS p ON ca.id_categorie = p.id_categorie
JOIN categories AS c ON p.id_categorie = c.id_categorie
WHERE
    p.id_categorie = ca.id_categorie;
-- récupérer les détails d'une commande spécifique
SELECT
    co.id AS commande_id,
    co.id_users AS commande_user_id,
    co.date_commande AS commande_date,
    co.status AS commande_status,
    dc.id AS details_commande_id,
    dc.id_produit AS details_commande_produit_id,
    dc.quantite AS details_commande_quantite,
    dc.prix_unitaire AS details_commande_prix_unitaire,
    fa.id AS facture_id,
    fa.id_type AS facture_type_id,
    fa.montant_total AS facture_montant_total,
    fa.statut_paiement AS facture_statut_paiement,
    fa.date_facturation AS facture_date_facturation,
    li.id AS livraison_id,
    li.adresse AS livraison_adresse,
    li.ville AS livraison_ville,
    li.code_postal AS livraison_code_postal,
    li.pays AS livraison_pays,
    p.id AS produit_id,
    p.nom_produit AS produit_nom,
    p.description AS produit_description,
    p.prix AS produit_prix,
    p.type_unite AS produit_type_unite,
    c.nom AS categorie_nom,
    tp.nom AS type_paiement_nom,
    u.id_users AS user_id,
    u.nom AS user_nom,
    u.prenoms AS user_prenoms,
    u.email AS user_email,
    u.password AS user_password,
    u.adresse AS user_adresse,
    u.role AS user_role,
    u.photo AS user_photo
FROM
    commandes AS co
JOIN detailscommandes AS dc ON co.id = dc.id_commande
JOIN factures AS fa ON co.id = fa.id_commande
JOIN livraisons AS li ON co.id_users = li.id_users
JOIN produit AS p ON dc.id_produit = p.id
JOIN categories AS c ON p.id_categorie = c.id
JOIN typepaiements AS tp ON fa.id_type = tp.id
JOIN users AS u ON co.id_users = u.id_users
WHERE
    co.id = fa.id_commande;


-- Si vous souhaitez obtenir le nombre de stocks pour chaque produit, vous pouvez ajouter une colonne à votre requête pour récupérer cette information
SELECT
    p.id AS produit_id,
    p.nom_produit AS produit_nom,
    p.description AS produit_description,
    p.prix AS produit_prix,
    p.stock AS produit_stock,
    p.moq AS produit_moq,
    p.type_unite AS produit_type_unite,
    c.nom AS categorie_nom,
    tp.nom AS type_paiement_nom,
    tp.logo AS type_paiement_logo,
    u.id_users AS user_id,
    u.nom AS user_nom,
    u.prenoms AS user_prenoms,
    u.email AS user_email,
    u.password AS user_password,
    u.adresse AS user_adresse,
    u.role AS user_role,
    u.photo AS user_photo
FROM
    commandes AS co
JOIN detailscommandes AS dc ON co.id = dc.id_commande
JOIN factures AS fa ON co.id = fa.id_commande
JOIN livraisons AS li ON co.id_users = li.id_users
JOIN produit AS p ON dc.id_produit = p.id
JOIN categories AS c ON p.id_categorie = c.id
JOIN typepaiements AS tp ON fa.id_type = tp.id
JOIN users AS u ON co.id_users = u.id_users
WHERE
    co.id = dc.id_commande;

-- transaction spécifique d'un client lors de l'achat d'un produit
SELECT
    av.id AS avis_id,
    av.commentaire AS avis_commentaire,
    av.note AS avis_note,
    av.id_users AS avis_user_id,
    av.id_produit AS avis_produit_id,
    c.nom AS categorie_nom,
    co.id AS commande_id,
    co.id_users AS commande_user_id,
    co.date_commande AS commande_date,
    co.status AS commande_status,
    dc.id AS details_commande_id,
    dc.id_commande AS details_commande_commande_id,
    dc.id_produit AS details_commande_produit_id,
    dc.quantite AS details_commande_quantite,
    dc.prix_unitaire AS details_commande_prix_unitaire,
    fa.id AS facture_id,
    fa.id_commande AS facture_commande_id,
    fa.id_type AS facture_type_id,
    fa.montant_total AS facture_montant_total,
    fa.statut_paiement AS facture_statut_paiement,
    fa.date_facturation AS facture_date_facturation,
    li.id AS livraison_id,
    li.id_users AS livraison_user_id,
    li.adresse AS livraison_adresse,
    li.ville AS livraison_ville,
    li.code_postal AS livraison_code_postal,
    li.pays AS livraison_pays,
    p.id AS produit_id,
    p.nom_produit AS produit_nom,
    p.description AS produit_description,
    p.prix AS produit_prix,
    p.stock AS produit_stock,
    p.moq AS produit_moq,
    p.type_unite AS produit_type_unite,
    p.id_categorie AS produit_categorie_id,
    p.id_users AS produit_user_id,
    p.etat AS produit_etat,
    tp.nom AS type_paiement_nom,
    tp.logo AS type_paiement_logo,
    u.id_users AS user_id,
    u.nom AS user_nom,
    u.prenoms AS user_prenoms,
    u.email AS user_email,
    u.password AS user_password,
    u.adresse AS user_adresse,
    u.role AS user_role,
    u.photo AS user_photo
FROM
    avis_produits AS av
JOIN categories AS c ON av.id_produit = c.id
JOIN commandes AS co ON av.id_users = co.id_users
JOIN detailscommandes AS dc ON co.id = dc.id_commande
JOIN factures AS fa ON co.id = fa.id_commande
JOIN livraisons AS li ON av.id_users = li.id_users
JOIN produit AS p ON av.id_produit = p.id
JOIN typepaiements AS tp ON fa.id_type = tp.id
JOIN users AS u ON av.id_users = u.id_users
WHERE
    av.id_users = u.id_users
    AND av.id_produit = p.id;


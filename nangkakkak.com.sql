/*
 Navicat Premium Data Transfer

 Source Server         : Localhost
 Source Server Type    : MySQL
 Source Server Version : 50615
 Source Host           : localhost
 Source Database       : nangkakkak.com

 Target Server Type    : MySQL
 Target Server Version : 50615
 File Encoding         : utf-8

 Date: 02/22/2014 23:59:42 PM
*/

SET NAMES utf8;
SET FOREIGN_KEY_CHECKS = 0;

-- ----------------------------
--  Table structure for `actors`
-- ----------------------------
DROP TABLE IF EXISTS `actors`;
CREATE TABLE `actors` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `bio` text COLLATE utf8_unicode_ci,
  `sex` varchar(4) COLLATE utf8_unicode_ci DEFAULT NULL,
  `full_bio_link` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `birth_date` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `birth_place` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `awards` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `image` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `imdb_id` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `views` bigint(20) NOT NULL DEFAULT '1',
  `tmdb_id` bigint(20) unsigned DEFAULT NULL,
  `fully_scraped` tinyint(3) unsigned NOT NULL DEFAULT '0',
  `allow_update` tinyint(3) unsigned NOT NULL DEFAULT '1',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT NULL,
  `temp_id` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `actors_name_unique` (`name`),
  UNIQUE KEY `name_unique` (`name`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
--  Table structure for `actors_titles`
-- ----------------------------
DROP TABLE IF EXISTS `actors_titles`;
CREATE TABLE `actors_titles` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `actor_id` bigint(20) unsigned NOT NULL,
  `title_id` bigint(20) unsigned NOT NULL,
  `char_name` varchar(255) COLLATE utf8_unicode_ci NOT NULL DEFAULT 'Unknown',
  `known_for` tinyint(3) unsigned NOT NULL DEFAULT '0',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `actor_title_unique` (`actor_id`,`title_id`),
  KEY `actors_titles_title_id_foreign` (`title_id`),
  CONSTRAINT `actors_titles_actor_id_foreign` FOREIGN KEY (`actor_id`) REFERENCES `actors` (`id`) ON DELETE CASCADE,
  CONSTRAINT `actors_titles_title_id_foreign` FOREIGN KEY (`title_id`) REFERENCES `titles` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
--  Table structure for `directors`
-- ----------------------------
DROP TABLE IF EXISTS `directors`;
CREATE TABLE `directors` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `allow_update` tinyint(3) unsigned NOT NULL DEFAULT '1',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT NULL,
  `temp_id` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `directors_name_unique` (`name`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
--  Table structure for `directors_titles`
-- ----------------------------
DROP TABLE IF EXISTS `directors_titles`;
CREATE TABLE `directors_titles` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `director_id` bigint(20) unsigned NOT NULL,
  `title_id` bigint(20) unsigned NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `director_title_unique` (`director_id`,`title_id`),
  KEY `directors_titles_title_id_foreign` (`title_id`),
  CONSTRAINT `directors_titles_director_id_foreign` FOREIGN KEY (`director_id`) REFERENCES `directors` (`id`) ON DELETE CASCADE,
  CONSTRAINT `directors_titles_title_id_foreign` FOREIGN KEY (`title_id`) REFERENCES `titles` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
--  Table structure for `episodes`
-- ----------------------------
DROP TABLE IF EXISTS `episodes`;
CREATE TABLE `episodes` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `plot` text COLLATE utf8_unicode_ci,
  `poster` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `release_date` varchar(15) COLLATE utf8_unicode_ci DEFAULT NULL,
  `title_id` bigint(20) unsigned NOT NULL,
  `season_id` bigint(20) unsigned NOT NULL,
  `season_number` int(10) unsigned NOT NULL DEFAULT '1',
  `episode_number` int(10) unsigned NOT NULL DEFAULT '1',
  `allow_update` tinyint(3) unsigned NOT NULL DEFAULT '1',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT NULL,
  `temp_id` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `promo` text COLLATE utf8_unicode_ci,
  PRIMARY KEY (`id`),
  UNIQUE KEY `ep_s_title_unique` (`episode_number`,`season_number`,`title_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
--  Table structure for `group_activity`
-- ----------------------------
DROP TABLE IF EXISTS `group_activity`;
CREATE TABLE `group_activity` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `message` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
--  Table structure for `groups`
-- ----------------------------
DROP TABLE IF EXISTS `groups`;
CREATE TABLE `groups` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `permissions` text COLLATE utf8_unicode_ci,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `groups_name_unique` (`name`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
--  Table structure for `images`
-- ----------------------------
DROP TABLE IF EXISTS `images`;
CREATE TABLE `images` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `local` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `web` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `title_id` bigint(20) unsigned DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `images_local_unique` (`local`),
  UNIQUE KEY `images_web_unique` (`web`),
  KEY `images_title_id_foreign` (`title_id`),
  CONSTRAINT `images_title_id_foreign` FOREIGN KEY (`title_id`) REFERENCES `titles` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
--  Table structure for `migrations`
-- ----------------------------
DROP TABLE IF EXISTS `migrations`;
CREATE TABLE `migrations` (
  `migration` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
--  Records of `migrations`
-- ----------------------------
BEGIN;
INSERT INTO `migrations` VALUES ('2013_12_06_201055_create_titles', '1'), ('2013_12_07_105031_create_actors', '1'), ('2013_12_07_105057_create_directors', '1'), ('2013_12_07_105110_create_writers', '1'), ('2013_12_07_105130_create_options', '1'), ('2013_12_07_105216_create_actors_titles', '1'), ('2013_12_07_105239_create_directors_titles', '1'), ('2013_12_07_105257_create_writers_titles', '1'), ('2013_12_07_105324_create_episodes', '1'), ('2013_12_07_105349_create_group_activity', '1'), ('2013_12_07_105349_create_user_activity', '1'), ('2013_12_07_105409_create_images', '1'), ('2013_12_07_105420_create_news', '1'), ('2013_12_07_105432_create_reviews', '1'), ('2013_12_07_105447_create_seasons', '1'), ('2013_12_07_120615_create_users', '1'), ('2013_12_07_120644_create_groups', '1'), ('2013_12_07_120703_create_throttle', '1'), ('2013_12_07_120720_create_users_groups', '1'), ('2013_12_07_170342_create_users_titles', '1'), ('2014_01_02_134303_add_columns_to_titles', '1'), ('2014_01_02_211657_add_columns_to_news', '1'), ('2014_01_02_211658_add_columns_to_users', '1'), ('2014_01_12_135844_create_social', '1'), ('2014_01_12_138413_add_columns_to_reviews', '1'), ('2014_01_12_139511_make_options_text', '1'), ('2014_01_14_132561_add_promo_to_episodes', '1'), ('2014_01_14_142568_increate_gender_len', '1');
COMMIT;

-- ----------------------------
--  Table structure for `news`
-- ----------------------------
DROP TABLE IF EXISTS `news`;
CREATE TABLE `news` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `image` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `body` text COLLATE utf8_unicode_ci,
  `source` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `full_url` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `author` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT NULL,
  `temp_id` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `fully_scraped` tinyint(3) unsigned NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  UNIQUE KEY `title_unique` (`title`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
--  Table structure for `options`
-- ----------------------------
DROP TABLE IF EXISTS `options`;
CREATE TABLE `options` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `value` text COLLATE utf8_unicode_ci,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `options_name_unique` (`name`)
) ENGINE=InnoDB AUTO_INCREMENT=38 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
--  Records of `options`
-- ----------------------------
BEGIN;
INSERT INTO `options` VALUES ('1', 'installed', '1', '2014-01-28 00:29:56', null), ('2', 'data_provider', 'db', '2014-01-28 00:29:56', null), ('3', 'search_provider', 'db', '2014-01-28 00:29:56', null), ('4', 'home_bg', 'romanoff.jpg', '2014-01-28 00:29:56', null), ('5', 'register_bg', 'elysium.jpg', '2014-01-28 00:29:56', null), ('6', 'login_bg', 'gravity.jpg', '2014-01-28 00:29:56', null), ('7', 'dash_bg', 'firey.jpg', '2014-01-28 00:29:56', null), ('8', '404_bg', 'hangover.jpg', '2014-01-28 00:29:56', null), ('9', 'title_view', 'noTabs', '2014-01-28 00:29:56', null), ('10', 'updated', '1', '2014-01-28 00:29:56', null), ('11', 'tmdb_api_key', '470fd2ec8853e25d2f8d86f685d2270e', '2014-01-28 00:37:52', null), ('12', 'disqus_short_name', '', '2014-01-28 00:37:52', null), ('13', 'contact_us_email', '', '2014-01-28 00:37:52', null), ('14', 'fb_url', 'https://www.facebook.com/nangkakkak', '2014-01-28 00:37:52', null), ('15', 'amazon_id', '', '2014-01-28 00:37:52', null), ('16', 'tmdb_language', '', '2014-01-28 00:37:52', null), ('17', 'uri_separator', '', '2014-01-28 00:37:52', null), ('18', 'uri_case', 'uppercase', '2014-01-28 00:37:52', null), ('19', 'save_tmdb', '1', '2014-01-28 00:37:52', null), ('20', 'scrape_news_fully', '1', '2014-01-28 00:37:52', null), ('21', 'require_act', '0', '2014-01-28 00:37:52', null), ('22', 'use_cache', '0', '2014-01-28 00:37:52', null), ('23', 'auto_upd_fet', '0', '2014-01-28 00:37:52', null), ('26', 'color_scheme', 'green', '2014-01-28 01:49:19', null), ('27', 'success_color', '', '2014-01-28 01:49:19', null), ('28', 'warning_color', '', '2014-01-28 01:49:19', null), ('29', 'danger_color', '', '2014-01-28 01:49:19', null), ('30', 'home_view', 'rows', '2014-01-28 01:49:19', null), ('31', 'news_ex_len', '100', '2014-01-28 01:49:19', null), ('32', 'ad_footer_all', 'ADS 1', '2014-02-09 23:28:22', null), ('33', 'ad_home_news', 'ADS 2', '2014-02-09 23:28:22', null), ('34', 'ad_home_jumbo', 'ADS 3', '2014-02-09 23:28:22', null), ('35', 'ad_title_jumbo', 'ADS 4', '2014-02-09 23:28:22', null), ('36', 'ad_title_critic', 'ADS 5', '2014-02-09 23:28:22', null), ('37', 'ad_title_user', 'ADS 6', '2014-02-09 23:28:22', null);
COMMIT;

-- ----------------------------
--  Table structure for `reviews`
-- ----------------------------
DROP TABLE IF EXISTS `reviews`;
CREATE TABLE `reviews` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `author` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `source` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `body` text COLLATE utf8_unicode_ci,
  `score` int(11) DEFAULT NULL,
  `link` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `title_id` bigint(20) unsigned NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT NULL,
  `temp_id` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `user_id` bigint(20) unsigned NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `author_title_unique` (`title_id`,`author`),
  CONSTRAINT `reviews_title_id_foreign` FOREIGN KEY (`title_id`) REFERENCES `titles` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
--  Table structure for `seasons`
-- ----------------------------
DROP TABLE IF EXISTS `seasons`;
CREATE TABLE `seasons` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `release_date` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `poster` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `overview` text COLLATE utf8_unicode_ci,
  `number` int(11) NOT NULL DEFAULT '1',
  `title_id` bigint(20) unsigned NOT NULL,
  `title_imdb_id` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `title_tmdb_id` bigint(20) unsigned DEFAULT NULL,
  `fully_scraped` tinyint(3) unsigned NOT NULL DEFAULT '0',
  `allow_update` tinyint(3) unsigned NOT NULL DEFAULT '1',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT NULL,
  `temp_id` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `tile_number_unique` (`title_id`,`number`),
  CONSTRAINT `seasons_title_id_foreign` FOREIGN KEY (`title_id`) REFERENCES `titles` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
--  Table structure for `social`
-- ----------------------------
DROP TABLE IF EXISTS `social`;
CREATE TABLE `social` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `service` varchar(25) COLLATE utf8_unicode_ci NOT NULL,
  `service_user_identifier` varchar(255) COLLATE utf8_unicode_ci NOT NULL DEFAULT 'movie',
  `user_id` bigint(20) unsigned NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`),
  UNIQUE KEY `user_id` (`user_id`),
  UNIQUE KEY `service_user_identifier` (`service_user_identifier`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
--  Table structure for `throttle`
-- ----------------------------
DROP TABLE IF EXISTS `throttle`;
CREATE TABLE `throttle` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` int(10) unsigned NOT NULL,
  `ip_address` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `attempts` int(11) NOT NULL DEFAULT '0',
  `suspended` tinyint(1) NOT NULL DEFAULT '0',
  `banned` tinyint(1) NOT NULL DEFAULT '0',
  `last_attempt_at` timestamp NULL DEFAULT NULL,
  `suspended_at` timestamp NULL DEFAULT NULL,
  `banned_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `throttle_user_id_index` (`user_id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
--  Records of `throttle`
-- ----------------------------
BEGIN;
INSERT INTO `throttle` VALUES ('1', '1', null, '0', '0', '0', null, null, null);
COMMIT;

-- ----------------------------
--  Table structure for `titles`
-- ----------------------------
DROP TABLE IF EXISTS `titles`;
CREATE TABLE `titles` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `type` varchar(15) COLLATE utf8_unicode_ci NOT NULL DEFAULT 'movie',
  `imdb_rating` varchar(3) COLLATE utf8_unicode_ci DEFAULT NULL,
  `tmdb_rating` varchar(3) COLLATE utf8_unicode_ci DEFAULT NULL,
  `mc_user_score` varchar(3) COLLATE utf8_unicode_ci DEFAULT NULL,
  `mc_critic_score` smallint(5) unsigned DEFAULT NULL,
  `mc_num_of_votes` int(10) unsigned DEFAULT NULL,
  `imdb_votes_num` bigint(20) unsigned DEFAULT NULL,
  `release_date` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `year` smallint(5) unsigned DEFAULT NULL,
  `plot` text COLLATE utf8_unicode_ci,
  `genre` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `tagline` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `poster` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `background` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `awards` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `runtime` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `trailer` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `budget` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `revenue` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `views` bigint(20) NOT NULL DEFAULT '1',
  `tmdb_popularity` float(50,2) unsigned DEFAULT NULL,
  `imdb_id` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `tmdb_id` bigint(20) unsigned DEFAULT NULL,
  `season_number` tinyint(3) unsigned DEFAULT NULL,
  `fully_scraped` tinyint(3) unsigned NOT NULL DEFAULT '0',
  `allow_update` tinyint(3) unsigned NOT NULL DEFAULT '1',
  `featured` tinyint(3) unsigned NOT NULL DEFAULT '0',
  `now_playing` tinyint(3) unsigned NOT NULL DEFAULT '0',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `temp_id` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `language` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `country` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `original_title` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `affiliate_link` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `custom_field` text COLLATE utf8_unicode_ci,
  PRIMARY KEY (`id`),
  UNIQUE KEY `title_year_type_unqiue` (`title`,`year`,`type`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
--  Table structure for `user_activity`
-- ----------------------------
DROP TABLE IF EXISTS `user_activity`;
CREATE TABLE `user_activity` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `message` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
--  Records of `user_activity`
-- ----------------------------
BEGIN;
INSERT INTO `user_activity` VALUES ('1', 'jack Registered', '2014-01-31 18:06:51', null);
COMMIT;

-- ----------------------------
--  Table structure for `users`
-- ----------------------------
DROP TABLE IF EXISTS `users`;
CREATE TABLE `users` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `username` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `permissions` text COLLATE utf8_unicode_ci,
  `activated` tinyint(1) NOT NULL DEFAULT '0',
  `activation_code` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `activated_at` timestamp NULL DEFAULT NULL,
  `last_login` timestamp NULL DEFAULT NULL,
  `persist_code` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `reset_password_code` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `first_name` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `last_name` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `gender` varchar(10) COLLATE utf8_unicode_ci DEFAULT NULL,
  `avatar` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT NULL,
  `background` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`),
  KEY `users_activation_code_index` (`activation_code`),
  KEY `users_reset_password_code_index` (`reset_password_code`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
--  Records of `users`
-- ----------------------------
BEGIN;
INSERT INTO `users` VALUES ('1', 'admin', 'nukboon@gmail.com', '$2y$10$vzJf97py20h/qIW7ltj44O2zx/YpQsGErcVdj3vKd2sZq05WSQ95u', '{\"superuser\":1}', '1', null, null, '2014-02-22 08:39:33', '$2y$10$rh8S.4HlYkHKz3WxhXefc.qoxsSDuZIzRFwd/UgkKIH0IwZzbLRWS', null, null, null, null, null, '2014-01-27 17:29:47', '2014-02-22 08:39:33', null), ('2', 'jack', 'godnotloveyou@gmail.com', '$2y$10$73WOiVlhamSlEppKv3c7/.e.MPD6UvA0Kb1NEuOAMMO9wYfQjez0G', null, '1', null, '2014-01-31 11:06:51', '2014-01-31 11:09:29', '$2y$10$IcSxXxVRNt18EMbaXEMJeO6Y.O4YfAbagd5JniPcOw0d.E0pH7dVm', null, null, null, null, null, '2014-01-31 11:06:51', '2014-01-31 11:09:29', null);
COMMIT;

-- ----------------------------
--  Table structure for `users_groups`
-- ----------------------------
DROP TABLE IF EXISTS `users_groups`;
CREATE TABLE `users_groups` (
  `user_id` int(10) unsigned NOT NULL,
  `group_id` int(10) unsigned NOT NULL,
  PRIMARY KEY (`user_id`,`group_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
--  Table structure for `users_titles`
-- ----------------------------
DROP TABLE IF EXISTS `users_titles`;
CREATE TABLE `users_titles` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` int(10) unsigned NOT NULL,
  `title_id` int(10) unsigned NOT NULL,
  `watchlist` tinyint(3) unsigned NOT NULL DEFAULT '0',
  `favorite` tinyint(3) unsigned NOT NULL DEFAULT '0',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `t_u_w_unique` (`title_id`,`user_id`,`watchlist`),
  UNIQUE KEY `t_u_f_unique` (`title_id`,`user_id`,`favorite`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
--  Table structure for `writers`
-- ----------------------------
DROP TABLE IF EXISTS `writers`;
CREATE TABLE `writers` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `allow_update` tinyint(3) unsigned NOT NULL DEFAULT '1',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT NULL,
  `temp_id` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `writers_name_unique` (`name`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
--  Table structure for `writers_titles`
-- ----------------------------
DROP TABLE IF EXISTS `writers_titles`;
CREATE TABLE `writers_titles` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `writer_id` bigint(20) unsigned NOT NULL,
  `title_id` bigint(20) unsigned NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `writer_title_unique` (`writer_id`,`title_id`),
  KEY `writers_titles_title_id_foreign` (`title_id`),
  CONSTRAINT `writers_titles_title_id_foreign` FOREIGN KEY (`title_id`) REFERENCES `titles` (`id`) ON DELETE CASCADE,
  CONSTRAINT `writers_titles_writer_id_foreign` FOREIGN KEY (`writer_id`) REFERENCES `writers` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

SET FOREIGN_KEY_CHECKS = 1;

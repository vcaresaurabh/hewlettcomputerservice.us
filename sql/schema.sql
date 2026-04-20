-- Hewlett Computer Service — Database Schema
-- Import via phpMyAdmin: Import → Choose File → Execute
-- Compatible with MySQL 8.0+ and MariaDB 10.6+

CREATE DATABASE IF NOT EXISTS `hewlett_db`
  CHARACTER SET utf8mb4
  COLLATE utf8mb4_unicode_ci;

USE `hewlett_db`;

-- -------------------------------------------------------
-- Bookings
-- -------------------------------------------------------
CREATE TABLE IF NOT EXISTS `bookings` (
  `id`               INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
  `booking_ref`      VARCHAR(12)   NOT NULL UNIQUE,
  `service_category` VARCHAR(100)  NOT NULL,
  `preferred_date`   DATE          NOT NULL,
  `preferred_time`   VARCHAR(40)   NOT NULL,
  `name`             VARCHAR(150)  NOT NULL,
  `email`            VARCHAR(254)  NOT NULL,
  `phone`            VARCHAR(30)   DEFAULT NULL,
  `country`          VARCHAR(60)   DEFAULT NULL,
  `address`          TEXT          DEFAULT NULL,
  `notes`            TEXT          DEFAULT NULL,
  `status`           ENUM('pending','confirmed','completed','cancelled') NOT NULL DEFAULT 'pending',
  `created_at`       TIMESTAMP     NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at`       TIMESTAMP     NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  INDEX `idx_bookings_email`  (`email`),
  INDEX `idx_bookings_status` (`status`),
  INDEX `idx_bookings_date`   (`preferred_date`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- -------------------------------------------------------
-- Contact Form Submissions
-- -------------------------------------------------------
CREATE TABLE IF NOT EXISTS `contacts` (
  `id`         INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
  `name`       VARCHAR(150)  NOT NULL,
  `email`      VARCHAR(254)  NOT NULL,
  `phone`      VARCHAR(30)   DEFAULT NULL,
  `country`    VARCHAR(60)   DEFAULT NULL,
  `subject`    VARCHAR(200)  DEFAULT NULL,
  `message`    TEXT          NOT NULL,
  `created_at` TIMESTAMP     NOT NULL DEFAULT CURRENT_TIMESTAMP,
  INDEX `idx_contacts_email` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- -------------------------------------------------------
-- Newsletter Subscribers
-- -------------------------------------------------------
CREATE TABLE IF NOT EXISTS `newsletter_subscribers` (
  `id`              INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
  `email`           VARCHAR(254)  NOT NULL UNIQUE,
  `created_at`      TIMESTAMP     NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `unsubscribed_at` TIMESTAMP     NULL DEFAULT NULL,
  INDEX `idx_newsletter_email` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- -------------------------------------------------------
-- Partner Program Applications
-- -------------------------------------------------------
CREATE TABLE IF NOT EXISTS `partners_applications` (
  `id`               INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
  `company`          VARCHAR(200)  NOT NULL,
  `contact_name`     VARCHAR(150)  NOT NULL,
  `email`            VARCHAR(254)  NOT NULL,
  `phone`            VARCHAR(30)   DEFAULT NULL,
  `region`           VARCHAR(100)  DEFAULT NULL,
  `services_offered` TEXT          DEFAULT NULL,
  `message`          TEXT          DEFAULT NULL,
  `status`           ENUM('pending','reviewing','approved','rejected') NOT NULL DEFAULT 'pending',
  `created_at`       TIMESTAMP     NOT NULL DEFAULT CURRENT_TIMESTAMP,
  INDEX `idx_partners_email` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

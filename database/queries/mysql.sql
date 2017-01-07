CREATE TABLE `movies_category` (
  `id`   INT UNSIGNED NOT NULL AUTO_INCREMENT PRIMARY KEY,
  `name` VARCHAR(255) NOT NULL
);

CREATE TABLE `movies` (
  `id`          INT UNSIGNED NOT NULL AUTO_INCREMENT PRIMARY KEY,
  `category_id` INT UNSIGNED NOT NULL,
  `name`        VARCHAR(255) NOT NULL
);

ALTER TABLE `movies` ADD CONSTRAINT `movies_category_id_foreign` FOREIGN KEY (`category_id`) REFERENCES `movies_category` (`id`);

CREATE TABLE `showing_types` (
  `id`   INT UNSIGNED NOT NULL AUTO_INCREMENT PRIMARY KEY,
  `name` VARCHAR(255) NOT NULL
);

CREATE TABLE `showings` (
  `id`          INT UNSIGNED NOT NULL AUTO_INCREMENT PRIMARY KEY,
  `type_id`     INT UNSIGNED NOT NULL,
  `movie_id`    INT UNSIGNED NOT NULL,
  `start_at`    TIME         NOT NULL,
  `room_number` INT UNSIGNED NOT NULL
);

ALTER TABLE `showings` ADD CONSTRAINT `showings_type_id_foreign` FOREIGN KEY (`type_id`) REFERENCES `showing_types` (`id`);
ALTER TABLE `showings` ADD CONSTRAINT `showings_movie_id_foreign` FOREIGN KEY (`movie_id`) REFERENCES `movies` (`id`);

CREATE TABLE `payment_types` (
  `id`   INT UNSIGNED NOT NULL AUTO_INCREMENT PRIMARY KEY,
  `name` VARCHAR(255) NOT NULL
);

CREATE TABLE `states` (
  `id`   INT UNSIGNED NOT NULL AUTO_INCREMENT PRIMARY KEY,
  `name` VARCHAR(255) NOT NULL
);

CREATE TABLE `cities` (
  `id`       INT UNSIGNED NOT NULL AUTO_INCREMENT PRIMARY KEY,
  `state_id` INT UNSIGNED NOT NULL,
  `name`     VARCHAR(255) NOT NULL
);

ALTER TABLE `cities` ADD CONSTRAINT `cities_state_id_foreign` FOREIGN KEY (`state_id`) REFERENCES `states` (`id`);

CREATE TABLE `cinemas` (
  `id`      INT UNSIGNED NOT NULL AUTO_INCREMENT PRIMARY KEY,
  `city_id` INT UNSIGNED NOT NULL,
  `name`    VARCHAR(255) NULL,
  `address` VARCHAR(255) NOT NULL
);

ALTER TABLE `cinemas` ADD CONSTRAINT `cinemas_city_id_foreign` FOREIGN KEY (`city_id`) REFERENCES `cities` (`id`);

CREATE TABLE `years` (
  `id`   INT UNSIGNED NOT NULL AUTO_INCREMENT PRIMARY KEY,
  `name` VARCHAR(255) NOT NULL
);

CREATE TABLE `months` (
  `id`      INT UNSIGNED NOT NULL AUTO_INCREMENT PRIMARY KEY,
  `year_id` INT UNSIGNED NOT NULL,
  `name`    VARCHAR(255) NOT NULL
);

ALTER TABLE `months` ADD CONSTRAINT `months_year_id_foreign` FOREIGN KEY (`year_id`) REFERENCES `years` (`id`);

CREATE TABLE `days` (
  `id`       INT UNSIGNED NOT NULL AUTO_INCREMENT PRIMARY KEY,
  `month_id` INT UNSIGNED NOT NULL,
  `name`     VARCHAR(255) NOT NULL
);

ALTER TABLE `days` ADD CONSTRAINT `days_month_id_foreign` FOREIGN KEY (`month_id`) REFERENCES `months` (`id`);

CREATE TABLE `sales` (
  `id`              INT UNSIGNED NOT NULL AUTO_INCREMENT PRIMARY KEY,
  `showing_id`      INT UNSIGNED NOT NULL,
  `day_id`          INT UNSIGNED NOT NULL,
  `cinema_id`       INT UNSIGNED NOT NULL,
  `payment_type_id` INT UNSIGNED NOT NULL,
  `netto_price`     DOUBLE(8, 2) NOT NULL,
  `brutto_price`    DOUBLE(8, 2) NOT NULL,
  `ticket_count`    INT UNSIGNED NOT NULL
);

ALTER TABLE `sales` ADD CONSTRAINT `sales_showing_id_foreign` FOREIGN KEY (`showing_id`) REFERENCES `showings` (`id`);
ALTER TABLE `sales` ADD CONSTRAINT `sales_day_id_foreign` FOREIGN KEY (`day_id`) REFERENCES `days` (`id`);
ALTER TABLE `sales` ADD CONSTRAINT `sales_cinema_id_foreign` FOREIGN KEY (`cinema_id`) REFERENCES `cinemas` (`id`);
ALTER TABLE `sales` ADD CONSTRAINT `sales_payment_type_id_foreign` FOREIGN KEY (`payment_type_id`) REFERENCES `payment_types` (`id`);

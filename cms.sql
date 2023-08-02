CREATE DATABASE IF NOT EXISTS cms;
USE cms;

CREATE TABLE IF NOT EXISTS word (
id INT AUTO_INCREMENT PRIMARY KEY,
format VARCHAR(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
word_gr TEXT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
word_en TEXT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci
);



CREATE TABLE `pages` (
  id int(11) NOT NULL AUTO_INCREMENT PRIMARY KEY,
  slug varchar(255) NOT NULL,
  title_en varchar(255) NOT NULL,
  content_en text DEFAULT NULL,
  title_el varchar(255) NOT NULL,
  content_el text DEFAULT NULL,
  image_path varchar(255) DEFAULT NULL,
  seo_title_en varchar(255) DEFAULT NULL,
  seo_description_en text DEFAULT NULL,
  seo_keywords_en text DEFAULT NULL,
  seo_title_el varchar(255) DEFAULT NULL,
  seo_description_el text DEFAULT NULL,
  seo_keywords_el text DEFAULT NULL
);



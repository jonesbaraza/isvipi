--
-- Table structure for table `isv_configurations`
-- site_status 1. Active, 2. Demo Mode, 3. Maintenance Mode
--
CREATE TABLE IF NOT EXISTS `isv_configurations` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `config_name` varchar(50) UNIQUE COLLATE utf8_unicode_ci NOT NULL,
  `config_value` longtext COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1;

INSERT INTO `isv_configurations` (`config_name`, `config_value`) VALUES 
('site_url', 'http://localhost/isvipi/'), ('secure_url', 'https://localhost/isvipi/'), ('site_title', 'IsVipi Community Engine'), ('site_email', 'support@misvipi.com'), ('last_update_check', '0000-00-00 00:00:00'), ('update_available', 0),
('site_status', 1),('enable_ssl',0),('system_crons', 1),('secret_key','aRl1WXJw2qvMnxSjxsHt'),('secret_Iv','UGIAztshF6JWYdMVcVlw'),
('logo','logo.png'),('favicon','favicon.ico'),('homebg','home.jpg'),('loginbg','login.jpg'), ('contactbg','contact.jpg'),
('otherbg','other.jpg'),('notfoundbg', '404.jpg'),('theme','default'),('lang','en'),('title_separator',' | '),('site_timezone','Atlantic/St_Helena'),
('display_errors',0),('contact_email','support@isvipi.com');

CREATE TABLE IF NOT EXISTS `isv_genders` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `gender` varchar(50) UNIQUE COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1;

INSERT INTO `isv_genders` (`gender`) VALUES 
('male'), ('female'),('transgender'),('non-binary'),('prefer not to say')
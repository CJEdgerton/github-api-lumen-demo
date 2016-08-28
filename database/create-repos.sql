-- Create syntax for 'repos'

CREATE TABLE `repos` (
  `id` int(10) unsigned NOT NULL,
  `name` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `url` varchar(250) COLLATE utf8_unicode_ci NOT NULL,
  `created_date` date NOT NULL,
  `last_push_date` date NOT NULL,
  `description` text COLLATE utf8_unicode_ci,
  `star_count` int(11) NOT NULL,
  `forks_count` int(11) NOT NULL,
  `open_issues_count` int(11) NOT NULL,
  `homepage` varchar(250) COLLATE utf8_unicode_ci DEFAULT NULL,
  `owner_username` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `owner_url` varchar(250) COLLATE utf8_unicode_ci NOT NULL,
  `owner_avatar_url` varchar(250) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

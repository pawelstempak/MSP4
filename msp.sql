-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Czas generowania: 11 Kwi 2022, 22:52
-- Wersja serwera: 10.4.22-MariaDB
-- Wersja PHP: 7.4.27

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Baza danych: `msp`
--

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `language`
--

CREATE TABLE `language` (
  `id_language` int(11) NOT NULL,
  `title` varchar(250) COLLATE utf8_unicode_ci NOT NULL,
  `code` varchar(2) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Zrzut danych tabeli `language`
--

INSERT INTO `language` (`id_language`, `title`, `code`) VALUES
(1, 'English', 'en');

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `language_content`
--

CREATE TABLE `language_content` (
  `id_language_content` int(11) NOT NULL,
  `element` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `id_element` int(11) NOT NULL,
  `id_language` int(11) NOT NULL,
  `content` text COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `layouts`
--

CREATE TABLE `layouts` (
  `id_layouts` int(1) NOT NULL,
  `title` varchar(250) COLLATE utf8_unicode_ci NOT NULL,
  `tfile` varchar(250) COLLATE utf8_unicode_ci NOT NULL,
  `cfile` varchar(250) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Zrzut danych tabeli `layouts`
--

INSERT INTO `layouts` (`id_layouts`, `title`, `tfile`, `cfile`) VALUES
(1, 'Single page', 'single_page.tpl', 'single_page.php'),
(2, 'Page list', 'pages_list.tpl', 'pages_list.php'),
(3, 'Homepage', 'homepage.tpl', 'homepage.php'),
(4, 'Contact', 'contact_page.tpl', 'contact_page.php');

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `menus`
--

CREATE TABLE `menus` (
  `id_menu` int(11) NOT NULL,
  `type` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `restful_url` varchar(300) COLLATE utf8_unicode_ci NOT NULL,
  `status` int(2) NOT NULL,
  `parent_id` int(11) NOT NULL,
  `sort` int(11) NOT NULL,
  `id_pages` int(11) NOT NULL DEFAULT 0,
  `home` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Zrzut danych tabeli `menus`
--

INSERT INTO `menus` (`id_menu`, `type`, `restful_url`, `status`, `parent_id`, `sort`, `id_pages`, `home`) VALUES
(16, 'prime', 'home', 1, 0, 1, 1, 1),
(29, 'prime', 'contact', 1, 0, 7, 28, 0),
(31, 'prime', 'single-page', 1, 0, 2, 52, 0),
(32, 'prime', 'pages-list', 1, 0, 3, 53, 0),
(61, 'second', 'licence', 1, 0, 1, 57, 0);

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `modules`
--

CREATE TABLE `modules` (
  `id_modules` int(11) NOT NULL,
  `title` varchar(200) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `restful_url` varchar(200) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `module_cat_news`
--

CREATE TABLE `module_cat_news` (
  `id_module_cat_news` int(11) NOT NULL,
  `title` varchar(200) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `module_cat_page`
--

CREATE TABLE `module_cat_page` (
  `id_module_cat_page` int(11) NOT NULL,
  `id_module_cat_news` int(11) NOT NULL,
  `id_pages` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `module_img_news`
--

CREATE TABLE `module_img_news` (
  `id_module_img_news` int(11) NOT NULL,
  `filename` varchar(100) NOT NULL,
  `id_module_news` int(11) NOT NULL,
  `df` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `module_news`
--

CREATE TABLE `module_news` (
  `id_module_news` int(11) NOT NULL,
  `id_module_cat_news` int(11) NOT NULL,
  `status` int(11) NOT NULL,
  `created` timestamp NULL DEFAULT NULL,
  `modified` timestamp NULL DEFAULT NULL,
  `created_by` int(11) NOT NULL,
  `modified_by` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `pages`
--

CREATE TABLE `pages` (
  `id_pages` int(11) NOT NULL,
  `id_layouts` int(11) NOT NULL,
  `status` int(11) NOT NULL,
  `created` timestamp NULL DEFAULT NULL,
  `modified` timestamp NULL DEFAULT NULL,
  `created_by` int(11) NOT NULL,
  `modified_by` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Zrzut danych tabeli `pages`
--

INSERT INTO `pages` (`id_pages`, `id_layouts`, `status`, `created`, `modified`, `created_by`, `modified_by`) VALUES
(1, 3, 1, '2021-08-25 06:08:58', '2021-11-26 11:30:40', 1, 1),
(28, 4, 1, '2021-11-16 19:19:01', '2021-12-27 20:04:33', 1, 1),
(52, 1, 1, '2021-12-26 21:51:10', '2021-12-27 12:16:34', 1, 1),
(53, 2, 1, '2021-12-27 11:38:47', '2021-12-27 11:50:48', 1, 1),
(54, 1, 1, '2021-12-27 11:43:07', '2021-12-27 12:03:54', 1, 1),
(55, 1, 1, '2021-12-27 11:49:07', '2021-12-27 12:07:04', 1, 1),
(57, 1, 1, '2021-12-27 20:18:30', '2021-12-27 20:18:30', 1, 1);

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `pages_list`
--

CREATE TABLE `pages_list` (
  `id_pages_list` int(11) NOT NULL,
  `id_list` int(11) NOT NULL,
  `id_pages` int(11) NOT NULL,
  `id_language` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `settings`
--

CREATE TABLE `settings` (
  `id` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `type` varchar(11) COLLATE utf8_unicode_ci NOT NULL,
  `title` varchar(300) COLLATE utf8_unicode_ci NOT NULL,
  `id_language` int(11) NOT NULL,
  `id_templates` int(11) NOT NULL,
  `session_life_time` int(4) NOT NULL,
  `pagination` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Zrzut danych tabeli `settings`
--

INSERT INTO `settings` (`id`, `type`, `title`, `id_language`, `id_templates`, `session_life_time`, `pagination`) VALUES
('1', 'backend', '', 1, 1, 1800, 10),
('2', 'frontend', 'CMS for Full Stack Developers', 1, 2, 0, 10);

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `templates`
--

CREATE TABLE `templates` (
  `id_templates` int(11) NOT NULL,
  `title` varchar(250) COLLATE utf8_unicode_ci NOT NULL,
  `folder_name` varchar(250) COLLATE utf8_unicode_ci NOT NULL,
  `description` text COLLATE utf8_unicode_ci NOT NULL,
  `type` varchar(11) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Zrzut danych tabeli `templates`
--

INSERT INTO `templates` (`id_templates`, `title`, `folder_name`, `description`, `type`) VALUES
(1, 'Default template', 'default', 'This is default template which can\'t be removed', 'backend'),
(2, 'Default template', 'default', 'Default installing template', 'frontend');

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `type` varchar(11) NOT NULL,
  `name` varchar(200) DEFAULT NULL,
  `lastname` varchar(200) DEFAULT NULL,
  `email` text DEFAULT NULL,
  `password` text DEFAULT NULL,
  `super_admin` int(1) NOT NULL,
  `id_users_groups` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Zrzut danych tabeli `users`
--

INSERT INTO `users` (`id`, `type`, `name`, `lastname`, `email`, `password`, `super_admin`, `id_users_groups`) VALUES
(1, 'backend', 'Admin', 'Admin', 'pawelstempak@gmail.com', 'amadeusz', 1, 4);

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `users_groups`
--

CREATE TABLE `users_groups` (
  `id_users_groups` int(11) NOT NULL,
  `title` varchar(250) COLLATE utf8_unicode_ci NOT NULL,
  `menus` int(2) NOT NULL,
  `pages` int(2) NOT NULL,
  `layouts` int(2) NOT NULL,
  `modules` int(2) NOT NULL,
  `widgets` int(2) NOT NULL,
  `backend_users` int(2) NOT NULL,
  `templates` int(2) NOT NULL,
  `language` int(2) NOT NULL,
  `settings` int(2) NOT NULL,
  `backend_settings` int(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Zrzut danych tabeli `users_groups`
--

INSERT INTO `users_groups` (`id_users_groups`, `title`, `menus`, `pages`, `layouts`, `modules`, `widgets`, `backend_users`, `templates`, `language`, `settings`, `backend_settings`) VALUES
(1, 'Settings', 1, 1, 1, 0, 0, 0, 1, 1, 1, 0),
(2, 'Editor', 1, 1, 1, 0, 0, 0, 0, 0, 0, 0),
(3, 'Super Admin', 1, 1, 1, 0, 0, 1, 1, 1, 1, 1),
(4, 'All', 1, 1, 1, 1, 0, 1, 1, 1, 1, 1);

--
-- Indeksy dla zrzutów tabel
--

--
-- Indeksy dla tabeli `language`
--
ALTER TABLE `language`
  ADD PRIMARY KEY (`id_language`);

--
-- Indeksy dla tabeli `language_content`
--
ALTER TABLE `language_content`
  ADD PRIMARY KEY (`id_language_content`);

--
-- Indeksy dla tabeli `layouts`
--
ALTER TABLE `layouts`
  ADD PRIMARY KEY (`id_layouts`);

--
-- Indeksy dla tabeli `menus`
--
ALTER TABLE `menus`
  ADD PRIMARY KEY (`id_menu`);

--
-- Indeksy dla tabeli `modules`
--
ALTER TABLE `modules`
  ADD PRIMARY KEY (`id_modules`);

--
-- Indeksy dla tabeli `module_cat_news`
--
ALTER TABLE `module_cat_news`
  ADD PRIMARY KEY (`id_module_cat_news`);

--
-- Indeksy dla tabeli `module_cat_page`
--
ALTER TABLE `module_cat_page`
  ADD PRIMARY KEY (`id_module_cat_page`);

--
-- Indeksy dla tabeli `module_img_news`
--
ALTER TABLE `module_img_news`
  ADD PRIMARY KEY (`id_module_img_news`);

--
-- Indeksy dla tabeli `module_news`
--
ALTER TABLE `module_news`
  ADD PRIMARY KEY (`id_module_news`);

--
-- Indeksy dla tabeli `pages`
--
ALTER TABLE `pages`
  ADD PRIMARY KEY (`id_pages`);

--
-- Indeksy dla tabeli `pages_list`
--
ALTER TABLE `pages_list`
  ADD PRIMARY KEY (`id_pages_list`);

--
-- Indeksy dla tabeli `templates`
--
ALTER TABLE `templates`
  ADD PRIMARY KEY (`id_templates`);

--
-- Indeksy dla tabeli `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- Indeksy dla tabeli `users_groups`
--
ALTER TABLE `users_groups`
  ADD PRIMARY KEY (`id_users_groups`);

--
-- AUTO_INCREMENT dla zrzuconych tabel
--

--
-- AUTO_INCREMENT dla tabeli `language`
--
ALTER TABLE `language`
  MODIFY `id_language` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT dla tabeli `language_content`
--
ALTER TABLE `language_content`
  MODIFY `id_language_content` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT dla tabeli `layouts`
--
ALTER TABLE `layouts`
  MODIFY `id_layouts` int(1) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT dla tabeli `menus`
--
ALTER TABLE `menus`
  MODIFY `id_menu` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=62;

--
-- AUTO_INCREMENT dla tabeli `modules`
--
ALTER TABLE `modules`
  MODIFY `id_modules` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT dla tabeli `module_cat_news`
--
ALTER TABLE `module_cat_news`
  MODIFY `id_module_cat_news` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT dla tabeli `module_cat_page`
--
ALTER TABLE `module_cat_page`
  MODIFY `id_module_cat_page` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT dla tabeli `module_img_news`
--
ALTER TABLE `module_img_news`
  MODIFY `id_module_img_news` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT dla tabeli `module_news`
--
ALTER TABLE `module_news`
  MODIFY `id_module_news` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT dla tabeli `pages`
--
ALTER TABLE `pages`
  MODIFY `id_pages` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=58;

--
-- AUTO_INCREMENT dla tabeli `pages_list`
--
ALTER TABLE `pages_list`
  MODIFY `id_pages_list` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT dla tabeli `templates`
--
ALTER TABLE `templates`
  MODIFY `id_templates` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT dla tabeli `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT dla tabeli `users_groups`
--
ALTER TABLE `users_groups`
  MODIFY `id_users_groups` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

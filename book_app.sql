-- phpMyAdmin SQL Dump
-- version 4.2.11
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: 2018 年 2 月 01 日 23:52
-- サーバのバージョン： 5.6.21
-- PHP Version: 5.6.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `gs_db`
--

-- --------------------------------------------------------

--
-- テーブルの構造 `books`
--

CREATE TABLE IF NOT EXISTS `books` (
`id` int(12) NOT NULL,
  `uid` int(12) DEFAULT NULL,
  `bid` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL,
  `title` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `author` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `image` varchar(255) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=25 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- テーブルのデータのダンプ `books`
--

INSERT INTO `books` (`id`, `uid`, `bid`, `title`, `author`, `image`) VALUES
(12, 1, '', '田中里奈 Rina', '田中里奈', 'http://books.google.com/books/content?id=6uYJwkLk4QcC&amp;printsec=frontcover&amp;img=1&amp;zoom=5&amp;edge=curl&amp;source=gbs_api'),
(13, 3, '', 'ゲンロン0 観光客の哲学', '東浩紀', 'http://books.google.com/books/content?id=TG1CDwAAQBAJ&amp;printsec=frontcover&amp;img=1&amp;zoom=5&amp;edge=curl&amp;source=gbs_api'),
(14, 3, '', 'ポップ・カルチャー', '宮台真司', 'http://books.google.com/books/content?id=huIpAQAAIAAJ&amp;printsec=frontcover&amp;img=1&amp;zoom=5&amp;source=gbs_api'),
(15, 3, 'kQ2XTkD2QLkC', '日本的ソーシャルメディアの未来', '濱野智史', 'http://books.google.com/books/content?id=kQ2XTkD2QLkC&amp;printsec=frontcover&amp;img=1&amp;zoom=5&amp;edge=curl&amp;source=gbs_api'),
(16, 4, 'O48eNwAACAAJ', '森博嗣の浮遊研究室', '森博嗣', 'http://books.google.com/books/content?id=O48eNwAACAAJ&amp;printsec=frontcover&amp;img=1&amp;zoom=5&amp;source=gbs_api'),
(17, 8, 'dcY_DwAAQBAJ', '動きすぎてはいけない　ジル・ドゥルーズと生成変化の哲学', '千葉雅也', 'http://books.google.com/books/content?id=dcY_DwAAQBAJ&amp;printsec=frontcover&amp;img=1&amp;zoom=5&amp;edge=curl&amp;source=gbs_api'),
(18, 8, 'SAzpe70p1BUC', 'JACKSON', 'ユーコ・スミダ・ジャクソン', 'http://books.google.com/books/content?id=SAzpe70p1BUC&amp;printsec=frontcover&amp;img=1&amp;zoom=5&amp;edge=curl&amp;source=gbs_api'),
(19, 8, 'SAzpe70p1BUC', 'JACKSON', 'ユーコ・スミダ・ジャクソン', 'http://books.google.com/books/content?id=SAzpe70p1BUC&amp;printsec=frontcover&amp;img=1&amp;zoom=5&amp;edge=curl&amp;source=gbs_api'),
(20, 3, 'm1uPoAEACAAJ', '別のしかたで', '千葉雅也', 'http://books.google.com/books/content?id=m1uPoAEACAAJ&amp;printsec=frontcover&amp;img=1&amp;zoom=5&amp;source=gbs_api'),
(21, 9, 'Wl_pPAAACAAJ', 'マルチチュード下', 'アントニオ・ネグリ', 'http://books.google.com/books/content?id=Wl_pPAAACAAJ&amp;printsec=frontcover&amp;img=1&amp;zoom=5&amp;source=gbs_api'),
(22, 11, 'oL6VoAEACAAJ', 'ブルーシート', '飴屋法水', 'http://books.google.com/books/content?id=oL6VoAEACAAJ&amp;printsec=frontcover&amp;img=1&amp;zoom=5&amp;source=gbs_api'),
(23, 9, 'cRsKAAAAMAAJ', '武者小路実篤論', 'Kunlo Ōtsuyama', 'http://books.google.com/books/content?id=cRsKAAAAMAAJ&amp;printsec=frontcover&amp;img=1&amp;zoom=5&amp;source=gbs_api'),
(24, 11, 'XznkyaL_d0sC', '魔法の一本針基礎編3', '高雄清子', 'http://books.google.com/books/content?id=XznkyaL_d0sC&amp;printsec=frontcover&amp;img=1&amp;zoom=5&amp;edge=curl&amp;source=gbs_api');

-- --------------------------------------------------------

--
-- テーブルの構造 `comments`
--

CREATE TABLE IF NOT EXISTS `comments` (
`id` int(12) NOT NULL,
  `uid` int(12) DEFAULT NULL,
  `bid` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL,
  `title` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `comment` varchar(1000) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- テーブルのデータのダンプ `comments`
--

INSERT INTO `comments` (`id`, `uid`, `bid`, `title`, `comment`) VALUES
(1, 3, 'kQ2XTkD2QLkC', 'タイトル', 'コメント'),
(2, 3, 'kQ2XTkD2QLkC', 'タイトル２', 'コメント２'),
(3, 3, 'kQ2XTkD2QLkC', 'タイトル', 'コメント'),
(4, 3, 'kQ2XTkD2QLkC', 'コメント４', 'コメント'),
(5, 4, 'O48eNwAACAAJ', 'この本すごい', 'すごいいね'),
(6, 8, 'dcY_DwAAQBAJ', '千葉雅也すげえ', '勉強の哲学も必読ですわ'),
(7, 8, 'SAzpe70p1BUC', 'マイケル', 'マイケルマイケル！！'),
(8, 9, 'Wl_pPAAACAAJ', 'いやーこの本は', '実にすごい'),
(9, 11, 'oL6VoAEACAAJ', 'タイトル', 'コメントコメントコメントコメントコメントコメントコメントコメントコメントコメント\r\nコメントコメントコメントコメントコメントコメント\r\nコメントコメントコメントコメントコメントコメント'),
(10, 11, 'XznkyaL_d0sC', 'いやはやすごい本だ', 'なかなかこういう本は読んだことないんですけど、\r\nとても刺激になりもうした'),
(11, 11, 'XznkyaL_d0sC', 'もいっちょ', 'もいっちょコメントするでー');

-- --------------------------------------------------------

--
-- テーブルの構造 `users`
--

CREATE TABLE IF NOT EXISTS `users` (
`id` int(12) NOT NULL,
  `name` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL,
  `password` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `avatar` blob NOT NULL,
  `administrator` tinyint(1) DEFAULT '0'
) ENGINE=InnoDB AUTO_INCREMENT=17 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- テーブルのデータのダンプ `users`
--

INSERT INTO `users` (`id`, `name`, `password`, `avatar`, `administrator`) VALUES
(9, 'user2', '$2y$10$pa.W0WqrQn85iEGQXgGnue/uie1gQMVzmfIn4cqovVxICbsjv053u', 0x3230313830313330323132333135323038323731323530322e6a7067, 0),
(10, 'user1', '$2y$10$79gR4oCIVFKyWSwXQxac7O.I59YMlNWeZHHYQY5P.3n9SC0qS5FG2', 0x32303138303133303231333235363830383931373735362e6a7067, 1),
(11, 'user3_1', '$2y$10$WHjTYNVgnA.em8MWLglHSutfBQlZvqhlSSoq2ODiRimK0jtPlpvI.', 0x3230313830313330323134373432313337373034383330362e6a7067, 0),
(12, 'user4', '$2y$10$quneAYmnr6L9TIK4eoQrIO8LZBvwX4l0DgxNPrIuuigKoI3I4Gvsa', 0x32303138303230313233303633363637393335303837352e6a7067, 0),
(16, 'user7', '$2y$10$B4uGpReq6qORRRQHHTRvMubhgfuEm4zrcxBYdMVmWavV0Ts4jzWNq', 0x3230313830323031323331303034313034333135373039392e706e67, 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `books`
--
ALTER TABLE `books`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `comments`
--
ALTER TABLE `comments`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
 ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `books`
--
ALTER TABLE `books`
MODIFY `id` int(12) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=25;
--
-- AUTO_INCREMENT for table `comments`
--
ALTER TABLE `comments`
MODIFY `id` int(12) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=12;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
MODIFY `id` int(12) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=17;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

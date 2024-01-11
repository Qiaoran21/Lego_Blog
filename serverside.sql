-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 05, 2023 at 05:09 PM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `serverside`
--

-- --------------------------------------------------------

--
-- Table structure for table `blogs`
--
-- Error reading structure for table serverside.blogs: #1932 - Table &#039;serverside.blogs&#039; doesn&#039;t exist in engine
-- Error reading data for table serverside.blogs: #1064 - You have an error in your SQL syntax; check the manual that corresponds to your MariaDB server version for the right syntax to use near &#039;FROM `serverside`.`blogs`&#039; at line 1

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

CREATE TABLE `comments` (
  `comment_id` int(11) NOT NULL,
  `post_id` int(11) NOT NULL,
  `user_id` int(20) NOT NULL,
  `user` varchar(10) NOT NULL,
  `created_date` timestamp NOT NULL DEFAULT current_timestamp(),
  `comment` varchar(2000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `comments`
--

INSERT INTO `comments` (`comment_id`, `post_id`, `user_id`, `user`, `created_date`, `comment`) VALUES
(1, 12, 2, '', '2023-11-15 21:34:27', 'jgkugibguhgviu'),
(2, 12, 3, '', '2023-11-15 21:35:05', 'khgigbkh'),
(3, 27, 1, '', '2023-11-15 21:49:19', 'good'),
(4, 27, 1, '', '2023-11-15 21:49:26', 'very good'),
(6, 1, 123, '', '2023-11-16 02:36:22', '123'),
(7, 1, 456, '', '2023-11-16 02:36:28', '456'),
(8, 1, 789, '', '2023-11-16 02:40:05', '789'),
(9, 1, 0, '', '2023-11-16 02:41:04', 'great post!'),
(10, 17, 0, '', '2023-11-16 02:44:28', 'yes! so many sales!'),
(11, 17, 0, '', '2023-11-16 02:46:51', 'i think so'),
(12, 6, 0, '', '2023-11-16 02:58:27', 'comment 1'),
(13, 6, 0, 'tester2', '2023-11-16 02:58:35', 'comment 2'),
(14, 6, 0, '', '2023-11-16 02:59:31', 'khvuigvj'),
(15, 12, 0, 'qiaoran', '2023-11-16 03:35:45', 'this is a great set, so fun!'),
(16, 7, 0, 'tester', '2023-11-17 14:42:45', 'yes!'),
(17, 7, 0, 'tester2', '2023-11-17 14:43:00', 'nooooooo!'),
(20, 43, 0, 'yoshi', '2023-11-23 18:16:55', 'love it!'),
(21, 7, 0, 'tester3', '2023-11-23 18:28:30', 'nope'),
(22, 7, 0, 'yoshi', '2023-11-23 18:35:09', 'yoshi was here'),
(23, 7, 0, 'yoshi', '2023-11-23 18:35:24', 'me again'),
(24, 6, 0, 'yoshi', '2023-11-23 18:37:22', 'i want one!'),
(26, 6, 0, 'tester', '2023-11-23 18:44:49', 'testing'),
(27, 43, 0, 'tester', '2023-11-23 18:54:51', '123'),
(28, 43, 0, 'tester2', '2023-11-23 18:54:58', '234'),
(29, 43, 0, 'tester24', '2023-11-24 02:06:23', 'testing'),
(30, 43, 0, 'tester432', '2023-11-24 02:30:21', 'testing!!!!!!!!!!!!!!'),
(31, 6, 0, 'tester123', '2023-11-24 03:29:56', 'testing'),
(32, 6, 0, 'yoshi123', '2023-11-24 03:39:38', '123'),
(33, 43, 0, 'tester1111', '2023-11-24 04:59:27', '1111'),
(34, 43, 0, 'tester2422', '2023-11-24 05:01:39', '12121212'),
(35, 43, 0, 'tester248', '2023-11-24 14:25:12', 'hello again'),
(36, 43, 0, 'yoshi342', '2023-11-24 14:26:40', 'yoshi again!'),
(37, 43, 0, 'tester242', '2023-11-24 15:16:27', '123'),
(38, 43, 0, 'tester242', '2023-11-24 15:16:57', '123456'),
(39, 43, 0, 'qiaoran', '2023-11-24 15:22:28', '1111'),
(40, 43, 0, 'moondog', '2023-11-24 15:25:19', 'so many comments!'),
(41, 6, 0, 'qiaoran', '2023-11-24 15:27:45', '1234'),
(42, 6, 0, 'qiaoran', '2023-11-24 15:30:36', 'yay'),
(44, 43, 0, 'tester34', '2023-11-27 14:27:42', 'hi'),
(45, 43, 0, 'yoshi234', '2023-11-27 14:29:50', 'hi');

-- --------------------------------------------------------

--
-- Table structure for table `images`
--

CREATE TABLE `images` (
  `image_id` int(30) NOT NULL,
  `post_id` int(30) NOT NULL,
  `image_path` varchar(100) NOT NULL,
  `created_date` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `images`
--

INSERT INTO `images` (`image_id`, `post_id`, `image_path`, `created_date`) VALUES
(2, 4, 'ryan-quintal-_H7p-RZUVo4-unsplash.jpg', '2023-11-23 16:10:18'),
(33, 85, 'resized_nik-OOJAUol19oo-unsplash.jpg', '2023-11-30 19:32:49'),
(35, 43, 'resized_ryan-quintal-_H7p-RZUVo4-unsplash.jpg', '2023-11-30 19:38:52'),
(37, 43, 'resized_roderick-sia-1pUhfO-GmeI-unsplash.jpg', '2023-11-30 19:40:09'),
(38, 7, 'resized_43225-The-Little-Mermaid-Royal-Clamshell-Set-Feature-1536x1349.jpg', '2023-11-30 19:44:35'),
(39, 9, 'resized_609a09107e39d306f58e520eebd11a50.jpg', '2023-11-30 19:47:03'),
(40, 9, 'resized_51617d4af782ff7e146f8485d231a038.jpg', '2023-11-30 19:47:03'),
(41, 9, 'resized_e1a942ef8a25caa76e0ae66daa0ab295.jpg', '2023-11-30 19:47:03'),
(45, 43, 'resized_ben-griffiths-J1FBR-U0cGg-unsplash.jpg', '2023-11-30 20:05:14'),
(50, 88, 'resized_himeji.jpg', '2023-11-30 20:11:18'),
(51, 88, 'resized_real himeji.jpg', '2023-11-30 20:11:18'),
(56, 27, 'resized_nik-OOJAUol19oo-unsplash.jpg', '2023-11-30 21:06:35'),
(57, 43, 'resized_roderick-sia-1pUhfO-GmeI-unsplash.jpg', '2023-12-05 14:22:56'),
(59, 99, 'resized_nik-OOJAUol19oo-unsplash.jpg', '2023-12-05 15:41:14'),
(60, 99, 'resized_real himeji.jpg', '2023-12-05 15:41:27'),
(61, 99, 'resized_roderick-sia-1pUhfO-GmeI-unsplash.jpg', '2023-12-05 15:41:27'),
(62, 99, 'resized_ryan-quintal-_H7p-RZUVo4-unsplash.jpg', '2023-12-05 15:41:28'),
(63, 99, 'resized_turkey1.png', '2023-12-05 15:41:29');

-- --------------------------------------------------------

--
-- Table structure for table `posts`
--

CREATE TABLE `posts` (
  `post_id` int(30) NOT NULL,
  `user_id` int(20) NOT NULL,
  `tag_id` int(11) NOT NULL,
  `title` varchar(50) NOT NULL,
  `created_date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `updated_date` datetime NOT NULL,
  `content` varchar(5000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `posts`
--

INSERT INTO `posts` (`post_id`, `user_id`, `tag_id`, `title`, `created_date`, `updated_date`, `content`) VALUES
(1, 3, 8, 'Zoo set is fun!', '2023-11-15 22:02:40', '0000-00-00 00:00:00', 'The new duplo zoo set is so much fun!'),
(4, 2, 8, 'duplo zoo', '2023-11-15 22:02:09', '0000-00-00 00:00:00', 'LEGO DUPLO Zoo sets offer a great learning and play experience for young kids aged 2 to 5. The zoo theme introduces kids to the fascinating world of animals, their habitats, and the idea of animal care and observation.  \r\nTo make it more fun - you can expand the zoo scene by combining it with other DUPLO sets, such as vehicles and people, which leads to an even more imaginative play, for example, visiting the zoo, or taking animals to a vet.  \r\nLike all other DUPLO bricks, we love how they were carefully designed with rounded edges and larger pieces to ensure that they are safe even for babies.\r\n'),
(6, 0, 12, 'ISO - Turkey minifigure!', '2023-11-30 17:46:50', '0000-00-00 00:00:00', 'Does anyone know where can I get the turkey minifigure? ??'),
(7, 3, 7, 'your thoughts on Little Mermaid royal clamshell', '2023-11-30 19:44:35', '0000-00-00 00:00:00', 'is it good? it looks so pretty! '),
(9, 2, 11, 'Tiny lego birds! ', '2023-11-30 19:47:03', '0000-00-00 00:00:00', 'check it out! I just made the smallest lego birds! '),
(12, 3, 6, '3-in-1 Pirate Ship set ', '2023-11-15 22:02:58', '0000-00-00 00:00:00', '    The LEGO 3-in-1 Pirate Ship is a captivating and versatile building set that offers a thrilling adventure on the high seas. This set allows builders to construct not just one, but three different pirate-themed models, each with its own unique features and play possibilities.     Children and adults alike can relish the excitement of building a classic pirate ship with intricate details like sails, cannons, and a crow&#039;s nest. Alternatively, they can transform their creation into a spooky pirate skull island hideout, complete with hidden treasure and a menacing skeleton crew. Lastly, the set can be transformed into a Pirate Tavern, providing endless opportunities for imaginative storytelling and role-play.     With its swashbuckling designs and imaginative potential, the LEGO 3-in-1 Pirate Ship sparks creativity and offers hours of engaging play for pirate enthusiasts of all ages. '),
(17, 1, 13, 'Black friday!', '2023-11-15 22:02:24', '0000-00-00 00:00:00', 'Is lego going to have a black friday sale in Canada? '),
(27, 1, 5, 'zoo in the city', '2023-11-15 22:01:58', '0000-00-00 00:00:00', 'zoooooooooooooooo'),
(43, 0, 12, 'hahahahaha', '2023-11-30 18:07:38', '0000-00-00 00:00:00', 'gergdr'),
(85, 0, 14, 'look at this chicken! ', '2023-11-30 19:31:21', '0000-00-00 00:00:00', 'love it!'),
(88, 0, 10, 'Himeji', '2023-11-30 20:11:18', '0000-00-00 00:00:00', 'love it'),
(99, 0, 11, 'new', '2023-12-05 15:41:14', '0000-00-00 00:00:00', 'new');

-- --------------------------------------------------------

--
-- Table structure for table `quotes`
--
-- Error reading structure for table serverside.quotes: #1932 - Table &#039;serverside.quotes&#039; doesn&#039;t exist in engine
-- Error reading data for table serverside.quotes: #1064 - You have an error in your SQL syntax; check the manual that corresponds to your MariaDB server version for the right syntax to use near &#039;FROM `serverside`.`quotes`&#039; at line 1

-- --------------------------------------------------------

--
-- Table structure for table `tags`
--

CREATE TABLE `tags` (
  `tag_id` int(11) NOT NULL,
  `name` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tags`
--

INSERT INTO `tags` (`tag_id`, `name`) VALUES
(5, 'City'),
(6, 'Creator'),
(7, 'Disney'),
(8, 'DUPLO'),
(9, 'Friends'),
(10, 'Icons'),
(11, 'Show Off'),
(12, 'Question'),
(13, 'Deals'),
(14, 'Minifigure'),
(15, 'Ideas'),
(17, 'test');

-- --------------------------------------------------------

--
-- Table structure for table `test`
--
-- Error reading structure for table serverside.test: #1932 - Table &#039;serverside.test&#039; doesn&#039;t exist in engine
-- Error reading data for table serverside.test: #1064 - You have an error in your SQL syntax; check the manual that corresponds to your MariaDB server version for the right syntax to use near &#039;FROM `serverside`.`test`&#039; at line 1

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_id` int(20) NOT NULL,
  `user_name` varchar(35) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(20) NOT NULL,
  `reenter_password` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `user_name`, `email`, `password`, `reenter_password`) VALUES
(1, 'tester', '', '', ''),
(2, 'tester2', '', '', ''),
(3, 'tester3', '', '', ''),
(5, 'qiaoran', 'qxue2@rrc.ca', '900511', ''),
(6, 'pinkoreo', 'qxue2@rrc.ca', 'oreo123', ''),
(7, 'nobu', 'qxue2@rrc.ca', 'nobu123', 'nobu123'),
(10, 'moondog', 'qxue2@rrc.ca', '12345', '12345'),
(11, 'tomtree', 'qxue2@rrc.ca', '123', '123'),
(12, 'yoshi', 'qxue2@rrc.ca', 'yoshi123', 'yoshi123'),
(13, 'tester123', 'qxue2@rrc.ca', '12345', '12345'),
(14, 'qiaoran123', 'qxue2@rrc.ca', '12345', '12345');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`comment_id`),
  ADD KEY `post_id` (`post_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `images`
--
ALTER TABLE `images`
  ADD PRIMARY KEY (`image_id`),
  ADD KEY `post_id` (`post_id`);

--
-- Indexes for table `posts`
--
ALTER TABLE `posts`
  ADD PRIMARY KEY (`post_id`),
  ADD KEY `tag_id` (`tag_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `tags`
--
ALTER TABLE `tags`
  ADD PRIMARY KEY (`tag_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `comments`
--
ALTER TABLE `comments`
  MODIFY `comment_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=47;

--
-- AUTO_INCREMENT for table `images`
--
ALTER TABLE `images`
  MODIFY `image_id` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=64;

--
-- AUTO_INCREMENT for table `posts`
--
ALTER TABLE `posts`
  MODIFY `post_id` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=100;

--
-- AUTO_INCREMENT for table `tags`
--
ALTER TABLE `tags`
  MODIFY `tag_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `comments`
--
ALTER TABLE `comments`
  ADD CONSTRAINT `comments_ibfk_1` FOREIGN KEY (`post_id`) REFERENCES `posts` (`post_id`);

--
-- Constraints for table `images`
--
ALTER TABLE `images`
  ADD CONSTRAINT `images_ibfk_1` FOREIGN KEY (`post_id`) REFERENCES `posts` (`post_id`);

--
-- Constraints for table `posts`
--
ALTER TABLE `posts`
  ADD CONSTRAINT `posts_ibfk_1` FOREIGN KEY (`tag_id`) REFERENCES `tags` (`tag_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

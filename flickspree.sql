-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 28, 2022 at 05:15 AM
-- Server version: 10.4.18-MariaDB
-- PHP Version: 8.0.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `flickspree`
--

-- --------------------------------------------------------

--
-- Table structure for table `fs_category`
--

CREATE TABLE `fs_category` (
  `ct_id` int(11) NOT NULL,
  `ct_name` varchar(50) NOT NULL,
  `ct_status` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `fs_category`
--

INSERT INTO `fs_category` (`ct_id`, `ct_name`, `ct_status`) VALUES
(1, 'Action', 1),
(2, 'Biography', 1),
(3, 'Crime', 1),
(4, 'Adventure', 1),
(5, 'Animation', 1),
(6, 'Comedy', 1),
(7, 'Drama', 1),
(8, 'Horror', 1),
(9, 'Mystery', 1);

-- --------------------------------------------------------

--
-- Table structure for table `fs_comment`
--

CREATE TABLE `fs_comment` (
  `id` int(11) NOT NULL,
  `vid_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `comment` varchar(2000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `fs_comment`
--

INSERT INTO `fs_comment` (`id`, `vid_id`, `user_id`, `comment`) VALUES
(1, 2, 1, 'it\'s a comment'),
(2, 6, 1, 'add a public comment'),
(3, 10, 1, 'This is my fav anime'),
(4, 12, 1, 'amazing'),
(5, 12, 1, 'ahh yes'),
(6, 12, 6, 'I\'m anu😂😂'),
(7, 14, 1, 'woah'),
(8, 13, 7, 'wow'),
(9, 12, 7, 'wow'),
(10, 13, 8, 'Dammi'),
(11, 10, 8, 'waah'),
(12, 13, 9, 'wow'),
(13, 13, 9, 'great');

-- --------------------------------------------------------

--
-- Table structure for table `fs_country`
--

CREATE TABLE `fs_country` (
  `id` int(11) NOT NULL,
  `country` varchar(255) NOT NULL,
  `status` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `fs_country`
--

INSERT INTO `fs_country` (`id`, `country`, `status`) VALUES
(1, 'Nepal', 1),
(2, 'India', 1),
(3, 'China', 1),
(4, 'USA', 1),
(5, 'Japan', 1),
(6, 'Thailand', 1),
(7, 'Russia', 1);

-- --------------------------------------------------------

--
-- Table structure for table `fs_video`
--

CREATE TABLE `fs_video` (
  `vid_id` int(11) NOT NULL,
  `vid_title` varchar(256) NOT NULL,
  `vid_description` mediumtext NOT NULL,
  `vid_thumbnail` varchar(256) NOT NULL,
  `vid_name` varchar(256) NOT NULL,
  `vid_rel_date` date NOT NULL,
  `ct_id` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `fs_video`
--

INSERT INTO `fs_video` (`vid_id`, `vid_title`, `vid_description`, `vid_thumbnail`, `vid_name`, `vid_rel_date`, `ct_id`) VALUES
(7, 'Stay', 'In the city that never sleeps, Olivia is taking the modeling world by storm. A cover girl in the making, Olivia is booking big clients and bringing her online audience along for the ride. With her career on the rise, she leases a stunning Manhattan loft space. Remodeled extensively over the years, the apartment\'s welcoming appearance conceals a dark secret.', '60841b26e76c9.jpg', '60841b2259667.mp4', '2021-04-14', 8),
(8, 'Harry Potter and the sorcerer\'s stone', 'Young Harry Potter (Daniel Radcliffe) has to lead a hard life: His parents have died in a car crash when he was still a baby, and he is being brought up by his Uncle Vernon (Richard Griffiths) and Aunt Petunia (Fiona Shaw). For some reason unbeknownst to the bespectacled ten-year-old, the Dursleys let him live in the small chamber under the stairs, and treat him more like vermin than like a family member. His fat cousin Dudley Harry Melling), the Dursley\'s real son, keeps bothering Harry all the time. On his eleventh birthday, Harry Potter finally receives a mysterious letter from a certain Hogwarts School of Witchcraft and Wizardry, telling him that he is chosen as one of the future students of that supposedly renowned school. ', '60841b61d4c72.jpg', '60841b5d2e0bb.mp4', '2021-03-30', 9),
(9, 'The Avengers', 'Nick Fury is director of S.H.I.E.L.D, an international peace keeping agency. The agency is a who\'s who of Marvel Super Heroes, with Iron Man, The Incredible Hulk, Thor, Captain America, Hawkeye and Black Widow. When global security is threatened by Loki and his cohorts, Nick Fury and his team will need all their powers to save the world from disaster.', '60841bbe20887.jpg', '60841bb15b6c1.mp4', '2021-04-01', 1),
(10, 'Jujutsu Kaisen', 'A boy swallows a cursed talisman - the finger of a demon - and becomes cursed himself. He enters a shaman\'s school to be able to locate the demon\'s other body parts and thus exorcise himself. A family is attacked by demons and only two members survive - Tanjiro and his sister Nezuko, who is turning into a demon slowly.', '60841c072b9cd.jpg', '60841c023ca46.mp4', '2021-02-28', 5),
(11, 'Godzilla vs Kong', 'With the world still shaken from the battle between Ghidorah and Godzilla, humanity has begun to try and co-exist with the Titans. But after Godzilla begins his own reign of terror, humanity must call on another legend to stop him: Kong. Not everything is as it seems when Monarch travel to Skull Island, where a mysterious young girl known to communicate wi', '60841c9d728ef.jpg', '60841c8e80fb0.mp4', '2021-04-20', 4),
(12, 'Sherlock Holmes', 'A modern adaptation of the famous Sir Arthur Conan Doyle stories. Sherlock Holmes lives in 21st century London, a city filled with mystery, crime and deceit. The back streets are alive with robbers, blackmailers, smugglers and serial killers. When the police are desperate they call upon Mr Sherlock Holmes and his unconventional methods of deduction to shed light on the matter.', '60841d046eaa2.jpg', '60841cf61f2b6.mp4', '2021-02-16', 7),
(13, 'Black Lightning', 'Black Lightning and his team descend upon Markovia on a mission to rescue Lynn, who finds herself in even more trouble when she meets a metahuman on the Markovian side. As suspicions grow that Jefferson Pierce is Black Lightning, the ASA arranges to have him arrested. Lynn seeks help from Detective Henderson. Meanwhile, with Jefferson in custody, Gambi and Anissa', '608427ffa6de4.jpg', '608427f94c998.mp4', '2021-04-02', 6);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `role` varchar(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `email`, `role`) VALUES
(1, 'Sunil Khadka', '48ccc87cd7afb85704a63e8d5953d326', 'sunil@gmail.com', 'admin'),
(6, 'Anu don', '9904fd42e4977d5815b5d5679a935ed5', 'anu@gmail.com', 'user'),
(7, 'watch', '4afa2b554013d806bd09bb54ade79ad7', 'watch@gmail.com', 'user'),
(8, 'Aditya', '827ccb0eea8a706c4c34a16891f84e7b', 'aditya@gmail.com', 'user'),
(9, 'rohan', '202cb962ac59075b964b07152d234b70', 'r@gmail.com', 'admin');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `fs_category`
--
ALTER TABLE `fs_category`
  ADD PRIMARY KEY (`ct_id`);

--
-- Indexes for table `fs_comment`
--
ALTER TABLE `fs_comment`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `fs_country`
--
ALTER TABLE `fs_country`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `fs_video`
--
ALTER TABLE `fs_video`
  ADD PRIMARY KEY (`vid_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `fs_category`
--
ALTER TABLE `fs_category`
  MODIFY `ct_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `fs_comment`
--
ALTER TABLE `fs_comment`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `fs_country`
--
ALTER TABLE `fs_country`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `fs_video`
--
ALTER TABLE `fs_video`
  MODIFY `vid_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

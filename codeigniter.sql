-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Mar 13, 2017 at 01:02 AM
-- Server version: 10.1.16-MariaDB
-- PHP Version: 7.0.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `codeigniter`
--

-- --------------------------------------------------------

--
-- Table structure for table `projects`
--

CREATE TABLE `projects` (
  `id` int(11) NOT NULL,
  `project_user_id` int(11) NOT NULL,
  `pro_name` varchar(255) NOT NULL,
  `pro_body` text NOT NULL,
  `date_created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `projects`
--

INSERT INTO `projects` (`id`, `project_user_id`, `pro_name`, `pro_body`, `date_created`) VALUES
(1, 2, 'PHP', 'Funtions and Declarations', '2017-02-25 13:12:19'),
(2, 2, 'Laravel', 'This is a course on laravel', '2017-02-25 13:24:25'),
(3, 2, 'Javascript', 'A colonized for javascript', '2017-02-25 13:37:03'),
(4, 1, 'CSS', 'Testeing the stuffs using css', '2017-02-26 14:57:59');

-- --------------------------------------------------------

--
-- Table structure for table `tasks`
--

CREATE TABLE `tasks` (
  `id` int(11) NOT NULL,
  `project_id` int(11) NOT NULL,
  `task_name` varchar(255) NOT NULL,
  `task_body` text NOT NULL,
  `due_date` date NOT NULL,
  `date_created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `status` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tasks`
--

INSERT INTO `tasks` (`id`, `project_id`, `task_name`, `task_body`, `due_date`, `date_created`, `status`) VALUES
(1, 2, '1st Task- Introduction', 'Introduction to laravel', '2015-08-12', '2017-02-25 13:25:59', 0),
(2, 1, 'Introduction to PHP', 'Learning the basics of PHP', '2012-07-18', '2017-02-25 13:34:34', 0),
(3, 2, '2nd Task- Datatypes and Variables', 'Learning about datatypes and varibles', '2017-03-12', '2017-03-12 15:49:12', 0),
(4, 3, '1st Task- Introduction', 'Introduction to javascript', '2017-03-12', '2017-03-12 15:49:51', 0);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `user_name` varchar(255) NOT NULL,
  `user_password` varchar(255) NOT NULL,
  `firstname` varchar(255) NOT NULL,
  `lastname` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `reg_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `resetToken` varchar(255) NOT NULL,
  `resetCompleted` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `user_name`, `user_password`, `firstname`, `lastname`, `email`, `reg_date`, `resetToken`, `resetCompleted`) VALUES
(1, 'Victor', '$2y$12$Wvfosc7nc5Hz3oJMn4ERLOLVIROLwJQ3MU9uh69THV/x.OIO8qO0u', 'Victor', 'Alagwu', 'victoralagwu@gmail.com', '2017-02-09 15:36:57', 'fcefe922dde508a2b34ba98af6894ed4', 'No'),
(2, 'Demo', '$2y$12$dG2gUjCZGi3BYeqirC8XteUtq85Ou3ppbScjPZVLAaGQL3PYBXHGS', 'Demo', 'Demo', 'demo@gm.i', '2017-02-09 15:38:59', 'bbd35657243b4043a365bcc76ca256ff', 'No'),
(3, 'Tester', '$2y$12$ZQiJre3hewKAl0oR9aENpO6rxMA6AXM8wU0ZS8qy4GGqAgwsizV7.', 'Tester', 'Test', 'tester@gmail.com', '2017-03-12 17:48:26', '', ''),
(4, 'John', '$2y$12$q/WA.aLVFISC2yee6M9JM.5ZZjSJzIe9vhu2vp4UtngYi1Rhb/4fm', 'Johnpaul', 'Alagwu', 'johnpaul@gmail.com', '2017-03-12 17:55:36', '', ''),
(5, 'asdadsd', '$2y$12$vOacVNUt1I8W0RhDeHVnHuAMtsvrDTlopC29zDNeA5wy6CLBoHWrC', 'asasddasd', 'adaddasd', 'asd@sdwsds.kjk', '2017-03-12 18:02:45', '', '');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `projects`
--
ALTER TABLE `projects`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tasks`
--
ALTER TABLE `tasks`
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
-- AUTO_INCREMENT for table `projects`
--
ALTER TABLE `projects`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `tasks`
--
ALTER TABLE `tasks`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

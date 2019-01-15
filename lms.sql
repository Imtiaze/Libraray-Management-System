-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Jan 15, 2019 at 07:05 PM
-- Server version: 10.1.16-MariaDB
-- PHP Version: 5.6.24

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `lms`
--

-- --------------------------------------------------------

--
-- Table structure for table `add_books`
--

CREATE TABLE `add_books` (
  `id` int(5) NOT NULL,
  `books_name` varchar(50) NOT NULL,
  `books_author_name` varchar(50) NOT NULL,
  `books_publication_name` varchar(50) NOT NULL,
  `books_image` varchar(500) NOT NULL,
  `books_purchase_date` varchar(34) NOT NULL,
  `books_price` varchar(34) NOT NULL,
  `books_qty` int(50) NOT NULL,
  `available_qty` int(50) NOT NULL,
  `librarian_username` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `add_books`
--

INSERT INTO `add_books` (`id`, `books_name`, `books_author_name`, `books_publication_name`, `books_image`, `books_purchase_date`, `books_price`, `books_qty`, `available_qty`, `librarian_username`) VALUES
(1, 'Harry Potter', 'JK Rowling', 'Ash what', 'books_image/bfe75bbaeb236c2371158b34a4bbba26black-black-and-white-photography-37727.jpg', '1/13/2019', '1500', 50, 47, 'a'),
(2, 'Free Book Mockup', 'Some One', 'Ache kew', 'books_image/902acb7bfa28035cc6f41fd98da9346dFreeBookMockup.jpg', '4/01/2019', '500', 50, 50, 'a'),
(3, 'as', 'asa', 'as', 'books_image/ef8681a3323090a7d219a06b9603d0ae2.PNG', 'as', 'as', 50, 0, 'a'),
(4, 'Php and MySQL', 'Steven Janet', 'Ash what', 'books_image/a1bb2014ec5b1ba5c7caadab4bb95c47php.jpg', '4/1/2019', '550', 50, 49, 'a'),
(5, 'Causal Vacancy', 'JK Rowling', 'Sphere ', 'books_image/0bc98d2a868ca27396045e8a16796bd6Causal Vacancy.PNG', '1/8/2019', '1078', 50, 49, 'a'),
(6, 'The Shining', 'Stephen King ', 'Hodder And Stoughton ', 'books_image/fbc5f6ef396f5d529605122de80e2995the Shining.PNG', '1/8/2019', '718', 50, 0, 'a'),
(7, 'PHP Advance', 'Larry Ullman ', 'Pearson ', 'books_image/ac8a4dc499860076dab2baa14a942df0php advance.PNG', '1/8/2019', '1366', 50, 50, 'a');

-- --------------------------------------------------------

--
-- Table structure for table `issue_books`
--

CREATE TABLE `issue_books` (
  `id` int(5) NOT NULL,
  `student_enrollment` varchar(50) NOT NULL,
  `student_name` varchar(50) NOT NULL,
  `student_sem` varchar(50) NOT NULL,
  `student_contact` varchar(50) NOT NULL,
  `student_email` varchar(50) NOT NULL,
  `books_name` varchar(50) NOT NULL,
  `books_issue_date` varchar(50) NOT NULL,
  `books_return_date` varchar(50) NOT NULL,
  `student_username` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `issue_books`
--

INSERT INTO `issue_books` (`id`, `student_enrollment`, `student_name`, `student_sem`, `student_contact`, `student_email`, `books_name`, `books_issue_date`, `books_return_date`, `student_username`) VALUES
(2, '15103207', 'Ahsanul', '12', '01923267542', 'millat@gmail.com', 'Harry Potter', '07/01/2019', '08/01/2019', 'Millat'),
(3, '15103244', 'Ahammed', '4', '23424', 'darkcoder71@gmail.com', 'Php and MySQL', '08/01/2019', '09/01/2019', 'abc'),
(4, '15103244', 'Ahammed', '4', '23424', 'darkcoder71@gmail.com', 'Harry Potter', '08/01/2019', '', 'abc'),
(5, '15103207', 'Ahsanul', '12', '01923267542', 'millat@gmail.com', 'Php and MySQL', '08/01/2019', '', 'Millat'),
(6, '16101937', 'afzal', 'test', 'test', 'afzal@gmail.com', 'Causal Vacancy', '08/01/2019', '08/01/2019', 'test'),
(7, '15103207', 'Ahsanul', '12', '01923267542', 'millat@gmail.com', 'The Shining', '08/01/2019', '08/01/2019', 'Millat'),
(8, '15103207', 'Ahsanul', '12', '01923267542', 'millat@gmail.com', 'The Shining', '08/01/2019', '08/01/2019', 'Millat'),
(9, '15103207', 'Ahsanul', '12', '01923267542', 'millat@gmail.com', 'The Shining', '08/01/2019', '08/01/2019', 'Millat'),
(10, '16101937', 'afzal', 'test', 'test', 'afzal@gmail.com', 'Harry Potter', '08/01/2019', '', 'test'),
(11, '15103207', 'Ahsanul', '12', '01923267542', 'millat@gmail.com', 'Harry Potter', '09/01/2019', '', 'Millat'),
(12, '16101937', 'afzal', 'test', 'test', 'afzal@gmail.com', 'Causal Vacancy', '09/01/2019', '', 'test'),
(13, '15103133', 'Sam', '12', '1234556678899', 'sam@gmail.com', 'Harry Potter', '10/01/2019', '10/01/2019', 'sam');

-- --------------------------------------------------------

--
-- Table structure for table `librarian_registration`
--

CREATE TABLE `librarian_registration` (
  `id` int(5) NOT NULL,
  `firstname` varchar(50) NOT NULL,
  `lastname` varchar(50) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `contact` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `librarian_registration`
--

INSERT INTO `librarian_registration` (`id`, `firstname`, `lastname`, `username`, `password`, `email`, `contact`) VALUES
(1, 'Alma', 'Tanjin', 'ria', 'ria', 'abc@gmai.com', '23423'),
(2, 'Saidur', 'Rahman', 'a', 'a', 'abc@gmai.com', '23423');

-- --------------------------------------------------------

--
-- Table structure for table `messages`
--

CREATE TABLE `messages` (
  `id` int(5) NOT NULL,
  `susername` text NOT NULL,
  `dusername` text NOT NULL,
  `title` text NOT NULL,
  `msg` text NOT NULL,
  `msg_date` text NOT NULL,
  `read1` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `messages`
--

INSERT INTO `messages` (`id`, `susername`, `dusername`, `title`, `msg`, `msg_date`, `read1`) VALUES
(1, 'a', 'Millat', 'TImes Up!', 'Please return your Book as soon as Possible!', '09/01/2019', 'y'),
(2, 'a', 'Millat', 'Return Book', 'Hey man , hurry up!', '09/01/2019', 'y'),
(3, 'a', 'abc', 'Return', 'Please return the book', '09/01/2019', 'y'),
(4, 'a', 'Millat', 'trdtytd', '76rrr', '09/01/2019', 'y'),
(5, 'a', 'sam', 'Sucess!', 'Your Account Has Been approved', '10/01/2019', 'y');

-- --------------------------------------------------------

--
-- Table structure for table `student_registration`
--

CREATE TABLE `student_registration` (
  `id` int(34) NOT NULL,
  `firstname` text NOT NULL,
  `lastname` text NOT NULL,
  `username` text NOT NULL,
  `password` text NOT NULL,
  `email` text NOT NULL,
  `contact` text NOT NULL,
  `sem` text NOT NULL,
  `enrollmentno` text NOT NULL,
  `status` varchar(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `student_registration`
--

INSERT INTO `student_registration` (`id`, `firstname`, `lastname`, `username`, `password`, `email`, `contact`, `sem`, `enrollmentno`, `status`) VALUES
(1, 'Ahsanul', 'Haque', 'Millat', '1234', 'millat@gmail.com', '01923267542', '12', '15103207', 'yes'),
(2, 'Ahammed', 'Imtiaze', 'abc', '1234', 'darkcoder71@gmail.com', '23424', '4', '15103244', 'yes'),
(3, 'afzal', 'ahmed', 'test', 'test', 'afzal@gmail.com', 'test', 'test', '16101937', 'yes'),
(4, 'b', 'b', 'b', 'b', 'b', 'b', 'b', 'b', 'yes'),
(5, 'Sam', 'Mia', 'sam', 'sam', 'sam@gmail.com', '1234556678899', '12', '15103133', 'yes');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `add_books`
--
ALTER TABLE `add_books`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `issue_books`
--
ALTER TABLE `issue_books`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `librarian_registration`
--
ALTER TABLE `librarian_registration`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `messages`
--
ALTER TABLE `messages`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `student_registration`
--
ALTER TABLE `student_registration`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `add_books`
--
ALTER TABLE `add_books`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `issue_books`
--
ALTER TABLE `issue_books`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
--
-- AUTO_INCREMENT for table `librarian_registration`
--
ALTER TABLE `librarian_registration`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `messages`
--
ALTER TABLE `messages`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `student_registration`
--
ALTER TABLE `student_registration`
  MODIFY `id` int(34) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

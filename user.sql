-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Apr 27, 2019 at 01:43 PM
-- Server version: 5.7.23
-- PHP Version: 7.2.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `user`
--

-- --------------------------------------------------------

--
-- Table structure for table `adminlogin`
--

DROP TABLE IF EXISTS `adminlogin`;
CREATE TABLE IF NOT EXISTS `adminlogin` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(50) NOT NULL,
  `password` varchar(20) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=9 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `adminlogin`
--

INSERT INTO `adminlogin` (`id`, `username`, `password`) VALUES
(2, 'urja', 'urja'),
(4, 'kratika', 'kratika'),
(5, 'aalia', 'aalia');

-- --------------------------------------------------------

--
-- Table structure for table `books`
--

DROP TABLE IF EXISTS `books`;
CREATE TABLE IF NOT EXISTS `books` (
  `bookname` varchar(30) NOT NULL,
  `authorname` varchar(20) NOT NULL,
  `cover` varchar(100) NOT NULL,
  `pdf` varchar(100) NOT NULL,
  `summary` varchar(500) NOT NULL,
  `category` varchar(20) NOT NULL,
  PRIMARY KEY (`bookname`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `books`
--

INSERT INTO `books` (`bookname`, `authorname`, `cover`, `pdf`, `summary`, `category`) VALUES
('Harry Potter', 'JK Rowling', 'cover/classes-1.jpg', 'pdf\\Harry Potter and the Sorcerer\'s Stone.pdf', 'Harry learns that his parents were wizards and were killed by an evil wizard Voldemort, a truth that was hidden from him all these years. ... But not everything is quiet at Hogwarts as Harry suspects someone is planning to steal the sorcerer\'s stone.', 'fiction'),
('The God of Small Things', 'Arundhati Roy', 'cover/classes-5.jpg', 'pdf/The God of Small Things.pdf', 'The God of Small Things. The God of Small Things was written by Indian writer Arundhati Roy in 1997. The novel is about two fraternal twins who reunite as young adults, after family tensions have kept them apart for many years. The novel won the Booker Prize in 1997.', 'fiction'),
('The Fault in Our Stars', 'John Green', 'cover/classes-6.jpg', 'pdf/The Fault in Our Stars.pdf', 'The Fault in Our Stars Summary. Hazel Grace Lancaster has been living with cancer for three of her seventeen years of life. Despite this, she is a girl with a vibrant mind, biting wit, and incredible empathy for the position into which she puts her parents of having to care for her.', 'fiction'),
('Origin', 'Dan Brown', 'cover/classes-3.jpg', 'pdf/classes-3.jpg', 'At the Guggenheim Museum of Bilbao, Spain, computer genius, futurist and billionaire, Edmond Kirsch, is going to unveil his groundbreaking theory of the origin and destiny of humanity. One of the invitees is Harvard Professor of symbology, Robert Langdon. Edmond Kirsch happens to be his friend and a former student.', 'fiction'),
('1984', 'George Orwell', 'cover/classes-4.jpg', 'pdf/1984.pdf', 'The story unfolds on a cold April day in 1984 in Oceania, the totalitarian superpower in post World War II Europe. Winston Smith, employed as a records (no, not vinyl) editor at the Ministry of Truth, drags himself home to Victory Mansions (nothing victorious about them) for lunch.', 'lifestyle'),
('Sapiens', 'Yuval Noah Harari', 'cover/classes-2.jpg', 'pdf/Sapiens.pdf', 'This is my book summary of Sapiens by Yuval Noah Harari. My notes are informal and often contain quotes from the book as well as my own thoughts. This summary also includes key lessons and important passages from the book. Human cultures began to take shape about 70,000 years ago.', 'lifestyle'),
('Fangirl', 'Rainbow Rowell', 'cover/classes-7.jpg', 'pdf/Fangirl.pdf', 'In Rainbow Rowell\'s Fangirl, Cath is a Simon Snow fan. Okay, the whole world is a Simon Snow fan, but for Cath, being a fan is her life - and she\'s really good at it. She and her twin sister, Wren, ensconced themselves in the Simon Snow series when they were just kids; it\'s what got them through their mother leaving.', 'personal growth'),
('Harry Potter2', 'JK Rowling', 'cover/classes-1.jpg', 'pdf\\Harry Potter and the Sorcerer\'s Stone.pdf', 'this is a nice book.', 'Fiction'),
('Harry Potter 1', 'JK Rowling', 'cover/classes-1.jpg', 'pdf\\Harry Potter and the Sorcerer\'s Stone.pdf', 'Harry learns that his parents were wizards and were killed by an evil wizard Voldemort, a truth that was hidden from him all these years. ... But not everything is quiet at Hogwarts as Harry suspects someone is planning to steal the sorcerer\'s stone.', 'fiction');

-- --------------------------------------------------------

--
-- Table structure for table `login`
--

DROP TABLE IF EXISTS `login`;
CREATE TABLE IF NOT EXISTS `login` (
  `username` varchar(30) NOT NULL,
  `email` varchar(50) NOT NULL,
  `p1` varchar(100) NOT NULL,
  `password` varchar(20) NOT NULL,
  PRIMARY KEY (`username`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `login`
--

INSERT INTO `login` (`username`, `email`, `p1`, `password`) VALUES
('nirma', '16bit003@nirmauni.ac.in', 'Lifestyle,Personal_Growth', 'knHmK2lGAwRaU'),
('rohit', '16bce071@nirmauni.ac.in', 'Fiction,Lifestyle', 'knahz7QlwOk0A'),
('kratika', 'kratika468@yahoo.com', 'Fiction,Lifestyle', 'knOMLsNnm2wjc'),
('Sparsh', 'ssparsh03@gmail.com', 'Career_and_Money,Science_and_Technology,Fiction', 'kn5DytXcxsiuo'),
('urja', 'urjajobanputra657@gmail.com', 'Fiction,Lifestyle', 'knkBGErpFfkQA'),
('vikas', 'vikasjobanputra@hotmail.com', 'Career_and_Money,Science_and_Technology,Fiction', 'knrgoJLQAdxrw');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

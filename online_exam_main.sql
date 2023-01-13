-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 08, 2022 at 06:14 PM
-- Server version: 10.4.22-MariaDB
-- PHP Version: 8.1.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `online_exam_main`
--

-- --------------------------------------------------------

--
-- Table structure for table `course`
--

CREATE TABLE `course` (
  `Course_Id` int(5) NOT NULL,
  `Course_Name` varchar(30) NOT NULL,
  `Institution_Id` int(5) NOT NULL,
  `Department_Id` int(5) NOT NULL,
  `Duration` int(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `course`
--

INSERT INTO `course` (`Course_Id`, `Course_Name`, `Institution_Id`, `Department_Id`, `Duration`) VALUES
(120, 'bca', 155, 123, 3),
(134, 'bca', 155, 102, 3);

-- --------------------------------------------------------

--
-- Table structure for table `department`
--

CREATE TABLE `department` (
  `Department_Id` int(5) NOT NULL,
  `Department_Name` varchar(30) NOT NULL,
  `Institution_Id` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `department`
--

INSERT INTO `department` (`Department_Id`, `Department_Name`, `Institution_Id`) VALUES
(0, 'Office', 157),
(12, 'Office', 155),
(102, 'bca', 155),
(123, 'Office', 156),
(958, 'Office', 158);

-- --------------------------------------------------------

--
-- Table structure for table `exam`
--

CREATE TABLE `exam` (
  `Exam_Id` int(5) NOT NULL,
  `Exam_Name` varchar(30) NOT NULL,
  `Description` varchar(50) NOT NULL,
  `Institution_Id` int(5) NOT NULL,
  `Type` int(2) NOT NULL,
  `Course_Id` int(5) NOT NULL,
  `Teacher_Id` int(5) NOT NULL,
  `Duration` int(3) NOT NULL,
  `Date` date NOT NULL,
  `uniq` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `exam`
--

INSERT INTO `exam` (`Exam_Id`, `Exam_Name`, `Description`, `Institution_Id`, `Type`, `Course_Id`, `Teacher_Id`, `Duration`, `Date`, `uniq`) VALUES
(29, 'Linux', 'Basics', 155, 1, 134, 23, 30, '2022-12-06', '638f26a032ac7'),
(30, 'a', '22', 155, 1, 134, 23, 2, '2000-12-20', '638f29e1ae48b'),
(31, 'e', '4dd', 155, 1, 134, 23, 3, '2020-10-10', '638f2a12bb115'),
(32, 'w', 'ded', 155, 1, 134, 23, 2, '0010-10-10', '638f2d1bc2e5d'),
(33, 'jsjs', 'd', 155, 1, 134, 23, 3, '0010-10-10', '63904977d55d0'),
(34, 'C Programming', 'Control Statements ', 155, 1, 134, 23, 15, '2022-12-08', '6391b84f9dab6'),
(35, 'Computer Networks', 'Basics', 155, 1, 134, 23, 30, '2022-12-06', '6391c046ab679');

-- --------------------------------------------------------

--
-- Table structure for table `examresult`
--

CREATE TABLE `examresult` (
  `email` varchar(30) NOT NULL,
  `Exam_Id` int(5) NOT NULL,
  `Quiz_Total` int(5) NOT NULL,
  `Subjective_Total` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `examresult`
--

INSERT INTO `examresult` (`email`, `Exam_Id`, `Quiz_Total`, `Subjective_Total`) VALUES
('arun@gmail.com', 29, 0, -1),
('arun@gmail.com', 30, -1, -1),
('arun@gmail.com', 34, -1, -1),
('arun@gmail.com', 35, 2, -1);

-- --------------------------------------------------------

--
-- Table structure for table `institution`
--

CREATE TABLE `institution` (
  `Institution_Id` int(5) NOT NULL,
  `Institution_Name` varchar(40) NOT NULL,
  `Address` varchar(50) NOT NULL,
  `Phone_No` int(10) NOT NULL,
  `E_Mail` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `institution`
--

INSERT INTO `institution` (`Institution_Id`, `Institution_Name`, `Address`, `Phone_No`, `E_Mail`) VALUES
(155, 'MES College Marampally', 'Aluva-06', 2147483647, 'mesmarampally@gamil.com'),
(156, 'maharajas', 'ernakulam', 12, 'maharajas@gmai.com'),
(157, 'IIT', 'Madrass', 12345, 'iit@gmai.com'),
(158, 'iit', 'aa', 2, 'iitt@gmail.com');

-- --------------------------------------------------------

--
-- Table structure for table `qquestion`
--

CREATE TABLE `qquestion` (
  `Quiz_Id` int(5) NOT NULL,
  `Question_Id` int(5) NOT NULL,
  `Qns` varchar(150) NOT NULL,
  `sn` int(3) NOT NULL,
  `op1` varchar(100) NOT NULL,
  `op2` varchar(100) NOT NULL,
  `op3` varchar(100) NOT NULL,
  `op4` varchar(100) NOT NULL,
  `Answer` int(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `qquestion`
--

INSERT INTO `qquestion` (`Quiz_Id`, `Question_Id`, `Qns`, `sn`, `op1`, `op2`, `op3`, `op4`, `Answer`) VALUES
(8, 1, 'linux ', 1, 'hello', 'hi', 'how', 'where', 2),
(8, 2, 'basics', 2, 'just', 'a matter', 'of it', 'ok', 1),
(8, 3, 'joint', 3, 'sql', 'nosql', 'mysql', 'mongodb', 3),
(9, 7, 'w', 1, 'e', 'r', 't', 'y', 4),
(9, 8, 'r', 2, 's', 't', 'u', 'v', 2),
(10, 9, 'Computer Networks is a ----------------', 1, 'Subject', 'pen', 'paper', 'system', 1),
(10, 10, 'today is', 2, 'monday', 'tuesday', 'wednesday', 'thursday', 4),
(10, 11, 'India is Governed by', 3, 'AAP', 'UDF', 'BJP', 'Others', 3),
(10, 12, 'Asianet is a ', 4, 'channel', 'paper', 'pen', 'tv', 1),
(10, 13, 'Select any option randomly', 5, '1', '2', '3', '4', 1);

-- --------------------------------------------------------

--
-- Table structure for table `quiz`
--

CREATE TABLE `quiz` (
  `Exam_Id` int(5) NOT NULL,
  `Quiz_Id` int(5) NOT NULL,
  `Mark` int(5) NOT NULL,
  `TotalQ` int(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `quiz`
--

INSERT INTO `quiz` (`Exam_Id`, `Quiz_Id`, `Mark`, `TotalQ`) VALUES
(29, 8, 3, 3),
(31, 9, 2, 2),
(35, 10, 2, 5);

-- --------------------------------------------------------

--
-- Table structure for table `quizresult`
--

CREATE TABLE `quizresult` (
  `email` varchar(30) NOT NULL,
  `Exam_Id` int(5) NOT NULL,
  `CorrectQNo` int(2) NOT NULL,
  `WrongQNo` int(2) NOT NULL,
  `Total` int(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `quizresult`
--

INSERT INTO `quizresult` (`email`, `Exam_Id`, `CorrectQNo`, `WrongQNo`, `Total`) VALUES
('arun@gmail.com', 29, 0, 3, 0),
('arun@gmail.com', 35, 1, 4, 2);

-- --------------------------------------------------------

--
-- Table structure for table `squestions`
--

CREATE TABLE `squestions` (
  `Sid` int(5) NOT NULL,
  `Question_Id` int(5) NOT NULL,
  `Qns` varchar(150) NOT NULL,
  `Mark` int(3) NOT NULL,
  `sn` int(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `squestions`
--

INSERT INTO `squestions` (`Sid`, `Question_Id`, `Qns`, `Mark`, `sn`) VALUES
(7, 1, 'just', 4, 1),
(7, 2, 'kif', 4, 2),
(7, 3, 'n', 12, 3),
(8, 4, 'e', 3, 1),
(8, 5, 'e', 3, 2),
(9, 6, 'Explain Different Control Statements', 15, 1),
(9, 7, 'Write the syntax of if statement', 2, 2),
(9, 8, 'Write a program to demonstrate working of do-while loop', 5, 3),
(10, 9, 'Explain different layers of OSI Model', 15, 1),
(10, 10, 'Explain the TCP/IP Model', 6, 2),
(10, 11, 'Explain Subnetting', 5, 3);

-- --------------------------------------------------------

--
-- Table structure for table `student`
--

CREATE TABLE `student` (
  `Student_Id` int(5) NOT NULL,
  `Name` varchar(30) NOT NULL,
  `Gender` varchar(20) NOT NULL,
  `Age` int(3) NOT NULL,
  `E_Mail` varchar(30) NOT NULL,
  `Date_Of_Birth` date NOT NULL,
  `Institution_Id` int(5) NOT NULL,
  `Course_Id` int(5) NOT NULL,
  `Year_Of_Admission` int(4) NOT NULL,
  `password` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `student`
--

INSERT INTO `student` (`Student_Id`, `Name`, `Gender`, `Age`, `E_Mail`, `Date_Of_Birth`, `Institution_Id`, `Course_Id`, `Year_Of_Admission`, `password`) VALUES
(23, 'Arun', 'Male', 20, 'aruncpacp10@gmail.com', '2002-07-26', 155, 120, 2020, 'arun'),
(24, 'Arun', 'Male', 20, 'abc@gmail.com', '2000-06-25', 155, 120, 2020, 'abc'),
(25, 'John', 'Male', 20, 'john@gmail.com', '2002-02-15', 155, 120, 2020, 'john'),
(26, 'ARUN', 'male', 20, 'arun@gmail.com', '2002-07-26', 155, 134, 2020, 'arun');

-- --------------------------------------------------------

--
-- Table structure for table `subanswers`
--

CREATE TABLE `subanswers` (
  `Sid` int(5) NOT NULL,
  `Question_Id` int(5) NOT NULL,
  `email` varchar(30) NOT NULL,
  `answer` varchar(300) NOT NULL,
  `mark` int(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `subanswers`
--

INSERT INTO `subanswers` (`Sid`, `Question_Id`, `email`, `answer`, `mark`) VALUES
(10, 9, 'arun@gmail.com', 'it', -1),
(10, 10, 'arun@gmail.com', 'ddwd', -1),
(10, 11, 'arun@gmail.com', 'dwdwd', -1),
(10, 9, 'arun@gmail.com', 'w', -1),
(10, 10, 'arun@gmail.com', 'w', -1),
(10, 11, 'arun@gmail.com', 'w', -1),
(10, 9, 'arun@gmail.com', 'this', -1),
(10, 10, 'arun@gmail.com', 'exam', -1),
(10, 11, 'arun@gmail.com', 'is easy', -1),
(10, 9, 'arun@gmail.com', '', -1),
(10, 10, 'arun@gmail.com', 's', -1),
(10, 11, 'arun@gmail.com', 's', -1),
(7, 1, 'arun@gmail.com', 'd', -1),
(7, 2, 'arun@gmail.com', 'd', -1),
(7, 3, 'arun@gmail.com', 'd', -1),
(9, 6, 'arun@gmail.com', 'm,dme', -1),
(9, 7, 'arun@gmail.com', 'mme', -1),
(9, 8, 'arun@gmail.com', 'lekle', -1),
(8, 4, 'arun@gmail.com', '', -1),
(8, 5, 'arun@gmail.com', '', -1);

-- --------------------------------------------------------

--
-- Table structure for table `subjective`
--

CREATE TABLE `subjective` (
  `Exam_Id` int(5) NOT NULL,
  `Sid` int(5) NOT NULL,
  `SubTotalQ` int(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `subjective`
--

INSERT INTO `subjective` (`Exam_Id`, `Sid`, `SubTotalQ`) VALUES
(29, 7, 3),
(30, 8, 2),
(34, 9, 3),
(35, 10, 3);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `User_Id` int(5) NOT NULL,
  `User_Name` varchar(30) NOT NULL,
  `Date_Of_Birth` date NOT NULL,
  `Age` int(3) NOT NULL,
  `Gender` varchar(10) NOT NULL,
  `Address` varchar(50) NOT NULL,
  `E_Mail` varchar(30) NOT NULL,
  `Mobile_No` int(10) NOT NULL,
  `Institution_Id` int(5) NOT NULL,
  `Department_Id` int(5) NOT NULL,
  `User_Type` varchar(20) NOT NULL,
  `Password` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`User_Id`, `User_Name`, `Date_Of_Birth`, `Age`, `Gender`, `Address`, `E_Mail`, `Mobile_No`, `Institution_Id`, `Department_Id`, `User_Type`, `Password`) VALUES
(17, 'Rahul', '1999-10-10', 23, 'male', 'kochi', 'rahul@gmail.com', 124578963, 155, 12, 'admin', 'rahul'),
(18, 'malavika', '2000-12-11', 22, 'female', 'Jonakaparambil aluva', 'malavika@gmail.com', 33, 156, 123, 'admin', 'ede'),
(19, 'ARUN C P', '0001-01-01', 2, 'd', 'Chaneparambil ,mk sanakan smrithi lane road,kannan', 'aruncpacdp10@gmail.com', 2147483647, 155, 123, 'teacher', 'd'),
(20, 'ARUN C P', '0001-01-01', 2, 'a', 'a', 'aruncpassscp10@gmail.com', 2147483647, 155, 12, 'teacher', 's'),
(21, 'ARUN C P', '2002-07-26', 20, 'male', 'kochi', 'aruncpacp1012@gmail.com', 2147483647, 155, 102, 'teacher', 'arun'),
(22, 'ARUN C P', '0001-01-01', 3, 'd', 'd', 'aruncpacp1dddddddddd0@gmail.co', 2147483647, 155, 102, 'teacher', 'd'),
(23, 'Menon', '1998-10-10', 27, 'Male', 'Kochi', 'menon@gmail.com', 123, 155, 102, 'teacher', 'menon'),
(24, 'Divya', '1995-10-10', 26, 'Female', 'Ernakulam', 'divya@gmail.com', 123, 157, 0, 'admin', '123'),
(25, 'swetha', '2000-10-10', 22, 'Female', 'Kochi', 'swetha@gmail.com', 123, 158, 958, 'admin', 'swetha');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `course`
--
ALTER TABLE `course`
  ADD PRIMARY KEY (`Course_Id`),
  ADD KEY `Institution_Id` (`Institution_Id`),
  ADD KEY `Department_Id` (`Department_Id`);

--
-- Indexes for table `department`
--
ALTER TABLE `department`
  ADD PRIMARY KEY (`Department_Id`,`Institution_Id`),
  ADD KEY `Institution_Id` (`Institution_Id`);

--
-- Indexes for table `exam`
--
ALTER TABLE `exam`
  ADD PRIMARY KEY (`Exam_Id`),
  ADD KEY `Institution_Id` (`Institution_Id`),
  ADD KEY `Course_Id` (`Course_Id`);

--
-- Indexes for table `examresult`
--
ALTER TABLE `examresult`
  ADD PRIMARY KEY (`email`,`Exam_Id`);

--
-- Indexes for table `institution`
--
ALTER TABLE `institution`
  ADD PRIMARY KEY (`Institution_Id`);

--
-- Indexes for table `qquestion`
--
ALTER TABLE `qquestion`
  ADD UNIQUE KEY `Question_Id` (`Question_Id`);

--
-- Indexes for table `quiz`
--
ALTER TABLE `quiz`
  ADD PRIMARY KEY (`Quiz_Id`);

--
-- Indexes for table `quizresult`
--
ALTER TABLE `quizresult`
  ADD PRIMARY KEY (`email`,`Exam_Id`);

--
-- Indexes for table `squestions`
--
ALTER TABLE `squestions`
  ADD UNIQUE KEY `Question_Id` (`Question_Id`);

--
-- Indexes for table `student`
--
ALTER TABLE `student`
  ADD PRIMARY KEY (`Student_Id`),
  ADD KEY `Institution_Id` (`Institution_Id`),
  ADD KEY `Course_Id` (`Course_Id`);

--
-- Indexes for table `subjective`
--
ALTER TABLE `subjective`
  ADD UNIQUE KEY `Sid` (`Sid`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`User_Id`),
  ADD KEY `Institution_Id` (`Institution_Id`),
  ADD KEY `Department_Id` (`Department_Id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `exam`
--
ALTER TABLE `exam`
  MODIFY `Exam_Id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;

--
-- AUTO_INCREMENT for table `institution`
--
ALTER TABLE `institution`
  MODIFY `Institution_Id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=159;

--
-- AUTO_INCREMENT for table `qquestion`
--
ALTER TABLE `qquestion`
  MODIFY `Question_Id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `quiz`
--
ALTER TABLE `quiz`
  MODIFY `Quiz_Id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `squestions`
--
ALTER TABLE `squestions`
  MODIFY `Question_Id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `student`
--
ALTER TABLE `student`
  MODIFY `Student_Id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT for table `subjective`
--
ALTER TABLE `subjective`
  MODIFY `Sid` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `User_Id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `course`
--
ALTER TABLE `course`
  ADD CONSTRAINT `course_ibfk_1` FOREIGN KEY (`Department_Id`) REFERENCES `department` (`Department_Id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `course_ibfk_2` FOREIGN KEY (`Institution_Id`) REFERENCES `institution` (`Institution_Id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `department`
--
ALTER TABLE `department`
  ADD CONSTRAINT `department_ibfk_1` FOREIGN KEY (`Institution_Id`) REFERENCES `institution` (`Institution_Id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `exam`
--
ALTER TABLE `exam`
  ADD CONSTRAINT `exam_ibfk_1` FOREIGN KEY (`Institution_Id`) REFERENCES `institution` (`Institution_Id`),
  ADD CONSTRAINT `exam_ibfk_2` FOREIGN KEY (`Course_Id`) REFERENCES `course` (`Course_Id`);

--
-- Constraints for table `student`
--
ALTER TABLE `student`
  ADD CONSTRAINT `student_ibfk_1` FOREIGN KEY (`Institution_Id`) REFERENCES `institution` (`Institution_Id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `student_ibfk_2` FOREIGN KEY (`Course_Id`) REFERENCES `course` (`Course_Id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `user`
--
ALTER TABLE `user`
  ADD CONSTRAINT `user_ibfk_1` FOREIGN KEY (`Institution_Id`) REFERENCES `institution` (`Institution_Id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `user_ibfk_2` FOREIGN KEY (`Department_Id`) REFERENCES `department` (`Department_Id`) ON DELETE NO ACTION ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;


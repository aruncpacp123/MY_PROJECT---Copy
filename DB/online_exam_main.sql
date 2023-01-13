-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 03, 2023 at 02:11 AM
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
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `Admin_Id` int(8) NOT NULL,
  `Admin_Name` varchar(30) NOT NULL,
  `E_Mail` varchar(30) NOT NULL,
  `Password` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`Admin_Id`, `Admin_Name`, `E_Mail`, `Password`) VALUES
(1, 'ARUN C P', 'aruncpacp10@gmail.com', 'admin@aruncp');

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
(201, 'BCA', 159, 101, 6),
(202, 'MSc Computer Science', 159, 101, 4),
(203, 'BA English', 159, 102, 6),
(204, 'MA English', 159, 102, 4),
(205, 'BBA', 159, 104, 6),
(206, 'MBA', 159, 104, 4),
(207, 'BSc Electronics', 159, 103, 6),
(208, 'MSc Electronics', 159, 103, 4),
(219, 'Integrated Chemistry', 159, 119, 10),
(220, 'Bsc Chemistry', 159, 119, 6),
(221, 'MCA', 159, 101, 4);

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
(100, 'Office', 159),
(101, 'Computer Applications', 159),
(102, 'English', 159),
(103, 'Electronics', 159),
(104, 'Business Administration', 159),
(119, 'Chemistry', 159);

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
(41, 'Linux', 'Command', 159, 1, 202, 28, 10, '2022-12-16', '639b3850b7d85'),
(50, 'test', 'd', 159, 1, 202, 33, 10, '2020-10-10', '639dea15d019d'),
(53, 'Software Engineering', 'Nothing Easy', 159, 1, 201, 28, 30, '2022-12-25', '63a7056712281');

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
('george@gmail.com', 53, 4, 16),
('sahal@gmail.com', 41, 6, -1);

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
(159, 'CUSAT', 'Kalamassery', 484983462, 'cusatkalamassery@org.in');

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
(14, 36, 'Linux Command to Show present working directory', 1, 'pwd', 'ls', 'who', 'ps', 1),
(14, 37, 'Linux command to rename a file', 2, 'cp', 'mv', 'rm', 'rmdir', 2),
(16, 43, 'Which Among the following is not a software development life cycle', 1, 'Waterfall Model', 'RAD Model', 'cumalative model', 'Iterative enhancement model', 3),
(16, 44, 'Waterfall model has ___________________ steps', 2, '6', '2', '5', '7', 4);

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
(41, 14, 3, 2),
(53, 16, 2, 2);

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
('george@gmail.com', 53, 2, 0, 4),
('sahal@gmail.com', 41, 2, 0, 6);

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
(23, 26, 'd1', 1, 1),
(26, 29, 'Explain SDLC', 5, 1),
(26, 30, 'Explain RAD Model', 15, 2),
(26, 31, 'explain software product and software process', 5, 3);

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
(30, 'Rohit', 'male', 20, 'rohit@gmail.com', '2002-10-10', 159, 201, 2020, 'rohit'),
(31, 'George', 'Male', 20, 'george@gmail.com', '2003-10-17', 159, 201, 2020, 'george'),
(32, 'Sahal', 'male', 22, 'sahal@gmail.com', '2000-10-10', 159, 202, 2019, 'sahal'),
(33, 'mahindran', 'male', 21, 'mahindran@gmail.com', '2001-11-20', 159, 207, 2020, 'mahindran'),
(34, 'Abhishek', 'male', 22, 'abhishek@gmail.com', '2000-10-10', 159, 202, 2018, 'abhishek'),
(35, 'jithin', 'male', 19, 'jithin@gmail.com', '2003-12-10', 159, 208, 2021, 'jithin'),
(36, 'Athulya', 'Female', 18, 'athulya@gmail.com', '2004-12-11', 159, 207, 2022, 'athulya'),
(37, 'Devika', 'Female', 20, 'devika@gmail.com', '2002-12-12', 159, 208, 2020, 'devika'),
(38, 'Lakshmi', 'Female', 18, 'lakshmi@gmail.com', '2004-07-25', 159, 205, 2022, 'lakshmi'),
(39, 'mohan', 'male', 22, 'mohan@gmail.com', '2000-10-10', 159, 206, 2022, 'mohan'),
(40, 'sarath', 'male', 202, 'sarath@gmail.com', '2000-10-10', 159, 206, 2020, 'sarath'),
(41, 'Anand', 'Male', 20, 'anand@gmail.com', '2000-10-10', 159, 205, 2020, 'anand'),
(42, 'Swetha', 'Female', 18, 'swetha@gmail.com', '2004-07-10', 159, 203, 2004, 'swetha'),
(43, 'Dion', 'Male', 21, 'dion@gmail.com', '2001-02-11', 159, 203, 2020, 'dion'),
(44, 'pooja', 'female', 22, 'pooja@gmail.com', '2000-10-10', 159, 204, 2020, 'pooja'),
(45, 'clinton', 'male', 23, 'clinton@gmail.com', '1999-10-10', 159, 204, 2018, 'clinton'),
(47, 'akshay', 'Male', 19, 'akshai@gmail.com', '2003-10-07', 159, 201, 2021, 'akshay');

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
(26, 29, 'george@gmail.com', 'Software Development Life Cycle Model', 3),
(26, 30, 'george@gmail.com', 'Not Known\r\n', 10),
(26, 31, 'george@gmail.com', 'Write it', 3);

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
(50, 23, 1),
(53, 26, 3);

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
(26, 'Arun C P', '2002-07-26', 20, 'Male', 'chaneparambil,kochi', 'cusat@arun.com', 2147483647, 159, 100, 'admin', 'arun'),
(28, 'Divya', '1997-09-20', 26, 'Female', 'kochi\r\n', 'divya@gmail.com', 2147483647, 159, 101, 'teacher', 'divya'),
(29, 'john', '2000-10-10', 20, 'male', 'kottayam', 'john10@gmail.com', 124578963, 159, 102, 'teacher', 'john'),
(31, 'rohan', '2000-10-10', 22, 'male', 'kottayam', 'rohan@gmail.com', 123654, 159, 104, 'teacher', 'rohan'),
(32, 'Ram', '1994-10-10', 28, 'male', 'kochi', 'ram@gmail.com', 2147483647, 159, 103, 'teacher', 'ram'),
(33, 'Ajith', '1988-01-11', 34, 'male', 'kochi', 'ajith@gmail.com', 2147483647, 159, 101, 'teacher', 'ajith'),
(34, 'sherly', '1984-10-11', 38, 'female', 'idukki', 'sherly@gmail.com', 9852641, 159, 103, 'teacher', 'sherly'),
(35, 'smitha', '1982-12-10', 40, 'female', 'kollam', 'smitha@gmail.com', 951647212, 159, 102, 'teacher', 'smitha'),
(36, 'Navya', '1995-10-10', 27, 'female', 'kozhikode', 'navya@gmail.com', 56879421, 159, 104, 'teacher', 'navya');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`Admin_Id`);

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
  ADD PRIMARY KEY (`Department_Id`),
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
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `Admin_Id` int(8) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `course`
--
ALTER TABLE `course`
  MODIFY `Course_Id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=222;

--
-- AUTO_INCREMENT for table `department`
--
ALTER TABLE `department`
  MODIFY `Department_Id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=120;

--
-- AUTO_INCREMENT for table `exam`
--
ALTER TABLE `exam`
  MODIFY `Exam_Id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=54;

--
-- AUTO_INCREMENT for table `institution`
--
ALTER TABLE `institution`
  MODIFY `Institution_Id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=166;

--
-- AUTO_INCREMENT for table `qquestion`
--
ALTER TABLE `qquestion`
  MODIFY `Question_Id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=45;

--
-- AUTO_INCREMENT for table `quiz`
--
ALTER TABLE `quiz`
  MODIFY `Quiz_Id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `squestions`
--
ALTER TABLE `squestions`
  MODIFY `Question_Id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT for table `student`
--
ALTER TABLE `student`
  MODIFY `Student_Id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=48;

--
-- AUTO_INCREMENT for table `subjective`
--
ALTER TABLE `subjective`
  MODIFY `Sid` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `User_Id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;

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

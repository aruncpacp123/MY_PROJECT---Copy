-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 14, 2022 at 06:11 PM
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
-- Database: `online_exam`
--

-- --------------------------------------------------------

--
-- Table structure for table `correct_answer`
--

CREATE TABLE `correct_answer` (
  `Exam_Id` int(5) NOT NULL,
  `Question_Id` int(5) NOT NULL,
  `Student_Id` int(5) NOT NULL,
  `Mark_Scored` int(3) NOT NULL,
  `Question_Type` int(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

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
(120, 'bca', 112, 115, 2);

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
(115, 'bca', 112);

-- --------------------------------------------------------

--
-- Table structure for table `exam`
--

CREATE TABLE `exam` (
  `Exam_Id` int(5) NOT NULL,
  `Exam_Name` varchar(25) NOT NULL,
  `Description` varchar(50) NOT NULL,
  `Institution_Id` int(5) NOT NULL,
  `Type_Of_Exam` varchar(15) NOT NULL,
  `Course_Id` int(5) NOT NULL,
  `Teacher_Id` int(5) NOT NULL,
  `Date_Of_Exam` date NOT NULL,
  `Duration` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

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
(112, 'mes', 'Aluva', 123, 'aaa'),
(113, 'adi shankara', '', 123456, 'adi@gmail.com'),
(114, 'adi shankara', '', 123456, 'adi@gmail.com'),
(115, 'adi shankara', '', 123456, 'adi@gmail.com'),
(116, 'adi shankara', '', 123456, 'adi@gmail.com'),
(117, 'adi shankara', '', 123456, 'adi@gmail.com'),
(118, 'adi shankara', '', 123456, 'adi@gmail.com'),
(119, 'm', 'h', 1, 'h@gmail.com'),
(120, 'm', 'h', 1, 'h@gmail.com');

-- --------------------------------------------------------

--
-- Table structure for table `quiz`
--

CREATE TABLE `quiz` (
  `Quiz_Id` int(5) NOT NULL,
  `Exam_Id` int(5) NOT NULL,
  `Question_Id` int(5) NOT NULL,
  `Question` varchar(100) NOT NULL,
  `Option1` varchar(50) NOT NULL,
  `Option2` varchar(50) NOT NULL,
  `Option3` varchar(50) NOT NULL,
  `Option4` varchar(50) NOT NULL,
  `Answer` int(2) NOT NULL,
  `Mark` int(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `result`
--

CREATE TABLE `result` (
  `Exam_Id` int(5) NOT NULL,
  `Student_Id` int(5) NOT NULL,
  `Quiz_Total` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

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
(5, 'Arun', 'Male', 20, 'aruncpacp10@gmail.com', '2002-07-26', 112, 120, 2020, 'aruncp'),
(6, 'Arun', 'Male', 20, 'aruncpacp10@gmail.com', '2002-07-26', 112, 120, 2020, 'aruncp'),
(7, 'Arun', 'Male', 20, 'aruncpacp10@gmail.com', '2020-02-20', 112, 120, 2020, 'a'),
(8, 'Lakshmi', 'female', 18, 'lakshmi22@gmail.com', '2004-07-16', 112, 120, 2022, 'lakshmi'),
(15, 'Lakshmi', 'female', 18, 'lakshmi223@gmail.com', '2004-07-16', 112, 120, 2022, 'l'),
(16, 'Lakshmi', 'female', 18, 'lakshmi2212@gmail.com', '2004-07-16', 112, 120, 2022, 'l'),
(17, 'Lakshmi', 'female', 20, 'john@gmail.com', '2005-04-26', 112, 120, 2222, 'john'),
(18, 'Lakshmi', 'female', 20, 'john1@gmail.com', '2005-04-26', 112, 120, 2222, 'john'),
(19, 'Lakshmi', 'female', 20, 'john12@gmail.com', '2005-04-26', 112, 120, 2222, 'john'),
(20, 'Lakshmi', 'female', 20, 'john122@gmail.com', '2005-04-26', 112, 120, 2222, 'john'),
(21, 'John', 'Male', 18, 'jony@gmail.com', '0001-01-01', 112, 120, 2020, 'jony'),
(22, 'Arun', 'dd', 2, 'jo@gmail.com', '0001-01-01', 112, 120, 3, 'jo');

-- --------------------------------------------------------

--
-- Table structure for table `student_enroll`
--

CREATE TABLE `student_enroll` (
  `Exam_Id` int(5) NOT NULL,
  `Student_Id` int(5) NOT NULL,
  `Institution_Id` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `subjective`
--

CREATE TABLE `subjective` (
  `Subjective_Id` int(5) NOT NULL,
  `Exam_Id` int(5) NOT NULL,
  `Question_Id` int(5) NOT NULL,
  `Question` varchar(100) NOT NULL,
  `Key_Points` varchar(100) NOT NULL,
  `Mark` int(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

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
(1, 'ARUN C P', '0001-01-01', 2, 'm', 'Chaneparambil ,mk sanakan smrithi lane road,kannan', 'aruncpacp10@gmail.com', 2147483647, 112, 115, 'teacher', 'a'),
(2, 'ARUN C P', '0001-01-01', 2, 'm', 'Chaneparambil ,mk sanakan smrithi lane road,kannan', 'aruncpacp1110@gmail.com', 2147483647, 112, 115, 'teacher', 'a'),
(3, 'ARUN C P', '0001-01-01', 1, 'x', 'Chaneparambil ,mk sanakan smrithi lane road,kannan', 'aruncpacp1510@gmail.com', 2147483647, 112, 115, 'teacher', '11');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `correct_answer`
--
ALTER TABLE `correct_answer`
  ADD KEY `Exam_Id` (`Exam_Id`),
  ADD KEY `Question_Id` (`Question_Id`),
  ADD KEY `Student_Id` (`Student_Id`);

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
  ADD KEY `Course_Id` (`Course_Id`),
  ADD KEY `Teacher_Id` (`Teacher_Id`);

--
-- Indexes for table `institution`
--
ALTER TABLE `institution`
  ADD PRIMARY KEY (`Institution_Id`);

--
-- Indexes for table `quiz`
--
ALTER TABLE `quiz`
  ADD PRIMARY KEY (`Quiz_Id`),
  ADD KEY `Exam_Id` (`Exam_Id`);

--
-- Indexes for table `result`
--
ALTER TABLE `result`
  ADD KEY `Exam_Id` (`Exam_Id`),
  ADD KEY `Student_Id` (`Student_Id`);

--
-- Indexes for table `student`
--
ALTER TABLE `student`
  ADD PRIMARY KEY (`Student_Id`),
  ADD KEY `Institution_Id` (`Institution_Id`),
  ADD KEY `Course_Id` (`Course_Id`);

--
-- Indexes for table `student_enroll`
--
ALTER TABLE `student_enroll`
  ADD KEY `Exam_Id` (`Exam_Id`),
  ADD KEY `Student_Id` (`Student_Id`),
  ADD KEY `Institution_Id` (`Institution_Id`);

--
-- Indexes for table `subjective`
--
ALTER TABLE `subjective`
  ADD PRIMARY KEY (`Subjective_Id`),
  ADD KEY `Exam_Id` (`Exam_Id`);

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
-- AUTO_INCREMENT for table `department`
--
ALTER TABLE `department`
  MODIFY `Department_Id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=116;

--
-- AUTO_INCREMENT for table `exam`
--
ALTER TABLE `exam`
  MODIFY `Exam_Id` int(5) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `institution`
--
ALTER TABLE `institution`
  MODIFY `Institution_Id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=121;

--
-- AUTO_INCREMENT for table `quiz`
--
ALTER TABLE `quiz`
  MODIFY `Quiz_Id` int(5) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `student`
--
ALTER TABLE `student`
  MODIFY `Student_Id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `subjective`
--
ALTER TABLE `subjective`
  MODIFY `Subjective_Id` int(5) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `User_Id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `correct_answer`
--
ALTER TABLE `correct_answer`
  ADD CONSTRAINT `correct_answer_ibfk_1` FOREIGN KEY (`Exam_Id`) REFERENCES `exam` (`Exam_Id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `correct_answer_ibfk_2` FOREIGN KEY (`Student_Id`) REFERENCES `student` (`Student_Id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

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
  ADD CONSTRAINT `exam_ibfk_1` FOREIGN KEY (`Course_Id`) REFERENCES `course` (`Course_Id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `exam_ibfk_2` FOREIGN KEY (`Institution_Id`) REFERENCES `institution` (`Institution_Id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `exam_ibfk_3` FOREIGN KEY (`Teacher_Id`) REFERENCES `user` (`User_Id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `quiz`
--
ALTER TABLE `quiz`
  ADD CONSTRAINT `quiz_ibfk_1` FOREIGN KEY (`Exam_Id`) REFERENCES `exam` (`Exam_Id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `result`
--
ALTER TABLE `result`
  ADD CONSTRAINT `result_ibfk_1` FOREIGN KEY (`Exam_Id`) REFERENCES `exam` (`Exam_Id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `result_ibfk_2` FOREIGN KEY (`Student_Id`) REFERENCES `student` (`Student_Id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `student`
--
ALTER TABLE `student`
  ADD CONSTRAINT `student_ibfk_1` FOREIGN KEY (`Institution_Id`) REFERENCES `institution` (`Institution_Id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `student_ibfk_2` FOREIGN KEY (`Course_Id`) REFERENCES `course` (`Course_Id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `student_enroll`
--
ALTER TABLE `student_enroll`
  ADD CONSTRAINT `student_enroll_ibfk_1` FOREIGN KEY (`Exam_Id`) REFERENCES `exam` (`Exam_Id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `student_enroll_ibfk_2` FOREIGN KEY (`Institution_Id`) REFERENCES `institution` (`Institution_Id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `student_enroll_ibfk_3` FOREIGN KEY (`Student_Id`) REFERENCES `student` (`Student_Id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `subjective`
--
ALTER TABLE `subjective`
  ADD CONSTRAINT `subjective_ibfk_1` FOREIGN KEY (`Exam_Id`) REFERENCES `exam` (`Exam_Id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

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

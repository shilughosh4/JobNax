-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 06, 2024 at 07:15 AM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.0.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `jobnax`
--

-- --------------------------------------------------------

--
-- Table structure for table `add_job`
--

CREATE TABLE `add_job` (
  `Id` int(20) NOT NULL,
  `Emp_id` int(20) NOT NULL,
  `Name` varchar(50) NOT NULL,
  `Email` varchar(100) NOT NULL,
  `Company` varchar(50) NOT NULL,
  `Category` varchar(50) NOT NULL,
  `Occupation` varchar(50) NOT NULL,
  `Required_Employees` int(20) NOT NULL,
  `Salary` varchar(255) NOT NULL,
  `Employment_type` varchar(50) NOT NULL,
  `Qualification` varchar(255) NOT NULL,
  `Gender` varchar(50) NOT NULL,
  `Website` varchar(100) NOT NULL,
  `Job_Description` varchar(255) NOT NULL,
  `Skills` varchar(255) NOT NULL,
  `Location` varchar(100) NOT NULL,
  `Experience` varchar(50) NOT NULL,
  `Posted_On` date NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `add_job`
--

INSERT INTO `add_job` (`Id`, `Emp_id`, `Name`, `Email`, `Company`, `Category`, `Occupation`, `Required_Employees`, `Salary`, `Employment_type`, `Qualification`, `Gender`, `Website`, `Job_Description`, `Skills`, `Location`, `Experience`, `Posted_On`) VALUES
(2, 3, 'Vivek Singh', 'vivek@gmail.com', 'EmendoAI', 'Software Development', 'React JS Developer', 5, '3,00,000 - 4,00,000 ', 'Full-Time', 'Bachelor\'s degree in computer science, information technology, or a similar field.', 'Both Male and Female', 'https://internshala.com/company/emendoai-1699381721/', 'We are looking for a skilled react.js developer to join our front-end development team. In this role, you will be responsible for developing and implementing user interface components using React.js concepts and workflows such as Redux, Flux, and Webpack.', 'Typescript, NextjsReact, next.js, ReduxReactJS, Javascript, React.Js, Html/Css', 'Hyderabad', '2 year', '2024-05-12'),
(4, 2, 'Silpa Ghosh', 'akanshamoitra12@gmail.com', 'Tranistics Data Technologies Private Limited', 'Audit Associate', 'Travel Sales Consultant', 2, '₹ 2,00,000', 'Part-Time', '1. B.com/B.tech preferred\r\n2. Only male candidates\r\n3. Night shift for one week in a month', 'Both Male and Female', 'https://www.tranistics.com/', 'Tranistics is an end-to-end transportation and logistics business support service provider (BSS), offering companies in the transportation industry a variety of solutions to streamline and enhance their processes while saving money at the same time.\r\nTran', 'Effective Communication, MS-Excel, MS-Office, MS-Word', 'Kolkata', '3 year', '2024-05-30'),
(5, 2, 'Silpa Ghosh', 'akanshamoitra12@gmail.com', 'Tranistics Data Technologies Private Limited', 'Audit Associate', 'Travel Sales Consultant', 2, '₹ 2,00,000', 'Full-Time', '1. B.com/B.tech preferred2. Only male candidates3. Night shift for one week in a month', 'Both Male and Female', 'https://eszett-clothing.com/', 'Tranistics is an end-to-end transportation and logistics business support service provider (BSS), offering companies in the transportation industry a variety of solutions to streamline and enhance their processes while saving money at the same time.Tran,', 'Adobe Creative Suite Adobe, Illustrator Adobe, Photoshop', 'Kolkata', '3 year', '2024-05-30'),
(6, 2, 'Silpa Ghosh', 'akanshamoitra12@gmail.com', 'Wipro', 'Software', 'Web Developer', 5, '₹ 3,00,000 - 4,20,000', 'Part-Time', 'BCA, MCA, B-tech(in CSE/IT/ECE)', 'Both Male and Female', 'www.wipro.com', 'A job description template is a reusable model that can be tailored to detail the specific requirements, responsibilities, job duties, and skills required to perform a role. It typically includes a list of common daily tasks, equipment or tools used, who ', 'React,Node,CSS,AAjax', 'Kolkata', '2 year', '2024-06-03');

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `Id` int(20) NOT NULL,
  `Name` varchar(50) NOT NULL,
  `Email` varchar(50) NOT NULL,
  `Password` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`Id`, `Name`, `Email`, `Password`) VALUES
(1, 'Admin', 'admin@gmail.com', '12356');

-- --------------------------------------------------------

--
-- Table structure for table `apply_job_post`
--

CREATE TABLE `apply_job_post` (
  `Job_id` int(20) NOT NULL,
  `Emp_id` int(20) NOT NULL,
  `Candidate_id` int(20) NOT NULL,
  `Applied` date NOT NULL DEFAULT current_timestamp(),
  `Status` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `apply_job_post`
--

INSERT INTO `apply_job_post` (`Job_id`, `Emp_id`, `Candidate_id`, `Applied`, `Status`) VALUES
(1, 3, 4, '2024-05-26', 'Applied'),
(2, 3, 7, '2024-05-27', 'Rejected'),
(4, 2, 7, '2024-05-30', 'Rejected'),
(6, 2, 7, '2024-06-03', 'Applied'),
(7, 4, 9, '2024-06-04', 'Accepted');

-- --------------------------------------------------------

--
-- Table structure for table `candidate_details`
--

CREATE TABLE `candidate_details` (
  `Id` int(20) NOT NULL,
  `Can_id` int(20) NOT NULL,
  `Can_Name` varchar(100) NOT NULL,
  `Can_Email` varchar(255) NOT NULL,
  `Phone` varchar(10) NOT NULL,
  `City` varchar(50) NOT NULL,
  `Can_Gender` varchar(50) NOT NULL,
  `Type` varchar(50) NOT NULL,
  `Father_name` varchar(50) NOT NULL,
  `Mother_name` varchar(50) NOT NULL,
  `DOB` varchar(20) NOT NULL,
  `Blood_Group` varchar(10) NOT NULL,
  `Address` varchar(100) NOT NULL,
  `State` varchar(50) NOT NULL,
  `Pincode` varchar(10) NOT NULL,
  `About_Myself` varchar(600) NOT NULL,
  `Candidate_photo` varchar(300) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `candidate_details`
--

INSERT INTO `candidate_details` (`Id`, `Can_id`, `Can_Name`, `Can_Email`, `Phone`, `City`, `Can_Gender`, `Type`, `Father_name`, `Mother_name`, `DOB`, `Blood_Group`, `Address`, `State`, `Pincode`, `About_Myself`, `Candidate_photo`) VALUES
(1, 4, 'Saira Khan', 'akanshamoitra12@gmail.com', '9733225722', 'Durgapur', 'Female', 'Fresher', 'Prabhat Kumar Moitra', 'Daliya Moitra', '2001-12-07', 'AB+', '6/5 Edison Road, B-zone', 'West Bengal', '713205', 'I am fresher and I want to explore.', 'IMG-6642567704adc4.06750752.jpeg'),
(2, 7, 'Alex Tony', 'akanshamoitra@gmail.com', '', 'Kolkata', 'Male', 'Working Professional', 'John Tony', 'Sara Tony', '1995-10-11', 'A+', '9/12 Lal Bazaar Street', 'West Bengal', '459875', 'I am a working professional with experience in HTML,CSS,JAVA.', 'IMG-66544b17d60808.46633189.jpeg'),
(3, 9, 'Nandini Das Adhikari', 'sonu200023b@gmail.com', '', 'Durgapur', 'Female', 'Fresher', 'Ram Das Adhikari', 'Sita Das Adhikari', '2001-12-23', 'B+', 'Durgapur', 'West Bengal', '721321', 'I am a fresher .  I have creating thinking.', 'IMG-665ea8dae23418.66813017.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `candidate_education`
--

CREATE TABLE `candidate_education` (
  `Id` int(20) NOT NULL,
  `Candidate_id` int(11) NOT NULL,
  `Email` varchar(100) NOT NULL,
  `First_Education_type` varchar(100) NOT NULL,
  `First_Clg_name` varchar(100) NOT NULL,
  `First_year_of_passing` varchar(50) NOT NULL,
  `First_stream` varchar(50) NOT NULL,
  `First_percentage` varchar(20) NOT NULL,
  `First_CGPA` varchar(20) NOT NULL,
  `Second_Education_type` varchar(20) NOT NULL,
  `Second_Clg_name` varchar(100) NOT NULL,
  `Second_year_of_passing` varchar(20) NOT NULL,
  `Second_stream` varchar(50) NOT NULL,
  `Second_percentage` varchar(20) NOT NULL,
  `Second_CGPA` varchar(20) NOT NULL,
  `Third_Education_type` varchar(20) NOT NULL,
  `Third_Clg_name` varchar(100) NOT NULL,
  `Third_year_of_passing` varchar(20) NOT NULL,
  `Third_stream` varchar(50) NOT NULL,
  `Third_percentage` varchar(20) NOT NULL,
  `Thirde_CGPA` varchar(20) NOT NULL,
  `Four_Education_type` varchar(20) NOT NULL,
  `Four_Clg_name` varchar(100) NOT NULL,
  `Four_year_of_passing` varchar(20) NOT NULL,
  `Four_stream` varchar(50) NOT NULL,
  `Four_percentage` varchar(20) NOT NULL,
  `Four_CGPA` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `candidate_education`
--

INSERT INTO `candidate_education` (`Id`, `Candidate_id`, `Email`, `First_Education_type`, `First_Clg_name`, `First_year_of_passing`, `First_stream`, `First_percentage`, `First_CGPA`, `Second_Education_type`, `Second_Clg_name`, `Second_year_of_passing`, `Second_stream`, `Second_percentage`, `Second_CGPA`, `Third_Education_type`, `Third_Clg_name`, `Third_year_of_passing`, `Third_stream`, `Third_percentage`, `Thirde_CGPA`, `Four_Education_type`, `Four_Clg_name`, `Four_year_of_passing`, `Four_stream`, `Four_percentage`, `Four_CGPA`) VALUES
(1, 4, 'akanshamoitra12@gmail.com', 'Class X', 'Amrita Vidyalayam', '2017-06-05', 'General', '58.9%', '6.2', 'Class XII', 'Bidhan Chandra Institution for Girls', '2019-05-27', 'Science', '54.6%', '', 'Graduation', 'Dr. B. C. Roy Engineering College', '2022-06-20', 'Computer Applications', '80%', '8.82', 'Post-Graduation', 'Haldia Institute Of Technology', '2024-07-01', 'Computer Applications', '76.4%', '7.22'),
(2, 7, 'akanshamoitra@gmail.com', 'Class X', 'Purv International School', '2024-05-05', 'General', '50', '4.5', 'Class XII', 'Dav Public School', '2024-05-25', 'Arts', '87', '9.2', 'Graduation', 'Government College', '2024-05-26', 'History(hons)', '87', '', 'Select', '', '', '', '', ''),
(3, 9, 'sonu200023b@gmail.com', 'Graduation', 'Global Institute of Science &amp; Technology', '2024-06-14', 'BCA', '96', '9.6', 'Class XII', 'Dav Public School', '2024-06-09', 'Arts', '63', '9.2', 'Select', '', '', '', '', '', 'Select', '', '', '', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `candidate_experience`
--

CREATE TABLE `candidate_experience` (
  `ID` int(20) NOT NULL,
  `Can_id` int(20) NOT NULL,
  `Name` varchar(100) NOT NULL,
  `Email` varchar(100) NOT NULL,
  `Employment_Name` varchar(100) NOT NULL,
  `Employment_type` varchar(100) NOT NULL,
  `Company_name` varchar(100) NOT NULL,
  `Start_Date` varchar(50) NOT NULL,
  `End_Date` varchar(50) NOT NULL,
  `CTC` varchar(100) NOT NULL,
  `Can_Skills` varchar(255) NOT NULL,
  `Resume` varchar(600) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `candidate_experience`
--

INSERT INTO `candidate_experience` (`ID`, `Can_id`, `Name`, `Email`, `Employment_Name`, `Employment_type`, `Company_name`, `Start_Date`, `End_Date`, `CTC`, `Can_Skills`, `Resume`) VALUES
(2, 4, 'Saira Khan', 'akanshamoitra12@gmail.com', 'Web Development', 'Full-time', 'Mendine', '2023-11-16', '2024-03-18', '15000', 'ASP.NET, ASP.NET MVC', 'admit.pdf'),
(3, 7, 'Alex Tony', 'akanshamoitra@gmail.com', 'Marketing', 'Part-time', 'Internshala', '2024-05-12', '2024-05-12', '12000', 'HTML,CSS,Ajax', 'DataTables example - Bootstrap 5.pdf'),
(4, 9, 'Nandini Das Adhikari', 'sonu200023b@gmail.com', 'Nandini Das Adhikari', 'Part-time', 'Internshala', '2024-05-27', '2024-06-01', '15256', 'HTML,CSS ,php', '');

-- --------------------------------------------------------

--
-- Table structure for table `deleted_users`
--

CREATE TABLE `deleted_users` (
  `Id` int(20) NOT NULL,
  `Name` varchar(50) NOT NULL,
  `Email` varchar(50) NOT NULL,
  `Feedback` varchar(255) NOT NULL,
  `User_type` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `deleted_users`
--

INSERT INTO `deleted_users` (`Id`, `Name`, `Email`, `Feedback`, `User_type`) VALUES
(3, 'Soumyadipa Pathak', 'hello@gmail.com', 'Not willing to disclose', 'Employee'),
(4, 'Soumyadipa Pathak', 'hello@gmail.com', 'Not willing to continue.', 'Employee');

-- --------------------------------------------------------

--
-- Table structure for table `employee_details`
--

CREATE TABLE `employee_details` (
  `Id` int(20) NOT NULL,
  `Emp_id` int(20) NOT NULL,
  `Name` varchar(50) NOT NULL,
  `Email` varchar(50) NOT NULL,
  `Phone` varchar(20) NOT NULL,
  `City` varchar(50) NOT NULL,
  `Gender` varchar(20) NOT NULL,
  `Designation` varchar(50) NOT NULL,
  `Company_name` varchar(100) NOT NULL,
  `Company_location` varchar(100) NOT NULL,
  `DOB` varchar(20) NOT NULL,
  `Blood_Group` varchar(20) NOT NULL,
  `Address` varchar(255) NOT NULL,
  `State` varchar(50) NOT NULL,
  `Pincode` varchar(20) NOT NULL,
  `Employee_photo` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `employee_details`
--

INSERT INTO `employee_details` (`Id`, `Emp_id`, `Name`, `Email`, `Phone`, `City`, `Gender`, `Designation`, `Company_name`, `Company_location`, `DOB`, `Blood_Group`, `Address`, `State`, `Pincode`, `Employee_photo`) VALUES
(1, 3, 'Vivek Singh', 'akanshamoitra20@gmail.com', ' 5478963524', 'Kolkata', 'Male', 'Marketing Manager', 'Internshala', 'Mumbai', '2024-05-25', 'AB ', '9/12 William Road', 'West Bengal', '713205', 'IMG-6654cfd8ac50e6.47706874.jpeg'),
(2, 2, 'Silpa Ghosh', 'akanshamoitra12@gmail.com', '5478963524', 'Kolkata', 'Female', 'HR', 'Internshala', 'Mumbai', '2024-05-17', 'B+', '9/12 William Road', 'West Bengal', '459875', 'IMG-665884ff17eb45.65730743.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `employee_register`
--

CREATE TABLE `employee_register` (
  `Id` int(20) NOT NULL,
  `Name` varchar(255) NOT NULL,
  `Email` varchar(50) NOT NULL,
  `Password` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `status` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `employee_register`
--

INSERT INTO `employee_register` (`Id`, `Name`, `Email`, `Password`, `token`, `status`) VALUES
(2, 'Silpa Ghosh', 'akanshamoitra12@gmail.com', '$2y$04$/ymyoTtIyoNDBslCeLKwfuxG0ZChD4MUaR9bbQVe1.Vz8tNS4oZLe', '9f7eee7faf5436f36c9c10cf3239ff', 'active'),
(3, 'Vivek Singh', 'vivek@gmail.com', '$2y$04$Qmn/hhF2EQorlpsmqVjzQO2FMVfyu3NyV4m9iNkjWu7SmI5BBRv/u', 'a4cb3f144d42367501c725b8837d63', 'active'),
(4, 'Soumyadipa Pathak', 'hello@gmail.com', '$2y$10$SqmuCf5r6OMJDMjE2D6p6O.T6Ww8osOM5OyLGP3IArkkVA144itsK', 'a9f08b6656768ce4af2d0850cefdc9', 'active');

-- --------------------------------------------------------

--
-- Table structure for table `jobseeker_register`
--

CREATE TABLE `jobseeker_register` (
  `Id` int(20) NOT NULL,
  `Name` varchar(255) NOT NULL,
  `Email` varchar(50) NOT NULL,
  `Password` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `status` varchar(255) NOT NULL,
  `Registered_On` date NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `jobseeker_register`
--

INSERT INTO `jobseeker_register` (`Id`, `Name`, `Email`, `Password`, `token`, `status`, `Registered_On`) VALUES
(4, 'Saira Khan', 'akanshamoitra12@gmail.com', '$2y$10$wFu44uycZMjc5kmuewFste./CLupylkVgx0jCx0WMlLfETZMa/2M2', '83c116237f1313840dfa2fbd8523fa', 'active', '2024-05-15'),
(7, 'Alex Tony', 'akanshamoitra@gmail.com', '$2y$10$n87Q5tZorq6jGeOP9YsJhOEDS0IVt8JCFnTMbPTDKktrvARRtifGW', 'cc4d572d9db2dc31893c54ac9b8c72', 'active', '2024-05-27'),
(9, 'Nandini Das Adhikari', 'sonu200023b@gmail.com', '$2y$10$Ai/leOtN6sdsJJTYSByuPuDG1DzTO1I/y2QQ8Gyj52e39Tqslbh4C', '4fd5da45b1f632b1a447623997df4a', 'active', '2024-06-04');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `add_job`
--
ALTER TABLE `add_job`
  ADD PRIMARY KEY (`Id`),
  ADD KEY `Emp_id` (`Emp_id`);

--
-- Indexes for table `apply_job_post`
--
ALTER TABLE `apply_job_post`
  ADD KEY `Candidate_id` (`Job_id`,`Emp_id`,`Candidate_id`),
  ADD KEY `apply_job_post_ibfk_1` (`Emp_id`),
  ADD KEY `Candidate_id_2` (`Candidate_id`);

--
-- Indexes for table `candidate_details`
--
ALTER TABLE `candidate_details`
  ADD PRIMARY KEY (`Id`),
  ADD KEY `Can_id` (`Can_id`);

--
-- Indexes for table `candidate_education`
--
ALTER TABLE `candidate_education`
  ADD PRIMARY KEY (`Id`) USING BTREE,
  ADD KEY `Candidate_id` (`Candidate_id`);

--
-- Indexes for table `candidate_experience`
--
ALTER TABLE `candidate_experience`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `Can_id` (`Can_id`);

--
-- Indexes for table `deleted_users`
--
ALTER TABLE `deleted_users`
  ADD PRIMARY KEY (`Id`);

--
-- Indexes for table `employee_details`
--
ALTER TABLE `employee_details`
  ADD PRIMARY KEY (`Id`),
  ADD KEY `Emp_id` (`Emp_id`);

--
-- Indexes for table `employee_register`
--
ALTER TABLE `employee_register`
  ADD PRIMARY KEY (`Id`);

--
-- Indexes for table `jobseeker_register`
--
ALTER TABLE `jobseeker_register`
  ADD PRIMARY KEY (`Id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `add_job`
--
ALTER TABLE `add_job`
  MODIFY `Id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `candidate_details`
--
ALTER TABLE `candidate_details`
  MODIFY `Id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `candidate_education`
--
ALTER TABLE `candidate_education`
  MODIFY `Id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `candidate_experience`
--
ALTER TABLE `candidate_experience`
  MODIFY `ID` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `deleted_users`
--
ALTER TABLE `deleted_users`
  MODIFY `Id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `employee_details`
--
ALTER TABLE `employee_details`
  MODIFY `Id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `employee_register`
--
ALTER TABLE `employee_register`
  MODIFY `Id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `jobseeker_register`
--
ALTER TABLE `jobseeker_register`
  MODIFY `Id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `add_job`
--
ALTER TABLE `add_job`
  ADD CONSTRAINT `add_job_ibfk_1` FOREIGN KEY (`Emp_id`) REFERENCES `employee_register` (`Id`);

--
-- Constraints for table `apply_job_post`
--
ALTER TABLE `apply_job_post`
  ADD CONSTRAINT `apply_job_post_ibfk_1` FOREIGN KEY (`Emp_id`) REFERENCES `employee_register` (`Id`),
  ADD CONSTRAINT `apply_job_post_ibfk_2` FOREIGN KEY (`Candidate_id`) REFERENCES `jobseeker_register` (`Id`);

--
-- Constraints for table `candidate_experience`
--
ALTER TABLE `candidate_experience`
  ADD CONSTRAINT `candidate_experience_ibfk_1` FOREIGN KEY (`Can_id`) REFERENCES `jobseeker_register` (`Id`);

--
-- Constraints for table `employee_details`
--
ALTER TABLE `employee_details`
  ADD CONSTRAINT `employee_details_ibfk_1` FOREIGN KEY (`Emp_id`) REFERENCES `employee_register` (`Id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

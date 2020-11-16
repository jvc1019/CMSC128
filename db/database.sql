--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `user_ID` int(3) ZEROFILL NOT NULL AUTO_INCREMENT, -- supports up to 999 users
  `user_Name` varchar(30) NOT NULL,
  `user_Email` varchar(100) NOT NULL,
  `user_Password` varchar(125) NOT NULL, -- before placed here, the string is hashed via MD5
  `user_Theme` varchar(50) NOT NULL DEFAULT "default", -- stores the theme name of the user
  PRIMARY KEY (`user_ID`),
  UNIQUE KEY `user_Name` (`user_Name`),
  UNIQUE KEY `user_Email` (`user_Email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `task`
--

CREATE TABLE `task` (
  `task_ID` int(4) ZEROFILL NOT NULL AUTO_INCREMENT, -- supports up to 9999 tasks
  `task_Name` varchar(50) DEFAULT NULL,
  `task_Desc` mediumtext DEFAULT NULL,
  `task_Due` date DEFAULT NULL,
  `task_Reminder` datetime DEFAULT NULL, -- added support for the reminder feature
  `task_isDone` tinyint(1) NOT NULL DEFAULT 0,
  `task_Tags` varchar(250) DEFAULT NULL,
  `user_ID` int(3) ZEROFILL NOT NULL,
  PRIMARY KEY (`task_ID`),
  FOREIGN KEY (`user_ID`) REFERENCES `user`(`user_ID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `subject`
--

CREATE TABLE `subject` (
  `subject_ID` int(2) ZEROFILL NOT NULL AUTO_INCREMENT, -- up to 99 subjects
  `subject_Image` varchar(200) DEFAULT NULL,
  `subject_Name` varchar(150) DEFAULT NULL,
  `subject_Type` varchar(3) NOT NULL DEFAULT "LEC", -- just add a dropdown to select a subject type adding or editing a subject
  `subject_Instructor` varchar(100) DEFAULT NULL,
  `subject_Desc` mediumtext DEFAULT NULL,
  `subject_Day` varchar(8) DEFAULT NULL,
  `subject_Time` time DEFAULT NULL,
  `user_ID` int(3) ZEROFILL NOT NULL,
  PRIMARY KEY (`subject_ID`),
  FOREIGN KEY (`user_ID`) REFERENCES `user`(`user_ID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `note`
--

CREATE TABLE `note` (
  `note_ID` int(2) ZEROFILL NOT NULL AUTO_INCREMENT, -- up to 99 notes
  `note_Title` varchar(150) DEFAULT NULL,
  `note_Content` mediumtext COLLATE utf8_unicode_ci NOT NULL,
  `note_Tags` varchar(250) DEFAULT NULL,
  `user_ID` int(3) ZEROFILL NOT NULL,
  PRIMARY KEY (`note_ID`),
  FOREIGN KEY (`user_ID`) REFERENCES `user`(`user_ID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;


-- These are dummy values to prevent errors with AUTO_INCREMENT,
-- therefore the lowest possible ID for user-generated entries is 2
INSERT INTO `user` (`user_ID`, `user_Name`, `user_Password`) VALUES
(1, 'superuser', 'password');

INSERT INTO `task` (`task_ID`, `task_Name`, `task_Desc`, `user_ID`) VALUES
(1, 'Dummy task', 'Dummy task for AUTO_INCREMENT, DO NOT DELETE!', 1);

INSERT INTO `subject` (`subject_ID`, `subject_Name`, `subject_Desc`, `user_ID`) VALUES
(1, 'Dummy subject', 'Dummy subject for AUTO_INCREMENT, DO NOT DELETE!', 1);

INSERT INTO `note` (`note_ID`, `note_Title`, `note_Content`, `user_ID`) VALUES
(1, 'Dummy note', 'Dummy note for AUTO_INCREMENT, DO NOT DELETE!', 1);

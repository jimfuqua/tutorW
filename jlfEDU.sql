-- phpMyAdmin SQL Dump
-- version 4.0.10deb1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Feb 05, 2016 at 09:44 PM
-- Server version: 5.5.47-0ubuntu0.14.04.1
-- PHP Version: 5.6.18-1+deb.sury.org~trusty+1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `jlfEDU`
--

-- --------------------------------------------------------

--
-- Table structure for table `tAssignments`
--

CREATE TABLE IF NOT EXISTS `tAssignments` (
  `tA_id` bigint(20) unsigned NOT NULL AUTO_INCREMENT COMMENT 'The table index.',
  `tA_S_ID` char(80) NOT NULL COMMENT 'Identifies the student.',
  `tA_StudentName` text,
  `tG_AssignmentName` varchar(80) CHARACTER SET latin1 COLLATE latin1_general_ci NOT NULL COMMENT 'This is the lesson to do.  Periodically work on this assignment until it is complete.',
  `tA_Consecutive_Reps_OK` tinyint(1) DEFAULT '1' COMMENT 'Setting a post date can make this field unnecessary.',
  `tA_Parameter` text COMMENT 'Use for non-numeric data.  Use start and stop for numeric data.',
  `tA_Immediate_Loops` int(11) NOT NULL,
  `tA_StartRec` int(10) unsigned NOT NULL COMMENT 'This is the starting lesson.  Joins with a separate parameter table to select starting data.',
  `tA_StopRec` int(80) unsigned DEFAULT NULL COMMENT 'Record at which to stop.',
  `tG_Reps_to_master` int(11) NOT NULL,
  `tG_Errors_Allowed` tinyint(3) NOT NULL,
  `tA_RepsTowardM` smallint(5) unsigned DEFAULT NULL COMMENT 'This is how many correct reps have been completed.  The GenericAssignment will set how many must be completed.',
  `tA_ErrorsMade` smallint(5) unsigned DEFAULT NULL COMMENT 'Number of errors made.',
  `tA_PercentTime` double unsigned NOT NULL COMMENT '% of student time devoted to this lesson.',
  `tA_SumPercent` double unsigned DEFAULT NULL COMMENT 'Use for comparison with all lessons assigned.',
  `tA_QueOrder` tinyint(3) unsigned NOT NULL COMMENT 'Some lessons should take priorty.  That is que order.',
  `tA_SavedAssignment` char(80) DEFAULT NULL COMMENT 'This allows a diversion to another lesson and a return to this lesson.',
  `tA_SavedStartRec` int(10) unsigned DEFAULT NULL COMMENT 'This is the record to return to.',
  `tA_PostDateIncrement` int(15) NOT NULL,
  `tA_Post_date` double(13,3) DEFAULT NULL COMMENT 'Use to post date an assignment so that it will not be executed until after the post date.',
  `tA_iterations_to_do` smallint(5) unsigned DEFAULT NULL COMMENT 'Run a number of times decrementing each time.  For example repeate the lesson 5 times before returning.',
  `tA_OriginalTimestamp` float NOT NULL COMMENT 'Unix timestamp UTC',
  `tA_LastModifiedDateTime` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP COMMENT 'Unix timestamp UTC',
  `tA_LocalDateTime` varchar(20) NOT NULL COMMENT 'Local time.  Other fields are UTC timestamps.',
  PRIMARY KEY (`tA_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 COMMENT='This table specifies the assignment for a particular student' AUTO_INCREMENT=211811 ;

--
-- Dumping data for table `tAssignments`
--

INSERT INTO `tAssignments` (`tA_id`, `tA_S_ID`, `tA_StudentName`, `tG_AssignmentName`, `tA_Consecutive_Reps_OK`, `tA_Parameter`, `tA_Immediate_Loops`, `tA_StartRec`, `tA_StopRec`, `tG_Reps_to_master`, `tG_Errors_Allowed`, `tA_RepsTowardM`, `tA_ErrorsMade`, `tA_PercentTime`, `tA_SumPercent`, `tA_QueOrder`, `tA_SavedAssignment`, `tA_SavedStartRec`, `tA_PostDateIncrement`, `tA_Post_date`, `tA_iterations_to_do`, `tA_OriginalTimestamp`, `tA_LastModifiedDateTime`, `tA_LocalDateTime`) VALUES
(93074, 'qqq4q3q', 'Visitor', 'gA_clockwise_counterclockwise', 0, '0', 0, 1, 10, 30, 0, 3, 0, 1500, 0, 1, '', 0, 0, 10000000.000, 1, 1387240000, '2015-02-03 19:58:26', '0'),
(93075, 'qqq4q3q', 'Visitor', 'gA_left_right_blocks', 0, '0', 0, 1, 10, 30, 0, 1, 11, 15, 0, 1, '', 0, 0, 0.000, 1, 1387240000, '2015-01-20 18:02:27', '0'),
(101284, 'qqq4q3q', 'Visitor', 'gA_typing_lessons_cl', 1, '2', 5, 2, 240, 5, 0, 18, 0, 5, 0, 1, NULL, NULL, 0, 0.000, NULL, 0, '2014-10-19 00:13:46', '0'),
(98464, 'qqq4q3q', 'Visitor', 'gA_spelling', 0, '4', 0, 1, 360, 4, 0, 5, 0, 15, 0, 1, NULL, NULL, 0, 0.000, NULL, 0, '2015-01-08 02:10:37', '0'),
(152826, 'qqq4q3q', 'Visitor', 'gA_horizontal_vertical_diagonal', 0, NULL, 0, 1, 1, 5, 0, 2, 0, 15, NULL, 1, NULL, NULL, 0, NULL, NULL, 0, '2015-01-08 02:10:52', '0'),
(163675, 'qqq4q3q', 'Visitor', 'gA_one_digit_addition_vertical_clues', 1, 'none', 1, 1, 2, 5, 0, 1, 0, 15, NULL, 1, '', 0, 0, 60.000, 0, 1413420000, '2015-02-01 17:52:20', '8901234'),
(211796, 'x!@#$1112', 'asdfg  hjkl', 'tG_Clockwise-CounterClockwise', 1, 'none', 2, 22, 2, 30, 3, 3, 4, 55, 66, 7, NULL, 8, 20, 111.000, 9, 987654000, '0000-00-00 00:00:00', '8901234'),
(211738, 'x!@#$1112', 'asdfg  hjkl', 'tG_Clockwise-CounterClockwise', 1, 'none', 2, 22, 2, 30, 3, 3, 4, 55, 66, 7, NULL, 8, 20, 111.000, 9, 987654000, '0000-00-00 00:00:00', '8901234'),
(211767, 'x!@#$1112', 'asdfg  hjkl', 'tG_Clockwise-CounterClockwise', 1, 'none', 2, 22, 2, 30, 3, 3, 4, 55, 66, 7, NULL, 8, 20, 111.000, 9, 987654000, '0000-00-00 00:00:00', '8901234'),
(211709, 'x!@#$1112', 'asdfg  hjkl', 'tG_Clockwise-CounterClockwise', 1, 'none', 2, 22, 2, 30, 3, 3, 4, 55, 66, 7, NULL, 8, 20, 111.000, 9, 987654000, '0000-00-00 00:00:00', '8901234'),
(211794, '777777', 'asdfg  hjkl', 'tG_Clockwise-CounterClockwise', 1, 'none', 2, 1, 2, 30, 3, 3, 4, 55, 66, 7, NULL, 8, 20, 111.000, 9, 1454730000, '0000-00-00 00:00:00', '8901234'),
(211792, '777777', 'asdfg  hjkl', 'tG_Clockwise-CounterClockwise', 1, 'none', 2, 1, 2, 30, 3, 3, 4, 55, 66, 7, NULL, 8, 20, 111.000, 9, 1454730000, '0000-00-00 00:00:00', '8901234'),
(211793, '777777', 'asdfg  hjkl', 'tG_Clockwise-CounterClockwise', 1, 'none', 2, 1, 2, 30, 3, 3, 4, 55, 66, 7, NULL, 8, 20, 111.000, 9, 1454730000, '0000-00-00 00:00:00', '8901234');

-- --------------------------------------------------------

--
-- Table structure for table `tCompleted`
--

CREATE TABLE IF NOT EXISTS `tCompleted` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `tA_S_ID` char(80) CHARACTER SET latin1 COLLATE latin1_general_ci NOT NULL COMMENT 'Identifes the student by ID',
  `tA_StudentName` char(80) DEFAULT NULL,
  `tC_Session` int(11) NOT NULL COMMENT 'Identifies the session at which this lesson was completed.',
  `tC_gA` text CHARACTER SET latin1 COLLATE latin1_general_ci NOT NULL COMMENT 'Identifies the lesson done.',
  `tC_tAStartRec` smallint(5) DEFAULT NULL,
  `tC_tAStopRec` smallint(5) DEFAULT NULL,
  `tC_CompletedTimestamp` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `tC_ServerTimeStarted` float DEFAULT NULL COMMENT 'This is the delivery time of the lesson by the server.',
  `tC_ClientTimeStarted` float DEFAULT NULL COMMENT 'This the time the lesson was presented to the student in microseconds.',
  `tC_Time_client_processed_answer` bigint(20) NOT NULL,
  `tC_Correct` tinyint(1) NOT NULL COMMENT 'Bool -- did the student respond correctly?',
  `tC_Question_and_Response` text COMMENT 'Record student response and the question posed.  Most useful where lessong generates random questions.',
  `tC_More_data_about_response` text,
  PRIMARY KEY (`id`),
  KEY `Student_ID` (`tA_S_ID`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2849 ;

-- --------------------------------------------------------

--
-- Table structure for table `tGenericAssignments`
--

CREATE TABLE IF NOT EXISTS `tGenericAssignments` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `tG_StartStop` enum('Start','Stop','StartStop','NA') DEFAULT NULL COMMENT 'Some lessons are collected  into threads.  This record signifies the start or stop of a thread or the non-thread nature of this lesson as it is both a start and an end.',
  `tG_Split` tinyint(1) DEFAULT NULL COMMENT 'A split divides the time between two lessons.',
  `tG_ThreadName` text COMMENT 'If null this is a single lesson.',
  `tG_AssignmentName` char(80) NOT NULL,
  `tG_path_to_lesson` char(80) CHARACTER SET latin1 COLLATE latin1_general_ci NOT NULL,
  `tG_FormName` char(80) NOT NULL COMMENT 'Identifies the view file.',
  `tG_DataFile` char(80) DEFAULT NULL COMMENT 'Source of the data for the form.',
  `tG_Parameters` text COMMENT 'Parameters used by program.  Usually JSON',
  `tG_Consequtive_Reps_OK` tinyint(1) NOT NULL DEFAULT '1',
  `tG_Reps_to_master` int(11) NOT NULL,
  `tG_Errors_Allowed` tinyint(3) NOT NULL,
  `tG_Minimum_completion_time` smallint(6) unsigned DEFAULT NULL COMMENT 'Seconds',
  `tG_Maximum_completion_time` smallint(6) unsigned DEFAULT NULL COMMENT 'Seconds',
  `tG_StartRec` smallint(5) unsigned DEFAULT NULL COMMENT 'Identifies the data record for this lesson.',
  `tG_StopRec` smallint(5) unsigned DEFAULT NULL COMMENT 'Identifies the stop record from the data table.',
  `tG_Immediate_Loops` tinyint(3) unsigned DEFAULT NULL COMMENT 'Repeat this exact lesson this number of times.',
  `tG_RepsPerRecord` tinyint(3) unsigned DEFAULT NULL COMMENT 'Iterations of a lesson that should be done before going to another record.',
  `tG_RecordsPerSet` tinyint(4) DEFAULT NULL,
  `tG_Lesson_if_Correct` char(80) DEFAULT NULL COMMENT 'GA to do next if lesson is completed successfully.',
  `tG_Record_if_Correct` int(11) DEFAULT NULL,
  `tG_Parameter_if_Correct` text,
  `tG_Delay_Repeat_Corr` bigint(20) NOT NULL DEFAULT '720' COMMENT 'Delay before lesson is repeated.  Suggestive only as this is set in the tA table by the lesson itself.',
  `tG_Lesson_if_Error` char(80) DEFAULT NULL COMMENT 'GA to do next if lesson is not done successfully.',
  `tG_Record_if_Error` int(11) DEFAULT NULL COMMENT 'Delay before lesson is repeated.  Suggestive only as this is set in the tA table by the lesson itself.',
  `tG_Parameter_if_Error` text,
  `tG_Delay_Repeat_Err` bigint(20) NOT NULL,
  `tG_Assignment_Creation_Date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  FULLTEXT KEY `name` (`tG_AssignmentName`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=129557 ;

--
-- Dumping data for table `tGenericAssignments`
--

INSERT INTO `tGenericAssignments` (`id`, `tG_StartStop`, `tG_Split`, `tG_ThreadName`, `tG_AssignmentName`, `tG_path_to_lesson`, `tG_FormName`, `tG_DataFile`, `tG_Parameters`, `tG_Consequtive_Reps_OK`, `tG_Reps_to_master`, `tG_Errors_Allowed`, `tG_Minimum_completion_time`, `tG_Maximum_completion_time`, `tG_StartRec`, `tG_StopRec`, `tG_Immediate_Loops`, `tG_RepsPerRecord`, `tG_RecordsPerSet`, `tG_Lesson_if_Correct`, `tG_Record_if_Correct`, `tG_Parameter_if_Correct`, `tG_Delay_Repeat_Corr`, `tG_Lesson_if_Error`, `tG_Record_if_Error`, `tG_Parameter_if_Error`, `tG_Delay_Repeat_Err`, `tG_Assignment_Creation_Date`) VALUES
(1781, '', NULL, '', 'gA_left_right_blocks', '/jimfuqua/tutor/lessons/left_right_blocks/', 'left_right_blocks.php', NULL, '', 0, 10, 0, 0, 0, 1, NULL, 1, 1, 20, '', 0, '', 0, 'Left_Right', 0, '', 0, '2013-06-17 05:50:24'),
(1782, '', NULL, '', 'gA_clockwise_counterclockwise', '/jimfuqua/tutor/lessons/clockwise_counterclockwise/', 'clockwise_counterclockwise.php', NULL, '', 1, 10, 0, 0, 2, 1, NULL, 1, 1, 20, '', 0, '', 0, 'clockwise_counterclockwise', 0, '', 0, '2013-06-17 05:54:20'),
(1935, 'Start', NULL, 'spelling_English', 'gA_spelling', '/jimfuqua/tutor/lessons/spelling/', 'spelling.php', 'word_sentence_array_1-372.php', '', 0, 10, 0, NULL, NULL, 1, 356, NULL, 1, NULL, NULL, NULL, NULL, 720, NULL, NULL, NULL, 0, '2013-07-30 02:15:31'),
(125841, 'Start', NULL, NULL, 'gA_one_digit_addition_vertical_clues', '/jimfuqua/tutor/lessons/one_digit_addition_vertical_clues/', 'one_digit_addition_vertical_clues.php', NULL, NULL, 1, 10, 0, NULL, NULL, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 720, NULL, NULL, NULL, 0, '2014-10-13 12:45:53'),
(125820, 'StartStop', NULL, NULL, 'gA_left_right_mouse', '/jimfuqua/tutor/lessons/left_right_mouse/', 'left_right_mouse.php', NULL, NULL, 0, 10, 0, 1, 5, 1, 1, 1, 1, 1, NULL, NULL, NULL, 720, NULL, NULL, NULL, 0, '2014-10-12 19:20:15'),
(2012, NULL, NULL, NULL, 'gA_typing_lessons_cl', '/jimfuqua/tutor/lessons/typing_lessons_cl/', 'typing_lessons_cl.php', NULL, '1', 1, 5, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, NULL, NULL, NULL, 0, '2013-08-29 08:11:25'),
(129271, NULL, NULL, NULL, 'gA_horizontal_vertical_diagonal', '/jimfuqua/tutor/lessons/horizontal_vertical_diagonal/', 'horizontal_vertical_diagonal.php', NULL, NULL, 0, 20, 0, NULL, NULL, 1, 1, NULL, 1, 1, NULL, NULL, NULL, 720, '100', 1, NULL, 100, '2016-01-09 18:06:36');

-- --------------------------------------------------------

--
-- Table structure for table `tLessonProblems`
--

CREATE TABLE IF NOT EXISTS `tLessonProblems` (
  `sendingFile` text NOT NULL,
  `theProblem` text NOT NULL,
  `sourceOfProblem` tinytext NOT NULL,
  `tA_S_ID` tinytext NOT NULL,
  `tA_id` tinytext NOT NULL,
  `date_reported` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tPersons`
--

CREATE TABLE IF NOT EXISTS `tPersons` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `prefix` char(10) DEFAULT NULL,
  `StudentName` char(80) NOT NULL,
  `nickName` char(40) DEFAULT NULL,
  `firstName` char(80) DEFAULT NULL,
  `middleName` char(80) DEFAULT NULL,
  `lastName` char(80) DEFAULT NULL,
  `suffix` char(10) DEFAULT NULL,
  `Person_ID` char(80) NOT NULL,
  `phoneNumber` int(11) DEFAULT NULL,
  `residenceCity` int(11) DEFAULT NULL,
  `residenceState` int(11) DEFAULT NULL,
  `residenceZip` int(11) DEFAULT NULL,
  `userName` int(11) DEFAULT NULL,
  `passwd` int(11) DEFAULT NULL,
  `DateTimeModified` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00' ON UPDATE CURRENT_TIMESTAMP,
  `TimeRegistered` int(11) DEFAULT NULL,
  `TimeLoggedIn` int(11) DEFAULT NULL COMMENT 'Total time student has been working.',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `tPrerequisites`
--

CREATE TABLE IF NOT EXISTS `tPrerequisites` (
  `tGenericAssignment_name` text NOT NULL,
  `PrerequisiteGA` text NOT NULL,
  `tGA_id` int(11) NOT NULL COMMENT 'Not reliable as an identifier.  Use only as last resort.'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tSessions`
--

CREATE TABLE IF NOT EXISTS `tSessions` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `tS_SessionID` char(250) NOT NULL COMMENT 'UUID to identify the session.',
  `tS_S_ID` char(80) NOT NULL,
  `tS_TimeAssigned` int(10) unsigned DEFAULT NULL,
  `tS_TimeIn` bigint(20) NOT NULL,
  `tS_TimeOut` bigint(20) DEFAULT NULL,
  `tS_WorkingTime` int(11) unsigned DEFAULT NULL,
  `tS_SystemDeadTime` int(10) unsigned DEFAULT NULL COMMENT 'Factor indicating the speed of the client computer and network connection.',
  `tS_LessonsCompleted` int(11) DEFAULT NULL COMMENT 'This is the number of lesson reps completed.  ',
  `tS_ErrorsToday` int(11) DEFAULT NULL,
  `tS_GenericAssignmentsCompleted` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `tS_SessionID` (`tS_SessionID`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=831 ;

--
-- Dumping data for table `tSessions`
--

INSERT INTO `tSessions` (`id`, `tS_SessionID`, `tS_S_ID`, `tS_TimeAssigned`, `tS_TimeIn`, `tS_TimeOut`, `tS_WorkingTime`, `tS_SystemDeadTime`, `tS_LessonsCompleted`, `tS_ErrorsToday`, `tS_GenericAssignmentsCompleted`) VALUES
(830, '123456', 'xxx-yyy', 1200, 1, 1, 1200, 200, 66, 16, 12);

-- --------------------------------------------------------

--
-- Table structure for table `tSpellingSentences`
--

CREATE TABLE IF NOT EXISTS `tSpellingSentences` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `Replace` tinyint(1) NOT NULL DEFAULT '0',
  `file` tinytext NOT NULL,
  `Sentence` tinytext NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=16 ;

--
-- Dumping data for table `tSpellingSentences`
--

INSERT INTO `tSpellingSentences` (`id`, `Replace`, `file`, `Sentence`) VALUES
(1, 1, 'able.ogg', 'He is able to run.'),
(2, 0, 'acre_s01.ogg', 'Land area is often measured by the acre.'),
(3, 0, 'act_s01.ogg', 'Would you like to act in a play?'),
(4, 1, 'add_s01.ogg', 'Add two and two and you get four.'),
(5, 1, 'age_s01.ogg', 'Her age is six years.'),
(6, 0, 'ago_s01.ogg', 'Long long ago began the tale.'),
(7, 0, 'aid_s01.ogg', 'We all should learn first aid.'),
(8, 1, 'aim_s01.ogg', 'Aim high and you will succeed.'),
(9, 0, 'air_s01.ogg', 'We breathe air to get oxygen.'),
(10, 0, 'all_s01.ogg', 'All the work is done!'),
(11, 0, 'am_s01.ogg', 'I am having fun.'),
(12, 1, 'and_s01.ogg', 'Bill and Sam ran home.'),
(13, 1, 'an_s01.ogg', 'An apple a day keeps the doctor away.'),
(14, 0, 'ant_s01.ogg', 'The ant crawled into the picnic basket.'),
(15, 1, 'any_s01.ogg', 'Do we have any more cookies?');

-- --------------------------------------------------------

--
-- Table structure for table `tSpellingStudent`
--

CREATE TABLE IF NOT EXISTS `tSpellingStudent` (
  `id` int(20) unsigned NOT NULL,
  `t_S_ID` int(11) NOT NULL,
  `tSWords_id` int(11) NOT NULL,
  `ActiveDateTime` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `stage` tinyint(4) unsigned NOT NULL DEFAULT '0' COMMENT 'Values, 1, 2, 4, 8, 16, 32, 64, 128',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COMMENT='Keep track of student words';

-- --------------------------------------------------------

--
-- Table structure for table `tSpellingWords`
--

CREATE TABLE IF NOT EXISTS `tSpellingWords` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT COMMENT 'Table Index',
  `word` tinytext NOT NULL COMMENT 'The spelling word.',
  `phonic` tinytext NOT NULL,
  `ordinal` int(11) NOT NULL,
  `syllables` int(11) NOT NULL,
  `vowels` int(11) NOT NULL,
  `wd_length` int(11) NOT NULL,
  `wd_frequency` int(11) NOT NULL,
  `word_audio` tinytext NOT NULL COMMENT 'Extra sound file name numbers for extra sound files.',
  `sentence_audio` tinytext NOT NULL COMMENT 'Extra sound file numbers for sentences.',
  `word_video` tinytext NOT NULL COMMENT 'Two digit numbers separated by , to allow multiple videos representing the word.',
  `spelling_rule_1` int(11) NOT NULL,
  `spelling_rule_2` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2546 ;

--
-- Dumping data for table `tSpellingWords`
--

INSERT INTO `tSpellingWords` (`id`, `word`, `phonic`, `ordinal`, `syllables`, `vowels`, `wd_length`, `wd_frequency`, `word_audio`, `sentence_audio`, `word_video`, `spelling_rule_1`, `spelling_rule_2`) VALUES
(1949, 'tax', '', 156, 0, 1, 3, 0, '', '', '', 0, 0),
(1950, 'shy', '', 158, 0, 1, 3, 0, '', '', '', 0, 0),
(1951, 'ax', '', 11, 0, 1, 2, 0, '', '', '', 0, 0),
(1952, 'wed', '', 161, 0, 1, 3, 0, '', '', '', 0, 0),
(1953, 'mug', '', 163, 0, 1, 3, 0, '', '', '', 0, 0),
(1954, 'dog', '', 165, 0, 1, 3, 0, '', '', '', 0, 0),
(1955, 'elm', '', 167, 0, 1, 3, 0, '', '', '', 0, 0),
(1956, 'fly', '', 169, 0, 1, 3, 0, '', '', '', 0, 0),
(1957, 'are', '', 324, 0, 2, 3, 0, '', '', '', 0, 0),
(1958, 'if', '', 12, 0, 1, 2, 0, '', '', '', 0, 0),
(1959, 'four', '', 365, 0, 2, 4, 0, '', '', '', 0, 0),
(1960, 'bib', '', 174, 0, 1, 3, 0, '', '', '', 0, 0),
(1961, 'pry', '', 175, 0, 1, 3, 0, '', '', '', 0, 0),
(1962, 'bee', '', 326, 0, 2, 3, 0, '', '', '', 0, 0),
(1963, 'pig', '', 177, 0, 1, 3, 0, '', '', '', 0, 0),
(1964, 'as', '', 13, 0, 1, 2, 0, '', '', '', 0, 0),
(1965, 'rug', '', 180, 0, 1, 3, 0, '', '', '', 0, 0),
(1966, 'gas', '', 182, 0, 1, 3, 0, '', '', '', 0, 0),
(1967, 'boo', '', 327, 0, 2, 3, 0, '', '', '', 0, 0),
(1968, 'as', '', 1, 0, 1, 2, 0, '', '', '', 0, 0),
(1969, 'pen', '', 186, 0, 1, 3, 0, '', '', '', 0, 0),
(1970, 'rut', '', 187, 0, 1, 3, 0, '', '', '', 0, 0),
(1971, 'die', '', 329, 0, 2, 3, 0, '', '', '', 0, 0),
(1972, 'beg', '', 190, 0, 1, 3, 0, '', '', '', 0, 0),
(1973, 'gob', '', 192, 0, 1, 3, 0, '', '', '', 0, 0),
(1974, 'leg', '', 194, 0, 1, 3, 0, '', '', '', 0, 0),
(1975, 'sat', '', 196, 0, 1, 3, 0, '', '', '', 0, 0),
(1976, 'toy', '', 197, 0, 1, 3, 0, '', '', '', 0, 0),
(1977, 'wet', '', 199, 0, 1, 3, 0, '', '', '', 0, 0),
(1978, 'fad', '', 201, 0, 1, 3, 0, '', '', '', 0, 0),
(1979, 'egg', '', 203, 0, 1, 3, 0, '', '', '', 0, 0),
(1980, 'ill', '', 204, 0, 1, 3, 0, '', '', '', 0, 0),
(1981, 'my', '', 15, 0, 1, 2, 0, '', '', '', 0, 0),
(1982, 'box', '', 206, 0, 1, 3, 0, '', '', '', 0, 0),
(1983, 'now', '', 208, 0, 1, 3, 0, '', '', '', 0, 0),
(1984, 'sob', '', 210, 0, 1, 3, 0, '', '', '', 0, 0),
(1985, 'win', '', 212, 0, 1, 3, 0, '', '', '', 0, 0),
(1986, 'pay', '', 214, 0, 1, 3, 0, '', '', '', 0, 0),
(1987, 'Look', '', 368, 0, 2, 4, 0, '', '', '', 0, 0),
(1988, 'sop', '', 217, 0, 1, 3, 0, '', '', '', 0, 0),
(1989, 'fox', '', 219, 0, 1, 3, 0, '', '', '', 0, 0),
(1990, 'tug', '', 221, 0, 1, 3, 0, '', '', '', 0, 0),
(1991, 'tan', '', 223, 0, 1, 3, 0, '', '', '', 0, 0),
(1992, 'paw', '', 225, 0, 1, 3, 0, '', '', '', 0, 0),
(1993, 'bag', '', 226, 0, 1, 3, 0, '', '', '', 0, 0),
(1994, 'jug', '', 228, 0, 1, 3, 0, '', '', '', 0, 0),
(1995, 'mix', '', 230, 0, 1, 3, 0, '', '', '', 0, 0),
(1996, 'cat', '', 231, 0, 1, 3, 0, '', '', '', 0, 0),
(1997, 'way', '', 233, 0, 1, 3, 0, '', '', '', 0, 0),
(1998, 'from', '', 352, 0, 1, 4, 0, '', '', '', 0, 0),
(1999, 'red', '', 235, 0, 1, 3, 0, '', '', '', 0, 0),
(2000, 'fast', '', 353, 0, 1, 4, 0, '', '', '', 0, 0),
(2001, 'fur', '', 237, 0, 1, 3, 0, '', '', '', 0, 0),
(2002, 'pop', '', 238, 0, 1, 3, 0, '', '', '', 0, 0),
(2003, 'buy', '', 239, 0, 1, 3, 0, '', '', '', 0, 0),
(2004, 'rag', '', 240, 0, 1, 3, 0, '', '', '', 0, 0),
(2005, 'our', '', 334, 0, 2, 3, 0, '', '', '', 0, 0),
(2006, 'let', '', 243, 0, 1, 3, 0, '', '', '', 0, 0),
(2007, 'sew', '', 244, 0, 1, 3, 0, '', '', '', 0, 0),
(2008, 'mat', '', 246, 0, 1, 3, 0, '', '', '', 0, 0),
(2009, 'be', '', 19, 0, 1, 2, 0, '', '', '', 0, 0),
(2010, 'but', '', 248, 0, 1, 3, 0, '', '', '', 0, 0),
(2011, 'sly', '', 250, 0, 1, 3, 0, '', '', '', 0, 0),
(2012, 'nor', '', 251, 0, 1, 3, 0, '', '', '', 0, 0),
(2013, 'rat', '', 253, 0, 1, 3, 0, '', '', '', 0, 0),
(2014, 'am', '', 21, 0, 1, 2, 0, '', '', '', 0, 0),
(2015, 'off', '', 255, 0, 1, 3, 0, '', '', '', 0, 0),
(2016, 'for', '', 257, 0, 1, 3, 0, '', '', '', 0, 0),
(2017, 'come', '', 371, 0, 2, 4, 0, '', '', '', 0, 0),
(2018, 'big', '', 260, 0, 1, 3, 0, '', '', '', 0, 0),
(2019, 'wig', '', 261, 0, 1, 3, 0, '', '', '', 0, 0),
(2020, 'men', '', 263, 0, 1, 3, 0, '', '', '', 0, 0),
(2021, 'best', '', 354, 0, 1, 4, 0, '', '', '', 0, 0),
(2022, 'sum', '', 266, 0, 1, 3, 0, '', '', '', 0, 0),
(2023, 'mow', '', 267, 0, 1, 3, 0, '', '', '', 0, 0),
(2024, 'fin', '', 269, 0, 1, 3, 0, '', '', '', 0, 0),
(2025, 'ran', '', 270, 0, 1, 3, 0, '', '', '', 0, 0),
(2026, 'tab', '', 272, 0, 1, 3, 0, '', '', '', 0, 0),
(2027, 'bay', '', 275, 0, 1, 3, 0, '', '', '', 0, 0),
(2028, 'rid', '', 277, 0, 1, 3, 0, '', '', '', 0, 0),
(2029, 'ham', '', 280, 0, 1, 3, 0, '', '', '', 0, 0),
(2030, 'hum', '', 282, 0, 1, 3, 0, '', '', '', 0, 0),
(2031, 'day', '', 285, 0, 1, 3, 0, '', '', '', 0, 0),
(2032, 'dug', '', 287, 0, 1, 3, 0, '', '', '', 0, 0),
(2033, 'end', '', 289, 0, 1, 3, 0, '', '', '', 0, 0),
(2034, 'tar', '', 291, 0, 1, 3, 0, '', '', '', 0, 0),
(2035, 'little', '', 374, 0, 2, 6, 0, '', '', '', 0, 0),
(2036, 'oak', '', 341, 0, 2, 3, 0, '', '', '', 0, 0),
(2037, 'rip', '', 294, 0, 1, 3, 0, '', '', '', 0, 0),
(2038, 'and', '', 296, 0, 1, 3, 0, '', '', '', 0, 0),
(2039, 'hog', '', 297, 0, 1, 3, 0, '', '', '', 0, 0),
(2040, 'bar', '', 298, 0, 1, 3, 0, '', '', '', 0, 0),
(2041, 'eat', '', 343, 0, 2, 3, 0, '', '', '', 0, 0),
(2042, 'did', '', 301, 0, 1, 3, 0, '', '', '', 0, 0),
(2043, 'him', '', 303, 0, 1, 3, 0, '', '', '', 0, 0),
(2044, 'car', '', 304, 0, 1, 3, 0, '', '', '', 0, 0),
(2045, 'away', '', 373, 0, 2, 4, 0, '', '', '', 0, 0),
(2046, 'eel', '', 345, 0, 2, 3, 0, '', '', '', 0, 0),
(2047, 'ago', '', 346, 0, 2, 3, 0, '', '', '', 0, 0),
(2048, 'pot', '', 29, 0, 1, 3, 0, '', '', '', 0, 0),
(2049, 'zoo', '', 306, 0, 2, 3, 0, '', '', '', 0, 0),
(2050, 'his', '', 32, 0, 1, 3, 0, '', '', '', 0, 0),
(2051, 'low', '', 33, 0, 1, 3, 0, '', '', '', 0, 0),
(2052, 'cow', '', 35, 0, 1, 3, 0, '', '', '', 0, 0),
(2053, 'here', '', 357, 0, 2, 4, 0, '', '', '', 0, 0),
(2054, 'fed', '', 38, 0, 1, 3, 0, '', '', '', 0, 0),
(2055, 'kid', '', 40, 0, 1, 3, 0, '', '', '', 0, 0),
(2056, 'jam', '', 42, 0, 1, 3, 0, '', '', '', 0, 0),
(2057, 'ask', '', 44, 0, 1, 3, 0, '', '', '', 0, 0),
(2058, 'came', '', 359, 0, 2, 4, 0, '', '', '', 0, 0),
(2059, 'ray', '', 45, 0, 1, 3, 0, '', '', '', 0, 0),
(2060, 'rim', '', 46, 0, 1, 3, 0, '', '', '', 0, 0),
(2061, 'ate', '', 307, 0, 2, 3, 0, '', '', '', 0, 0),
(2062, 'by', '', 3, 0, 1, 2, 0, '', '', '', 0, 0),
(2063, 'on', '', 4, 0, 1, 2, 0, '', '', '', 0, 0),
(2064, 'ice', '', 308, 0, 2, 3, 0, '', '', '', 0, 0),
(2065, 'two', '', 47, 0, 1, 3, 0, '', '', '', 0, 0),
(2066, 'mud', '', 48, 0, 1, 3, 0, '', '', '', 0, 0),
(2067, 'she', '', 49, 0, 1, 3, 0, '', '', '', 0, 0),
(2068, 'up', '', 5, 0, 1, 2, 0, '', '', '', 0, 0),
(2069, 'flu', '', 50, 0, 1, 3, 0, '', '', '', 0, 0),
(2070, 'lad', '', 51, 0, 1, 3, 0, '', '', '', 0, 0),
(2071, 'hid', '', 52, 0, 1, 3, 0, '', '', '', 0, 0),
(2072, 'see', '', 309, 0, 2, 3, 0, '', '', '', 0, 0),
(2073, 'odd', '', 53, 0, 1, 3, 0, '', '', '', 0, 0),
(2074, 'map', '', 54, 0, 1, 3, 0, '', '', '', 0, 0),
(2075, 'cub', '', 55, 0, 1, 3, 0, '', '', '', 0, 0),
(2076, 'may', '', 56, 0, 1, 3, 0, '', '', '', 0, 0),
(2077, 'bun', '', 57, 0, 1, 3, 0, '', '', '', 0, 0),
(2078, 'in', '', 6, 0, 1, 2, 0, '', '', '', 0, 0),
(2079, 'pet', '', 58, 0, 1, 3, 0, '', '', '', 0, 0),
(2080, 'tow', '', 59, 0, 1, 3, 0, '', '', '', 0, 0),
(2081, 'fun', '', 60, 0, 1, 3, 0, '', '', '', 0, 0),
(2082, 'give', '', 360, 0, 2, 4, 0, '', '', '', 0, 0),
(2083, 'dim', '', 61, 0, 1, 3, 0, '', '', '', 0, 0),
(2084, 'too', '', 310, 0, 2, 3, 0, '', '', '', 0, 0),
(2085, 'tap', '', 62, 0, 1, 3, 0, '', '', '', 0, 0),
(2086, 'gum', '', 63, 0, 1, 3, 0, '', '', '', 0, 0),
(2087, 'van', '', 64, 0, 1, 3, 0, '', '', '', 0, 0),
(2088, 'war', '', 65, 0, 1, 3, 0, '', '', '', 0, 0),
(2089, 'act', '', 66, 0, 1, 3, 0, '', '', '', 0, 0),
(2090, 'use', '', 311, 0, 2, 3, 0, '', '', '', 0, 0),
(2091, 'cup', '', 67, 0, 1, 3, 0, '', '', '', 0, 0),
(2092, 'sit', '', 68, 0, 1, 3, 0, '', '', '', 0, 0),
(2093, 'new', '', 69, 0, 1, 3, 0, '', '', '', 0, 0),
(2094, 'lip', '', 70, 0, 1, 3, 0, '', '', '', 0, 0),
(2095, 'to', '', 7, 0, 1, 2, 0, '', '', '', 0, 0),
(2096, 'yap', '', 71, 0, 1, 3, 0, '', '', '', 0, 0),
(2097, 'try', '', 72, 0, 1, 3, 0, '', '', '', 0, 0),
(2098, 'cab', '', 73, 0, 1, 3, 0, '', '', '', 0, 0),
(2099, 'nut', '', 74, 0, 1, 3, 0, '', '', '', 0, 0),
(2100, 'lab', '', 75, 0, 1, 3, 0, '', '', '', 0, 0),
(2101, 'sky', '', 76, 0, 1, 3, 0, '', '', '', 0, 0),
(2102, 'add', '', 77, 0, 1, 3, 0, '', '', '', 0, 0),
(2103, 'mob', '', 78, 0, 1, 3, 0, '', '', '', 0, 0),
(2104, 'cold', '', 347, 0, 1, 4, 0, '', '', '', 0, 0),
(2105, 'few', '', 79, 0, 1, 3, 0, '', '', '', 0, 0),
(2106, 'kin', '', 80, 0, 1, 3, 0, '', '', '', 0, 0),
(2107, 'good', '', 361, 0, 2, 4, 0, '', '', '', 0, 0),
(2108, 'its', '', 81, 0, 1, 3, 0, '', '', '', 0, 0),
(2109, 'nab', '', 82, 0, 1, 3, 0, '', '', '', 0, 0),
(2110, 'tag', '', 83, 0, 1, 3, 0, '', '', '', 0, 0),
(2111, 'age', '', 312, 0, 2, 3, 0, '', '', '', 0, 0),
(2112, 'due', '', 313, 0, 2, 3, 0, '', '', '', 0, 0),
(2113, 'own', '', 84, 0, 1, 3, 0, '', '', '', 0, 0),
(2114, 'who', '', 85, 0, 1, 3, 0, '', '', '', 0, 0),
(2115, 'bud', '', 86, 0, 1, 3, 0, '', '', '', 0, 0),
(2116, 'spy', '', 87, 0, 1, 3, 0, '', '', '', 0, 0),
(2117, 'dye', '', 88, 0, 1, 3, 0, '', '', '', 0, 0),
(2118, 'pin', '', 89, 0, 1, 3, 0, '', '', '', 0, 0),
(2119, 'job', '', 90, 0, 1, 3, 0, '', '', '', 0, 0),
(2120, 'you', '', 314, 0, 2, 3, 0, '', '', '', 0, 0),
(2121, 'wag', '', 91, 0, 1, 3, 0, '', '', '', 0, 0),
(2122, 'raw', '', 92, 0, 1, 3, 0, '', '', '', 0, 0),
(2123, 'gem', '', 93, 0, 1, 3, 0, '', '', '', 0, 0),
(2124, 'six', '', 94, 0, 1, 3, 0, '', '', '', 0, 0),
(2125, 'tip', '', 95, 0, 1, 3, 0, '', '', '', 0, 0),
(2126, 'hay', '', 96, 0, 1, 3, 0, '', '', '', 0, 0),
(2127, 'has', '', 97, 0, 1, 3, 0, '', '', '', 0, 0),
(2128, 'fee', '', 315, 0, 2, 3, 0, '', '', '', 0, 0),
(2129, 'sag', '', 98, 0, 1, 3, 0, '', '', '', 0, 0),
(2130, 'lay', '', 99, 0, 1, 3, 0, '', '', '', 0, 0),
(2131, 'out', '', 316, 0, 2, 3, 0, '', '', '', 0, 0),
(2132, 'zip', '', 100, 0, 1, 3, 0, '', '', '', 0, 0),
(2133, 'how', '', 101, 0, 1, 3, 0, '', '', '', 0, 0),
(2134, 'hit', '', 102, 0, 1, 3, 0, '', '', '', 0, 0),
(2135, 'man', '', 103, 0, 1, 3, 0, '', '', '', 0, 0),
(2136, 'once', '', 362, 0, 2, 4, 0, '', '', '', 0, 0),
(2137, 'tic', '', 104, 0, 1, 3, 0, '', '', '', 0, 0),
(2138, 'dig', '', 105, 0, 1, 3, 0, '', '', '', 0, 0),
(2139, 'sin', '', 106, 0, 1, 3, 0, '', '', '', 0, 0),
(2140, 'dot', '', 107, 0, 1, 3, 0, '', '', '', 0, 0),
(2141, 'dip', '', 108, 0, 1, 3, 0, '', '', '', 0, 0),
(2142, 'both', '', 348, 0, 1, 4, 0, '', '', '', 0, 0),
(2143, 'hut', '', 109, 0, 1, 3, 0, '', '', '', 0, 0),
(2144, 'row', '', 110, 0, 1, 3, 0, '', '', '', 0, 0),
(2145, 'able', '', 363, 2, 2, 4, 0, '', '', '', 0, 0),
(2146, 'an', '', 8, 0, 1, 2, 0, '', '', '', 0, 0),
(2147, 'oh', '', 9, 0, 1, 2, 0, '', '', '', 0, 0),
(2148, 'pip', '', 111, 0, 1, 3, 0, '', '', '', 0, 0),
(2149, 'sad', '', 112, 0, 1, 3, 0, '', '', '', 0, 0),
(2150, 'lit', '', 113, 0, 1, 3, 0, '', '', '', 0, 0),
(2151, 'call', '', 349, 0, 1, 4, 0, '', '', '', 0, 0),
(2152, 'lie', '', 317, 0, 2, 3, 0, '', '', '', 0, 0),
(2153, 'one', '', 318, 0, 2, 3, 0, '', '', '', 0, 0),
(2154, 'have', '', 364, 0, 2, 4, 0, '', '', '', 0, 0),
(2155, 'pal', '', 114, 0, 1, 3, 0, '', '', '', 0, 0),
(2156, 'her', '', 115, 0, 1, 3, 0, '', '', '', 0, 0),
(2157, 'bet', '', 116, 0, 1, 3, 0, '', '', '', 0, 0),
(2158, 'put', '', 117, 0, 1, 3, 0, '', '', '', 0, 0),
(2159, 're', '', 10, 0, 1, 2, 0, '', '', '', 0, 0),
(2160, 'pat', '', 118, 0, 1, 3, 0, '', '', '', 0, 0),
(2161, 'kit', '', 119, 0, 1, 3, 0, '', '', '', 0, 0),
(2162, 'tub', '', 120, 0, 1, 3, 0, '', '', '', 0, 0),
(2163, 'nod', '', 121, 0, 1, 3, 0, '', '', '', 0, 0),
(2164, 'dew', '', 122, 0, 1, 3, 0, '', '', '', 0, 0),
(2165, 'lag', '', 123, 0, 1, 3, 0, '', '', '', 0, 0),
(2166, 'elf', '', 124, 0, 1, 3, 0, '', '', '', 0, 0),
(2167, 'wit', '', 125, 0, 1, 3, 0, '', '', '', 0, 0),
(2168, 'jut', '', 126, 0, 1, 3, 0, '', '', '', 0, 0),
(2169, 'fan', '', 127, 0, 1, 3, 0, '', '', '', 0, 0),
(2170, 'know', '', 350, 0, 1, 4, 0, '', '', '', 0, 0),
(2171, 'hem', '', 128, 0, 1, 3, 0, '', '', '', 0, 0),
(2172, 'sue', '', 319, 0, 2, 3, 0, '', '', '', 0, 0),
(2173, 'net', '', 129, 0, 1, 3, 0, '', '', '', 0, 0),
(2174, 'sip', '', 130, 0, 1, 3, 0, '', '', '', 0, 0),
(2175, 'key', '', 131, 0, 1, 3, 0, '', '', '', 0, 0),
(2176, 'bad', '', 132, 0, 1, 3, 0, '', '', '', 0, 0),
(2177, 'yam', '', 133, 0, 1, 3, 0, '', '', '', 0, 0),
(2178, 'wad', '', 134, 0, 1, 3, 0, '', '', '', 0, 0),
(2179, 'yes', '', 135, 0, 1, 3, 0, '', '', '', 0, 0),
(2180, 'mom', '', 136, 0, 1, 3, 0, '', '', '', 0, 0),
(2181, 'rap', '', 137, 0, 1, 3, 0, '', '', '', 0, 0),
(2182, 'bin', '', 138, 0, 1, 3, 0, '', '', '', 0, 0),
(2183, 'ear', '', 320, 0, 2, 3, 0, '', '', '', 0, 0),
(2184, 'woe', '', 321, 0, 2, 3, 0, '', '', '', 0, 0),
(2185, 'son', '', 139, 0, 1, 3, 0, '', '', '', 0, 0),
(2186, 'cut', '', 140, 0, 1, 3, 0, '', '', '', 0, 0),
(2187, 'ink', '', 141, 0, 1, 3, 0, '', '', '', 0, 0),
(2188, 'must', '', 351, 0, 1, 4, 0, '', '', '', 0, 0),
(2189, 'ski', '', 142, 0, 1, 3, 0, '', '', '', 0, 0),
(2190, 'art', '', 143, 0, 1, 3, 0, '', '', '', 0, 0),
(2191, 'pod', '', 144, 0, 1, 3, 0, '', '', '', 0, 0),
(2192, 'jet', '', 145, 0, 1, 3, 0, '', '', '', 0, 0),
(2193, 'oar', '', 322, 0, 2, 3, 0, '', '', '', 0, 0),
(2194, 'saw', '', 146, 0, 1, 3, 0, '', '', '', 0, 0),
(2195, 'set', '', 147, 0, 1, 3, 0, '', '', '', 0, 0),
(2196, 'hen', '', 148, 0, 1, 3, 0, '', '', '', 0, 0),
(2197, 'rod', '', 149, 0, 1, 3, 0, '', '', '', 0, 0),
(2198, 'bog', '', 150, 0, 1, 3, 0, '', '', '', 0, 0),
(2199, 'boy', '', 151, 0, 1, 3, 0, '', '', '', 0, 0),
(2200, 'fit', '', 152, 0, 1, 3, 0, '', '', '', 0, 0),
(2201, 'bid', '', 153, 0, 1, 3, 0, '', '', '', 0, 0),
(2202, 'got', '', 154, 0, 1, 3, 0, '', '', '', 0, 0),
(2203, 'aim', '', 323, 0, 2, 3, 0, '', '', '', 0, 0),
(2204, 'ant', '', 155, 0, 1, 3, 0, '', '', '', 0, 0),
(2205, 'sap', '', 157, 0, 1, 3, 0, '', '', '', 0, 0),
(2206, 'say', '', 159, 0, 1, 3, 0, '', '', '', 0, 0),
(2207, 'fix', '', 160, 0, 1, 3, 0, '', '', '', 0, 0),
(2208, 'wax', '', 162, 0, 1, 3, 0, '', '', '', 0, 0),
(2209, 'hug', '', 164, 0, 1, 3, 0, '', '', '', 0, 0),
(2210, 'cry', '', 166, 0, 1, 3, 0, '', '', '', 0, 0),
(2211, 'not', '', 168, 0, 1, 3, 0, '', '', '', 0, 0),
(2212, 'pep', '', 170, 0, 1, 3, 0, '', '', '', 0, 0),
(2213, 'old', '', 171, 0, 1, 3, 0, '', '', '', 0, 0),
(2214, 'lid', '', 172, 0, 1, 3, 0, '', '', '', 0, 0),
(2215, 'fat', '', 173, 0, 1, 3, 0, '', '', '', 0, 0),
(2216, 'moo', '', 325, 0, 2, 3, 0, '', '', '', 0, 0),
(2217, 'lot', '', 176, 0, 1, 3, 0, '', '', '', 0, 0),
(2218, 'been', '', 366, 0, 2, 4, 0, '', '', '', 0, 0),
(2219, 'gun', '', 178, 0, 1, 3, 0, '', '', '', 0, 0),
(2220, 'pad', '', 179, 0, 1, 3, 0, '', '', '', 0, 0),
(2221, 'joy', '', 181, 0, 1, 3, 0, '', '', '', 0, 0),
(2222, 'mop', '', 183, 0, 1, 3, 0, '', '', '', 0, 0),
(2223, 'mad', '', 184, 0, 1, 3, 0, '', '', '', 0, 0),
(2224, 'law', '', 185, 0, 1, 3, 0, '', '', '', 0, 0),
(2225, 'air', '', 328, 0, 2, 3, 0, '', '', '', 0, 0),
(2226, 'fry', '', 188, 0, 1, 3, 0, '', '', '', 0, 0),
(2227, 'why', '', 189, 0, 1, 3, 0, '', '', '', 0, 0),
(2228, 'bit', '', 191, 0, 1, 3, 0, '', '', '', 0, 0),
(2229, 'ivy', '', 193, 0, 1, 3, 0, '', '', '', 0, 0),
(2230, 'zap', '', 195, 0, 1, 3, 0, '', '', '', 0, 0),
(2231, 'it', '', 14, 0, 1, 2, 0, '', '', '', 0, 0),
(2232, 'peg', '', 198, 0, 1, 3, 0, '', '', '', 0, 0),
(2233, 'arc', '', 200, 0, 1, 3, 0, '', '', '', 0, 0),
(2234, 'the', '', 202, 0, 1, 3, 0, '', '', '', 0, 0),
(2235, 'make', '', 367, 0, 2, 4, 0, '', '', '', 0, 0),
(2236, 'jab', '', 205, 0, 1, 3, 0, '', '', '', 0, 0),
(2237, 'toe', '', 330, 0, 2, 3, 0, '', '', '', 0, 0),
(2238, 'elk', '', 207, 0, 1, 3, 0, '', '', '', 0, 0),
(2239, 'all', '', 209, 0, 1, 3, 0, '', '', '', 0, 0),
(2240, 'den', '', 211, 0, 1, 3, 0, '', '', '', 0, 0),
(2241, 'sow', '', 213, 0, 1, 3, 0, '', '', '', 0, 0),
(2242, 'ton', '', 215, 0, 1, 3, 0, '', '', '', 0, 0),
(2243, 'bug', '', 216, 0, 1, 3, 0, '', '', '', 0, 0),
(2244, 'sir', '', 218, 0, 1, 3, 0, '', '', '', 0, 0),
(2245, 'hip', '', 220, 0, 1, 3, 0, '', '', '', 0, 0),
(2246, 'ram', '', 222, 0, 1, 3, 0, '', '', '', 0, 0),
(2247, 'rob', '', 224, 0, 1, 3, 0, '', '', '', 0, 0),
(2248, 'no', '', 16, 0, 1, 2, 0, '', '', '', 0, 0),
(2249, 'nap', '', 227, 0, 1, 3, 0, '', '', '', 0, 0),
(2250, 'vat', '', 229, 0, 1, 3, 0, '', '', '', 0, 0),
(2251, 'tea', '', 331, 0, 2, 3, 0, '', '', '', 0, 0),
(2252, 'jog', '', 232, 0, 1, 3, 0, '', '', '', 0, 0),
(2253, 'bed', '', 234, 0, 1, 3, 0, '', '', '', 0, 0),
(2254, 'into', '', 369, 0, 2, 4, 0, '', '', '', 0, 0),
(2255, 'yet', '', 236, 0, 1, 3, 0, '', '', '', 0, 0),
(2256, 'wee', '', 332, 0, 2, 3, 0, '', '', '', 0, 0),
(2257, 'Is', '', 17, 0, 1, 2, 0, '', '', '', 0, 0),
(2258, 'or', '', 18, 0, 1, 2, 0, '', '', '', 0, 0),
(2259, 'tie', '', 333, 0, 2, 3, 0, '', '', '', 0, 0),
(2260, 'dad', '', 241, 0, 1, 3, 0, '', '', '', 0, 0),
(2261, 'web', '', 242, 0, 1, 3, 0, '', '', '', 0, 0),
(2262, 'blue', '', 370, 0, 2, 4, 0, '', '', '', 0, 0),
(2263, 'can', '', 245, 0, 1, 3, 0, '', '', '', 0, 0),
(2264, 'was', '', 247, 0, 1, 3, 0, '', '', '', 0, 0),
(2265, 'aid', '', 335, 0, 2, 3, 0, '', '', '', 0, 0),
(2266, 'pan', '', 249, 0, 1, 3, 0, '', '', '', 0, 0),
(2267, 'us', '', 20, 0, 1, 2, 0, '', '', '', 0, 0),
(2268, 'dry', '', 252, 0, 1, 3, 0, '', '', '', 0, 0),
(2269, 'rot', '', 254, 0, 1, 3, 0, '', '', '', 0, 0),
(2270, 'he', '', 22, 0, 1, 2, 0, '', '', '', 0, 0),
(2271, 'had', '', 256, 0, 1, 3, 0, '', '', '', 0, 0),
(2272, 'get', '', 258, 0, 1, 3, 0, '', '', '', 0, 0),
(2273, 'ten', '', 259, 0, 1, 3, 0, '', '', '', 0, 0),
(2274, 'owe', '', 336, 0, 2, 3, 0, '', '', '', 0, 0),
(2275, 'dud', '', 262, 0, 1, 3, 0, '', '', '', 0, 0),
(2276, 'pun', '', 264, 0, 1, 3, 0, '', '', '', 0, 0),
(2277, 'cot', '', 265, 0, 1, 3, 0, '', '', '', 0, 0),
(2278, 'do', '', 23, 0, 1, 2, 0, '', '', '', 0, 0),
(2279, 'run', '', 268, 0, 1, 3, 0, '', '', '', 0, 0),
(2280, 'down', '', 355, 0, 1, 4, 0, '', '', '', 0, 0),
(2281, 'owl', '', 271, 0, 1, 3, 0, '', '', '', 0, 0),
(2282, 'cap', '', 273, 0, 1, 3, 0, '', '', '', 0, 0),
(2283, 'eye', '', 338, 0, 2, 3, 0, '', '', '', 0, 0),
(2284, 'hot', '', 278, 0, 1, 3, 0, '', '', '', 0, 0),
(2285, 'inn', '', 281, 0, 1, 3, 0, '', '', '', 0, 0),
(2286, 'rig', '', 283, 0, 1, 3, 0, '', '', '', 0, 0),
(2287, 'any', '', 286, 0, 1, 3, 0, '', '', '', 0, 0),
(2288, 'arm', '', 288, 0, 1, 3, 0, '', '', '', 0, 0),
(2289, 'gap', '', 290, 0, 1, 3, 0, '', '', '', 0, 0),
(2290, 'oil', '', 340, 0, 2, 3, 0, '', '', '', 0, 0),
(2291, 'met', '', 292, 0, 1, 3, 0, '', '', '', 0, 0),
(2292, 'far', '', 293, 0, 1, 3, 0, '', '', '', 0, 0),
(2293, 'hat', '', 295, 0, 1, 3, 0, '', '', '', 0, 0),
(2294, 'sea', '', 342, 0, 2, 3, 0, '', '', '', 0, 0),
(2295, 'acre', '', 372, 2, 2, 4, 0, '', '', '', 0, 0),
(2296, 'bus', '', 299, 0, 1, 3, 0, '', '', '', 0, 0),
(2297, 'pup', '', 300, 0, 1, 3, 0, '', '', '', 0, 0),
(2298, 'fax', '', 302, 0, 1, 3, 0, '', '', '', 0, 0),
(2299, 'help', '', 356, 0, 1, 4, 0, '', '', '', 0, 0),
(2300, 'pie', '', 344, 0, 2, 3, 0, '', '', '', 0, 0),
(2301, 'at', '', 27, 0, 1, 2, 0, '', '', '', 0, 0),
(2302, 'of', '', 28, 0, 1, 2, 0, '', '', '', 0, 0),
(2303, 'mew', '', 305, 0, 1, 3, 0, '', '', '', 0, 0),
(2304, 'lap', '', 30, 0, 1, 3, 0, '', '', '', 0, 0),
(2305, 'top', '', 31, 0, 1, 3, 0, '', '', '', 0, 0),
(2306, 'so', '', 2, 0, 1, 2, 0, '', '', '', 0, 0),
(2307, 'rub', '', 34, 0, 1, 3, 0, '', '', '', 0, 0),
(2308, 'sun', '', 36, 0, 1, 3, 0, '', '', '', 0, 0),
(2309, 'pit', '', 37, 0, 1, 3, 0, '', '', '', 0, 0),
(2310, 'tad', '', 39, 0, 1, 3, 0, '', '', '', 0, 0),
(2311, 'hop', '', 41, 0, 1, 3, 0, '', '', '', 0, 0),
(2312, 'jaw', '', 43, 0, 1, 3, 0, '', '', '', 0, 0),
(2313, 'like', '', 358, 0, 2, 4, 0, '', '', '', 0, 0),
(2535, 'we', '', 24, 1, 1, 2, 0, '', '', '', 0, 0),
(2536, 'me', '', 25, 1, 1, 2, 0, '', '', '', 0, 0),
(2537, 'pea', '', 337, 1, 2, 3, 0, '', '', '', 0, 0),
(2538, 'tin', '', 274, 1, 1, 3, 0, '', '', '', 0, 0),
(2539, 'bat', '', 276, 1, 1, 3, 0, '', '', '', 0, 0),
(2540, 'rib', '', 279, 1, 1, 3, 0, '', '', '', 0, 0),
(2541, 'goo', '', 339, 1, 2, 3, 0, '', '', '', 0, 0),
(2542, 'fig', '', 284, 1, 1, 3, 0, '', '', '', 0, 0),
(2543, 'go', '', 26, 1, 1, 2, 0, '', '', '', 0, 0),
(2545, 'I', '', 375, 1, 1, 1, 0, '', '', '', 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `tSplits`
--

CREATE TABLE IF NOT EXISTS `tSplits` (
  `tSp_id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `tSp_GroupID` int(11) NOT NULL COMMENT 'All splits that are added together will have the same tSplits_Group_ID ',
  `tSp_GroupDescription` tinytext NOT NULL,
  `tSp_LessonName` tinytext,
  `tSp_tA_Parameter` text NOT NULL,
  `tSp_gA` tinytext NOT NULL,
  `tSp_gA_Parameter` int(11) DEFAULT NULL,
  `tSp_PercentTime` int(11) NOT NULL,
  `tSp_TimeRelativeOrAbsolute` enum('Relative','Absolute') NOT NULL DEFAULT 'Relative' COMMENT 'If "Absolute" the % time is exactly as specified.  If "Relative" the % applies to the entire split.',
  PRIMARY KEY (`tSp_id`),
  KEY `tSplits_Id` (`tSp_GroupID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `tStudentSnapshot`
--

CREATE TABLE IF NOT EXISTS `tStudentSnapshot` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `tA_S_ID` char(80) NOT NULL,
  `tA_StudentName` tinytext NOT NULL,
  `current_tA_id` int(11) NOT NULL,
  `current_tGA_Name` tinytext NOT NULL,
  `current_tA_StartRec` int(11) NOT NULL,
  `last_tA_id` int(11) NOT NULL,
  `last_tGA_Name` tinytext NOT NULL,
  `last_tA_StartRec` int(11) NOT NULL,
  `last_tA_ErrorsMade` tinyint(1) NOT NULL,
  `last_modified` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COMMENT='Same info as session variables. ' AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `tTypingData`
--

CREATE TABLE IF NOT EXISTS `tTypingData` (
  `id` bigint(20) unsigned NOT NULL,
  `tT_StudentName` text NOT NULL,
  `tT_S_ID` char(80) NOT NULL,
  `tT_line_typed` text NOT NULL,
  `tT_title` text NOT NULL,
  `tT_wpm1` tinyint(4) NOT NULL,
  `tT_wpm2` tinyint(4) NOT NULL,
  `tT_wpm3` tinyint(4) NOT NULL,
  `tT_wpm4` tinyint(4) NOT NULL,
  `tT_wpm5` tinyint(4) NOT NULL,
  `tT_err1` tinyint(4) NOT NULL,
  `tT_err2` tinyint(4) NOT NULL,
  `tT_err3` tinyint(4) NOT NULL,
  `tT_err4` tinyint(4) NOT NULL,
  `tT_err5` tinyint(4) NOT NULL,
  `tT_CorrectKeyStrokes` tinyint(4) NOT NULL,
  `tT_AverageSpeed` tinyint(4) NOT NULL,
  `tT_err` tinyint(4) NOT NULL,
  `tT_Time_Working` bigint(20) NOT NULL,
  `tT_TimeFinished` bigint(20) NOT NULL,
  `tT_UnixTimeFinished` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

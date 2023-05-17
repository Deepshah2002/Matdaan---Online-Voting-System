SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";
--
-- Database: `db_evoting`
--
-- --------------------------------------------------------
--
-- Table structure for table `tbl_admin`
--
CREATE TABLE IF NOT EXISTS `tbl_admin` (
`aid` int(11) NOT NULL,
`admin_username` varchar(30) NOT NULL,
`admin_password` varchar(30) NOT NULL,
`time_stamp` timestamp NOT NULL DEFAULT
CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1 
AUTO_INCREMENT=1 ;
--
-- Dumping data for table `tbl_admin`
--
INSERT INTO `tbl_admin` (`aid`, `admin_username`, 
`admin_password`, `time_stamp`) VALUES
(1, 'admin', '_admin', '2023-04-20 14:33');
-- --------------------------------------------------------
--
-- Table structure for table `tbl_vote`
--
CREATE TABLE IF NOT EXISTS `tbl_vote` (
`id` int(5) NOT NULL,
`voted_for` varchar(15) NOT NULL
)ENGINE=InnoDB DEFAULT CHARSET=latin1 
AUTO_INCREMENT=1 ;
-- --------------------------------------------------------

-- Table structure for table `tbl_users`
--
CREATE TABLE IF NOT EXISTS `tbl_users` (
`id` int(5) NOT NULL,
`full_name` varchar(32) NOT NULL,
`voter_id` int(12) NOT NULL,
`email` varchar(32) NOT NULL,
`voter_phone` int(10) NOT NULL,
`password` varchar(32) NOT NULL,
`confirm_password` varchar(32) NOT NULL,
`gender` varchar(15) NOT NULL,
`has_voted` varchar(15) NOT NULL DEFAULT 0,
) ENGINE=InnoDB DEFAULT CHARSET=latin1 
AUTO_INCREMENT=1 ;
--
-- Dumping data for table `tbl_users`
--
--
-- Indexes for dumped tables
--
--
-- Indexes for table `tbl_admin`
--
ALTER TABLE `tbl_admin`
ADD PRIMARY KEY (`aid`);
--
-- Indexes for table `tbl_users`
--
ALTER TABLE `tbl_users`
ADD PRIMARY KEY (`id`);
--
-- Indexes for table `tbl_vote`
--
ALTER TABLE `tbl_vote`
ADD PRIMARY KEY (`id`);
--
-- AUTO_INCREMENT for dumped tables
--
--
-- AUTO_INCREMENT for table `tbl_admin`
--
ALTER TABLE `tbl_admin`
MODIFY `aid` int(11) NOT NULL 
AUTO_INCREMENT,AUTO_INCREMENT=1;
--
-- AUTO_INCREMENT for table `tbl_users`
--
ALTER TABLE `tbl_users`
MODIFY `id` int(5) NOT NULL 
AUTO_INCREMENT,AUTO_INCREMENT=1;
--
-- AUTO_INCREMENT for table `tbl_vote`
--
ALTER TABLE `tbl_vote`
MODIFY `id` int(5) NOT NULL 
AUTO_INCREMENT,AUTO_INCREMENT=1;

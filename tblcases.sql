--table structure for tblcases
CREATE TABLE
IF NOT EXISTS `tblcases`
(
  `id` int(11) NOT NULL,
  `claim` varchar(150) NOT NULL,
  `applicant` varchar(150) ,
  `defendant` varchar(120) ,
  `claim_details` text(255) ,
  `address` varchar(255),
  `type` ENUM('J','R')
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

ALTER TABLE `tblcases`
ADD PRIMARY KEY(`id`);

ALTER TABLE `tblcases` 
MODIFY `id` int (11) NOT NULL AUTO_INCREMENT;
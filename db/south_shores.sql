/*
SQLyog Ultimate v10.00 Beta1
MySQL - 5.5.5-10.1.38-MariaDB : Database - south_shores
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
CREATE DATABASE /*!32312 IF NOT EXISTS*/`south_shores` /*!40100 DEFAULT CHARACTER SET latin1 */;

USE `south_shores`;

/*Table structure for table `tbl_audit` */

DROP TABLE IF EXISTS `tbl_audit`;

CREATE TABLE `tbl_audit` (
  `audit_id` int(11) NOT NULL AUTO_INCREMENT,
  `content` text NOT NULL,
  `date_generated` datetime DEFAULT CURRENT_TIMESTAMP,
  `user_id` int(11) NOT NULL,
  PRIMARY KEY (`audit_id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;

/*Data for the table `tbl_audit` */

insert  into `tbl_audit`(`audit_id`,`content`,`date_generated`,`user_id`) values (2,'Administrator has logged in','2019-03-04 05:03:20',3),(3,'Administrator has logged in','2019-03-04 05:03:06',3),(4,'Administrator has logged in','2019-03-05 12:03:20',3),(5,'Administrator has logged in','2019-03-11 10:03:50',3),(6,'Administrator has logged in','2019-03-11 10:03:54',3),(7,'Administrator added PESCADOR ISLAND-MOALBOAL HOPPING PACKAGE package','2019-03-11 11:03:56',3);

/*Table structure for table `tbl_package` */

DROP TABLE IF EXISTS `tbl_package`;

CREATE TABLE `tbl_package` (
  `package_id` int(11) NOT NULL AUTO_INCREMENT,
  `package_name` varchar(255) NOT NULL,
  `package_inclusions` text NOT NULL,
  `package_complementary` varchar(255) NOT NULL,
  `package_intinerary` text NOT NULL,
  `excess_payment` int(11) DEFAULT NULL,
  `status` int(11) NOT NULL,
  `added_by` int(11) NOT NULL,
  PRIMARY KEY (`package_id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

/*Data for the table `tbl_package` */

insert  into `tbl_package`(`package_id`,`package_name`,`package_inclusions`,`package_complementary`,`package_intinerary`,`excess_payment`,`status`,`added_by`) values (3,'WHALE SHARKS SWIMMING + TUMALOG FALLS','<p>\r\n\r\nPrivate Tour<br>Private Air-conditioned Vehicle<br>Local driver guide<br>Site Facilitator<br>Venue Entrance Fee<br>Lunch w/ drinks<br>Light Breakfast in Oslob<br>Fees for Whale sharks swimming<br>Boat ride, complete swimming gear, life vest and snorkel.<br>Boatman/guide to Whaleshark<br>Pick-Up/Drop-Off to your Hotel\r\n\r\n<br></p>','Bath Towel\r\nBottled Water','<p>\r\n\r\n04:00am-Pick up in your Hotel<br>07:00am- Breakfast in Oslob<br>07:30am-Whaleshark Swimming<br>11:00am- Cool Down at Tumalog Falls<br>11:30PM- Lunch<br>01:30pm- Wash-Up<br>02:00pm- Travel back to Cebu City<br>03:30pm- Arrived and Drop you off in your Hotel in Cebu or Mactan.<br>This is just an estimated time.\r\n\r\n<br></p>',1,1,3),(4,'CANYONEERING ACTIVITIES + KAWASAN FALLS PACKAGE','<p>\r\n\r\nPrivate Tour<br>Private Air-conditioned vehicle<br>With Driver Guide<br>With Canyoneering Fee<br>Lunch w/ drinks<br>With Kawasan Entrance Fee<br>Motorbike Ride Fee<br>With Complete Safety Gear (helmet, life vest, rubber shoes and etc.)<br>With professional Canyoneering Guide<br>Pick-Up/Drop-Off to your Hotel\r\n\r\n<br></p>','Bath Towel\r\nDistilled Bottled Water','<p>\r\n\r\n06:00am-Pick up in your Hotel (Mactan or Cebu City)<br>08:00am- Canyoneering Registration and Safety Orientation/Change safety gear<br>08:30am- Motorbike ride going to Starting Point<br>09:45am-Canyoneering Activities<br>12:30pm- Kawasan Falls Swimming<br>01:00Pm Lunch<br>02:00pm-Wash Up<br>02:30pm-Travel back to Cebu City<br>04:00-Arrived &amp; drop off in your hotel in Cebu City<br>This is just an estimated time\r\n\r\n<br></p>',0,1,3),(5,'PESCADOR ISLAND-MOALBOAL HOPPING PACKAGE','<p>\r\n\r\nPrivate Tour<br>Private Air condition Vehicle<br>Local driver Guide<br>Lunch w/ drinks<br>Pescador Island Tourism Fee<br>Private Boat<br>Guide men, snorkel and lifevest<br>Pescador Island<br>Turtle Hunting<br>Million Sardines Run<br>Dolphin Watching (Weather dependent)<br>Pick-Up/Drop-Off to your Hotel\r\n\r\n<br></p>','Distilled bottled water\r\nBath Towel','<p>\r\n\r\n06:00am-Pick up in your Hotel<br>08:30am- Arrive in Moalboal Tourism Office<br>09:00am- Pescador Island<br>10:00am- Turtle Hunting<br>11:00am- Million Sardines<br>12:30pm- Back to Basdiot Wharf/ Wash up<br>01:00m- Lunch<br>02:20pm-Travel back to Cebu City<br>04:30-Arrived in your hotel at Cebu City<br>This is just an estimated.\r\n\r\n<br></p>',1,1,3);

/*Table structure for table `tbl_reservation` */

DROP TABLE IF EXISTS `tbl_reservation`;

CREATE TABLE `tbl_reservation` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `ref_number` varchar(255) DEFAULT NULL,
  `full_name` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `contact_number` varchar(255) DEFAULT NULL,
  `addtional_notes` text,
  `package_id` int(11) DEFAULT NULL,
  `paid_amount` varchar(255) DEFAULT NULL,
  `number_of_person` int(11) DEFAULT NULL,
  `number_of_foreigner` int(11) DEFAULT NULL,
  `payment_type` int(11) DEFAULT NULL,
  `date_of_payment` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `tbl_reservation` */

/*Table structure for table `tbl_sub_package` */

DROP TABLE IF EXISTS `tbl_sub_package`;

CREATE TABLE `tbl_sub_package` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `fk_package_id` int(11) NOT NULL,
  `price` varchar(255) NOT NULL,
  `per_person` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=49 DEFAULT CHARSET=latin1;

/*Data for the table `tbl_sub_package` */

insert  into `tbl_sub_package`(`id`,`fk_package_id`,`price`,`per_person`) values (4,3,'8,100',1),(5,3,'4,750',2),(6,3,'3,650',3),(7,3,'3,500',4),(8,3,'3,050',5),(9,3,'2,500',6),(10,3,'2,365',7),(11,3,'2,250',8),(12,3,'2,220',9),(13,3,'2,150',10),(14,3,'2,050',11),(15,3,'2,000',12),(16,3,'1,950',13),(17,3,'1,900',14),(18,3,'1,880',15),(19,4,'8,500',1),(20,4,'5,200',2),(21,4,'4,100',3),(22,4,'3,350',4),(23,4,'3,300',5),(24,4,'3,050',6),(25,4,'2,850',7),(26,4,'2,800',8),(27,4,'2,750',9),(28,4,'2,700',10),(29,4,'2,600',11),(30,4,'2,550',12),(31,4,'2,500',13),(32,4,'2,450',14),(33,4,'2,400',15),(34,5,'10,000',1),(35,5,'5,300',2),(36,5,'3,750',3),(37,5,'2,950',4),(38,5,'2,580',5),(39,5,'2,250',6),(40,5,'2,100',7),(41,5,'1,900',8),(42,5,'1,820',9),(43,5,'1,700',10),(44,5,'1,600',11),(45,5,'1,550',12),(46,5,'1,450',13),(47,5,'1,390',14),(48,5,'1,300',15);

/*Table structure for table `tbl_users` */

DROP TABLE IF EXISTS `tbl_users`;

CREATE TABLE `tbl_users` (
  `user_id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(255) NOT NULL,
  `fullname` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `user_type` int(11) NOT NULL,
  `user_status` int(11) NOT NULL,
  PRIMARY KEY (`user_id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

/*Data for the table `tbl_users` */

insert  into `tbl_users`(`user_id`,`username`,`fullname`,`password`,`user_type`,`user_status`) values (3,'administrator','Administrator','$2y$10$RmKQPxNkuCeFxUtStOCsjuiPHXelMfiufrHjpwzxG82DeXOpVmlh2',0,1);

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

/*
SQLyog Community v13.1.6 (64 bit)
MySQL - 5.7.9 : Database - movieticket
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
CREATE DATABASE /*!32312 IF NOT EXISTS*/`movieticket` /*!40100 DEFAULT CHARACTER SET latin1 */;

USE `movieticket`;

/*Table structure for table `allocate` */

DROP TABLE IF EXISTS `allocate`;

CREATE TABLE `allocate` (
  `allocate_id` int(11) NOT NULL AUTO_INCREMENT,
  `screen_id` int(11) DEFAULT NULL,
  `film_id` int(11) DEFAULT NULL,
  `time_id` int(11) DEFAULT NULL,
  `playeddate` varchar(100) DEFAULT NULL,
  `status` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`allocate_id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

/*Data for the table `allocate` */

insert  into `allocate`(`allocate_id`,`screen_id`,`film_id`,`time_id`,`playeddate`,`status`) values 
(1,1,2,2,'2023-09-22','allocate');

/*Table structure for table `booking` */

DROP TABLE IF EXISTS `booking`;

CREATE TABLE `booking` (
  `booking_id` int(11) NOT NULL AUTO_INCREMENT,
  `customer_id` int(11) DEFAULT NULL,
  `allocate_id` int(11) DEFAULT NULL,
  `total` varchar(100) DEFAULT NULL,
  `date` varchar(100) DEFAULT NULL,
  `status` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`booking_id`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

/*Data for the table `booking` */

insert  into `booking`(`booking_id`,`customer_id`,`allocate_id`,`total`,`date`,`status`) values 
(2,1,1,'500','2023-09-06','cenceled'),
(3,1,1,'500','2023-09-06','pending');

/*Table structure for table `bookingchild` */

DROP TABLE IF EXISTS `bookingchild`;

CREATE TABLE `bookingchild` (
  `bookingchild_id` int(11) NOT NULL AUTO_INCREMENT,
  `booking_id` int(11) DEFAULT NULL,
  `seating_id` int(11) DEFAULT NULL,
  `price` varchar(100) DEFAULT NULL,
  `theater_id` int(11) DEFAULT NULL,
  `no_of_seat` varchar(11) DEFAULT NULL,
  PRIMARY KEY (`bookingchild_id`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

/*Data for the table `bookingchild` */

insert  into `bookingchild`(`bookingchild_id`,`booking_id`,`seating_id`,`price`,`theater_id`,`no_of_seat`) values 
(1,1,1,'33',0,'1'),
(2,1,2,'500',0,'1'),
(3,2,2,'500',0,'1'),
(4,3,2,'500',0,'1');

/*Table structure for table `customer` */

DROP TABLE IF EXISTS `customer`;

CREATE TABLE `customer` (
  `customer_id` int(11) NOT NULL AUTO_INCREMENT,
  `login_id` int(11) DEFAULT NULL,
  `fname` varchar(100) DEFAULT NULL,
  `lname` varchar(100) DEFAULT NULL,
  `city` varchar(100) DEFAULT NULL,
  `dist` varchar(100) DEFAULT NULL,
  `pin` varchar(100) DEFAULT NULL,
  `phone` varchar(100) DEFAULT NULL,
  `gender` varchar(100) DEFAULT NULL,
  `cust_dob` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`customer_id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

/*Data for the table `customer` */

insert  into `customer`(`customer_id`,`login_id`,`fname`,`lname`,`city`,`dist`,`pin`,`phone`,`gender`,`cust_dob`) values 
(1,2,'user','qwerty','ddgdsgdsg','fdfsf1','123456','2345678907','male','2023-08-26');

/*Table structure for table `film` */

DROP TABLE IF EXISTS `film`;

CREATE TABLE `film` (
  `film_id` int(11) NOT NULL AUTO_INCREMENT,
  `type_id` int(11) DEFAULT NULL,
  `film_release` varchar(100) DEFAULT NULL,
  `filim_desc` varchar(100) DEFAULT NULL,
  `duration` varchar(100) DEFAULT NULL,
  `film_name` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`film_id`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

/*Data for the table `film` */

insert  into `film`(`film_id`,`type_id`,`film_release`,`filim_desc`,`duration`,`film_name`) values 
(2,1,'2023-08-27','cccccccccccccs','dddddddddddds','ffffffffffffffs');

/*Table structure for table `login` */

DROP TABLE IF EXISTS `login`;

CREATE TABLE `login` (
  `login_id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(100) DEFAULT NULL,
  `password` varchar(100) DEFAULT NULL,
  `usertype` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`login_id`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

/*Data for the table `login` */

insert  into `login`(`login_id`,`username`,`password`,`usertype`) values 
(1,'pro','pro','production'),
(2,'user','user','customer'),
(3,'tea','tea','theater'),
(4,'admin','admin','admin');

/*Table structure for table `opportunities` */

DROP TABLE IF EXISTS `opportunities`;

CREATE TABLE `opportunities` (
  `opportunities_id` int(11) NOT NULL AUTO_INCREMENT,
  `production_id` int(11) DEFAULT NULL,
  `title` varchar(100) DEFAULT NULL,
  `detials` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`opportunities_id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

/*Data for the table `opportunities` */

insert  into `opportunities`(`opportunities_id`,`production_id`,`title`,`detials`) values 
(1,1,'sda','adddfdfdf earwefwr  wrwerwerw');

/*Table structure for table `payment` */

DROP TABLE IF EXISTS `payment`;

CREATE TABLE `payment` (
  `payment_id` int(11) NOT NULL AUTO_INCREMENT,
  `customer_id` int(11) DEFAULT NULL,
  `booking_id` int(11) DEFAULT NULL,
  `amount` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`payment_id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

/*Data for the table `payment` */

insert  into `payment`(`payment_id`,`customer_id`,`booking_id`,`amount`) values 
(1,1,2,'500');

/*Table structure for table `preference` */

DROP TABLE IF EXISTS `preference`;

CREATE TABLE `preference` (
  `preference_id` int(11) NOT NULL AUTO_INCREMENT,
  `opportunities_id` int(11) DEFAULT NULL,
  `preference` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`preference_id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

/*Data for the table `preference` */

insert  into `preference`(`preference_id`,`opportunities_id`,`preference`) values 
(1,1,'asdfgh');

/*Table structure for table `production` */

DROP TABLE IF EXISTS `production`;

CREATE TABLE `production` (
  `production_id` int(11) NOT NULL AUTO_INCREMENT,
  `login_id` int(11) DEFAULT NULL,
  `team_name` varchar(100) DEFAULT NULL,
  `place` varchar(100) DEFAULT NULL,
  `phone` varchar(100) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`production_id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

/*Data for the table `production` */

insert  into `production`(`production_id`,`login_id`,`team_name`,`place`,`phone`,`email`) values 
(1,1,'user qwerty','kerala','02345678907','student@gmail.com');

/*Table structure for table `request` */

DROP TABLE IF EXISTS `request`;

CREATE TABLE `request` (
  `request_id` int(11) NOT NULL AUTO_INCREMENT,
  `opportunities_id` int(11) DEFAULT NULL,
  `customer_id` int(11) DEFAULT NULL,
  `image` varchar(100) DEFAULT NULL,
  `date` varchar(100) DEFAULT NULL,
  `status` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`request_id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

/*Data for the table `request` */

insert  into `request`(`request_id`,`opportunities_id`,`customer_id`,`image`,`date`,`status`) values 
(1,1,1,'uploads/images_64f9d389f038a.jpg','2023-09-07','send request');

/*Table structure for table `schedule` */

DROP TABLE IF EXISTS `schedule`;

CREATE TABLE `schedule` (
  `schedule_id` int(11) NOT NULL AUTO_INCREMENT,
  `request_id` int(11) DEFAULT NULL,
  `date` varchar(100) DEFAULT NULL,
  `time` varchar(100) DEFAULT NULL,
  `venue` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`schedule_id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

/*Data for the table `schedule` */

/*Table structure for table `screen` */

DROP TABLE IF EXISTS `screen`;

CREATE TABLE `screen` (
  `screen_id` int(11) NOT NULL AUTO_INCREMENT,
  `screenname` varchar(100) DEFAULT NULL,
  `noofseats` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`screen_id`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

/*Data for the table `screen` */

insert  into `screen`(`screen_id`,`screenname`,`noofseats`) values 
(1,'dsd','20');

/*Table structure for table `seattype` */

DROP TABLE IF EXISTS `seattype`;

CREATE TABLE `seattype` (
  `seating_id` int(11) NOT NULL AUTO_INCREMENT,
  `screen_id` int(11) DEFAULT NULL,
  `seattype` varchar(100) DEFAULT NULL,
  `rowname` varchar(100) DEFAULT NULL,
  `seatnumber` varchar(100) DEFAULT NULL,
  `rate` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`seating_id`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

/*Data for the table `seattype` */

insert  into `seattype`(`seating_id`,`screen_id`,`seattype`,`rowname`,`seatnumber`,`rate`) values 
(1,1,'3','3e3','34','33'),
(2,1,'sds','description','332','500');

/*Table structure for table `theater` */

DROP TABLE IF EXISTS `theater`;

CREATE TABLE `theater` (
  `theater_id` int(11) NOT NULL AUTO_INCREMENT,
  `login_id` int(11) DEFAULT NULL,
  `name` varchar(100) DEFAULT NULL,
  `city` varchar(100) DEFAULT NULL,
  `pin` varchar(100) DEFAULT NULL,
  `phone` varchar(100) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`theater_id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

/*Data for the table `theater` */

insert  into `theater`(`theater_id`,`login_id`,`name`,`city`,`pin`,`phone`,`email`) values 
(1,3,'user qwerty','ddgdsgdsg','123456','2345678907','student@gmail.com');

/*Table structure for table `time` */

DROP TABLE IF EXISTS `time`;

CREATE TABLE `time` (
  `time_id` int(11) NOT NULL AUTO_INCREMENT,
  `time_name` varchar(100) DEFAULT NULL,
  `time` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`time_id`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

/*Data for the table `time` */

insert  into `time`(`time_id`,`time_name`,`time`) values 
(2,'jkds','21:01');

/*Table structure for table `type` */

DROP TABLE IF EXISTS `type`;

CREATE TABLE `type` (
  `type_id` int(11) NOT NULL AUTO_INCREMENT,
  `type_name` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`type_id`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

/*Data for the table `type` */

insert  into `type`(`type_id`,`type_name`) values 
(1,'b'),
(2,'cm');

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

CREATE DATABASE bewdproject1;

use bewdproject1;

CREATE TABLE `works` (
  `id` int(10) UNSIGNED NOT NULL,
  `userid` varchar(20) NOT NULL,
  `class` varchar(30) NOT NULL,
  `assignmentname` varchar(50) NOT NULL,
  `duedate` varchar(30) DEFAULT NULL,
  `weighing` varchar(30) DEFAULT NULL,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;



CREATE TABLE users (
    id INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
    username VARCHAR(50) NOT NULL UNIQUE,
    password VARCHAR(255) NOT NULL,
    created_at DATETIME DEFAULT CURRENT_TIMESTAMP
);
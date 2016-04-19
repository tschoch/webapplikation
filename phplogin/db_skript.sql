CREATE TABLE IF NOT EXISTS `Users` (
  `UID` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `Fuid` varchar(100) NOT NULL,
  `Ffname` varchar(60) NOT NULL,
  `Femail` varchar(60) NOT NULL,
    `Offer_1` varchar(60) DEFAULT NULL,
    `Offer_2` varchar(60) DEFAULT NULL,
    `Offer_3` varchar(60) DEFAULT NULL,
    `Street` varchar(60) DEFAULT NULL,
    `Nr` int DEFAULT NULL,
    `PLZ` int DEFAULT NULL,
    `City` varchar(60) DEFAULT NULL,
  PRIMARY KEY (`UID`)
);
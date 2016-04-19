CREATE TABLE IF NOT EXISTS `Users2` (
  `UID` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `Fuid` varchar(100) NOT NULL,
  `Ffname` varchar(60) NOT NULL,
  `Femail` varchar(60) NOT NULL,
    `Angebot_1` varchar(60) NOT NULL,
    `Angebot_2` varchar(60) NOT NULL,
    `Angebot_3` varchar(60) NOT NULL,
    `Strasse` varchar(60) DEFAULT NULL,
    `Nr` int DEFAULT NULL,
    `PLZ` int DEFAULT NULL,
    `Ort` varchar(60) DEFAULT NULL,
    `Angebot` varchar(60) DEFAULT NULL,
  PRIMARY KEY (`UID`)
);
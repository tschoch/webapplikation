CREATE TABLE IF NOT EXISTS `Users` (
    `ID` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
    `OrderDate` datetime NOT NULL DEFAULT GETDATE(),
    `Fuid_dienstleister` varchar(100) NOT NULL,
    `Ffname_dienstleister` varchar(60) NOT NULL,
    `Fuid_Kunde` varchar(100) NOT NULL,
    `Ffname_Kunde` varchar(60) NOT NULL,
    `Offer` varchar(60) DEFAULT NULL,
    `Bewertung` int DEFAULT NULL,
  PRIMARY KEY (`ID`)
);
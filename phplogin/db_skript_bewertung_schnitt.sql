CREATE TABLE IF NOT EXISTS `bewertung_schnitt` (
    `ID` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
    `Fuid_dienstleister` varchar(100) NOT NULL,
    `Ffname_dienstleister` varchar(60) NOT NULL,
    `Offer` varchar(60) NOT NULL,
    `Bewertung_tot` double NOT NULL,
    `Anzahl` bigint(20) NOT NULL,
    `Bewertung_schnitt` double DEFAULT NULL,
    PRIMARY KEY (`ID`)
);
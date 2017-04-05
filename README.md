# Webapplikation CarParts

### Installations Anleitung localhost
Voraussetzngen: Localhost auf Ubuntu 14.04 und Datenbank (mysql 5.5 und PHP 5.*)

1. Die Ordner in ein Unterverzeichnis Namens projekt_web des WebServers kopieren
2. Datenbankconfig in der Datei WebServer/Documents/projekt_web/phplogin/dbconfig.php anpassen
3. Die DB CarParts erstellen
4. Tabellen erstellen:
  - Das sql Skript unter WebServer/Documents/projekt_web/sql/skript_user_table.sql ausführen
  - Das sql Skript unter WebServer/Documents/projekt_web/sql/skript_bewertung_table.sql ausführen
  - Das sql Skript unter WebServer/Documents/projekt_web/sql/skritpt_bewertung_schnitt_table.sql ausführen
5. Tabelle User füllen:
  - Das sql Skript unter WebServer/Documents/projekt_web/sql/input_skript_user.sql aus der User Tabelle ausführen
6. Die App_ID und das App_secret von dem Administrator anfodern und in der Datei WebServer/Documents/projekt_web/phplogin/fbconfig.php in Zeile 18 an der entsprechenden Stelle einfügen

***************************************************************************Raiffeisen IBANs:CH81 8000 5000 0531 3669 3 (IBAN ist einmal im File)CH42-8120-4000-0037-8698-4 (IBAN ist einmal im File)CH97 8129 7000 0051 9027 7 (IBAN ist einmal im File) CH69 8129 7000 0040 9419 6 (IBAN ist einmal im File)***************************************************************************CH4281274000003786984 (IBAN ist mehrmals in versch. Formaten im File)CH42 8127 4000 0037 8698 4 (IBAN ist mehrmals in versch. Formaten im File)CH42.8127.4000.0037.8698.4 (IBAN ist mehrmals in versch. Formaten im File)CH42-8127-4000-0037-8698-4 (IBAN ist mehrmals in versch. Formaten im File)***************************************************************************CH31 8125 9000 0012 4568 9 (IBAN ist mehrmals in versch. Formaten im File)CH3181259000001245689 (IBAN ist mehrmals in versch. Formaten im File)CH31-8125-9000-0012-4568-9 (IBAN ist mehrmals in versch. Formaten im File)CH31.8125.9000.0012.4568.9 (IBAN ist mehrmals in versch. Formaten im File)ch31 8125 9000 0012 4568 9 (IBAN ist mehrmals in versch. Formaten im File)cH31 8125 9000 0012 4568 9 (IBAN ist mehrmals in versch. Formaten im File)Ch31 8125 9000 0012 4568 9 (IBAN ist mehrmals in versch. Formaten im File)***************************************************************************Non Raiffeisen IBANs:CH72 0900 0000 9071 1578 7 (IBAN ist einmal im File)CH31.8123.9000.0012.4568.9 (IBAN ist mehrmals in versch. Formaten im File)CH3181239000001245689 (IBAN ist mehrmals in versch. Formaten im File)CH31-8123-9000-0012-4568-9 (IBAN ist mehrmals in versch. Formaten im File)***************************************************************************

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

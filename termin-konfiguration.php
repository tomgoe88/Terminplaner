<?php
define("MYSQL_HOST","localhost");
define("MYSQL_BENUTZER", "root");
define("MYSQL_KENNWORT", "times-88");
define("MYSQL_DATENBANK", "terminkalender");

$db_link = @mysql_connect (MYSQL_HOST, MYSQL_BENUTZER, MYSQL_KENNWORT);

if(!$db_link){
    die("keine Verbindung zur Zeit möglich- später probieren");

}
?>
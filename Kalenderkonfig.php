<?php
$mitarbeiterNr= 0;
function weitererMitarbeiter()
{
    global $mitarbeiterNr;
    $mitarbeiterNr=$mitarbeiterNr +1;
    echo "hier kommt das weitere Formular Inputfeld mit Mitarbeiternummer";
}
?>

<html xmlns="http://www.w3.org/1999/html">
    <head>

    </head>
    <body>
        < action="KalenderkonfigAnzeige.php" method="post">
            Hier wird angegeben wie viele Mitarbeiter
            Welche Öffnungszeiten

        </form>
    </body>
</html>
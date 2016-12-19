

<html xmlns="http://www.w3.org/1999/html">
    <head>

    </head>
    <body>
        <form action="KalenderkonfigAnzeige.php" method="post">
            Hier wird angegeben wie viele Mitarbeiter
            Welche Öffnungszeiten
            <?php
            $mitarbeiterNr= 0;
            function weitererMitarbeiter()
            {
                global $mitarbeiterNr;
                $mitarbeiterNr=$mitarbeiterNr +1;
                echo "hier kommt das weitere Formular Inputfeld mit Mitarbeiternummer";
            }
            ?>

        </form>
    </body>
</html>
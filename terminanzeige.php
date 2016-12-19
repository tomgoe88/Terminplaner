<?php
if($_GET['monat'])
{
    if((int)$_GET['monat']> 0 AND (int)$_GET['monat']<13)
    {
        $monat = (int) $_GET['monat'];
    }
    else
    {
        $monat=date("n");
    }
}
else
{
    $monat=date("n");
}

if($_GET['jahr'])
{
    if((int)$_GET['jahr']> 0 AND (int)$_GET['jahr']<3000)
    {
        $jahr = (int) $_GET['jahr'];
    }
    else
    {
        $jahr=date("Y");
    }
}
else
{
    $jahr=date("Y");
}

echo"<h1>Terminkalender $monat.$jahr</h1> ";

$sql = "
    SELECT
      id, datum, titel, beschreibung
    FROM termine
    WHERE
      YEAR(datum) = '$jahr'
    AND
      MONTH(datum) = '$monat'
    ORDER BY datum
";

$db_erg = mysql_query( $sql );
if ( ! $db_erg )
{
    die('Ung?ltige Abfrage: ' . mysql_error());
}

$anzahl_eintraege = mysql_num_rows($db_erg);
echo "<p>Anzahl der Einträge: $anzahl_eintraege </p>";

echo '<table border="1">';
while ($zeile = mysql_fetch_array( $db_erg, MYSQL_ASSOC))
{
    echo '<tr>';
    echo '<td>'. $zeile['datum'] . '</td>';
    echo '<td>';
    echo '<b>'. $zeile['titel'] . '</b><br />';
    echo $zeile['beschreibung'];
    echo '</td>';
    echo '</tr>';
}
echo '</table>';

mysql_free_result( $db_erg );

//Links erzeugen und blättern
if($monat==1)
{
    $vmonat=12;
    $vjahr=bcsub($jahr,1);
}
else
{
    $vmonat=bcsub($monat,1);
    $vjahr=$jahr;
}

echo "<a href='terminanzeige.php";
echo "?monat=".$vmonat;
echo "&jahr=".$vjahr;
echo "'>Vormonat</a>";
echo " | ";
echo "<a href='terminanzeige.php";
echo "?monat=". date("n");
echo "&jahr=".date("Y");
echo "'>akt. Monat</a>";

echo " | ";

if ( $monat == 12 )
{
    $nmonat = 1;
    $njahr = bcadd ( $jahr, 1 );
}
else
{
    $nmonat = bcadd ( $monat, 1 );
    $njahr = $jahr;
}
echo '<a href="terminanzeige.php';
echo '?monat='. $nmonat;
echo '&jahr='. $njahr;
echo '">nächster Monat</a>';


// Anzeige Formular
echo '<hr />';
echo '<form name="" action="" method="POST" >';

echo '<p>Datum in der Form JJJJ-MM-TT<br />';
echo '<input type="text" name="termin[datum]" size="10" />';
echo '</p>';

echo '<p>Kurzbeschreibung<br />';
echo '<input type="text" name="termin[kurzbeschreibung]" />';
echo '</p>';

echo '<p>ausführliche Beschreibung<br />';
echo '<textarea name="termin[beschreibung]" rows="9" cols="80">';
echo '</textarea></p>';
echo '<input type="hidden" name="vorgang" value="neu" />';
echo '<input type="Submit" name="" value="speichern" />';

echo '</form>';


//hier kommen die Speicher/Lösch und Änderungsfunktionen






<?php 
error_reporting(E_ALL);

$db = pg_connect("host=127.0.0.1 dbname=digitalOe user=postgres ")
    or die('Could not connect: ' . pg_last_error());


 $kunde = "DROP TABLE kunde CASCADE";
pg_query($db, $kunde);

 $adresse = "DROP TABLE adresse CASCADE";
pg_query($db, $adresse);

 $bestellung = "DROP TABLE bestellung CASCADE";
pg_query($db, $bestellung);

 $hersteller = "DROP TABLE hersteller CASCADE";
pg_query($db, $hersteller);

 $kategorie = "DROP TABLE kategorie CASCADE";
pg_query($db, $kategorie);

 $subkategorie = "DROP TABLE subkategorie CASCADE";
pg_query($db, $subkategorie);

 $artikel = "DROP TABLE artikel CASCADE";
pg_query($db, $artikel);

 $bestellposition = "DROP TABLE bestellposition CASCADE";
pg_query($db, $bestellposition);

 $privatkunde = "DROP TABLE privatkunde CASCADE";
pg_query($db, $privatkunde);

 $businesskunde = "DROP TABLE businesskunde CASCADE";
pg_query($db, $businesskunde);

 $bewertung = "DROP TABLE bewertung CASCADE";
pg_query($db, $bewertung);

 $bild = "DROP TABLE bild CASCADE";
pg_query($db, $bild);

 $angebote = "DROP TABLE angebote CASCADE";
pg_query($db, $angebote);

  pg_close($db);
?>

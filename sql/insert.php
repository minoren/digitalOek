 <?php

error_reporting(E_ALL);

$db = pg_connect("host=127.0.0.1 dbname=digitalOe user=postgres ")
    or die('Could not connect: ' . pg_last_error());

$sql =<<<EOF
  

INSERT INTO kunde(kunden_id, anrede, vorname, nachname, telefon, email, password, gebdatum, bank) VALUES (1,  "Frau", "Anna", "K1", "123", "k1@test.at", "@+2324#*", "12-12-1970",  "AT");

INSERT INTO artikel(artikel_id, artname, price, bestand, kategorie_id, hersteller_id) VALUES (1,  "Sensor1", 23, 54, 54, 453);

  
EOF;

$ret = pg_query($db, $sql);
   if(!$ret) {
      echo pg_last_error($db);
   } else {
      echo "Tables created successfully";
   }
   pg_close($db);


?>  

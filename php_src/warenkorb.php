<?php
error_reporting(E_ALL);
$db = pg_connect("host=127.0.0.1 dbname=digitalOe user=postgres ") or die('Could not connect: ' . pg_last_error());
?>
<?php
session_start();
?>


<html> 
<head> 
	
	 <head>
      <title>Warenkorb</title>
      <meta name="author" content="Renata Minorczyk Matr.Nr.0006750">
      <meta name="editor" content="">
      <link rel="stylesheet" type="text/css" href="css/main.css" />
	  <link rel="stylesheet" type="text/css" href="css/style.css"> 
   </head>
	
</head> 
<body> 
  
	<div id="container"> 
	
	
	<div id="header"> 
	<h1>Med-Fit Solution</h1>

	</div> 
	<div id="navigation">
	
		<ul id = "nav">
		
		    <li id="active"> <a href="startseite.php" title="Artikel">Artikel</a></li>
			<li><a href="warenkorb.php"title="Warenkorb">Warenkorb</a></li>
			<li><a href="registrieren.php"title="Registrieren">Registrieren</a></li>
			<li><a href="anmelden.php"title="Anmelden">Anmelden</a></li>
		</ul>
	</div>
	
	
	<div id="main"> 
	
	<?php

if (isset($_GET['job']) && $_GET['job'] == 'resetWarenkorb')
	{
	session_destroy();
	}

?>
    <form action="warenkorb.php" method="post" >
    <h1>Warenkorb</h1>
   
        <?php

if (isset($_POST['artikel_id']))
	{

	// Der ausgelesene Artikel wird in den Session gespeichert

	$_SESSION['warenkorb'][] = array(
		'artikel_id' => isset($_POST['artikel_id']) ,
		'artname' => $_POST['artname'],
		'price' => $_POST['price']
	);
	}

// Ausgabe des Warenkorbs

if (isset($_SESSION['warenkorb']))
	{
	$count = count($_SESSION['warenkorb']);
	echo "Im Warenkorb befinden sich " . $count . " Artikel";
	for ($i = 0; $i < $count; $i++)
		{
		echo "<p>";
		echo "<span class='grau'> id &raquo; " . $_SESSION['warenkorb'][$i]['artikel_id'] . " | " . $_SESSION['warenkorb'][$i]['price'] . " x " . $_SESSION['warenkorb'][$i]['artname'];
		}
	}

?>
 
      </fieldset><br />

      <input name="weiter" type="button" value="Zurueck zur Artikelliste" onclick="window.location.href='startseite.php';" />
       <input name="weiter" type="button" value="Zur Kasse gehen" onclick="window.location.href='anmelden.php';" />
    </form>
     <br />
  
     
</div>
	
		</div> 

</body> 
</html>

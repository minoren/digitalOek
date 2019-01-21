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
      <title>Artikel</title>
      <meta name="author" content="Renata Minorczyk Matr.Nr.0006750">
      <meta name="editor" content="">
      <link rel="stylesheet" type="text/css" href="css/main.css" />
	  <link rel="stylesheet" type="text/css" href="css/style.css"> 
   </head>
	
</head> 
<body> 
  
	<div id="container"> 
	
	
	<div id="header"> 
	Med-Fit Solution

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
    
      <div>
         <p>
         <p>
         <form id='searchform' action='startseite.php' method='get'>
            <a href='startseite.php'>Alle Artikel</a> 
            <br /></br>
            Suche nach Artikelname:
            <input id='search' name='search' type='text' size='10' value="<?php echo isset($_GET['search']) ?>"/>
            <input id='submit' type='submit' value='Los!' />
         </form>
         </p></p>
      </div>
      <?php

if (isset($_GET['search']))
	{
	$sql = "SELECT * FROM artikel WHERE artname like '%" . $_GET['search'] . "%'";
	}
  else
	{
	$sql = "SELECT * FROM artikel";
	}

// execute sql statement

$stmt = pg_query($db, $sql);
?>
      <?php

if (!isset($_SESSION['warenkorb']))
	{
	$_SESSION['warenkorb'] = array();
	} ?>
      <table style='border: 1px solid #DDDDDD' cellspacing = "0" cellpadding = "5" width="70%" align="center" bgcolor=#F2F2F2>
         <colgroup border = "1">
            <col width="20">
            <col width="100">
            <col width="100">
            <col width="100">
            <col width="50">
         </colgroup>
         <thead>
            <tr align="left"  bgcolor="#D8D8D8">
               <th>ArtNr</th>
               <th>Artikelname</th>
               <th>Preis</th>
               <th>Bestand</th>
               <th>Action</th>
            </tr>
         </thead>
         <tbody>
            <?php

// fetch rows of the executed sql query

while ($row = pg_fetch_assoc($stmt))
	{
	echo "<tr>";
	echo "<td>" . $row['artikel_id'] . "</td>";
	echo "<td>" . $row['artname'] . "</td>";
	echo "<td>" . $row['price'] . "</td>";
	echo "<td>" . $row['bestand'] . "</td>";
?>
            <td>
               <form action="warenkorb.php" method="post">
                  <input type="hidden" name="artikel_id" value="<?php
	echo $row['artikel_id'] ?>">
                  <input type="hidden" name="artname" value="<?php
	echo $row['artname']; ?>" /> 
                  <input type="hidden" name="price" value="<?php
	echo $row['price']; ?>" /> 				 
                  <input name="In den Warenkorb" type="submit" value="In den Warenkorb"> 
               </form>
            </td>
            <?php
	echo "</tr>";
	}

?>
			   
			   <a href="warenkorb.php">Warenkorb ansehen</a>
			   
         </tbody>
      </table>
      <div>Insgesamt <?php
echo pg_num_rows($stmt); ?> Artikel gefunden!</div>
      <br />
      <input name="resetCart" type="button" value="Warenkorb leeren" onclick="window.location.href='startseite.php?job=resetWarenkorb';" /> 
	  
      <?php
pg_close($db);
?>

		
		</div> 

</body> 
</html>

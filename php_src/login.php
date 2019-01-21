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
      <title>login</title>
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
		
		    <li id="active"> <a href="index.php" title="Artikel">Artikel</a></li>
			<li><a href="warenkorb.php"title="Warenkorb">Warenkorb</a></li>
			<li><a href="registrieren.php"title="Registrieren">Registrieren</a></li>
			<li><a href="anmelden.php"title="Anmelden">Anmelden</a></li>
		</ul>
	</div>
	
	
	<div id="main"> 
	

	<?php
$email = $_POST['email'];
$password = $_POST['password'];

if ($email != '' && $password != '')
	{
	$db = pg_connect("host=127.0.0.1 dbname=digitalOe user=postgres ") or die('Could not connect: ' . pg_last_error());
	$result = pg_query("SELECT email, password FROM kunde");
	$end = 0;
	while (($row = pg_fetch_row($result)) && ($end == 0))
		{
		if ($row[0] == $email && $row[1] == $password)
			{
			session_start();
			$_SESSION['eingeloggt'] = "2";
			$_SESSION['email'] = $email;
			print "<head><title>Kundenseite</title></head>";
			print "<body background=\"Bilder/back.jpg\">";
			print "<br /><br /><center> <font size=4>";
			print "<table width=50%><tr><td valign=\"middle\" align=\"center\">Sie sind als<br /><i><u>" . $email . "</u></i> eingeloggt</td>";
			print "<td valign=\"middle\" align=\"center\"><a href=\"logout.php\"><br />Logout</a></td></tr>";
			print "</table><br /><br />";
			print "<a href=\"status.php\">Fluge ansehen</a>";
			print "<br /><br />";
			print "<a href=\"suche.php\">Flug suchen</a>";
			print "<br /><br />";
			print "<a href=\"daten_aendern.php\">Pers&ouml;nliche Daten verwalten</a>";
			print "</font></center></body>";
			$end = 1;
			break;
			}
		}

	if ($end == 0)
		{
		print "<head><title>Fehler beim einloggen</title></head>";
		print "<body background=\"Bilder/back.jpg\">";
		print "<br /><br /><center>";
		print "<h3>Falsche Username oder Password!</h3><br /><br />";
		print "<a href=\"index.html\">zur&uuml;ck zur Startseite</a>";
		print "<br /><br />";
		print "</center></body>";
		}
	}
  else
	{
	print "<head><title>Fehler beim einloggen</title></head>";
	print "<body background=\"Bilder/back.jpg\">";
	print "<br /><br /><center>";
	print "<b>Sie haben nichts im Feld \"Username\" oder \"Passwort\" eingegeben</b>";
	print "<br /><br /><b>Neue bei WWW & FLY? <a href=\"neue_kunde.php\">Registrieren!</a></b>";
	print "<br /><br /><a href=\"index.html\">zur&uuml;ck zur Startseite</a>";
	print "<br /><br />";
	print "</center></body>";
	}

?>


<form action ="login.php" method = "post">
<table align="center">
<tr> <td> <font size=4>email </font> </td> <td> <input type=text name = "email"></td>
<tr> <td> <font size=4>Passwort </font> </td> <td> <input type=password name = "password"></td>
<tr><td>&nbsp</td></tr>
<tr><td>&nbsp</td><td align="center"><input type = "submit" value="login"></td> </tr>

</table>
</form>

<br />
	
	
	
	
	
	
	
	
	
	
	
		</div> 

</body> 
</html>
